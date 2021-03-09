<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Hr_blood_type;
use App\Models\Hr_education_type;
use App\Models\Hr_department;
use App\Models\Zg_company;
use App\Models\Hr_family_type;
use App\Models\Hr_position;
use App\Models\Th_make;
use App\Models\Th_model;
use App\Models\Th_owner_status;
use App\Models\Zg_project;
use Validator;
use search;
class SettingController extends Controller
{
    ///////////// country ////////////////
    public function country(){
        $country = Country::all();
        return view('admin.setting.country.country', compact('country'))
        ->with('active','setting')
        ->with('sidebar_active','country');
    }
    public function country_create(){
        return view('admin.setting.country.create')
        ->with('active','setting')
        ->with('sidebar_active','country');
    }
    public function country_store(Request $request){
        $v = Validator::make($request->all(), [
            'country' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $country = new Country();
        $country->title = $request->country;
        $country->save();
        return back()
        ->with('success','Created Successfully');
    }
    public function country_edit($id){
        $country = Country::find($id);
        return view('admin.setting.country.edit', compact('country'))
        ->with('active','setting')
        ->with('sidebar_active','country');
    }
    public function country_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'country' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $country = Country::find($id);
        $country->title = $request->country;
        $country->save();
        return redirect()->route('setting.country')
        ->with('success','Created Successfully');
    }
    public function country_destroy($id){
        $ct_camp = Country::find($id);
        $ct_camp->delete();
        return back()->with('success', 'Deleted Successfully');
    }
    ///////////// blood type //////////////////
    public function blood_type(){
        $blood_type = Hr_blood_type::all();
        return view('admin.setting.blood_type.blood_type', compact('blood_type'))
        ->with('active','setting')
        ->with('sidebar_active','blood_type');
    }
    public function blood_type_create(){
        return view('admin.setting.blood_type.create')
        ->with('active','setting')
        ->with('sidebar_active','blood_type');
    }
    public function blood_type_store(Request $request){
        $v = Validator::make($request->all(), [
            'blood_type' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $blood_type = new Hr_blood_type();
        $blood_type->title = $request->blood_type;
        $blood_type->save();
        return back()
        ->with('success','Created Successfully');
    }
    public function blood_type_edit($id){
        $blood_type = Hr_blood_type::find($id);
        return view('admin.setting.blood_type.edit', compact('blood_type'))
        ->with('active','setting')
        ->with('sidebar_active','blood_type');
    }
    public function blood_type_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'blood_type' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $blood_type = Hr_blood_type::find($id);
        $blood_type->title = $request->blood_type;
        $blood_type->save();
        return redirect()->route('setting.blood_type')
        ->with('success','Created Successfully');
    }
    public function blood_type_destroy($id){
        $ct_camp = Hr_blood_type::find($id);
        $ct_camp->delete();
        return back()->with('success', 'Deleted Successfully');
    }

    ///////////// education type //////////////////
    public function education_type(){
        $education_type = Hr_education_type::all();
        return view('admin.setting.education_type.education_type', compact('education_type'))
        ->with('active','setting')
        ->with('sidebar_active','education_type');
    }
    public function education_type_create(){
        return view('admin.setting.education_type.create')
        ->with('active','setting')
        ->with('sidebar_active','education_type');
    }
    public function education_type_store(Request $request){
        $v = Validator::make($request->all(), [
            'education_type' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $education_type = new Hr_education_type();
        $education_type->title = $request->education_type;
        $education_type->save();
        return back()
        ->with('success','Created Successfully');
    }
    public function education_type_edit($id){
        $education_type = Hr_education_type::find($id);
        return view('admin.setting.education_type.edit', compact('education_type'))
        ->with('active','setting')
        ->with('sidebar_active','education_type');
    }
    public function education_type_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'education_type' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $education_type = Hr_education_type::find($id);
        $education_type->title = $request->education_type;
        $education_type->save();
        return redirect()->route('setting.education_type')
        ->with('success','Created Successfully');
    }
    public function education_type_destroy($id){
        $ct_camp = Hr_education_type::find($id);
        $ct_camp->delete();
        return back()->with('success', 'Deleted Successfully');
    }
    ///////////// department type //////////////////
    public function department(){
        $department = Hr_department::all();
        $company = Zg_company::all();
        return view('admin.setting.department.department', compact('department','company'))
        ->with('active','setting')
        ->with('sidebar_active','department');
    }
    public function department_create(){
        $company = Zg_company::all();
        return view('admin.setting.department.create', compact('company'))
        ->with('active','setting')
        ->with('sidebar_active','department');
    }
    public function department_store(Request $request){
        $v = Validator::make($request->all(), [
            'company_id' => 'required',
            'title' => 'required',
            'tushaal_title' => 'required',
            'id_card_num' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $department = new Hr_department();
        $department->title = $request->title;
        $department->company_id = $request->company_id;
        $department->tushaal_title = $request->tushaal_title;
        $department->id_card_num = $request->id_card_num;
        $department->active = 1;
        $department->save();
        return back()
        ->with('success','Created Successfully');
    }
    public function department_edit($id){
        $department = Hr_department::find($id);
        $company = Zg_company::all();
        return view('admin.setting.department.edit', compact('department','company'))
        ->with('active','setting')
        ->with('sidebar_active','department');
    }
    public function department_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'company_id' => 'required',
            'title' => 'required',
            'tushaal_title' => 'required',
            'id_card_num' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $department = Hr_department::find($id);
        $department->title = $request->title;
        $department->company_id = $request->company_id;
        $department->tushaal_title = $request->tushaal_title;
        $department->id_card_num = $request->id_card_num;
        $department->active = 1;
        $department->save();
        return redirect()->route('setting.department')
        ->with('success','Created Successfully');
    }
    public function department_destroy($id){
        $ct_camp = Hr_department::find($id);
        $ct_camp->delete();
        return back()->with('success', 'Deleted Successfully');
    }
    public function department_active(Request $request){
        $ct_bed = Hr_department::find($request->user_id);
        if($request->value == 1){
            $ct_bed->active = 0;
        }else{
            $ct_bed->active = 1;
        }
        $ct_bed->save();
        echo(1);
    }
    ///////////// family type //////////////////
    public function family_type(){
        $family_type = Hr_family_type::all();
        return view('admin.setting.family_type.family_type', compact('family_type'))
        ->with('active','setting')
        ->with('sidebar_active','family_type');
    }
    public function family_type_create(){
        $company = Zg_company::all();
        return view('admin.setting.family_type.create', compact('company'))
        ->with('active','setting')
        ->with('sidebar_active','family_type');
    }
    public function family_type_store(Request $request){
        $v = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $family_type = new Hr_family_type();
        $family_type->title = $request->title;
        $family_type->save();
        return back()
        ->with('success','Created Successfully');
    }
    public function family_type_edit($id){
        $family_type = Hr_family_type::find($id);
        $company = Zg_company::all();
        return view('admin.setting.family_type.edit', compact('family_type','company'))
        ->with('active','setting')
        ->with('sidebar_active','family_type');
    }
    public function family_type_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $family_type = Hr_family_type::find($id);
        $family_type->title = $request->title;
        $family_type->save();
        return redirect()->route('setting.family_type')
        ->with('success','Created Successfully');
    }
    public function family_type_destroy($id){
        $ct_camp = Hr_family_type::find($id);
        $ct_camp->delete();
        return back()->with('success', 'Deleted Successfully');
    }
    ///////////// positions //////////////////
    public function position(){
        $position = Hr_position::paginate(8);
        $company = Zg_company::all();
        $department = Hr_department::all();
        $avail_position = Hr_position::all();
        return view('admin.setting.position.position', compact('position','company','avail_position','department'))
        ->with('active','setting')
        ->with('sidebar_active','position');
    }
    public function position_create(){
        $company = Zg_company::all();
        $department = Hr_department::all();
        $avail_position = Hr_position::all();
        return view('admin.setting.position.create', compact('avail_position','company','department'))
        ->with('active','setting')
        ->with('sidebar_active','position');
    }
    public function position_store(Request $request){
        $v = Validator::make($request->all(), [
            'company_id' => 'required',
            'title' => 'required',
            'department_id' => 'required',
            'available_position' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $position = new Hr_position();
        $position->title = $request->title;
        $position->company_id = $request->company_id;
        $position->department_id = $request->department_id;
        $position->available_position = $request->available_position;
        $position->active = 1;
        $position->save();
        return back()
        ->with('success','Created Successfully');
    }
    public function position_edit($id){
        $position = Hr_position::find($id);
        $company = Zg_company::all();
        $department = Hr_department::all();
        $avail_position = Hr_position::all();
        return view('admin.setting.position.edit', compact('avail_position','position','company', 'department'))
        ->with('active','setting')
        ->with('sidebar_active','position');
    }
    public function position_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'company_id' => 'required',
            'title' => 'required',
            'department_id' => 'required',
            'available_position' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $position = Hr_position::find($id);
        $position->title = $request->title;
        $position->company_id = $request->company_id;
        $position->department_id = $request->department_id;
        $position->available_position = $request->available_position;
        $position->active = 1;
        $position->save();
        return redirect()->route('setting.position')
        ->with('success','Created Successfully');
    }
    public function position_destroy($id){
        $ct_camp = Hr_position::find($id);
        $ct_camp->delete();
        return back()->with('success', 'Deleted Successfully');
    }
    public function position_active(Request $request){
        $ct_bed = Hr_position::find($request->user_id);
        if($request->value == 1){
            $ct_bed->active = 0;
        }else{
            $ct_bed->active = 1;
        }
        $ct_bed->save();
        echo(1);
    }
    public function position_company_search(Request $request){
        if($request->company_id==0){
            $position = Hr_position::all();
        }else{
            $position = Hr_position::where('company_id', $request->company_id)->get();
        }
        $company = Zg_company::all();
        return view('admin.setting.position.company_search',
        compact('position', 'company'));
    }
    public function position_text_search(Request $request){
        if($request->text==null){
            $position = Hr_position::all();
        }else{
            $key = trim($request->get('text'));
            $position = Hr_position::query()
            ->where('title', 'like', "%{$key}%")->get();
        }
        $company = Zg_company::all();
        return view('admin.setting.position.company_search',
        compact('position', 'company'));
    }
    ///////////// make type //////////////////
    public function make(){
        $make = Th_make::all();
        return view('admin.setting.make.make', compact('make'))
        ->with('active','setting')
        ->with('sidebar_active','make');
    }
    public function make_create(){
        return view('admin.setting.make.create')
        ->with('active','setting')
        ->with('sidebar_active','make');
    }
    public function make_store(Request $request){
        $v = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $make = new Th_make();
        $make->make = $request->title;
        $make->save();
        return back()
        ->with('success','Created Successfully');
    }
    public function make_edit($id){
        $make = Th_make::find($id);
        return view('admin.setting.make.edit', compact('make'))
        ->with('active','setting')
        ->with('sidebar_active','make');
    }
    public function make_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $make = Th_make::find($id);
        $make->make = $request->title;
        $make->save();
        return redirect()->route('setting.make')
        ->with('success','Created Successfully');
    }
    public function make_destroy($id){
        $ct_camp = Th_make::find($id);
        $ct_camp->delete();
        return back()->with('success', 'Deleted Successfully');
    }
    ///////////// model type //////////////////
    public function model(){
        $model = Th_model::all();
        $make = Th_make::all();
        return view('admin.setting.model.model', compact('model','make'))
        ->with('active','setting')
        ->with('sidebar_active','model');
    }
    public function model_create(){
        $make = Th_make::all();
        return view('admin.setting.model.create', compact('make'))
        ->with('active','setting')
        ->with('sidebar_active','model');
    }
    public function model_store(Request $request){
        $v = Validator::make($request->all(), [
            'model' => 'required',
            'make_id' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $model = new Th_model();
        $model->model = $request->model;
        $model->make_id = $request->make_id;
        $model->save();
        return back()
        ->with('success','Created Successfully');
    }
    public function model_edit($id){
        $model = Th_model::find($id);
        $make = Th_make::all();
        return view('admin.setting.model.edit', compact('model','make'))
        ->with('active','setting')
        ->with('sidebar_active','model');
    }
    public function model_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'model' => 'required',
            'make_id' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $model = Th_model::find($id);
        $model->model = $request->model;
        $model->make_id = $request->make_id;
        $model->save();
        return redirect()->route('setting.model')
        ->with('success','Created Successfully');
    }
    public function model_destroy($i){
        $ct_camp = Th_model::find($i);
        $ct_camp->delete();
        return back()->with('success', 'Deleted Successfully');
    }
    ///////////// owner status type //////////////////
    public function owner_status(){
        $owner_status = Th_owner_status::all();
        return view('admin.setting.owner_status.owner_status', compact('owner_status'))
        ->with('active','setting')
        ->with('sidebar_active','owner_status');
    }
    public function owner_status_create(){
        return view('admin.setting.owner_status.create')
        ->with('active','setting')
        ->with('sidebar_active','owner_status');
    }
    public function owner_status_store(Request $request){
        $v = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $owner_status = new Th_owner_status();
        $owner_status->title = $request->title;
        $owner_status->save();
        return back()
        ->with('success','Created Successfully');
    }
    public function owner_status_edit($id){
        $owner_status = Th_owner_status::find($id);
        return view('admin.setting.owner_status.edit', compact('owner_status'))
        ->with('active','setting')
        ->with('sidebar_active','owner_status');
    }
    public function owner_status_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $owner_status = Th_owner_status::find($id);
        $owner_status->title = $request->title;
        $owner_status->save();
        return redirect()->route('setting.owner_status')
        ->with('success','Created Successfully');
    }
    public function owner_status_destroy($id){
        $ct_camp = Th_owner_status::find($id);
        $ct_camp->delete();
        return back()->with('success', 'Deleted Successfully');
    }
    ///////////// Company type //////////////////
    public function company(){
        $company = Zg_company::all();
        return view('admin.setting.company.company', compact('company'))
        ->with('active','setting')
        ->with('sidebar_active','company');
    }
    public function company_create(){
        return view('admin.setting.company.create')
        ->with('active','setting')
        ->with('sidebar_active','company');
    }
    public function company_store(Request $request){
        $v = Validator::make($request->all(), [
            'logo' => 'required',
            'logo_small' => 'required',
            'title' => 'required',
            'type' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $company = new Zg_company();
        $i=0;
        if($request->logo){
                $imageName = "1".time().'.'.$request->logo->extension();  
                $request->logo->move(public_path('company_logo'), $imageName);
                $pic = 'company_logo/'.$imageName;
                $company->logo = $pic;
        }
        if($request->logo_small){
            $imageName = "2".time().'.'.$request->logo_small->extension();  
            $request->logo_small->move(public_path('company_logo'), $imageName);
            $pic = 'company_logo/'.$imageName;
            $company->logo_small = $pic;
        }
        $company->title = $request->title;
        $company->company_type = $request->type;
        $company->save();
        return back()
        ->with('success','Created Successfully');
    }
    public function company_edit($id){
        $company = Zg_company::find($id);
        return view('admin.setting.company.edit', compact('company'))
        ->with('active','setting')
        ->with('sidebar_active','company');
    }
    public function company_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'title' => 'required',
            'type' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $company = Zg_company::find($id);
        $i=0;
        if($request->logo){
                $imageName = "1".time().'.'.$request->logo->extension();  
                $request->logo->move(public_path('company_logo'), $imageName);
                $pic = 'company_logo/'.$imageName;
                $company->logo = $pic;
        }
        if($request->logo_small){
            $imageName = "2".time().'.'.$request->logo_small->extension();  
            $request->logo_small->move(public_path('company_logo'), $imageName);
            $pic = 'company_logo/'.$imageName;
            $company->logo_small = $pic;
        }
        $company->title = $request->title;
        $company->company_type = $request->type;
        $company->save();
        return redirect()->route('setting.company')
        ->with('success','Updated Successfully');
    }
    public function company_destroy($id){
        $ct_camp = Zg_company::find($id);
        $ct_camp->delete();
        return back()->with('success', 'Deleted Successfully');
    }
    public function company_active(Request $request){
        $ct_bed = Zg_company::find($request->user_id);
        if($request->value == 1){
            $ct_bed->main_company = 0;
        }else{
            $ct_bed->main_company = 1;
        }
        $ct_bed->save();
        echo(1);
    }
    ///////////// department type //////////////////
    public function project(){
        $project = Zg_project::all();
        $company = Zg_company::all();
        return view('admin.setting.project.project', compact('project','company'))
        ->with('active','setting')
        ->with('sidebar_active','project');
    }
    public function project_create(){
        $company = Zg_company::all();
        return view('admin.setting.project.create', compact('company'))
        ->with('active','setting')
        ->with('sidebar_active','project');
    }
    public function project_store(Request $request){
        $v = Validator::make($request->all(), [
            'company_id' => 'required',
            'title' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $project = new Zg_project();
        $project->title = $request->title;
        $project->company_id = $request->company_id;
        $project->save();
        return back()
        ->with('success','Created Successfully');
    }
    public function project_edit($id){
        $project = Zg_project::find($id);
        $company = Zg_company::all();
        return view('admin.setting.project.edit', compact('project','company'))
        ->with('active','setting')
        ->with('sidebar_active','project');
    }
    public function project_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'company_id' => 'required',
            'title' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $project = Zg_project::find($id);
        $project->title = $request->title;
        $project->company_id = $request->company_id;
        $project->save();
        return redirect()->route('setting.project')
        ->with('success','Created Successfully');
    }
    public function project_destroy($id){
        $ct_camp = Zg_project::find($id);
        $ct_camp->delete();
        return back()->with('success', 'Deleted Successfully');
    }
    public function project_active(Request $request){
        $ct_bed = Zg_project::find($request->user_id);
        if($request->value == 1){
            $ct_bed->active = 0;
        }else{
            $ct_bed->active = 1;
        }
        $ct_bed->save();
        echo(1);
    }
}
