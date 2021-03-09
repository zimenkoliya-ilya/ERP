<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fl_job_type extends Model
{
    use HasFactory;
    public function company(){
        return $this->belongsTo(Zg_company::class);
    }
}
