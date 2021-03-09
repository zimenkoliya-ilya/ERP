<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Zg_company;
use App\Models\Zg_project;
use App\Models\Hr_state;
use App\Models\Hr_district;
use App\Models\Fl_job_type;
use App\Models\Th_technic;
use App\Models\Fl_tech_type;
use App\Models\Fl_location;
use App\Models\Hr_employee;
use App\Models\Fl_job;
use Validator;
use Illuminate\Support\Facades\DB;
class TransportationController extends Controller
{
    public function trs_list(){
        $job_list = Fl_job::all();
        $company = Zg_company::all();
        return view('admin.transportation.list.index',
            compact('company','job_list'))
            ->with('active','transportation')
            ->with('sidebar_active', 'transportation_list');
    }
    public function list_create(){
        $company = Zg_company::all();
        $tech_type = Fl_tech_type::pluck('tech_type_id');
        $first_company = Zg_company::all()->first();
        $job_type = Fl_job_type::where('company_id', $first_company->id)->get();
        $location = Fl_location::where('company_id', $first_company->id)->get();
        $technic = Th_technic::where('active',1)->where('company_id', $first_company->id)
        ->whereIn('type_id', $tech_type)->get();
        $employee = Hr_employee::where('company_id', $first_company->id)
        ->where('time_off', 1)->where('hired_status', 1)->get();
        return view('admin.transportation.list.create',
            compact('company','job_type','technic','location','employee'))
            ->with('active','transportation')
            ->with('sidebar_active', 'transportation_list');
    }
    public function get_company(Request $request){
        $company_id = $request->company_id;
        $company = Zg_company::all();
        $tech_type = Fl_tech_type::pluck('tech_type_id');
        $first_company = Zg_company::all()->first();
        $job_type = Fl_job_type::where('company_id', $company_id)->get();
        $location = Fl_location::where('company_id', $company_id)->get();
        $technic = Th_technic::where('active',1)->where('company_id', $company_id)
                ->whereIn('type_id', $tech_type)->get();
        $employee = Hr_employee::where('company_id', $company_id)
                ->where('time_off', 1)->where('hired_status', 1)->get();
        return view('admin.transportation.list.get_company',
            compact('company','job_type','technic','location','employee','company_id'))
            ->with('active','transportation')
            ->with('sidebar_active', 'transportation_list');
    }
    public function list_store(Request $request){
       
        $v = Validator::make($request->all(),[
            "date" => 'required',
            "company_id" => 'required',
            "job_type_id" => 'required',
            "technic_id" => 'required',
            "driver_id" => 'required',
            "origin_location_id" => 'required',
            "start_date" => 'required',
            "destinc_location_id" => 'required',
            "scheduled_datetime" => 'required',
            "description" => 'required',
        ]);
        if($v->fails()){
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        if($request->status_id == 'Select'){
            return back()->with('destroy', 'Please select status.');
        }
        $duration = (strtotime($request->scheduled_datetime)-strtotime($request->start_date))/3600/24;
        $transport = new Fl_job();
        $transport->company_id = $request->company_id;
        $transport->date = date("Y-m-d",strtotime($request->date));
        $transport->job_type_id = $request->job_type_id;
        $transport->tech_id = $request->technic_id;
        $transport->employee_id = $request->driver_id;
        $transport->origin_id = $request->origin_location_id;
        $transport->origin_datetime =date("Y-m-d h:i:s", strtotime($request->start_date));
        $transport->destination_id = $request->destinc_location_id;
        $transport->scheduled_datetime = date("Y-m-d h:i:s", strtotime($request->scheduled_datetime));
        $transport->description = $request->description;
        $transport->status_id = $request->status_id;
        $transport->duration = $duration;
        $transport->save();
        return back()->with('success','Created Successfully.');
    }
    public function list_delivered_update(Request $request, $id){
        $job_list = Fl_job::find($id);
        $job_list->destination_datetime = $request->destination_time;
        $job_list->status_id = 3;
        $job_list->fuel_used = $request->fuel_used;
        $job_list->total_distance = $request->total_distance;
        $job_list->save();
        return back()->with('success', 'Updated Successfully');
    }
    
    public function list_breakdown($id){
        $job_list = Fl_job::find($id);
        $job_list->status_id = 4;
        $job_list->save();
        return back()->with('success', 'Updated Successfully');
    }
    
    public function list_cancel($id){
        $job_list = Fl_job::find($id);
        $job_list->status_id = 5;
        $job_list->save();
        return back()->with('success', 'Updated Successfully');
    }
    public function list_edit($id){
        $job_list = Fl_job::find($id);
        $company = Zg_company::all();
        $tech_type = Fl_tech_type::pluck('tech_type_id');
        $first_company = Zg_company::all()->first();
        $job_type = Fl_job_type::where('company_id', $first_company->id)->get();
        $location = Fl_location::where('company_id', $first_company->id)->get();
        $technic = Th_technic::where('active',1)->where('company_id', $first_company->id)
        ->whereIn('type_id', $tech_type)->get();
        $employee = Hr_employee::where('company_id', $first_company->id)
        ->where('time_off', 1)->where('hired_status', 1)->get();
        return view('admin.transportation.list.edit',
            compact('company','job_type','technic','location','employee','job_list'))
            ->with('active','transportation')
            ->with('sidebar_active', 'transportation_list');
    }
    public function list_update(Request $request, $id){

        $v = Validator::make($request->all(),[
            "date" => 'required',
            "company_id" => 'required',
            "job_type_id" => 'required',
            "technic_id" => 'required',
            "driver_id" => 'required',
            "origin_location_id" => 'required',
            "start_date" => 'required',
            "destinc_location_id" => 'required',
            "scheduled_datetime" => 'required',
            "description" => 'required',
        ]);
        if($v->fails()){
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        if($request->status_id == "Select"){
            return back()->with('destroy', 'Please select status');
        }
        $duration = (strtotime($request->scheduled_datetime)-strtotime($request->start_date))/3600/24;
        $transport = Fl_job::find($id);
        $transport->company_id = $request->company_id;
        $transport->date = date("Y-m-d",strtotime($request->date));
        $transport->job_type_id = $request->job_type_id;
        $transport->tech_id = $request->technic_id;
        $transport->employee_id = $request->driver_id;
        $transport->origin_id = $request->origin_location_id;
        $transport->origin_datetime =date("Y-m-d h:i", strtotime($request->start_date));
        $transport->destination_id = $request->destinc_location_id;
        $transport->scheduled_datetime = date("Y-m-d h:i", strtotime($request->scheduled_datetime));
        $transport->description = $request->description;
        $transport->status_id = $request->status_id;
        $transport->duration = $duration;
        $transport->save();
        return back()->with('success','Updated Successfully.');
    }
    public function list_destory($id){
        $job_list = Fl_job::find($id);
        $job_list->delete();
        return back()->with('success', 'Deleted Successfully');
    }


    ///// job type  ///////
    public function trs_type(){
        $company = Zg_company::all();
        $types = Fl_job_type::all();
       
        return view('admin.transportation.type.index',compact('company','types'))
        ->with('active','transportation')
        ->with('sidebar_active', 'transportation_type');
    }
    public function type_store(Request $request){
        $v = Validator::make($request->all(),[
            "title" => 'required',
            "company_id" => 'required',
        ]);
        if($v->fails()){
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $types = new Fl_job_type();
        $types->title = $request->title;
        $types->company_id = $request->company_id;
        $types->save();
        return back()->with('success', 'Created Successfully');
    }
    public function type_update(Request $request, $id){
        $v = Validator::make($request->all(),[
            "title" => 'required',
            "company_id" => 'required',
        ]);
        if($v->fails()){
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $types = Fl_job_type::find($id);
        $types->title = $request->title;
        $types->company_id = $request->company_id;
        $types->save();
        return back()->with('success', 'Updated Successfully');
    }

    public function type_destroy($id){
        $types = Fl_job_type::find($id);
        $types->delete();
        return back()->with('success', 'Deleted Successfully');
    }

    //////  location //////////
    public function trs_location(){
        $location = Fl_location::all();
        return view('admin.transportation.location.index',compact('location'))
        ->with('active','transportation')
        ->with('sidebar_active', 'transportation_location');
    }
    public function location_create(){
        $project = Zg_project::all();
        $state = Hr_state::all();
        $district = Hr_district::all();
        return view('admin.transportation.location.create',compact('project','state','district'))
        ->with('active','transportation')
        ->with('sidebar_active', 'transportation_location');
    }
    public function location_store(Request $request){
        $v = Validator::make($request->all(),[
            "title" => 'required',
            "project_id" => 'required',
            "latitude" => 'required',
            "longitude" => 'required',
            "additional_point_info" => 'required',
            "address" => 'required',
            "state_id" => 'required',
            "district_id" => 'required',
        ]);
        if($v->fails()){
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $project = Zg_project::find($request->project_id);
        $transport = new Fl_location();
        $transport->project_id = $request->project_id;
        $transport->title = $request->title;
        $transport->company_id = $project->company_id;
        $transport->latitude = $request->latitude;
        $transport->longitude = $request->longitude;
        $transport->additional_point_info = $request->additional_point_info;
        $transport->address = $request->address;
        $transport->state_id = $request->state_id;
        $transport->district_id = $request->district_id;
        $transport->save();
        return back()->with('success','Created Successfully.');
    }

    public function location_edit($id){
        $project = Zg_project::all();
        $state = Hr_state::all();
        $district = Hr_district::all();
        $location = Fl_location::find($id);
        return view('admin.transportation.location.edit',
            compact('project','state','district','location'))
        ->with('active','transportation')
        ->with('sidebar_active', 'transportation_location');
    }
    public function location_update(Request $request, $id){
        $v = Validator::make($request->all(),[
            "title" => 'required',
            "project_id" => 'required',
            "latitude" => 'required',
            "longitude" => 'required',
            "additional_point_info" => 'required',
            "address" => 'required',
            "state_id" => 'required',
            "district_id" => 'required',
        ]);
        if($v->fails()){
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $project = Zg_project::find($request->project_id);
        $transport = Fl_location::find($id);
        $transport->project_id = $request->project_id;
        $transport->title = $request->title;
        $transport->company_id = $project->company_id;
        $transport->latitude = $request->latitude;
        $transport->longitude = $request->longitude;
        $transport->additional_point_info = $request->additional_point_info;
        $transport->address = $request->address;
        $transport->state_id = $request->state_id;
        $transport->district_id = $request->district_id;
        $transport->save();
        return redirect()->route('transportation.location')->with('success','Updated Successfully.');
    }
    public function location_destroy($id){
        $location = Fl_location::find($id);
        $location->delete();
        return back()->with('success', 'Deleted Successfully');
    }

}
