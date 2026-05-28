<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher_classes extends Model
{
    protected $fillable = ['teacher_id','subject_id'];
    public function teacher()
        {
            return $this->belongsTo(Teachers::class, 'teacher_id');
        }

        public function class()
        {
            return $this->belongsTo(Classes::class, 'class_id');
        }
}
