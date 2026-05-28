<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = ['user_id','firstname','lastname','gender','dob','phone','address','class_id','section_id','parent_name','parent_phone','profile_image'];
}
