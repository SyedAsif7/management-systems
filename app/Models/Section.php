<?php

namespace App\Models;

use App\User;
use Eloquent;

class Section extends Eloquent
{
    protected $fillable = [
        'name',
        'my_class_id',
        'active',
        'teacher_id',
        'live_room_id',
        'meeting_link',
        'batch_start_date',
        'class_timing',
    ];

    public function my_class()
    {
        return $this->belongsTo(MyClass::class);
    }

    public function course()
    {
        return $this->belongsTo(MyClass::class, 'my_class_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function ustadh()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function student_record()
    {
        return $this->hasMany(StudentRecord::class);
    }

    public function live_sessions()
    {
        return $this->hasMany(LiveSession::class, 'section_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'section_id');
    }
}
