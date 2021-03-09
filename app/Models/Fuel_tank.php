<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuel_tank extends Model
{
    use HasFactory;
    function company(){
        return $this->belongsTo(Zg_company::class);
    }
    function storage(){
        return $this->belongsTo(Wh_storage::class);
    }
    function item(){
        return $this->belongsTo(Wh_item_type::class);
    }
}
