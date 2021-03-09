<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hr_wage extends Model
{
    use HasFactory;
    function order(){
        return $this->belongsTo(Hr_order::class);
    }
    function company(){
        return $this->belongsTo(Zg_company::class);
    }
    function currency(){
        return $this->belongsTo(Hr_wage_currency::class);
    }
}
