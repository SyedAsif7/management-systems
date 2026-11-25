<?php

namespace App\Http\Controllers;

use App\Services\CoinService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoinLeaderboardController extends Controller
{
    /**
     * Display the Taqwa Coins Leaderboard
     */
    public function index(Request $request)
    {
        $roleFilter = $request->get('role', 'all');
        if (!in_array($roleFilter, ['all', 'student', 'teacher'])) {
            $roleFilter = 'all';
        }

        try {
            $hasCoinsCol = \Illuminate\Support\Facades\Schema::hasColumn('users', 'coins_balance');

            if ($hasCoinsCol) {
                $leaderboard = CoinService::getLeaderboard($roleFilter, 100);

                // Decorate with rank and tiers
                $rank = 1;
                foreach ($leaderboard as $user) {
                    $user->rank = $rank++;
                    $user->tier = CoinService::getUserTier($user->coins_balance ?? 0);
                }

                $top3 = $leaderboard->take(3);
                $rankings = $leaderboard->slice(3);

                // Authenticated user rank
                $myRankInfo = null;
                if (Auth::check()) {
                    $currentUser = Auth::user();
                    $myRank = null;
                    foreach ($leaderboard as $u) {
                        if ($u->id === $currentUser->id) {
                            $myRank = $u->rank;
                            break;
                        }
                    }

                    // If user is outside top 100, calculate their overall rank
                    if (!$myRank && in_array($currentUser->user_type, ['student', 'teacher'])) {
                        $higherCount = User::whereIn('user_type', ['student', 'teacher'])
                            ->where('coins_balance', '>', $currentUser->coins_balance ?? 0)
                            ->count();
                        $myRank = $higherCount + 1;
                    }

                    $balance = $currentUser->coins_balance ?? 0;
                    $myRankInfo = [
                        'user' => $currentUser,
                        'rank' => $myRank,
                        'tier' => CoinService::getUserTier($balance),
                        'balance' => $balance,
                    ];
                }

                $stats = [
                    'total_coins' => (int) User::whereIn('user_type', ['student', 'teacher'])->sum('coins_balance'),
                    'total_participants' => User::whereIn('user_type', ['student', 'teacher'])->count(),
                    'students_count' => User::where('user_type', 'student')->count(),
                    'teachers_count' => User::where('user_type', 'teacher')->count(),
                ];
            } else {
                $top3 = collect();
                $rankings = collect();
                $myRankInfo = null;
                $stats = [
                    'total_coins' => 0,
                    'total_participants' => User::whereIn('user_type', ['student', 'teacher'])->count(),
                    'students_count' => User::where('user_type', 'student')->count(),
                    'teachers_count' => User::where('user_type', 'teacher')->count(),
                ];
            }
        } catch (\Throwable $e) {
            $top3 = collect();
            $rankings = collect();
            $myRankInfo = null;
            $stats = [
                'total_coins' => 0,
                'total_participants' => 0,
                'students_count' => 0,
                'teachers_count' => 0,
            ];
        }

        return view('pages.coins.leaderboard', compact('top3', 'rankings', 'roleFilter', 'myRankInfo', 'stats'));
    }
}
