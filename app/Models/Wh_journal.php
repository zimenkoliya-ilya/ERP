<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wh_journal extends Model
{
    use HasFactory;
    function customer(){
        return $this->belongsTo(Wh_customer::class);
    }
}
