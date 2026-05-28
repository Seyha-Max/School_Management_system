<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher_subjects extends Model
{
    protected $fillable = ['teacher_id','subject_id'];
    public function teacher()
        {
            return $this->belongsTo(Teachers::class, 'teacher_id');
        }

    public function subject()
        {
            return $this->belongsTo(Subjects::class, 'subject_id');
        }
}
