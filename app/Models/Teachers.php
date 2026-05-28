<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    protected $fillable = ['user_id','firstname','lastname','gender','date_of_birth','phone_number','address','hire_date','salary','profile_image'];
}
