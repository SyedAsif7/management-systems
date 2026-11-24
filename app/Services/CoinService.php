<?php

namespace App\Services;

use App\Models\CoinTransaction;
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
}
