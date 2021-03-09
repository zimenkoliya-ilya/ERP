<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hse_daily;
use App\Models\Zg_company;
use App\Models\Zg_project;
use App\Models\Weather_type;
use Validator;
class HealthController extends Controller
{
    public function index(){
        $health = Hse_daily::all();
        return view('admin.health.index',
        compact('health'))
        ->with('active', 'health')
        ->with('sidebar_active', 'health');    
    }
    public function view($id){
        $health = Hse_daily::find($id);
        return view('admin.health.view',
        compact('health'))
        ->with('active', 'health')
        ->with('sidebar_active', 'health');    
    }
    public function destroy($id){
        $health = Hse_daily::find($id);
        $health->delete();
        return back()->with('success', 'Deleted Successfully');
    }
    public function create(){
        $weather = Weather_type::all();
        $company = Zg_company::all();
        $project = Zg_project::all();
        return view('admin.health.create', compact('company', 'project','weather'))
        ->with('active', 'health')
        ->with('sidebar_active', 'health');
    }
    public function store(Request $request){
        $v = Validator::make($request->all(), [
            'wind_day' => 'required',
            'wind_night' => 'required',
            'temp_day' => 'required',
            'temp_night' => 'required',
            'weather' => 'required',
            'project' => 'required',
            'company' => 'required',
            'project_hour' => 'required',
            'day_hour' => 'required',
            'free_day' => 'required',
            'spill' => 'required',
            'lti' => 'required',
            'near_miss' => 'required',
            'inconsistency' => 'required',
            'inconsistency_reponse' => 'required',
            'asset' => 'required',
            'mti' => 'required',
            'fai' => 'required',
            'mining' => 'required',
            'repair' => 'required',
            'manufacturing' => 'required',
            'camp' => 'required',
            'fuel' => 'required',
            'exploration' => 'required',
            'signs' => 'required',
            'hse_point' => 'required',
            'danger' => 'required',
            'danger_analysis' => 'required',
            'new_emp' => 'required',
            'rules' => 'required',
            'main' => 'required',
            'security' => 'required',
            'temporary' => 'required',
            'total' => 'required',
            'date' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $health = new Hse_daily();
        $health->wind_day = $request->wind_day;
        $health->wind_night = $request->wind_night;
        $health->temp_day = $request->temp_day;
        $health->temp_night = $request->temp_night;
        $health->weather = $request->weather;
        $health->project = $request->project;
        $health->company = $request->company;
        $health->project_hour = $request->project_hour;
        $health->day_hour = $request->day_hour;
        $health->free_day = $request->free_day;
        $health->spill = $request->spill;
        $health->lti = $request->lti;
        $health->accident = $request->accident;
        $health->near_miss = $request->near_miss;
        $health->inconsistency = $request->inconsistency;
        $health->inconsistency_reponse = $request->inconsistency_reponse;
        $health->asset = $request->asset;
        $health->mti = $request->mti;
        $health->fai = $request->fai;
        $health->mining = $request->mining;
        $health->repair = $request->repair;
        $health->manufacturing = $request->manufacturing;
        $health->camp = $request->camp;
        $health->fuel = $request->fuel;
        $health->exploration = $request->exploration;
        $health->signs = $request->signs;
        $health->hse_point = $request->hse_point;
        $health->danger = $request->danger;
        $health->danger_analysis = $request->danger_analysis;
        $health->new_emp = $request->new_emp;
        $health->rules = $request->rules;
        $health->main = $request->main;
        $health->security = $request->security;
        $health->temporary = $request->temporary;
        $health->total = $request->total;
        $health->date = date("Y-m-d",strtotime($request->date));
        $health->save();
        return redirect()->route('health.index')->with('success','Created Successfully');
    }

    public function edit($id){
        $health = Hse_daily::find($id);
        $weather = Weather_type::all();
        $company = Zg_company::all();
        $project = Zg_project::all();
        return view('admin.health.edit', compact('company','health', 'project','weather'))
        ->with('active', 'health')
        ->with('sidebar_active', 'health');
    }

    public function update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'wind_day' => 'required',
            'wind_night' => 'required',
            'temp_day' => 'required',
            'temp_night' => 'required',
            'weather' => 'required',
            'project' => 'required',
            'company' => 'required',
            'project_hour' => 'required',
            'day_hour' => 'required',
            'free_day' => 'required',
            'spill' => 'required',
            'lti' => 'required',
            'near_miss' => 'required',
            'inconsistency' => 'required',
            'inconsistency_reponse' => 'required',
            'asset' => 'required',
            'mti' => 'required',
            'fai' => 'required',
            'mining' => 'required',
            'repair' => 'required',
            'manufacturing' => 'required',
            'camp' => 'required',
            'fuel' => 'required',
            'exploration' => 'required',
            'signs' => 'required',
            'hse_point' => 'required',
            'danger' => 'required',
            'danger_analysis' => 'required',
            'new_emp' => 'required',
            'rules' => 'required',
            'main' => 'required',
            'security' => 'required',
            'temporary' => 'required',
            'total' => 'required',
            'date' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $health = Hse_daily::find($id);
        $health->wind_day = $request->wind_day;
        $health->wind_night = $request->wind_night;
        $health->temp_day = $request->temp_day;
        $health->temp_night = $request->temp_night;
        $health->weather = $request->weather;
        $health->project = $request->project;
        $health->company = $request->company;
        $health->project_hour = $request->project_hour;
        $health->day_hour = $request->day_hour;
        $health->free_day = $request->free_day;
        $health->spill = $request->spill;
        $health->lti = $request->lti;
        $health->accident = $request->accident;
        $health->near_miss = $request->near_miss;
        $health->inconsistency = $request->inconsistency;
        $health->inconsistency_reponse = $request->inconsistency_response;
        $health->asset = $request->asset;
        $health->mti = $request->mti;
        $health->fai = $request->fai;
        $health->mining = $request->mining;
        $health->repair = $request->repair;
        $health->manufacturing = $request->manufacturing;
        $health->camp = $request->camp;
        $health->fuel = $request->fuel;
        $health->exploration = $request->exploration;
        $health->signs = $request->signs;
        $health->hse_point = $request->hse_point;
        $health->danger = $request->danger;
        $health->danger_analysis = $request->danger_analysis;
        $health->new_emp = $request->new_emp;
        $health->rules = $request->rules;
        $health->main = $request->main;
        $health->security = $request->security;
        $health->temporary = $request->temporary;
        $health->total = $request->total;
        $health->date = date("Y-m-d",strtotime($request->date));
        $health->save();
        return redirect()->route('health.index')->with('success','Updated Successfully');
    }
}
