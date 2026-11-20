<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Str;

class MyClass extends Eloquent
{
    protected $fillable = [
        'name',
        'slug',
        'class_type_id',
        'subtitle',
        'thumbnail_url',
        'duration_label',
        'fee_type',
        'mrp_price',
        'selling_price',
        'class_days',
        'gender_eligibility',
        'refund_threshold_percentage',
        'overview',
        'syllabus',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'mrp_price' => 'float',
        'selling_price' => 'float',
        'refund_threshold_percentage' => 'integer',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            if (empty($course->slug)) {
                $course->slug = Str::slug($course->name);
            }
        });
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function section()
    {
        return $this->hasMany(Section::class);
    }

    public function category()
    {
        return $this->belongsTo(ClassType::class, 'class_type_id');
    }

    public function class_type()
    {
        return $this->belongsTo(ClassType::class, 'class_type_id');
    }

    public function student_record()
    {
        return $this->hasMany(StudentRecord::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'my_class_id');
    }

    public function getSlugAttribute($value)
    {
        return $value ?: Str::slug($this->name ?: 'course-' . $this->id);
    }

    public function getFormattedPriceAttribute()
    {
        if ($this->fee_type === 'free' || $this->selling_price == 0) {
            return 'FREE';
        }
        return '₹' . number_format($this->selling_price, 0);
    }

    public function getParsedSyllabusAttribute()
    {
        if (empty($this->syllabus)) {
            return [];
        }
        $decoded = json_decode($this->syllabus, true);
        return is_array($decoded) ? $decoded : ['Overview' => $this->syllabus];
    }
}
