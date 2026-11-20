<?php

namespace App\Models;

use App\User;
use Eloquent;

class Enrollment extends Eloquent
{
    protected $fillable = [
        'student_id',
        'my_class_id',
        'section_id',
        'payment_id',
        'order_id',
        'amount_paid',
        'fee_type',
        'status', // active, expired, completed, scholarship
        'valid_until',
        'eligible_for_refund',
        'refund_status', // none, requested, processed, declined
    ];

    protected $casts = [
        'amount_paid' => 'float',
        'eligible_for_refund' => 'boolean',
        'valid_until' => 'date',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function course()
    {
        return $this->belongsTo(MyClass::class, 'my_class_id');
    }

    public function my_class()
    {
        return $this->belongsTo(MyClass::class, 'my_class_id');
    }

    public function batch()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
}
