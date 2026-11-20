<?php

namespace App\Models;

use Eloquent;

class ClassType extends Eloquent
{
    protected $fillable = ['name', 'code'];

    public function my_classes()
    {
        return $this->hasMany(MyClass::class, 'class_type_id');
    }

    public function courses()
    {
        return $this->hasMany(MyClass::class, 'class_type_id');
    }
}
