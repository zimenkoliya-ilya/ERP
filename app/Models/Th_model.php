<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Th_model extends Model
{
    use HasFactory;
    public function make(){
        return $this->belongsTo(Th_make::class);
    }
}
