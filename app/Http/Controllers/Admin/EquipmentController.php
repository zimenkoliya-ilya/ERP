<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Zg_company;
use App\Models\Th_model;
use App\Models\Th_tech_type;
use App\Models\Th_category;
use App\Models\Country;
use App\Models\Th_owner_status;
use App\Models\Th_load_measurement;
use App\Models\Th_technic;
use App\Models\Th_make;
use App\Models\Th_repair;
use App\Models\Wh_customer;
use App\Models\Fl_job;
use Validator;
class EquipmentController extends Controller
{
    public function equipment_technic_list(){

        $technic = Th_technic::all();
        $company = Zg_company::all();
        $type = Th_tech_type::all();
        $category = Th_category::all();
        $model = Th_model::all();
        $customer = Wh_customer::all();
        //this is available vehicle percent calculation part
        $yesterday = date('Y-m-d', strtotime('-1 days'))." 23:59:59"; //this is yesterday date because timezone is different with updated_at
        $first = "1900-12-01";
        $yesterday_date = date("Y-m-d", strtotime('-1 days'));
        $yes_repairing = Th_repair::where('active', 0)->whereBetween('updated_at', array($first, $yesterday))->get()->count();
        $yes_repaired = Th_repair::where('active', 1)->whereDate('updated_at', $yesterday_date)->get()->count();
        $repair_today = Th_repair::where('active', 0)->get()->count();
        $all_vehicle = Th_technic::all()->count();
        $today_available_vehicle = $all_vehicle - $repair_today;
        $yest_available_vehicle = $all_vehicle - $yes_repairing-$yes_repaired;
        $dif_vehicle = $today_available_vehicle - $yest_available_vehicle;
        $inc_vehicle = 0;
        //this is repairing vehicle
        $dif_repair = $yes_repairing - $repair_today;
        // this is vehicle caculation to hold on
        $all_hold = Fl_job::where('status_id','!=', 2)->get()->count();
        $yes_hold = Fl_job::where('status_id', '!=', 2)->whereBetween('updated_at', array($first, $yesterday))->get()->count();
        $yes_endhole = Fl_job::whereIn('status_id',[1,3,4,5])->whereDate('updated_at', $yesterday_date)->get()->count();
        $yes_hold_vehicle = $all_vehicle-$yes_hold - $yes_endhole;
        $today_hold_vehicle = $all_vehicle - $all_hold;
        $dif_hold = $today_hold_vehicle - $yes_hold_vehicle;
        $inc_hold = 0;
        // this is transit vehicle
        $all_trans = Fl_job::all()->count();
        $yes_trans = $all_trans - $yes_hold;
        $today_trans = $all_trans - $today_hold_vehicle;
        $inc_trans = 0;
        $dif_trans = $today_trans - $yes_trans;
        //this is broken vehicle
        $yes_broken = Fl_job::where('status_id', 4)->whereDate('updated_at', $yesterday_date)->get()->count();
        $today_broken = Fl_job::where('status_id', 4)->whereDate('updated_at', date("Y-m-d"))->get()->count();
        $dif_broken = $today_broken - $yes_broken;
        $inc_broken = 0;
        if($all_vehicle !== 0){
            $inc_vehicle = number_format(($today_available_vehicle/$all_vehicle - $yest_available_vehicle/$all_vehicle)*100,1);
            $inc_hold = number_format(($today_hold_vehicle/$all_vehicle - $yes_hold_vehicle/$all_vehicle)*100,1);
            $inc_trans = number_format(($today_trans/$all_vehicle - $yes_trans/$all_vehicle)*100,1);
            $inc_repair = number_format(($repair_today/$all_vehicle - $yes_repairing/$all_vehicle)*100,1);
            $inc_broken = number_format(($today_broken/$all_vehicle - $yes_broken/$all_vehicle)*100,1);
        } 
        return view('admin.equipment.technic_list', 
        compact('technic', 'company','type','category','model','customer','inc_hold','inc_trans',
            'today_trans','inc_repair','dif_repair','repair_today','inc_broken','dif_broken','today_broken',
            'inc_vehicle','dif_vehicle','dif_trans','today_available_vehicle','today_hold_vehicle','dif_hold'))
        ->with('active','equipment')->with('sidebar_active','equipment_technic_list');
    }
    public function technic_list_create(){
        $zg_company = Zg_company::all();
        $first_company = Zg_company::all()->first();
        $model = Th_model::all();
        $technic_type = Th_tech_type::all();
        $category = Th_category::all();
        $owner_status = Th_owner_status::all();
        $country = Country::all();
        $load_measurement = Th_load_measurement::all();
        $customer = Wh_customer::where('company_id', $first_company->id)->get();
        return view('admin.equipment.technic_list.create',
        compact('zg_company', 'model', 'technic_type', 'category', 'customer',
        'owner_status', 'country', 'load_measurement'))
        ->with('active','equipment')
        ->with('sidebar_active','equipment_technic_list');
    }
    public function technic_list_store(Request $request){
        $v = Validator::make($request->all(), [
            'image' => 'required',
            'company_id' => 'required',
            'model_id' => 'required',
            'customer_id' => 'required',
            'type_id' => 'required',
            'category_id' => 'required',
            'id_card_num' => 'required',
            'plate_num' => 'required',
            'park_num' => 'required',
            'owner_status_id' => 'required',
            'owner_company_id' => 'required',
            'manufactured_country_id' => 'required',
            'manufactured_date' => 'required',
            'engine_num' => 'required',
            'vin_num' => 'required',
            'color' => 'required',
            'start_date' => 'required',
            'motor_power' => 'required',
            'weight_kg' => 'required',
            'load_capacity' => 'required',
            'load_capacity_measurement_id' => 'required',
            'seat' => 'required',
            'active' => 'required',

        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        if($request->customer_id == "Select"){
            return back()->with('destroy','Customer select is required.');
        }
        // create employee
        $technic = new Th_technic();
        if($request->image) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('employee_images'), $imageName);
            $pic = 'employee_images/'.$imageName;
            $technic->image = $pic;
        }
        $technic->company_id = $request->company_id;
        $technic->model_id = $request->model_id;
        $technic->customer_id = $request->customer_id;
        $technic->type_id = $request->type_id;
        $technic->category_id = $request->category_id;
        $technic->id_card_num = $request->id_card_num;
        $technic->plate_num = $request->plate_num;
        $technic->park_num = $request->park_num;
        $technic->owner_status_id = $request->owner_status_id;
        $technic->manufactured_country_id = $request->manufactured_country_id;
        $technic->manufactured_date = date("Y-m-d",strtotime($request->manufactured_date));
        $technic->engine_num = $request->engine_num;
        $technic->vin_num = $request->vin_num;
        $technic->color = $request->color;
        $technic->start_date = date("Y-m-d",strtotime($request->start_date));
        $technic->motor_power = $request->motor_power;
        $technic->weight_kg = $request->weight_kg;
        $technic->load_capacity = $request->load_capacity;
        $technic->load_capacity_measurement_id = $request->load_capacity_measurement_id;
        $technic->seat = $request->seat;
        $technic->active = $request->active;
        $technic->save();
        return back()->with('success', 'Created Successfully');
    }

    public function technic_list_edit(Request $request, $id){
        $technic = Th_technic::find($id);
        $zg_company = Zg_company::all();
        $first_company = Zg_company::find($technic->company_id);
        $model = Th_model::all();
        $technic_type = Th_tech_type::all();
        $category = Th_category::all();
        $owner_status = Th_owner_status::all();
        $country = Country::all();
        $load_measurement = Th_load_measurement::all();
        $customer = Wh_customer::where('company_id', $first_company->id)->get();
        return view('admin.equipment.technic_list.edit',
        compact('zg_company', 'model', 'technic_type', 'category', 'customer',
        'owner_status', 'country', 'load_measurement', 'technic'))
        ->with('active','equipment')
        ->with('sidebar_active','equipment_technic_list');
    }

    public function technic_list_update(Request $request, $id){
       
        $v = Validator::make($request->all(), [
            'company_id' => 'required',
            'model_id' => 'required',
            'customer_id' => 'required',
            'type_id' => 'required',
            'category_id' => 'required',
            'id_card_num' => 'required',
            'plate_num' => 'required',
            'park_num' => 'required',
            'owner_status_id' => 'required',
            'owner_company_id' => 'required',
            'manufactured_country_id' => 'required',
            'manufactured_date' => 'required',
            'engine_num' => 'required',
            'vin_num' => 'required',
            'color' => 'required',
            'start_date' => 'required',
            'motor_power' => 'required',
            'weight_kg' => 'required',
            'load_capacity' => 'required',
            'load_capacity_measurement_id' => 'required',
            'seat' => 'required',
            'active' => 'required',

        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        
        if($request->customer_id == "Select"){
            return back()->with('destroy','Customer select is required.');
        }
        // create employee
        $technic = Th_technic::find($id);
        if($request->image) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('employee_images'), $imageName);
            $pic = 'employee_images/'.$imageName;
            $technic->image = $pic;
        }
        $technic->company_id = $request->company_id;
        $technic->model_id = $request->model_id;
        $technic->customer_id = $request->customer_id;
        $technic->type_id = $request->type_id;
        $technic->category_id = $request->category_id;
        $technic->id_card_num = $request->id_card_num;
        $technic->plate_num = $request->plate_num;
        $technic->park_num = $request->park_num;
        $technic->owner_status_id = $request->owner_status_id;
        $technic->manufactured_country_id = $request->manufactured_country_id;
        $technic->manufactured_date = date("Y-m-d",strtotime($request->manufactured_date));
        $technic->engine_num = $request->engine_num;
        $technic->vin_num = $request->vin_num;
        $technic->color = $request->color;
        $technic->start_date = date("Y-m-d",strtotime($request->start_date));
        $technic->motor_power = $request->motor_power;
        $technic->weight_kg = $request->weight_kg;
        $technic->load_capacity = $request->load_capacity;
        $technic->load_capacity_measurement_id = $request->load_capacity_measurement_id;
        $technic->seat = $request->seat;
        $technic->active = $request->active;
        $technic->save();
        return redirect()->route('equipment_technic_list')->with('success', 'Successfully updated.');     
    }

    public function get_customer(Request $request){
        $zg_company = Zg_company::all();
        $first_company = Zg_company::find($request->company_id);
        $model = Th_model::all();
        $technic_type = Th_tech_type::all();
        $category = Th_category::all();
        $owner_status = Th_owner_status::all();
        $country = Country::all();
        $load_measurement = Th_load_measurement::all();
        $customer = Wh_customer::where('company_id', $first_company->id)->get();
        return view('admin.equipment.technic_list.get_customer',
        compact('zg_company', 'model', 'technic_type', 'category', 'customer',
        'owner_status', 'country', 'load_measurement'))
        ->with('active','equipment')
        ->with('sidebar_active','equipment_technic_list');
    }

    public function technic_list_view(Request $request, $id){
        $technic = Th_technic::find($id);

        return view('admin.equipment.technic_list.view',
        compact('technic'))
        ->with('active','equipment')
        ->with('sidebar_active','equipment_technic_list');
    }
    public function technic_list_destroy($id){
        $technic = Th_technic::find($id);
        $technic->delete();
        return back()->with('success', 'Deleted Successfully');
    }

    public function technic_list_search(Request $request){
        $type_id = [];
        $company_id = [];
        $customer_id = [];
        $model_id = [];
        $category_id = [];
        $type = $request->type;
        if($type == null){
            $type_id = Th_tech_type::pluck('id');
        }else{
            $type_id[] = $request->type;
        }
        $company = $request->company;
        if($company == null){
            $company_id = Zg_company::pluck("id");
        }else{
            $company_id[] = $request->company;
        }
        $customer = $request->customer;
        if($customer == null){
            $customer_id = Wh_customer::pluck("id");
        }else{
            $customer_id[] = $request->customer;
        }
        $model = $request->model;
        if($model == null){
            $model_id = Th_model::pluck("id");
        }else{
            $model_id[] = $request->model;
        }
        $category = $request->category;
        if($category == null){
            $category_id = Th_category::pluck("id");
        }else{
            $category_id[] = $request->category;
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
        $technic = Th_technic::
                whereIn('type_id', $type_id)
                ->whereIn('customer_id', $customer_id)
                ->whereIn('model_id', $model_id)
                ->whereIn('company_id', $company_id)
                ->whereIn('category_id', $category_id)
                ->whereBetween('created_at', array($start, $end))
                ->where(function($query) use ($username){
                    $query->orWhere('engine_num','LIKE', '%'.$username.'%')
                        ->orWhere('vin_num','LIKE', '%'.$username.'%')
                        ->orWhere('color','LIKE', '%'.$username.'%')
                        ->orWhere('id_card_num','LIKE', '%'.$username.'%')
                        ->orWhere('plate_num','LIKE', '%'.$username.'%')
                        ->orWhere('park_num','LIKE', '%'.$username.'%')
                        ->orWhere('motor_power','LIKE', '%'.$username.'%')
                        ->orWhere('load_capacity','LIKE', '%'.$username.'%')
                        ->orWhere('seat','LIKE', '%'.$username.'%');
                    })
                ->get();
        $company = Zg_company::all();
        $type = Th_tech_type::all();
        $category = Th_category::all();
        $model = Th_model::all();
        $customer = Wh_customer::all();
        return view('admin.equipment.technic_list', 
        compact('technic', 'company','type','category','model','customer'))
        ->with('active','equipment')->with('sidebar_active','equipment_technic_list');
    }
}
