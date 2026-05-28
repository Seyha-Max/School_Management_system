<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $fillable = ['subject_name','subject_code'];
    public function teachers()
        {
            return $this->belongsToMany(Teachers::class, 'teacher_subjects','subject_id','teacher_id'
            );
        }
    public function teacher()
        {
            return $this->belongsTo(Teachers::class, 'teacher_id');
        }

    public function class()
        {
            return $this->belongsTo(Classes::class, 'class_id');
        }
}
