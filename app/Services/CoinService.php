<?php

namespace App\Services;

use App\Models\CoinTransaction;
use App\Models\Setting;
use App\User;
use Illuminate\Support\Facades\DB;

class CoinService
{
    /**
     * Award coins to a user
     */
    public static function awardCoins(User $user, int $amount, string $source, ?string $description = null): CoinTransaction
    {
        return DB::transaction(function () use ($user, $amount, $source, $description) {
            $user->increment('coins_balance', $amount);

            return CoinTransaction::create([
                'user_id' => $user->id,
                'amount' => $amount,
                'type' => 'earn',
                'source' => $source,
                'description' => $description ?: "Earned {$amount} Taqwa Coins via " . ucwords(str_replace('_', ' ', $source)),
            ]);
        });
    }

    /**
     * Redeem coins from a user
     */
    public static function redeemCoins(User $user, int $amount, string $source, ?string $description = null): ?CoinTransaction
    {
        if ($user->coins_balance < $amount || $amount <= 0) {
            return null;
        }

        return DB::transaction(function () use ($user, $amount, $source, $description) {
            $user->decrement('coins_balance', $amount);

            return CoinTransaction::create([
                'user_id' => $user->id,
                'amount' => $amount,
                'type' => 'redeem',
                'source' => $source,
                'description' => $description ?: "Redeemed {$amount} Taqwa Coins for " . ucwords(str_replace('_', ' ', $source)),
            ]);
        });
    }

    /**
     * Admin manual adjustment: award, deduct, or set coins directly
     */
    public static function adminAdjust(User $targetUser, int $amount, string $action, string $taskReason, ?User $admin = null): CoinTransaction
    {
        return DB::transaction(function () use ($targetUser, $amount, $action, $taskReason, $admin) {
            $adminName = $admin ? $admin->name : 'Administrator';
            $oldBalance = $targetUser->coins_balance;

            if ($action === 'set') {
                $diff = $amount - $oldBalance;
                $targetUser->coins_balance = max(0, $amount);
                $targetUser->save();

                $type = $diff >= 0 ? 'earn' : 'redeem';
                return CoinTransaction::create([
                    'user_id' => $targetUser->id,
                    'amount' => abs($diff),
                    'type' => $type,
                    'source' => 'admin_set_balance',
                    'description' => "Balance set to {$amount} Coins by {$adminName}. Reason: {$taskReason}",
                ]);
            } elseif ($action === 'deduct') {
                $actualDeduct = min($targetUser->coins_balance, $amount);
                $targetUser->decrement('coins_balance', $actualDeduct);

                return CoinTransaction::create([
                    'user_id' => $targetUser->id,
                    'amount' => $actualDeduct,
                    'type' => 'redeem',
                    'source' => 'admin_deduction',
                    'description' => "Deducted {$actualDeduct} Coins by {$adminName}. Reason: {$taskReason}",
                ]);
            } else { // award
                $targetUser->increment('coins_balance', $amount);

                return CoinTransaction::create([
                    'user_id' => $targetUser->id,
                    'amount' => $amount,
                    'type' => 'earn',
                    'source' => 'admin_task_grant',
                    'description' => "Awarded {$amount} Coins by {$adminName} for: {$taskReason}",
                ]);
            }
        });
    }

    /**
     * Get live coin balance
     */
    public static function getBalance(User $user): int
    {
        return (int) ($user->coins_balance ?? 0);
    }

    /**
     * Calculate discount: 10 Coins = ₹1 discount, up to 20% of course price
     */
    public static function calculateDiscount(int $availableCoins, float $coursePrice): array
    {
        if ($coursePrice <= 0 || $availableCoins <= 0) {
            return [
                'discount_amount' => 0.0,
                'coins_used' => 0,
                'final_price' => $coursePrice,
                'max_discount' => 0.0,
            ];
        }

        $maxDiscount = round($coursePrice * 0.20, 2); // Max 20% discount
        $maxCoinsAllowed = (int) ($maxDiscount * 10);
        $coinsToUse = min($availableCoins, $maxCoinsAllowed);
        $discountAmount = round($coinsToUse / 10, 2);
        $finalPrice = max(0.0, round($coursePrice - $discountAmount, 2));

        return [
            'discount_amount' => $discountAmount,
            'coins_used' => $coinsToUse,
            'final_price' => $finalPrice,
            'max_discount' => $maxDiscount,
        ];
    }

    /**
     * Get Leaderboard Rankings
     */
    public static function getLeaderboard(string $roleFilter = 'all', int $limit = 50)
    {
        $query = User::select('id', 'name', 'username', 'email', 'user_type', 'photo', 'coins_balance')
            ->whereIn('user_type', ['student', 'teacher'])
            ->where('coins_balance', '>=', 0);

        if ($roleFilter === 'student') {
            $query->where('user_type', 'student');
        } elseif ($roleFilter === 'teacher') {
            $query->where('user_type', 'teacher');
        }

        return $query->orderByDesc('coins_balance')
            ->orderBy('name', 'asc')
            ->take($limit)
            ->get();
    }

    /**
     * Calculate User Tier Title and Badge based on Taqwa Coins
     */
    public static function getUserTier(int $balance): array
    {
        if ($balance >= 1000) {
            return [
                'name' => 'Sabiq bil Khayrat',
                'arabic' => 'السابق بالخيرات',
                'title' => 'Foremost in Good Deeds',
                'badge_color' => '#C9A35A',
                'rank_level' => 'Diamond Elite',
                'icon' => '👑',
            ];
        } elseif ($balance >= 500) {
            return [
                'name' => 'Mujtahid',
                'arabic' => 'المجتهد',
                'title' => 'Striving Scholar',
                'badge_color' => '#0B5742',
                'rank_level' => 'Platinum Scholar',
                'icon' => '🌟',
            ];
        } elseif ($balance >= 200) {
            return [
                'name' => 'Mukhlis',
                'arabic' => 'المخلص',
                'title' => 'Sincere Seeker',
                'badge_color' => '#1F7A3F',
                'rank_level' => 'Gold Seeker',
                'icon' => '✨',
            ];
        } else {
            return [
                'name' => 'Salik',
                'arabic' => 'السالك',
                'title' => 'Steadfast Seeker',
                'badge_color' => '#5F7369',
                'rank_level' => 'Seeker',
                'icon' => '🌱',
            ];
        }
    }

    /**
     * Get Administrative KPI Overview
     */
    public static function getAdminOverview(): array
    {
        $totalCoinsInCirculation = User::whereIn('user_type', ['student', 'teacher'])->sum('coins_balance');
        $studentCoins = User::where('user_type', 'student')->sum('coins_balance');
        $teacherCoins = User::where('user_type', 'teacher')->sum('coins_balance');

        $topStudent = User::where('user_type', 'student')->orderByDesc('coins_balance')->first();
        $topTeacher = User::where('user_type', 'teacher')->orderByDesc('coins_balance')->first();

        $totalEarned = CoinTransaction::where('type', 'earn')->sum('amount');
        $totalRedeemed = CoinTransaction::where('type', 'redeem')->sum('amount');
        $totalTransactionsCount = CoinTransaction::count();

        return [
            'total_circulation' => $totalCoinsInCirculation,
            'student_coins' => $studentCoins,
            'teacher_coins' => $teacherCoins,
            'top_student' => $topStudent,
            'top_teacher' => $topTeacher,
            'total_earned' => $totalEarned,
            'total_redeemed' => $totalRedeemed,
            'transactions_count' => $totalTransactionsCount,
        ];
    }

    /**
     * Default Task Reward Rules
     */
    public static function getTaskRules(): array
    {
        return [
            'task_coin_daily_streak' => (int) (Setting::where('type', 'task_coin_daily_streak')->value('description') ?: 5),
            'task_coin_student_halqa' => (int) (Setting::where('type', 'task_coin_student_halqa')->value('description') ?: 15),
            'task_coin_teacher_halqa' => (int) (Setting::where('type', 'task_coin_teacher_halqa')->value('description') ?: 25),
            'task_coin_hifz_milestone' => (int) (Setting::where('type', 'task_coin_hifz_milestone')->value('description') ?: 50),
            'task_coin_zikr_century' => (int) (Setting::where('type', 'task_coin_zikr_century')->value('description') ?: 10),
            'task_coin_exam_excellence' => (int) (Setting::where('type', 'task_coin_exam_excellence')->value('description') ?: 100),
            'task_coin_volunteer_task' => (int) (Setting::where('type', 'task_coin_volunteer_task')->value('description') ?: 50),
        ];
    }

    /**
     * Update Task Reward Rules in settings table
     */
    public static function saveTaskRules(array $rules): void
    {
        foreach ($rules as $key => $val) {
            Setting::updateOrCreate(['type' => $key], ['description' => (string) $val]);
        }
    }
}

