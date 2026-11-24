<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ZikrLog extends Model
{
    protected $fillable = [
        'user_id',
        'zikr_type',
        'count',
        'ip_address',
        'session_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
