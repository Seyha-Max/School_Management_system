<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = ['user_id','firstname','lastname','gender','dob','phone','address','class_id','section_id','parent_name','parent_phone','profile_image'];
    public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }

    public function class()
        {
            return $this->belongsTo(Classes::class, 'class_id');
        }

    public function section()
        {
            return $this->belongsTo(Sections::class, 'section_id');
        }

    public function attendances()
        {
            return $this->hasMany(Student_attendance::class, 'student_id');
        }
}
