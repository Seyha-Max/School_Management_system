<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = ['class_name'];
    public function students()
    {
        return $this->hasMany(Students::class, 'class_id');
    }

    public function sections()
    {
        return $this->hasMany(Sections::class, 'class_id');
    }

    // public function teachers()
    // {
    //     return $this->belongsToMany(Teachers::class, 'teacher_classes','class_id','teacher_id');
    // }
}
