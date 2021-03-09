<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hr_department extends Model
{
    use HasFactory;
    function company(){
        return $this->belongsTo(Zg_company::class);
    }
}
