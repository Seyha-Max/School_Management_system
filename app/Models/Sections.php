<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    protected $fillable = ['class_id', 'section_name'];
    public function class()
        {
            return $this->belongsTo(Classes::class, 'class_id');
        }

    public function students()
        {
            return $this->hasMany(Students::class, 'section_id');
        }
}
