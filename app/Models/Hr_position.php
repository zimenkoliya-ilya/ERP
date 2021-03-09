<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hr_position extends Model
{
    use HasFactory;
    function company(){
        return $this->belongsTo(Zg_company::class);
    }
    function department(){
        return $this->belongsTo(Hr_department::class);
    }
    function employee_number($id){
        $employee = Hr_employee::where('interested_position_id', $id)->count();
        return $employee;
    }
    function timeoff_employee($id){
        $employee_active = Hr_employee::where('time_off',1)->where('interested_position_id', $id)->count();
        return $employee_active;
    }
    function percent($id){
        $employee = Hr_employee::where('interested_position_id', $id)->count();
        $employee_active = Hr_employee::where('time_off',1)->where('interested_position_id', $id)->count();
        if($employee==0){
            $percent = 0;
        }else{
            $percent = $employee_active/$employee*100;
        }
        return $percent;
    }
}
