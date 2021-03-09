<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hr_employee extends Model
{
    use HasFactory;
    function interested_position() {
        return $this->belongsTo(Hr_position::class);
    }
    function district(){
        return $this->belongsTo(Hr_district::class);
    }
    function state(){
        return $this->belongsTo(Hr_state::class);
    }
    function sex(){
        return $this->belongsTo(Hr_sex::class);
    }
    function birthplace(){
        return $this->belongsTo(Hr_state::class, 'birth_place', 'id');
    }
    function blood_type(){
        return $this->belongsTo(Hr_blood_type::class);
    }
    function bank_account(){
        return $this->belongsTo(Hr_bank::class);
    }
    function salary($id){
        $wage = Hr_wage::where('employee_id', $id)->get()->last();
        if($wage !== null){
            return $wage->wage_amount;
        }else{
            $salary = Hr_employee::find($id);
            return $salary->expected_salary;
        }

    }
    function id_card_num($id){
        $history = Hr_history::where('employee_id', $id)->get()->last();
        return $history->id_card_num;
    }
    function source(){
        return $this->belongsTo(Hr_source::class);
    }
    function status(){
        return $this->belongsTo(Hr_status::class);
    }
    function company(){
        return $this->belongsTo(Zg_company::class);
    }
    function bank(){
        return $this->belongsTo(Bank_account::class,'bank_account_id', 'id');
    }
    function product_department($id){
        $position = Hr_position::find($id);
        $department = Hr_department::find($position->department_id);
        return $department->title;
    }
    function project(){
        return $this->belongsTo(Zg_project::class);
    }
    function position_type(){
        return $this->belongsTo(Hr_position_type::class);
    }
    function zg_user(){
        return $this->belongsTo(Zg_user::class,'id', 'employee_id');
    }
    function start_date($id){
        $hr_history = Hr_history::where('employee_id', $id)->get()->last();
        return $hr_history->from_date; 
    }
    function timeoff_active($id){
        $hr_timeoff = Hr_timeoff::where('employee_id', $id)->get()->last();
        return $hr_timeoff->approval_status;
    }
    function timeoff($id){
        $hr_timeoff = Hr_timeoff::where('employee_id', $id)->get()->last();
        return $hr_timeoff->from_date;
    }
    function remain_date($id, $field){
        if($field == 1){
            $hr_timeoff = Hr_timeoff::where('employee_id', $id)->get()->last();
            $remain_time = (strtotime(date("Y-m-d"))-strtotime($hr_timeoff->from_date))/3600/24;
            return $remain_time;
        }else{
            $hr_timeoff = Hr_timeoff::where('employee_id', $id)->get()->last();
            $remain_time = (strtotime(date("Y-m-d"))-strtotime($hr_timeoff->to_date))/3600/24;
            return $remain_time;
        }
    }
    function timeoff_end($id){
        $hr_timeoff = Hr_timeoff::where('employee_id', $id)->get()->last();
        return $hr_timeoff->to_date;
    }
    function timeoff_type($id){
        $hr_timeoff = Hr_timeoff::where('employee_id', $id)->first();
        $time_off_type = Hr_timeoff_type::find($hr_timeoff->timeoff_type_id);
        return $time_off_type->title;
    }
    function increase($id){
        $increase = Hr_wage::where('employee_id', $id)->get()->last();
        if($increase!==null){
            return $increase->changed_amount;
        }else{
            return 0;
        }
    }
    function contract($id){
        $contract = Hr_contract_employee::where('employee_id', $id)->get()->last();
        if($contract){
            return $contract->contract_num;
        }else{
            return "No Contract";
        }
    }
}
