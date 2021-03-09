<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ct_room extends Model
{
    use HasFactory;
    function user(){
        return $this->belongsTo(Zg_user::class);
    }
    function camp(){
        return $this->belongsTo(Ct_camp::class);
    }
}
