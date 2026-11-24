<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CoinTransaction extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'type', // 'earn' or 'redeem'
        'source', // 'welcome_bonus', 'daily_streak', 'halqa_attendance', 'hifz_milestone', 'zikr_completion', 'course_discount'
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
