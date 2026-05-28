<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher_attendance extends Model
{
    protected $fillable = ['teacher_id','date','status'];
}
