<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ct_bed extends Model
{
    use HasFactory;
    function user(){
        return $this->belongsTo(Zg_user::class);
    }
    function room(){
        return $this->belongsTo(Ct_room::class);
    }
}
