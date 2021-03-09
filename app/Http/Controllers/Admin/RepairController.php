<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Zg_company;
use App\Models\Hr_employee;
use App\Models\Wh_customer;
use App\Models\Zg_project;
use App\Models\Th_repair_time_type;
use App\Models\Th_repair_category;
use App\Models\Th_repair_type;
use App\Models\Th_repair;
use App\Models\Th_technic;
use App\Models\Th_replacement_credit;
use App\Models\Wh_journal;

use Validator;
class RepairController extends Controller
{
    public function repair_list(){
        $repair = Th_repair::all();
        return view('admin.repair.repair_list.index', compact('repair'))
        ->with('active','repair')->with('sidebar_active','repair_list');
    }
    public function list_create(){
        $company = Zg_company::all();
        $first_company = Zg_company::all()->first();
        $employee = Hr_employee::where('drivers_license', 1)->where('company_id', $first_company->id)->get();
        $customer = Th_technic::where('company_id', $first_company->id)->get();
        $project = Zg_project::where('company_id', $first_company->id)->get();
        $time_type = Th_repair_time_type::all();
        $category = Th_repair_category::all();
        $type = Th_repair_type::all();
        return view('admin.repair.repair_list.create',
        compact('company','employee','customer','project','time_type','category','type'))
        ->with('active', 'repair')
        ->with('sidebar_active', 'repair_list');
    }
    public function list_get_data(Request $request){
        $company = Zg_company::all();
        $first_company = Zg_company::find($request->company_id);
        $employee = Hr_employee::where('drivers_license', 1)->where('company_id', $first_company->id)->get();
        $customer = Th_technic::where('company_id', $first_company->id)->get();
        $project = Zg_project::where('company_id', $first_company->id)->get();
        $time_type = Th_repair_time_type::all();
        $category = Th_repair_category::all();
        $type = Th_repair_type::all();
        return view('admin.repair.repair_list.get_data',
        compact('company','employee','customer','project','time_type','category','type','first_company'))
        ->with('active', 'repair')
        ->with('sidebar_active', 'repair_list');
    }
    public function list_active($id){
        $repair = Th_repair::find($id);
        $repair_duration = number_format(((strtotime(date("Y-m-d h:i:s"))-strtotime($repair->start_datetime))/3600/24),1);
        $repair->active = 1;
        $repair->repair_duration = $repair_duration;
        $repair->end_datetime = date("Y-m-d h:i:s");
        $repair->save();
        return back()->with('success', 'Updated Successfully!');
    }
    public function list_store(Request $request){
        $v = Validator::make($request->all(),[
            'company_id' =>'required',
            'customer_id' =>'required',
            'project_id' =>'required',
            'employee_id' =>'required',
            'start_datetime' =>'required',
            'time_type_id' =>'required',
            'category_id' =>'required',
            'repair_type_id' =>'required',
        ]);
        if($v->fails()){
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        if($request->customer_id == 'Select'||$request->project_id == 'Select'||$request->employee_id == 'Select'||$request->time_type_id == 'Select'||$request->category_id == 'Select'||$request->repair_type_id == 'Select'){
            return back()->with('destroy','Something Went Wrong! Please Check Select Box.');
        }
        $repair = new Th_repair();
        $repair->company_id = $request->company_id;
        $repair->customer_id = $request->customer_id;
        $repair->project_id = $request->project_id;
        $repair->employee_id = $request->employee_id;
        $repair->start_datetime = $request->start_datetime;
        $repair->time_type_id = $request->time_type_id;
        $repair->repair_reason = $request->repair_reason;
        $repair->repair_description = $request->repair_description;
        $repair->shift_id = $request->shift_id;
        $repair->in_moto_hour = $request->in_moto_hour;
        $repair->out_moto_hour = $request->out_moto_hour;
        $repair->in_speedometer = $request->in_speedometer;
        $repair->on_speedometer = $request->on_speedometer;
        $repair->category_id = $request->category_id;
        $repair->repair_type_id = $request->repair_type_id;
        $repair->save();
        return back()->with('success','Created Successfully');
    }
    
    public function list_edit($id){
        $repair = Th_repair::find($id);
        $company = Zg_company::all();
        $first_company = Zg_company::find($repair->company_id);
        $employee = Hr_employee::where('drivers_license', 1)->where('company_id', $first_company->id)->get();
        $customer = Th_technic::where('company_id', $first_company->id)->get();
        $project = Zg_project::where('company_id', $first_company->id)->get();
        $time_type = Th_repair_time_type::all();
        $category = Th_repair_category::all();
        $type = Th_repair_type::all();
        return view('admin.repair.repair_list.edit',
        compact('company','employee','customer','project','time_type','category','type','repair'))
        ->with('active', 'repair')
        ->with('sidebar_active', 'repair_list');
    }
    
    public function list_update(Request $request, $id){
        $v = Validator::make($request->all(),[
            'company_id' =>'required',
            'customer_id' =>'required',
            'project_id' =>'required',
            'employee_id' =>'required',
            'start_datetime' =>'required',
            'time_type_id' =>'required',
            'category_id' =>'required',
            'repair_type_id' =>'required',
        ]);
        if($v->fails()){
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        if($request->customer_id == 'Select'||$request->project_id == 'Select'||$request->employee_id == 'Select'||$request->time_type_id == 'Select'||$request->category_id == 'Select'||$request->repair_type_id == 'Select'){
            return back()->with('destroy','Something Went Wrong! Please Check Select Box.');
        }
        $repair = Th_repair::find($id);
        $repair->company_id = $request->company_id;
        $repair->customer_id = $request->customer_id;
        $repair->project_id = $request->project_id;
        $repair->employee_id = $request->employee_id;
        $repair->start_datetime = $request->start_datetime;
        $repair->time_type_id = $request->time_type_id;
        $repair->repair_reason = $request->repair_reason;
        $repair->repair_description = $request->repair_description;
        $repair->shift_id = $request->shift_id;
        $repair->in_moto_hour = $request->in_moto_hour;
        $repair->out_moto_hour = $request->out_moto_hour;
        $repair->in_speedometer = $request->in_speedometer;
        $repair->on_speedometer = $request->on_speedometer;
        $repair->category_id = $request->category_id;
        $repair->repair_type_id = $request->repair_type_id;
        $repair->save();
        return redirect()->route('repair_list')->with('success','Updated Successfully');
    }
    public function list_destroy($id){
        $repair = Th_repair::find($id);
        $repair->delete();
        return back()->with('success','Deleted Successfully');
    }
    
    public function repair_replacement(){
       
        $trans = Th_replacement_credit::all();
        return view('admin.repair.transaction.index',
        compact('trans'))
        ->with('active','repair')
        ->with('sidebar_active','repair_replacement');
    }

    public function transaction_create(){
        $company = Zg_company::all();
        $first_company = $company->first();
        $journal = Wh_journal::where('company_id', $first_company->id)->get();
        $repair = Th_repair::where('company_id', $first_company->id)->get();
        return view('admin.repair.transaction.create',
        compact('company','journal','repair'))
        ->with('active','repair')
        ->with('sidebar_active','repair_replacement');
    }
    public function transaction_store(Request $request){
        if($request->journal_id==null||$request->journal_id=='Select'||$request->repair_id==null||$request->repair_id=='Select'){
            return back()->with('destroy','Something went wrong. Please check Select Box.');
        }
        $trans = new Th_replacement_credit();
        $trans->journal_id = $request->journal_id;
        $trans->company_id = $request->company_id;
        $trans->repair_id = $request->repair_id;
        $trans->save();
        return back()->with('success', 'Created Successfully!');
    }
    public function transaction_get_data(Request $request){
        $company = Zg_company::all();
        $first_company = Zg_company::find($request->company_id);
        $journal = Wh_journal::where('company_id', $first_company->id)->get();
        $repair = Th_repair::where('company_id', $first_company->id)->get();
        return view('admin.repair.transaction.get_data', compact('company','journal','repair','first_company'));
    }
    public function transaction_edit($id){
        $trans = Th_replacement_credit::find($id);
        $company = Zg_company::all();
        $first_company = Zg_company::find($trans->company_id);
        $journal = Wh_journal::where('company_id', $first_company->id)->get();
        $repair = Th_repair::where('company_id', $first_company->id)->get();
        return view('admin.repair.transaction.edit',
        compact('company','journal','repair','trans'))
        ->with('active','repair')
        ->with('sidebar_active','repair_replacement');
    }
    public function transaction_update(Request $request, $id){
        if($request->journal_id==null||$request->journal_id=='Select'||$request->repair_id==null||$request->repair_id=='Select'){
            return back()->with('destroy','Something went wrong. Please check Select Box.');
        }
        $trans = Th_replacement_credit::find($id);
        $trans->journal_id = $request->journal_id;
        $trans->company_id = $request->company_id;
        $trans->repair_id = $request->repair_id;
        $trans->save();
        return redirect()->route('repair_replacement')->with('success', 'Updated Successfully!');
    }
    public function transaction_destroy($id){
        $trans = Th_replacement_credit::find($id);
        $trans->delete();
        return back()->with('success','Deleted Successfully!');
    }
}
