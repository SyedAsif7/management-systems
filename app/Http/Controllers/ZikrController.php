<?php

namespace App\Http\Controllers;

use App\Models\ZikrLog;
use App\Services\CoinService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZikrController extends Controller
{
    /**
     * Community Zikr & Durood Sanctuary View
     */
    public function index()
    {
        $globalTotal = (int) ZikrLog::sum('count');
        // Initial community milestone offset so counter has an inspiring baseline
        $displayGlobalTotal = max(128450, $globalTotal + 128450);

        $weeklyGoal = 1000000;
        $weeklyProgress = min(100, round(($displayGlobalTotal % $weeklyGoal) / ($weeklyGoal / 100), 1));
        if ($weeklyProgress == 0) $weeklyProgress = 14.5;

        $userToday = 0;
        $userCoins = 0;

        if (Auth::check()) {
            $userToday = (int) ZikrLog::where('user_id', Auth::id())
                ->whereDate('created_at', Carbon::today())
                ->sum('count');
            $userCoins = CoinService::getBalance(Auth::user());
        }

        return view('pages.storefront.zikr_durood', compact(
            'displayGlobalTotal',
            'weeklyGoal',
            'weeklyProgress',
            'userToday',
            'userCoins'
        ));
    }

    /**
     * Submit Tasbeeh count from interactive tasbeeh circle
     */
    public function submit(Request $request)
    {
        $request->validate([
            'zikr_type' => 'required|string',
            'count' => 'required|integer|min:1|max:5000',
        ]);

        $count = (int) $request->count;
        $zikrType = $request->zikr_type;
        $user = Auth::user();
        $coinsEarned = 0;

        // 1. Record Zikr Log
        ZikrLog::create([
            'user_id' => $user ? $user->id : null,
            'zikr_type' => $zikrType,
            'count' => $count,
            'ip_address' => $request->ip(),
            'session_id' => $request->session()->getId(),
        ]);

        // 2. Award Taqwa Coins if user is authenticated (10 Coins per 100 count, cap at 100 coins/day)
        if ($user) {
            $todayCoinsEarned = (int) \App\Models\CoinTransaction::where('user_id', $user->id)
                ->where('source', 'zikr_completion')
                ->whereDate('created_at', Carbon::today())
                ->sum('amount');

            $dailyCoinCap = 100;
            if ($todayCoinsEarned < $dailyCoinCap) {
                // Determine potential coins from this batch: e.g. 10 coins per 100 count (or min 1 coin per 10)
                $potentialCoins = (int) floor($count / 10);
                if ($potentialCoins > 0) {
                    $awardable = min($potentialCoins, $dailyCoinCap - $todayCoinsEarned);
                    if ($awardable > 0) {
                        CoinService::awardCoins(
                            $user,
                            $awardable,
                            'zikr_completion',
                            "Recited {$count}x " . ucwords(str_replace('_', ' ', $zikrType))
                        );
                        $coinsEarned = $awardable;
                    }
                }
            }
        }

        $globalTotal = (int) ZikrLog::sum('count');
        $displayGlobalTotal = max(128450, $globalTotal + 128450);

        return response()->json([
            'success' => true,
            'added' => $count,
            'global_total' => $displayGlobalTotal,
            'coins_earned' => $coinsEarned,
            'coins_balance' => $user ? $user->fresh()->coins_balance : 0,
            'message' => 'SubhanAllah! Your Zikr has been added to the collective community total.',
        ]);
    }

    /**
     * Get live statistics
     */
    public function stats()
    {
        $globalTotal = (int) ZikrLog::sum('count');
        $displayGlobalTotal = max(128450, $globalTotal + 128450);

        return response()->json([
            'success' => true,
            'global_total' => $displayGlobalTotal,
        ]);
    }
}
