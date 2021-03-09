<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hr_timeoff extends Model
{
    use HasFactory;
    function timeoff_type(){
        return $this->belongsTo(Hr_timeoff_type::class);
    }
}
