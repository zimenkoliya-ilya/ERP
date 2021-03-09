<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ct_camp extends Model
{
    use HasFactory;

    function project(){
        return $this->belongsTo(Zg_project::class);
    }
    function company(){
        return $this->belongsTo(Zg_company::class);
    }
    
}
