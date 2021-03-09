<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wh_storage extends Model
{
    use HasFactory;
    function company(){
        return $this->belongsTo(Zg_company::class);
    }
    function project(){
        return $this->belongsTo(Zg_project::class);
    }
}
