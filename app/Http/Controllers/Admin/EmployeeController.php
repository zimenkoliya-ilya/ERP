<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\Models\Hr_employee;
use App\Models\Hr_status;
use App\Models\Hr_state;
use App\Models\Hr_district;
use App\Models\Hr_sex;
use App\Models\Hr_blood_type;
use App\Models\Hr_bank;
use App\Models\Hr_position;
use App\Models\Hr_source;
use App\Models\Zg_company;
use App\Models\Zg_user;
use App\Models\Bank_account;
use App\Models\Hr_position_type;
use App\Models\Zg_project;
use App\Models\Hr_history;
use App\Models\Hr_history_type;
use App\Models\Hr_history_status;
use App\Models\Hr_employee_schedule;
use App\Models\Hr_timeoff_type;
use App\Models\Hr_timeoff;
use App\Models\Hr_department;
use App\Models\Hr_id_card_num;
use App\Models\Hr_family_type;
use App\Models\Hr_education_type;
use App\Models\Hr_education;
use App\Models\Hr_family;
use App\Models\Hr_relative;
use App\Models\Hr_professional_training;
use App\Models\Hr_work_experience;
use App\Models\Hr_contract_employee;
use App\Models\Hr_order;
use App\Models\Hr_order_type;
use App\Models\Hr_wage_type;
use App\Models\Hr_wage;
use App\Models\Hr_wage_currency;
use App\Models\Hr_last_tushaal_num;

class EmployeeController extends Controller
{
    public function employee_list(){
        $employee = Hr_employee::where('hired_status',1)->get();
        $hr_timeoff_type = Hr_timeoff_type::all();
        $total_employee = Hr_employee::all()->count();
        $working_employee = Hr_employee::where('time_off', 1)->get()->count();
        $working_percent = number_format($working_employee/$total_employee*100, 1);
        $emp_id = [];
        $employee_id = Hr_employee::where('hired_status',1)->pluck('id');
        foreach($employee_id as $e_id) {
            $temp = Hr_timeoff::where('employee_id', $e_id)->get()->last();
            $emp_id[] = $temp->id;
        }
        $rost_time = Hr_timeoff::whereIn('id', $emp_id)->where('approval_status',0)->where('timeoff_type_id',1)->get()->count();
        $leave_time = Hr_timeoff::whereIn('id', $emp_id)->where('approval_status',0)->where('timeoff_type_id',2)->get()->count();
        $new_emp = Hr_employee::where('position_type_id',2)->get()->count();
        $fired_emp = Hr_employee::where('hired_status',0)->get()->count();
        $company = Zg_company::all();
        $project = Zg_project::all();
        $department = Hr_department::all();
        $position = Hr_position::all();
        return view('admin.employee.employee_list',
        compact('employee','total_employee','hr_timeoff_type','working_employee','working_percent',
        'rost_time','leave_time','new_emp','fired_emp','project','company','department','position'))
        ->with('active','employee_list')
        ->with('sidebar_active','employee');
    }
    public function employee_search(Request $request){
        $project_id = [];
        $company_id = [];
        $position_id = [];
        $department_id = [];
        $project = $request->project;
        if($project == null){
            $project_id = Zg_project::pluck('id');
        }else{
            $project_id[] = $request->project;
        }
        $company = $request->company;
        if($company == null){
            $company_id = Zg_company::pluck("id");
        }else{
            $company_id[] = $request->company;
        }
        $department = $request->department;
       
        if($department == null){
            $department_id = Hr_department::pluck("id");
        }else{
            $department_id[] = $request->department;
        }
        $position = $request->position;
        if($position == null){
            $position_id = Hr_position::pluck("id");
        }else{
            $position_id[] = $request->position;
        }
        $username = $request->username;
        $start_date = $request->start_date;
        if($start_date == null){
            $start = "1970-1-1"; 
        }else{
            $start = date("Y-m-d",strtotime($request->start_date));
        }
        $end_date = $request->end_date;
        if($end_date == null){
            $end = "2100-12-31"; 
        }else{
            $end = date("Y-m-d",strtotime($request->end_date));
        }
        
        $employee = Hr_employee::
                whereIn('project_id', $project_id)
                ->whereIn('interested_position_id', $position_id)
                ->whereIn('department_id', $department_id)
                ->whereIn('company_id', $company_id)
                ->whereBetween('created_at', array($start, $end))
                ->where(function($query) use ($username){
                    $query->orWhere('first_name','LIKE', '%'.$username.'%')
                        ->orWhere('last_name','LIKE', '%'.$username.'%')
                        ->orWhere('middle_name','LIKE', '%'.$username.'%')
                        ->orWhere('registration_num','LIKE', '%'.$username.'%')
                        ->orWhere('phone','LIKE', '%'.$username.'%')
                        ->orWhere('email','LIKE', '%'.$username.'%')
                        ->orWhere('address','LIKE', '%'.$username.'%')
                        ->orWhere('driver_license_num','LIKE', '%'.$username.'%')
                        ->orWhere('mechanism_license_num','LIKE', '%'.$username.'%');
                        
                    })
                ->get();
        $hr_timeoff_type = Hr_timeoff_type::all();
        $total_employee = Hr_employee::all()->count();
        $working_employee = Hr_employee::where('time_off', 1)->get()->count();
        $working_percent = number_format($working_employee/$total_employee*100, 1);
        $emp_id = [];
        $employee_id = Hr_employee::where('hired_status',1)->pluck('id');
        foreach($employee_id as $e_id) {
            $temp = Hr_timeoff::where('employee_id', $e_id)->get()->last();
            $emp_id[] = $temp->id;
        }
        $rost_time = Hr_timeoff::whereIn('id', $emp_id)->where('approval_status',0)->where('timeoff_type_id',1)->get()->count();
        $leave_time = Hr_timeoff::whereIn('id', $emp_id)->where('approval_status',0)->where('timeoff_type_id',2)->get()->count();
        $new_emp = Hr_employee::where('position_type_id',2)->get()->count();
        $fired_emp = Hr_employee::where('hired_status',0)->get()->count();
        $company = Zg_company::all();
        $project = Zg_project::all();
        $department = Hr_department::all();
        $position = Hr_position::all();
        return view('admin.employee.employee_list',
        compact('employee','total_employee','hr_timeoff_type','working_employee','working_percent',
        'rost_time','leave_time','new_emp','fired_emp','project','company','department','position'))
        ->with('active','employee_list')
        ->with('sidebar_active','employee');
    }
    public function employee_list_list_image_upload(Request $request, $id){
        $employee = Hr_employee::find($id);
        if($request->image) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('employee_images'), $imageName);
            $pic = 'employee_images/'.$imageName;
            $employee->image = $pic;
            $employee->save();
        }
        return back();
    }
    //employee list view
    public function employee_list_list_view($id){
        $employee = Hr_employee::find($id);
        $hr_history = Hr_history::where('employee_id', $employee->id)->get()->last();
        $hr_position = Hr_position::all();
        $zg_company = Zg_company::all();
        $hr_position_type = Hr_position_type::all();
        $zg_project = Zg_project::all();
        $hr_history_type = Hr_history_type::all();
        $hr_history_status = Hr_history_status::all();
        $hr_employee_schedule = Hr_employee_schedule::all();

        $hr_family_type = Hr_family_type::all();
        $hr_education_type = Hr_education_type::all();
        $hr_timeoff_type = Hr_timeoff_type::all();
        $hr_family = Hr_family::where('employee_id', $id)->get();
        $hr_relative = Hr_relative::where('employee_id', $id)->get();
        $hr_education = Hr_education::where('employee_id', $id)->get();
        $hr_training = Hr_professional_training::where('employee_id', $id)->get();
        $hr_work = Hr_work_experience::where('employee_id', $id)->get();
        $zg_user_manager = Zg_user::where('group_id', 2)->get();
        $hr_contract_employee = Hr_contract_employee::where('employee_id', $id)->get()->reverse();
        $employee_history_id = Hr_history::where('employee_id', $id)->pluck('id');
        $hr_order = Hr_order::whereIn('history_id', $employee_history_id)->get()->reverse();
        $hr_order_type = Hr_order_type::all();
        $hr_wage_type = Hr_wage_type::all();
        $hr_wage_currency = Hr_wage_currency::all();
        $hr_wage = Hr_wage::whereIn('history_id', $employee_history_id)->get()->reverse();
        $hr_timeoff = hr_timeoff::where('employee_id', $id)->get()->reverse();
        return view('admin.employee.employee_list_list_view',
        compact('hr_work','hr_training','hr_education','hr_relative','hr_wage_type','hr_wage',
        'zg_user_manager','hr_wage_currency', 'hr_contract_employee','hr_order','hr_order_type',
        'hr_family','hr_education_type','hr_family_type','employee','hr_timeoff_type','hr_timeoff',
        'hr_history_status','hr_history_type','hr_history', 'hr_employee_schedule',
        'zg_project','hr_position_type','hr_position','zg_company'))
        ->with('active','employee_list')
        ->with('sidebar_active','employee');
    
    }
    //employee list edit
    public function employee_list_list_edit($id){
        $employee = Hr_employee::find($id);
        $hr_history = Hr_history::where('employee_id', $employee->id)->get()->last();
        $hr_position = Hr_position::all();
        $zg_company = Zg_company::all();
        $hr_position_type = Hr_position_type::all();
        $zg_project = Zg_project::all();
        $hr_history_type = Hr_history_type::all();
        $hr_history_status = Hr_history_status::all();
        $hr_employee_schedule = Hr_employee_schedule::all();

        $hr_family_type = Hr_family_type::all();
        $hr_education_type = Hr_education_type::all();
        $hr_timeoff_type = Hr_timeoff_type::all();
        $hr_family = Hr_family::where('employee_id', $id)->get();
        $hr_relative = Hr_relative::where('employee_id', $id)->get();
        $hr_education = Hr_education::where('employee_id', $id)->get();
        $hr_training = Hr_professional_training::where('employee_id', $id)->get();
        $hr_work = Hr_work_experience::where('employee_id', $id)->get();
        $zg_user_manager = Zg_user::where('group_id', 2)->get();
        $hr_contract_employee = Hr_contract_employee::where('employee_id', $id)->get()->reverse();
        $employee_history_id = Hr_history::where('employee_id', $id)->pluck('id');
        $hr_order = Hr_order::whereIn('history_id', $employee_history_id)->get()->reverse();
        $hr_order_type = Hr_order_type::all();
        $hr_wage_type = Hr_wage_type::all();
        $hr_wage_currency = Hr_wage_currency::all();
        $hr_wage = Hr_wage::whereIn('history_id', $employee_history_id)->get()->reverse();
        $hr_timeoff = hr_timeoff::where('employee_id', $id)->get()->reverse();
        $hr_bank = Hr_bank::all();
        return view('admin.employee.employee_list_list_edit',
        compact('hr_work','hr_bank','hr_training','hr_education','hr_relative','hr_wage_type','hr_wage',
        'zg_user_manager','hr_wage_currency', 'hr_contract_employee','hr_order','hr_order_type',
        'hr_family','hr_education_type','hr_family_type','employee','hr_timeoff_type','hr_timeoff',
        'hr_history_status','hr_history_type','hr_history', 'hr_employee_schedule',
        'zg_project','hr_position_type','hr_position','zg_company'))
        ->with('active','employee_list')
        ->with('sidebar_active','employee');
    }

    public function employee_list_list_timeoff_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'timeoff_end' => 'required',
            'description' => 'required'
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $hr_timeoff = new Hr_timeoff();
        $hr_timeoff->ended_date = date("Y-m-d",strtotime($request->timeoff_end));
        $hr_timeoff->from_date = date("Y-m-d");
        $hr_timeoff->approval_status = 1;
        $hr_timeoff->employee_id = $id;
        $hr_timeoff->timeoff_type_id = $request->timeoff_type;
        $hr_timeoff->description = $request->description;
        $hr_timeoff->timeoff_duration = (strtotime($request->timeoff_end)-strtotime(date("Y-m-d")))/3600/24;
        $hr_timeoff->save();
        $employee = Hr_employee::find($id);
        $employee->time_off = 1;
        $employee->save();
        return back()->with('success', 'successfully updated');
    }
    public function employee_list_list_timeoff_extend(Request $request, $id){
        $v = Validator::make($request->all(), [
            'timeoff_end' => 'required',
            'description' => 'required'
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $hr_timeoff = Hr_timeoff::where('employee_id', $id)->get()->last();
        $hr_timeoff->ended_date = date("Y-m-d",strtotime($request->timeoff_end));
        $hr_timeoff->timeoff_type_id = $request->timeoff_type;
        $hr_timeoff->description = $request->description;
        $hr_timeoff->timeoff_duration = (strtotime($request->timeoff_end)-strtotime($hr_timeoff->from_date))/3600/24;
        $hr_timeoff->save();
        $employee = Hr_employee::find($id);
        $employee->time_off = 0;
        $employee->save();
        return back()->with('success', 'successfully updated');
    }
    public function employee_list_list_timeoff_add(Request $request, $id){
        $v = Validator::make($request->all(), [
            'from_date' => 'required',
            'to_date' => 'required',
            'timeoff_type' => 'required',
            'description' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $hr_timeoff = new Hr_timeoff();
        $hr_timeoff->from_date = date("Y-m-d",strtotime($request->from_date));
        $hr_timeoff->to_date = date("Y-m-d",strtotime($request->to_date));
        $hr_timeoff->timeoff_type_id = $request->timeoff_type;
        $hr_timeoff->description = $request->description;
        $hr_timeoff->approval_status = 0;
        $hr_timeoff->employee_id = $id;
        $hr_timeoff->timeoff_duration = (strtotime($request->to_date)-strtotime($request->from_date))/3600/24;
        $hr_timeoff->save();
        $employee = Hr_employee::find($id);
        $employee->time_off = 0;
        $employee->save();
        return back()->with('success', 'successfully updated');
    }

    public function employee_list_list_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'interested_position_id' => 'required',
            'position_type_id' => 'required',
            // 'start_date' => 'required',
            // 'end_date' => 'required',
            'company_id' => 'required',
            'project_id' => 'required',
            'history_type_id' => 'required',
            'history_status_id' => 'required',
            'employee_schedule_id' => 'required',
            // 'proposed_salary' => 'required',
            'address' => 'required',

        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $account_name = Hr_bank::find($request->bank_account_id);
        $bank_account = new Bank_account();
        $bank_account->account_type = 1;
        $bank_account->bank_id = $request->bank_account_id;
        $bank_account->account_number = $request->bank_account_number;
        $bank_account->currency_id = 1;
        $bank_account->account_name = $request->first_name;
        $bank_account->status = 0;
        $bank_account->save();
        //get bank id
        $employee_bank = $bank_account::all()->last();
        
        $employee = Hr_employee::find($id);
        if($request->image) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('employee_images'), $imageName);
            $pic = 'employee_images/'.$imageName;
            $employee->image = $pic;
        }
        $hr_position = Hr_position::find($request->interested_position_id);
        $hr_department = Hr_department::find($hr_position->department_id);
        $hr_id_card_num = Hr_id_card_num::where('company_id', $hr_department->company_id)->first();
        $id_card_num = date("Y-m-d")."".$hr_department->id_card_num."".($hr_id_card_num->last_num+1);
        $hr_id_card_num->last_num = $hr_id_card_num->last_num+1;
        $hr_id_card_num->save();
        $hr_history = new Hr_history();
        $hr_history->employee_id = $id;
        $hr_history->position_id = $request->interested_position_id;
        $hr_history->position_type = $request->position_type_id;
        // $hr_history->start_date = date("Y-m-d",strtotime($request->start_date));
        // $hr_history->end_date = date("Y-m-d",strtotime($request->end_date));
        $hr_history->company_id = $request->company_id;
        $hr_history->project_id = $request->project_id;
        $hr_history->type_id = $request->history_type_id;
        $hr_history->user_id = $employee->zg_user->id;
        $hr_history->history_status_id = $request->history_status_id;
        $hr_history->schedule_id = $request->employee_schedule_id;
        $hr_history->description = $request->description;
        $hr_history->id_card_num = $id_card_num;
        $hr_history->save();
        $employee->first_name = $request->first_name;
        $employee->middle_name = $request->middle_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->bank_account_id = $employee_bank->id;
        $employee->interested_position_id = $request->interested_position_id;
        $employee->department_id = $hr_position->department_id;
        $employee->position_type_id = $request->position_type_id;
        $employee->company_id = $request->company_id;
        $employee->project_id = $request->project_id;
        $employee->proposed_salary = $request->proposed_salary;
        $employee->save();
        return back()->with('success','Updated Successfully');
    }
    public function new_employee_createview(){
        $hr_status = Hr_status::all();
        $hr_state = Hr_state::all();
        $hr_district = Hr_district::all();
        $hr_sex = Hr_sex::all();
        $hr_blood_type = Hr_blood_type::all();
        $hr_bank = Hr_bank::all();
        $hr_position = Hr_position::all();
        $hr_source = Hr_source::all();
        $zg_company = Zg_company::all();
        $hr_position_type = Hr_position_type::all();
        $zg_project = Zg_project::all();
        $hr_family_type = Hr_family_type::all();
        $hr_education_type = Hr_education_type::all();
        $department = Hr_department::all();
        return view('admin.employee.new_employee_createview', 
        compact('hr_education_type','hr_family_type','hr_status','zg_project',
        'department','hr_position_type','hr_state','hr_district','hr_sex','hr_blood_type','hr_bank','hr_position','hr_source','zg_company'))
        ->with('active','employee_recruitment_list')
        ->with('sidebar_active','employee');
    }

    public function employee_list_view($id){
        $employee = Hr_employee::find($id);
        return view('admin.employee.employee_list_view', compact('employee'))
        ->with('active','employee_recruitment_list')
        ->with('sidebar_active','employee');
    }

    public function new_employee_create(Request $request){
       
        $v = Validator::make($request->all(), [
            'image' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'state_id' => 'required',
            'district_id' => 'required',
            'address' => 'required',
            'sex_id' => 'required',
            'birth_place' => 'required',
            'military_service' => 'required',
            'drivers_license' => 'required',
            'driver_license_num' => 'required',
            'blood_type_id' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'cloth_size' => 'required',
            'shoe_size' => 'required',
            'bank_account_id' => 'required',
            'expected_salary' => 'required',
            'interested_position_id' => 'required',
            'availability_date' => 'required',
            'proposed_salary' => 'required',
            'source_id' => 'required',
            'status_id' => 'required',
            'company_id' => 'required',
            'position_type_id' => 'required',
            'department_id' => 'required',

        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        //bank account create
        $account_name = Hr_bank::find($request->bank_account_id);
        $bank_account = new Bank_account();
        $bank_account->account_type = 1;
        $bank_account->bank_id = $request->bank_account_id;
        $bank_account->account_number = $request->bank_account_number;
        $bank_account->currency_id = 1;
        $bank_account->account_name = $request->first_name;
        $bank_account->status = 0;
        $bank_account->save();
        //get bank id
        $employee_bank = $bank_account::where('account_number',$request->bank_account_number)->first();
        
        // create employee
        $employee = new Hr_employee();
        if($request->image) {
            $imageName = time().'.'.$request->image->extension();  
                
            $request->image->move(public_path('employee_images'), $imageName);
            $pic = 'employee_images/'.$imageName;
            $employee->image = $pic;
        }
        $employee->first_name = $request->first_name;
        $employee->middle_name = $request->middle_name;
        $employee->last_name = $request->last_name;
        $employee->birth_date = $request->birth_date;
        $employee->registration_num = $request->registration_num;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->state_id = $request->state_id;
        $employee->district_id = $request->district_id;
        $employee->address = $request->address;
        $employee->sex_id = $request->sex_id;
        $employee->birth_place = $request->birth_place;
        $employee->insurance_book_num = $request->insurance_book_num;
        $employee->military_service = $request->military_service;
        $employee->drivers_license = $request->drivers_license;
        $employee->driver_license_num = $request->driver_license_num;
        $employee->blood_type_id = $request->blood_type_id;
        $employee->mechanism_license_num = $request->mechanism_license_num;
        $employee->pro_driver_license_num = $request->pro_driver_license_num;
        $employee->height = $request->height;
        $employee->weight = $request->weight;
        $employee->cloth_size = $request->cloth_size;
        $employee->shoe_size = $request->shoe_size;
        $employee->bank_account_id = $employee_bank->id;
        $employee->additional_info = $request->additional_info;
        $employee->expected_salary = $request->expected_salary;
        $employee->interested_position_id = $request->interested_position_id;
        $employee->department_id = $request->department_id;
        $employee->availability_date = $request->availability_date;
        $employee->proposed_salary = $request->proposed_salary;
        $employee->source_id = $request->source_id;
        $employee->status_id = $request->status_id;
        $employee->time_off = 0;
        $employee->company_id = $request->company_id;
        $employee->barcode = $request->barcode;
        $employee->project_id = $request->project_id;
        $employee->position_type_id = $request->position_type_id;
        $employee->save();
        //create user
        $employee_info = Hr_employee::all()->last();
        $users = new Zg_user();
        $users->username = $request->first_name;
        $users->group_id = 1;
        $users->employee_id = $employee_info->id;
        $users->phone = $request->phone;
        $users->email = $request->email;
        $users->company_id = $request->company_id;
        $users->save();
        return back()->with('success', 'Created Successfully');
    }

    public function employee_list_edit($id){
        $hr_status = Hr_status::all();
        $hr_state = Hr_state::all();
        $hr_district = Hr_district::all();
        $hr_sex = Hr_sex::all();
        $hr_blood_type = Hr_blood_type::all();
        $hr_bank = Hr_bank::all();
        $hr_position = Hr_position::all();
        $hr_source = Hr_source::all();
        $zg_company = Zg_company::all();
        $employee = Hr_employee::find($id);
        $hr_position_type = Hr_position_type::all();
        $zg_project = Zg_project::all();

        $hr_family_type = Hr_family_type::all();
        $hr_education_type = Hr_education_type::all();
        $hr_family = Hr_family::where('employee_id', $id)->get();
        $hr_relative = Hr_relative::where('employee_id', $id)->get();
        $hr_education = Hr_education::where('employee_id', $id)->get();
        $hr_training = Hr_professional_training::where('employee_id', $id)->get();
        $hr_work = Hr_work_experience::where('employee_id', $id)->get();
        return view('admin.employee.employee_list_edit', 
        compact('hr_work','hr_training','hr_education','hr_relative','hr_family','employee','hr_family_type','hr_education_type','hr_status','hr_state','hr_district','hr_position_type',
        'hr_sex','zg_project','hr_blood_type','hr_bank','hr_position','hr_source','zg_company'))
        ->with('active','employee_recruitment_list')
        ->with('sidebar_active','employee');
    }
 
    public function edit_employee(Request $request, $id){
        $v = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'state_id' => 'required',
            'district_id' => 'required',
            'address' => 'required',
            'sex_id' => 'required',
            'birth_place' => 'required',
            'military_service' => 'required',
            'drivers_license' => 'required',
            'driver_license_num' => 'required',
            'blood_type_id' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'cloth_size' => 'required',
            'shoe_size' => 'required',
            'bank_account_id' => 'required',
            'expected_salary' => 'required',
            'interested_position_id' => 'required',
            'availability_date' => 'required',
            'proposed_salary' => 'required',
            'source_id' => 'required',
            'status_id' => 'required',
            'company_id' => 'required',
            'position_type_id' => 'required',

        ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        //bank account create
        $bank_account_info = Hr_employee::find($id);
        $bank_account = Bank_account::find($bank_account_info->bank_account_id);
        $bank_account->account_type = 1;
        $bank_account->bank_id = $request->bank_account_id;
        $bank_account->account_number = $request->bank_account_number;
        $bank_account->currency_id = 1;
        $bank_account->account_name = $request->first_name;
        $bank_account->status = 0;
        $bank_account->save();
        //get bank id
        // $employee_bank = $bank_account::where('account_number',$request->bank_account_number)->first();
        // create employee
        $employee = Hr_employee::find($id);
        if($request->image) {
            $imageName = time().'.'.$request->image->extension();  
                
            $request->image->move(public_path('employee_images'), $imageName);
            $pic = 'employee_images/'.$imageName;
            $employee->image = $pic;
        }
        $employee->first_name = $request->first_name;
        $employee->middle_name = $request->middle_name;
        $employee->last_name = $request->last_name;
        $employee->birth_date = $request->birth_date;
        $employee->registration_num = $request->registration_num;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->state_id = $request->state_id;
        $employee->district_id = $request->district_id;
        $employee->address = $request->address;
        $employee->sex_id = $request->sex_id;
        $employee->birth_place = $request->birth_place;
        $employee->insurance_book_num = $request->insurance_book_num;
        $employee->military_service = $request->military_service;
        $employee->drivers_license = $request->drivers_license;
        $employee->driver_license_num = $request->driver_license_num;
        $employee->blood_type_id = $request->blood_type_id;
        $employee->mechanism_license_num = $request->mechanism_license_num;
        $employee->pro_driver_license_num = $request->pro_driver_license_num;
        $employee->height = $request->height;
        $employee->weight = $request->weight;
        $employee->cloth_size = $request->cloth_size;
        $employee->shoe_size = $request->shoe_size;
        // $employee->bank_account_id = $employee_bank->id;
        $employee->additional_info = $request->additional_info;
        $employee->expected_salary = $request->expected_salary;
        $employee->interested_position_id = $request->interested_position_id;
        $employee->availability_date = $request->availability_date;
        $employee->proposed_salary = $request->proposed_salary;
        $employee->source_id = $request->source_id;
        $employee->status_id = $request->status_id;
        $employee->company_id = $request->company_id;
        $employee->barcode = $request->barcode;
        $employee->position_type_id = $request->position_type_id;
        $employee->project_id = $request->project_id;
        $employee->save();
        //create user
        $users = Zg_user::where('employee_id', $id)->first();
        $users->username = $request->first_name;
        $users->group_id = 1;
        $users->employee_id = $id;
        $users->phone = $request->phone;
        $users->email = $request->email;
        $users->company_id = $request->company_id;
        $users->save();
             
        return back()->with('success', 'Updated Successfully');
    }
    public function recruiment_family_create(Request $request){
        $hr_family_exist = Hr_family::find($request->family_id);
        if($hr_family_exist !==null){
            $hr_family_exist->name = $request->family_name;
            $hr_family_exist->relation = $request->family_relation;
            $hr_family_exist->birth_date = $request->family_birth_date;
            $hr_family_exist->phone_number = $request->family_phone_number;
            $hr_family_exist->current_school = $request->family_current_school; 
            $hr_family_exist->save();
            $family_type = Hr_family_type::find($request->family_relation);
            $family = array();
            $family["title"] = $family_type->title;
            $family["id"] = $request->family_id;
            return $family;
        }else{
            $hr_family = new Hr_family();
            $hr_family->name = $request->family_name;
            $hr_family->relation = $request->family_relation;
            $hr_family->birth_date = $request->family_birth_date;
            $hr_family->phone_number = $request->family_phone_number;
            $hr_family->current_school = $request->family_current_school;
            $hr_family->employee_id = $request->employee;
            $hr_family->save();
            $family_type = Hr_family_type::find($request->family_relation);
            $family = array();
            $family["title"] = $family_type->title;
            $families = Hr_family::all()->last();
            $family["id"] = $families->id;
            return $family;
        }
    }
    public function recruiment_family_delete(Request $request){
        $hr_family = Hr_family::find($request->family_id);
        $hr_family->delete();
        echo(1);
    }
    public function recruiment_relative_create(Request $request){
        $hr_relative_exist = Hr_relative::find($request->relative_id);
        if($hr_relative_exist !==null){
            $hr_relative_exist->name = $request->relative_name;
            $hr_relative_exist->relation_id = $request->relative_relation;
            $hr_relative_exist->birth_date = $request->relative_birth_date;
            $hr_relative_exist->phone_number = $request->relative_phone_number;
            $hr_relative_exist->current_school = $request->relative_current_school; 
            $hr_relative_exist->save();
            $relative_type = Hr_family_type::find($request->relative_relation);
            $relative = array();
            $relative["title"] = $relative_type->title;
            $relative["id"] = $request->relative_id;
            return $relative;
        }else{
            $hr_relative = new Hr_relative();
            $hr_relative->name = $request->relative_name;
            $hr_relative->relation_id = $request->relative_relation;
            $hr_relative->birth_date = $request->relative_birth_date;
            $hr_relative->phone_number = $request->relative_phone_number;
            $hr_relative->current_school = $request->relative_current_school;
            $hr_relative->employee_id = $request->employee;
            $hr_relative->save();
            $relative_type = Hr_family_type::find($request->relative_relation);
            $relative = array();
            $relative["title"] = $relative_type->title;
            $families = Hr_relative::all()->last();
            $relative["id"] = $families->id;
            return $relative;
        }
    }
    public function recruiment_relative_delete(Request $request){
        $hr_relative = Hr_relative::find($request->relative_id);
        $hr_relative->delete();
        echo(1);
    }
    public function recruiment_education_create(Request $request){
        $hr_education_exist = Hr_education::find($request->education_id);
        if($hr_education_exist !==null){
            $hr_education_exist->education_type_id = $request->education_name;
            $hr_education_exist->attend = $request->education_attend;
            $hr_education_exist->graduate = $request->education_graduate;
            $hr_education_exist->degree = $request->education_degree;
            $hr_education_exist->major = $request->education_major; 
            $hr_education_exist->save();
            $education_type = Hr_education_type::find($request->education_name);
            $education = array();
            $education["title"] = $education_type->title;
            $education["id"] = $request->education_id;
            return $education;
        }else{
            $hr_education = new Hr_education();
            $hr_education->education_type_id = $request->education_name;
            $hr_education->attend = $request->education_attend;
            $hr_education->graduate = $request->education_graduate;
            $hr_education->degree = $request->education_degree;
            $hr_education->major = $request->education_major;
            $hr_education->employee_id = $request->employee;
            $hr_education->save();
            $education_type = Hr_education_type::find($request->education_name);
            $education = array();
            $education["title"] = $education_type->title;
            $families = Hr_education::all()->last();
            $education["id"] = $families->id;
            return $education;
        }
    }
    public function recruiment_education_delete(Request $request){
        $hr_education = Hr_education::find($request->education_id);
        $hr_education->delete();
        echo(1);
    }
    public function recruiment_training_create(Request $request){
        $hr_training_exist = Hr_professional_training::find($request->training_id);
        if($hr_training_exist !==null){
            $hr_training_exist->education_type_id = $request->training_type;
            $hr_training_exist->attend = $request->training_attend;
            $hr_training_exist->graduate = $request->training_graduate;
            $hr_training_exist->duration = $request->training_duration;
            $hr_training_exist->certificate = $request->training_certificate; 
            $hr_training_exist->major = $request->training_major; 
            $hr_training_exist->save();
            $training_type = Hr_education_type::find($request->training_type);
            $training = array();
            $training["title"] = $training_type->title;
            $training["id"] = $request->training_id;
            return $training;
        }else{
            $hr_training = new Hr_professional_training();
            $hr_training->education_type_id = $request->training_type;
            $hr_training->attend = $request->training_attend;
            $hr_training->graduate = $request->training_graduate;
            $hr_training->duration = $request->training_duration;
            $hr_training->certificate = $request->training_certificate;
            $hr_training->major = $request->training_major;
            $hr_training->employee_id = $request->employee;
            $hr_training->save();
            $training_type = Hr_education_type::find($request->training_type);
            $training = array();
            $training["title"] = $training_type->title;
            $families = Hr_professional_training::all()->last();
            $training["id"] = $families->id;
            return $training;
        }
    }
    public function recruiment_training_delete(Request $request){
        $hr_training = Hr_professional_training::find($request->training_id);
        $hr_training->delete();
        echo(1);
    }
    public function recruiment_work_create(Request $request){
        $hr_work_exist = Hr_work_experience::find($request->work_id);
        if($hr_work_exist !==null){
            $hr_work_exist->company = $request->work_company;
            $hr_work_exist->start_date = $request->work_start_date;
            $hr_work_exist->end_date = $request->work_end_date;
            $hr_work_exist->position = $request->work_position;
            $hr_work_exist->quit_reason = $request->work_quit_reason; 
            $hr_work_exist->job_responsibility = $request->work_job_responsibility; 
            $hr_work_exist->save();
            $work = array();
            $work["id"] = $request->work_id;
            return $work;
        }else{
            $hr_work = new Hr_work_experience();
            $hr_work->company = $request->work_company;
            $hr_work->start_date = $request->work_start_date;
            $hr_work->end_date = $request->work_end_date;
            $hr_work->position = $request->work_position;
            $hr_work->quit_reason = $request->work_quit_reason;
            $hr_work->job_responsibility = $request->work_job_responsibility;
            $hr_work->employee_id = $request->employee;
            $hr_work->save();
            $work = array();
            $families = Hr_work_experience::all()->last();
            $work["id"] = $families->id;
            return $work;
        }
    }
    public function recruiment_work_delete(Request $request){
        $hr_work = Hr_work_experience::find($request->work_id);
        $hr_work->delete();
        echo(1);
    }
    public function recruiment_contract_create(Request $request, $id){
        $v = Validator::make($request->all(), [
            'file' => 'required',
            'contract_num' => 'required',
            'company_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'active' => 'required',
            'extension' => 'required',
            'manager' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $hr_contract = new Hr_contract_employee();
        if($request->file) {
            $fileName = time().'.'.$request->file->extension();  
            $request->file->move(public_path('employee/contract'), $fileName);
            $file = 'employee/contract/'.$fileName;
            $hr_contract->file = $file;
        }
        $hr_contract->contract_num = $request->contract_num;
        $hr_contract->company_id = $request->company_id;
        $hr_contract->start_date = date("Y-m-d",strtotime($request->start_date));
        $hr_contract->end_date = date("Y-m-d",strtotime($request->end_date));
        $hr_contract->active = $request->active;
        $hr_contract->extension = $request->extension;
        $hr_contract->user_id = $request->manager; 
        $hr_contract->employee_id = $id;
        $hr_contract->save();
        return back()->with('success', 'Created Successfully');
    }
    public function recruiment_contract_edit(Request $request, $id){
        $v = Validator::make($request->all(), [
            'contract_num' => 'required',
            'company_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'active' => 'required',
            'extension' => 'required',
            'manager' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $hr_contract = Hr_contract_employee::find($id);
        if($request->file) {
            $fileName = time().'.'.$request->file->extension();  
            $request->file->move(public_path('employee/contract'), $fileName);
            $file = 'employee/contract/'.$fileName;
            $hr_contract->file = $file;
        }
        $hr_contract->contract_num = $request->contract_num;
        $hr_contract->company_id = $request->company_id;
        $hr_contract->start_date = date("Y-m-d",strtotime($request->start_date));
        $hr_contract->end_date = date("Y-m-d",strtotime($request->end_date));
        $hr_contract->active = $request->active;
        $hr_contract->extension = $request->extension;
        $hr_contract->user_id = $request->manager;
        $hr_contract->save();
        return back()->with('success', 'Updated Successfully');
    }
    public function recruiment_contract_delete(Request $request){
        $hr_contract = Hr_contract_employee::find($request->contract_id);
        $hr_contract->delete();
        echo(1);
    }
    public function recruiment_decision_create(Request $request, $id){
        $v = Validator::make($request->all(), [
            'file' => 'required',
            'date' => 'required',
            'user_id' => 'required',
            'type_id' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $hr_order_type = Hr_order_type::find($request->type_id);
        $hr_last_tushaal = Hr_last_tushaal_num::find($hr_order_type->company_id);
        
        $hr_decision = new Hr_order();
        if($request->file) {
            $fileName = time().'.'.$request->file->extension();  
            $request->file->move(public_path('employee/decision'), $fileName);
            $file = 'employee/decision/'.$fileName;
            $hr_decision->file = $file;
        }
        $hr_decision->order_num = "XH01".date("Y-m")."".($hr_last_tushaal->last_num+1);
        $hr_decision->date = date("Y-m-d",strtotime($request->date));
        $hr_decision->user_id = $request->user_id;
        $hr_decision->type_id = $request->type_id;
        $hr_decision->history_id = $id;
        $hr_decision->save();

        $hr_order_type->order_number = "XH01".date("Y-m")."".($hr_last_tushaal->last_num+1); 
        $hr_order_type->save();
        $hr_last_tushaal->last_num = $hr_last_tushaal->last_num +1;
        $hr_last_tushaal->save();

        return back()->with('success', 'Created Successfully');
    }
    public function recruiment_decision_edit(Request $request, $id){
        $v = Validator::make($request->all(), [
            'date' => 'required',
            'user_id' => 'required',
            'type_id' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $hr_order_type = Hr_order_type::find($request->type_id);
        $hr_last_tushaal = Hr_last_tushaal_num::find($hr_order_type->company_id);
        
        $hr_decision = Hr_order::find($id);
        if($request->file) {
            $fileName = time().'.'.$request->file->extension();  
            $request->file->move(public_path('employee/decision'), $fileName);
            $file = 'employee/decision/'.$fileName;
            $hr_decision->file = $file;
        }
        $hr_decision->order_num = "XH01".date("Y-m")."".($hr_last_tushaal->last_num+1);
        $hr_decision->date = date("Y-m-d",strtotime($request->date));
        $hr_decision->user_id = $request->user_id;
        $hr_decision->type_id = $request->type_id;
        $hr_decision->save();

        $hr_order_type->order_number = "XH01".date("Y-m")."".($hr_last_tushaal->last_num+1); 
        $hr_order_type->save();
        $hr_last_tushaal->last_num = $hr_last_tushaal->last_num +1;
        $hr_last_tushaal->save();

        return back()->with('success', 'Created Successfully');
    }
    public function recruiment_decision_delete(Request $request){
        $hr_contract = Hr_order::find($request->decision_id);
        $hr_contract->delete();
        echo(1);
    }
    public function recruiment_salary_create(Request $request, $id){
        $v = Validator::make($request->all(), [
            'date' => 'required',
            'type_id' => 'required',
            'order_id' => 'required',
            'wage_amount' => 'required',
            'currency_id' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $hr_prev_salary = Hr_wage::where("history_id", $id)->get()->last();
        
        if($hr_prev_salary){
            $previous_amount = $hr_prev_salary->wage_amount;
            $changed_amount = $request->wage_amount - $previous_amount;
        }else{
            $previous_amount = $request->wage_amount;
            $changed_amount = $request->wage_amount;
        }
        $history = Hr_history::find($id);
        $order = Hr_order::find($request->order_id);
        $order_type = Hr_order_type::find($order->type_id);
        $hr_salary = new Hr_wage();
        $hr_salary->date = date("Y-m-d",strtotime($request->date));
        $hr_salary->user_id = $request->user_id;
        $hr_salary->type_id = $request->type_id;
        $hr_salary->order_id = $request->order_id;
        $hr_salary->wage_amount = $request->wage_amount;
        $hr_salary->currency_id = $request->currency_id;
        $hr_salary->previous_amount = $previous_amount;
        $hr_salary->changed_amount = $changed_amount;
        $hr_salary->history_id = $id;
        $hr_salary->employee_id = $history->employee_id;
        $hr_salary->user_id = $history->user_id;
        $hr_salary->company_id = $order_type->company_id;
        $hr_salary->save();
        return back()->with('success', 'Created Successfully');
    }
    public function recruiment_salary_edit(Request $request, $id){
        $v = Validator::make($request->all(), [
            'date' => 'required',
            'type_id' => 'required',
            'wage_amount' => 'required',
            'currency_id' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $hr_prev_salary = Hr_wage::where("history_id", $id)->get()->last();
        if($hr_prev_salary){
            $previous_amount = $hr_prev_salary->wage_amount;
            $changed_salary = $request->wage_amount - $previous_amount;
            
            if($changed_salary>0){
                $changed_amount = $changed_salary;
            }else{
                $changed_amount = "-".$changed_salary;
            }
        }else{
            $previous_amount = 0;
            $changed_amount = 0;
        }
        $hr_salary = Hr_wage::find($id);
        $hr_salary->date = date("Y-m-d",strtotime($request->date));
        $hr_salary->user_id = $request->user_id;
        $hr_salary->type_id = $request->type_id;
        $hr_salary->order_id = $request->order_id;
        $hr_salary->wage_amount = $request->wage_amount;
        $hr_salary->currency_id = $request->currency_id;
        $hr_salary->previous_amount = $request->previous_amount;
        $hr_salary->changed_amount = $changed_amount;
        $hr_salary->save();
        return back()->with('success', 'Created Successfully');
    }
    public function recruiment_salary_delete(Request $request){
        $hr_contract = Hr_wage::find($request->salary_id);
        $hr_contract->delete();
        echo(1);
    }

    public function employee_delete(Request $request){
        
        $items = array();
        $items = $request->employee_delete_item;
        if($items == null){
            return back()->with('destroy', 'Please select Employee.');
        }
        $length = count($items);
        
        $i=0;
        for($i=0;$i<$length;$i++){
            $employee = Hr_employee::find($items[$i]);
            $employee->delete();
        }
        
        return back()->with('destroy', 'Deleted Successfully');
    }

    public function hire_employee(Request $request){
        $employee = Hr_employee::find($request->user_id);
        if($request->value==0){
            $hr_position = Hr_position::find($employee->interested_position_id);
            $hr_department = Hr_department::find($hr_position->department_id);
            $hr_id_card_num = Hr_id_card_num::where('company_id', $hr_department->company_id)->first();
            $id_card_num = date("Y-m-d")."".$hr_department->id_card_num."".($hr_id_card_num->last_num+1);
            $hr_id_card_num->last_num = $hr_id_card_num->last_num+1;
            $hr_id_card_num->save();
            $hr_history = new Hr_history();
            $hr_history->employee_id = $request->user_id;
            $hr_history->position_id = $employee->interested_position_id;
            $hr_history->project_id = $employee->project_id;
            $hr_history->position_type = $employee->position_type_id;
            $hr_history->user_id = $employee->zg_user->id;
            $hr_history->company_id = $employee->company_id;
            $hr_history->id_card_num = $id_card_num;
            $hr_history->history_status_id = 1;
            $hr_history->active = 1;
            $employee->hired_status = 1;
            $employee->time_off = 1;
            $hr_history->save();
            $hr_timeoff = Hr_timeoff::where('employee_id', $request->id)->first();
            if($hr_timeoff == null){
                $hr_timeoff = new Hr_timeoff();
                $hr_timeoff->employee_id = $request->user_id;
                $hr_timeoff->timeoff_type_id = 1;
                $hr_timeoff->from_date = date("Y-m-d");
                $hr_timeoff->user_id = $employee->zg_user->id;
                $hr_timeoff->company_id = $employee->company_id;
                $hr_timeoff->approval_status = 1;
                $hr_timeoff->save();
            }else{
                $hr_timeoff->employee_id = $request->user_id;
                $hr_timeoff->timeoff_type_id = 1;
                $hr_timeoff->from_date = date("Y-m-d");
                $hr_timeoff->user_id = $employee->zg_user->id;
                $hr_timeoff->company_id = $employee->company_id;
                $hr_timeoff->approval_status = $employee->status_id;
                $hr_timeoff->save();
            }
        }else{
            $hr_position = Hr_position::find($employee->interested_position_id);
            $hr_department = Hr_department::find($hr_position->department_id);
            $hr_id_card_num = Hr_id_card_num::where('company_id', $hr_department->company_id)->first();
            $id_card_num = date("Y-m-d")."".$hr_department->id_card_num."".($hr_id_card_num->last_num+1);
            $hr_id_card_num->last_num = $hr_id_card_num->last_num+1;
            $hr_id_card_num->save();
            $hr_history = new Hr_history();
            $hr_history->employee_id = $request->user_id;
            $hr_history->position_id = $employee->interested_position_id;
            $hr_history->project_id = $employee->project_id;
            $hr_history->position_type = $employee->position_type_id;
            $hr_history->user_id = $employee->zg_user->id;
            $hr_history->company_id = $employee->company_id;
            $hr_history->id_card_num = $id_card_num;
            $hr_history->active = 1;
            $hr_history->end_date = date('Y-m-d H:i:s');
            $hr_history->save();
            $employee->hired_status = 0;
            $employee->time_off = 0;
        }
        $employee->save();
        echo(1);
    }

    public function employee_quick_working(){
        return view('admin.employee.employee_quick_working')->with('active','employee_quick_working')->with('sidebar_active','employee');
    }
    public function employee_recruitment_list(){
        $employee = Hr_employee::all();
        return view('admin.employee.employee_recruitment_list', compact('employee'))->with('active','employee_recruitment_list')->with('sidebar_active','employee');
    }
}
