<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Th_technic extends Model
{
    use HasFactory;
    function make($id){
        
        $model = Th_model::find($id);
        $make = Th_make::find($model->make_id);
        return $make->make;
    }
    function model(){
        return $this->belongsTo(Th_model::class);
    }
    function company(){
        return $this->belongsTo(Zg_company::class);
    }
    function type(){
        return $this->belongsTo(Th_tech_type::class);
    }
    function category(){
        return $this->belongsTo(Th_category::class);
    }
    function owner_status(){
        return $this->belongsTo(Th_owner_status::class);
    }
    function owner_company(){
        return $this->belongsTo(Zg_company::class);
    }
    function load_capacity_measurement(){
        return $this->belongsTo(Th_load_measurement::class);
    }
    function manufactured_country(){
        return $this->belongsTo(Country::class);
    }
    function customer(){
        return $this->belongsTo(Wh_customer::class);
    }
}
