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
        try {
            $globalTotal = \Illuminate\Support\Facades\Schema::hasTable('zikr_logs') 
                ? (int) ZikrLog::sum('count') 
                : 0;
        } catch (\Throwable $e) {
            $globalTotal = 0;
        }

        $displayGlobalTotal = $globalTotal;

        $weeklyGoal = 1000000;
        $weeklyProgress = ($displayGlobalTotal > 0 && $weeklyGoal > 0)
            ? min(100, round(($displayGlobalTotal % $weeklyGoal) / ($weeklyGoal / 100), 1))
            : 0;

        $userToday = 0;
        $userCoins = 0;

        if (Auth::check()) {
            try {
                $userToday = \Illuminate\Support\Facades\Schema::hasTable('zikr_logs')
                    ? (int) ZikrLog::where('user_id', Auth::id())
                        ->whereDate('created_at', Carbon::today())
                        ->sum('count')
                    : 0;
                $userCoins = CoinService::getBalance(Auth::user());
            } catch (\Throwable $e) {
                $userToday = 0;
                $userCoins = 0;
            }
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
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('zikr_logs')) {
                ZikrLog::create([
                    'user_id' => $user ? $user->id : null,
                    'zikr_type' => $zikrType,
                    'count' => $count,
                    'ip_address' => $request->ip(),
                    'session_id' => $request->session()->getId(),
                ]);
            }
        } catch (\Throwable $e) {
            // Log or ignore graceful
        }

        // 2. Award Taqwa Coins if user is authenticated (10 Coins per 100 count, cap at 100 coins/day)
        if ($user) {
            try {
                if (\Illuminate\Support\Facades\Schema::hasTable('coin_transactions') && \Illuminate\Support\Facades\Schema::hasColumn('users', 'coins_balance')) {
                    $todayTotalZikr = (int) ZikrLog::where('user_id', $user->id)
                        ->whereDate('created_at', Carbon::today())
                        ->sum('count');

                    $todayCoinsEarned = (int) \App\Models\CoinTransaction::where('user_id', $user->id)
                        ->where('source', 'zikr_completion')
                        ->whereDate('created_at', Carbon::today())
                        ->sum('amount');

                    $dailyCoinCap = 100;
                    $targetCoins = min($dailyCoinCap, (int) floor($todayTotalZikr / 10));
                    $potentialCoins = max(0, $targetCoins - $todayCoinsEarned);

                    if ($potentialCoins > 0) {
                        CoinService::awardCoins(
                            $user,
                            $potentialCoins,
                            'zikr_completion',
                            "Recited {$count}x " . ucwords(str_replace('_', ' ', $zikrType))
                        );
                        $coinsEarned = $potentialCoins;
                    }
                }
            } catch (\Throwable $e) {
                // Non-fatal fallback
            }
        }

        try {
            $globalTotal = \Illuminate\Support\Facades\Schema::hasTable('zikr_logs') ? (int) ZikrLog::sum('count') : 0;
        } catch (\Throwable $e) {
            $globalTotal = 0;
        }
        $displayGlobalTotal = $globalTotal;

        return response()->json([
            'success' => true,
            'added' => $count,
            'global_total' => $displayGlobalTotal,
            'coins_earned' => $coinsEarned,
            'coins_balance' => $user ? ($user->fresh()->coins_balance ?? 0) : 0,
            'message' => 'SubhanAllah! Your Zikr has been added to the collective community total.',
        ]);
    }

    /**
     * Get live statistics
     */
    public function stats()
    {
        try {
            $globalTotal = \Illuminate\Support\Facades\Schema::hasTable('zikr_logs') ? (int) ZikrLog::sum('count') : 0;
        } catch (\Throwable $e) {
            $globalTotal = 0;
        }
        $displayGlobalTotal = $globalTotal;

        return response()->json([
            'success' => true,
            'global_total' => $displayGlobalTotal,
        ]);
    }
}
