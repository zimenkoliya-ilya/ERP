<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Th_repair extends Model
{
    use HasFactory;
    public function employee(){
        return $this->belongsTo(Hr_employee::class);
    }
    public function company(){
        return $this->belongsTo(Zg_company::class);
    }
    public function customer(){
        return $this->belongsTo(Wh_customer::class);
    }
    public function project(){
        return $this->belongsTo(Zg_project::class);
    }
    public function time_type(){
        return $this->belongsTo(Th_repair_time_type::class);
    }
    public function repair_type(){
        return $this->belongsTo(Th_repair_type::class);
    }
    public function category(){
        return $this->belongsTo(Th_repair_category::class);
    }
}
