<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Th_replacement_credit extends Model
{
    use HasFactory;
    public function company(){
        return $this->belongsTo(Zg_company::class);
    }
    public function repair(){

    }
    public function journal(){
        return $this->belongsTo(Wh_journal::class);
    }
    public function journal_customer($id){
        $trans = Wh_journal::find($id);
        $customer = Wh_customer::find($trans->customer_id);
        return $customer->customer_name;
    }
    public function repair_customer($id){
        $trans = Th_repair::find($id);
        
        $customer = Th_technic::find($trans->customer_id);
        $real = Wh_customer::find($customer->customer_id);
        return $real->customer_name;
    }
    public function repair_employee($id){
        $trans = Th_repair::find($id);
        $employee = Hr_employee::find($trans->employee_id);
        return $employee->first_name;
    }
}
