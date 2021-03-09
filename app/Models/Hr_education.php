<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hr_education extends Model
{
    use HasFactory;
    function education_type(){
        return $this->belongsTo(Hr_education_type::class);
    }
}
