<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ct_room_log extends Model
{
    use HasFactory;
    function employee(){
        return $this->belongsTo(Hr_employee::class);
    }
    function camp(){
        return $this->belongsTo(Ct_camp::class);
    }
    function room(){
        return $this->belongsTo(Ct_room::class);
    }
    function bed(){
        return $this->belongsTo(Ct_bed::class);
    }
    function company(){
        return $this->belongsTo(Zg_company::class);
    }
}
