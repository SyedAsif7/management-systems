<?php

namespace App\Models;

use App\User;
use Eloquent;

class HifzLog extends Eloquent
{
    protected $fillable = [
        'student_id',
        'teacher_id',
        'date',
        'sabaq_surah_ayah',
        'sabqi_status',
        'manzil_juz',
        'attendance_status',
        'ustadh_remarks',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function ustadh()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
