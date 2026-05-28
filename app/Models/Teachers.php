<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    protected $fillable = ['user_id','firstname','lastname','gender','dob','phone','address','hire_date','salary','profile_image'];
    public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }

    public function classes()
        {
            return $this->belongsToMany(Classes::class,'teacher_classes','teacher_id','class_id');
        }
    public function subjects()
        {
            return $this->belongsToMany(Subjects::class,'teacher_subjects','teacher_id','subject_id'
            );
        }
    public function attendances()
        {
            return $this->hasMany(Teacher_attendance::class, 'teacher_id');
        }
    public function salaries()
        {
            return $this->hasMany(Teacher_salaries::class, 'teacher_id');
        }
}