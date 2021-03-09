<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fl_location extends Model
{
    use HasFactory;
    function company(){
        return $this->belongsTo(Zg_company::class);
    }
    function project(){
        return $this->belongsTo(Zg_project::class);
    }
    function state(){
        return $this->belongsTo(Hr_state::class);
    }
    function district(){
        return $this->belongsTo(Hr_district::class);
    }
}
