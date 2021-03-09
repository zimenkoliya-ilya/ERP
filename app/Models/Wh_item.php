<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wh_item extends Model
{
    use HasFactory;
    function company(){
        return $this->belongsTo(Zg_company::class);
    }
    function user(){
        return $this->belongsTo(Zg_user::class);
    }
    function measurement(){
        return $this->belongsTo(Wh_item_measurement::class);
    }
    function item_type(){
        return $this->belongsTo(Wh_item_type::class);
    }
}
