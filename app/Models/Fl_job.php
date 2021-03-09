<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fl_job extends Model
{
    use HasFactory;
    function tech(){
        return $this->belongsTo(Th_technic::class);
    }
    function make($id){
        $technic = Th_technic::find($id);
        $model = Th_model::find($technic->model_id);
        $make = Th_make::find($model->make_id);
        return $make->make;
    }
    function model($id){
        $technic = Th_technic::find($id);
        $model = Th_model::find($technic->model_id);
        return $model->model;
    }
    function origin(){
        return $this->belongsTo(Fl_location::class);
    }
    function destination(){
        return $this->belongsTo(Fl_location::class);
    }
}
