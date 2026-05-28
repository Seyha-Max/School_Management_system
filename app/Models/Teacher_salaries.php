<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher_salaries extends Model
{
    protected $fillable = ['teacher_id','amount','payment_date',' payment_method','status','notes'];
}
