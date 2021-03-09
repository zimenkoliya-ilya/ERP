<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Zg_project;
use App\Models\Zg_company;
use App\Models\Ct_room_log;
use App\Models\Ct_camp;
use App\Models\Zg_user;
use App\Models\Ct_room;
use App\Models\Ct_bed;
use App\Models\Hr_employee;
use Validator;
class CampController extends Controller
{
    public function camp_loglist(){
        $loglist = Ct_room_log::all();
        return view('admin.camp.camp_loglist', compact('loglist'))
        ->with('active', 'camp')->with('sidebar_active', 'camp_loglist');
    }
    public function loglist_create(){
        // room id getting in bedlist
        $room_ids = Ct_bed::where('active',1)->pluck('room_id');
        //camp id getting in room
        $camp_ids = Ct_room::whereIn('id', $room_ids)->pluck('camp_id');
        // camp to have roomlist
        $camps = Ct_camp::whereIn('id', $camp_ids)->get();
        $camps_first = Ct_camp::whereIn('id', $camp_ids)->get()->first();
        $rooms = Ct_room::where('camp_id', $camps_first->id)->get();
        $rooms_first = Ct_room::where('camp_id',$camps_first->id)->first();
        $beds = Ct_bed::where('room_id', $rooms_first->id)->where('active',1)->get();
        $beds_first = Ct_bed::where('room_id', $rooms_first->id)->first();
        
        $zg_company = Zg_company::all();
        $employee = Hr_employee::all();
        return view('admin.camp.loglist.create',
        compact('employee','zg_company','camps','rooms','rooms_first','beds','beds_first'))
        ->with('active', 'camp')
        ->with('sidebar_active', 'camp_loglist');
    }

    public function loglist_store(Request $request){
        $v = Validator::make($request->all(), [
            'employee_id' => 'required',
            'camp_id' => 'required',
            'room_id' => 'required',
            'bed_id' => 'required',
            'checkin' => 'required',
            'checkout' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $camp = Ct_camp::find($request->camp_id);
        $loglist = new Ct_room_log(); 
        $loglist->employee_id = $request->employee_id;       
        $loglist->company_id = $camp->company_id;       
        $loglist->camp_id = $request->camp_id;       
        $loglist->room_id = $request->room_id;   
        $loglist->bed_id = $request->bed_id;   
        $loglist->check_in_date = date("Y-m-d",strtotime($request->checkin));
        $loglist->check_out_date = date("Y-m-d",strtotime($request->checkout));   
        $loglist->save();
        return back()->with('success', 'Successfully created.');    
    }

    public function loglist_edit(Request $request, $id){
        $loglist = Ct_room_log::find($id);
        $room_ids = Ct_bed::where('active',1)->pluck('room_id');
        //camp id getting in room
        $camp_ids = Ct_room::whereIn('id', $room_ids)->pluck('camp_id');
        // camp to have roomlist
        $camps = Ct_camp::whereIn('id', $camp_ids)->get();
        $camps_first = Ct_camp::find($loglist->camp_id);
        $rooms = Ct_room::where('camp_id', $camps_first->id)->get();
        $rooms_first = Ct_room::where('camp_id',$camps_first->id)->first();
        $beds = Ct_bed::where('room_id', $rooms_first->id)->where('active',1)->get();
        $beds_first = Ct_bed::where('room_id', $rooms_first->id)->first();
        $employee = Hr_employee::all();
        return view('admin.camp.loglist.edit',
        compact('employee','loglist','camps','rooms','rooms_first','beds','beds_first','camps_first'))
        ->with('active', 'camp')
        ->with('sidebar_active', 'camp_loglist'); 
    }

    public function loglist_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'employee_id' => 'required',
            'camp_id' => 'required',
            'room_id' => 'required',
            'bed_id' => 'required',
            'checkin' => 'required',
            'checkout' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $camp = Ct_camp::find($request->camp_id);
        $loglist = Ct_room_log::find($id); 
        $loglist->employee_id = $request->employee_id;       
        $loglist->company_id = $camp->company_id;       
        $loglist->camp_id = $request->camp_id;       
        $loglist->room_id = $request->room_id;   
        $loglist->bed_id = $request->bed_id;   
        $loglist->check_in_date = date("Y-m-d",strtotime($request->checkin));
        $loglist->check_out_date = date("Y-m-d",strtotime($request->checkout));   
        $loglist->save();
        return redirect()->route('camp_loglist')->with('success', 'Successfully updated.');     
    }
    
    public function loglist_destroy(Request $request){
        $count = $request->delete_item;
        $i = 0;
        if($count !== null){
            for($i=0;$i<count($count);$i++){
                $ct_camp = Ct_room_log::find($request->delete_item[$i]);
                $ct_camp->delete();
            }
            return back()->with('success', 'Deleted Successfully');
        }else{
            return back()->with('destroy', 'Please select Delete Item.');    
        }
    }
    public function loglist_roomget(Request $request){
        $camp_id = $request->camp_id;
        $rooms = Ct_room::where('camp_id', $camp_id)->get();
        return $rooms; 
    }

    public function loglist_bedget(Request $request){
        $room_id = $request->room_id;
        $rooms = Ct_bed::where('room_id', $room_id)->where('active',1)->get();
        return $rooms; 
    }

    public function loglist_active(Request $request){
        $ct_bed = Ct_room_log::find($request->user_id);
        if($request->value == 1){
            $ct_bed->status_id = 0;
        }else{
            $ct_bed->status_id = 1;
        }
        $ct_bed->save();
        echo(1);
    }
    //camplist start
    public function camp_camplist(){
        $ct_camp = Ct_camp::all();
        $zg_company = Zg_company::all();
        $zg_project = Zg_project::all();
        return view('admin.camp.camp_camplist', compact('ct_camp','zg_company','zg_project'))
        ->with('active', 'camp')->with('sidebar_active', 'camp_camplist');
    }
    
    public function camplist_create(){
        $zg_company = Zg_company::all();
        $zg_project = Zg_project::all();
        return view('admin.camp.camplist.create',
        compact('zg_project','zg_company'))
        ->with('active', 'camp')
        ->with('sidebar_active', 'camp_camplist');
    }

    public function camplist_store(Request $request){
        $v = Validator::make($request->all(), [
            'title' => 'required',
            'project_id' => 'required',
            'company_id' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $camplist = new Ct_camp(); 
        $camplist->title = $request->title;       
        $camplist->project_id = $request->project_id;       
        $camplist->company_id = $request->company_id;   
        $camplist->save();
        return back()->with('success', 'Successfully created.');    
    }

    public function camplist_edit(Request $request, $id){
        $ct_camp = Ct_camp::find($id);
        $zg_company = Zg_company::all();
        $zg_project = Zg_project::all();
        return view('admin.camp.camplist.edit',
        compact('zg_project','zg_company','ct_camp'))
        ->with('active', 'camp')
        ->with('sidebar_active', 'camp_camplist'); 
    }

    public function camplist_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'title' => 'required',
            'project_id' => 'required',
            'company_id' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $camplist = Ct_camp::find($id); 
        $camplist->title = $request->title;       
        $camplist->project_id = $request->project_id;       
        $camplist->company_id = $request->company_id;   
        $camplist->save();
        return redirect()->route('camp_camplist')->with('success', 'Successfully updated.');    
    }
    
    public function camplist_destroy($id){
        $ct_camp = Ct_camp::find($id);
        $ct_camp->delete();
        return back()->with('success', 'Deleted Successfully');
    }
    // camplist end

    // roomlist start
    public function camp_roomlist(){
        $ct_room = Ct_room::all();
        $zg_user = Zg_user::where('group_id', 7)->get();
        $ct_camp = Ct_camp::all();
        return view('admin.camp.camp_roomlist', compact('ct_room','zg_user','ct_camp'))
        ->with('active', 'camp')
        ->with('sidebar_active', 'camp_roomlist');
    }
    public function roomlist_create(){
        $zg_user = Zg_user::where('group_id', 7)->get();
        $ct_camp = Ct_camp::all();
        return view('admin.camp.roomlist.create', compact('zg_user','ct_camp'))
        ->with('active', 'camp')->with('sidebar_active', 'camp_roomlist');
    }
    public function roomlist_store(Request $request){
        $v = Validator::make($request->all(), [
            'title' => 'required',
            'camp_id' => 'required',
            'user_id' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $roomlist = new Ct_room(); 
        $roomlist->title = $request->title;       
        $roomlist->camp_id = $request->camp_id;       
        $roomlist->user_id = $request->user_id;   
        $roomlist->save();
        return back()->with('success', 'Successfully created.');    
    }
    public function roomlist_edit(Request $request, $id){
        $ct_room = Ct_room::find($id);
        $zg_user = Zg_user::where('group_id', 7)->get();
        $ct_camp = Ct_camp::all();
        return view('admin.camp.roomlist.edit',
        compact('ct_room','zg_user','ct_camp'))
        ->with('active', 'camp')
        ->with('sidebar_active', 'camp_roomlist'); 
    }
    public function roomlist_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'title' => 'required',
            'camp_id' => 'required',
            'user_id' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $roomlist = Ct_room::find($id); 
        $roomlist->title = $request->title;       
        $roomlist->camp_id = $request->camp_id;       
        $roomlist->user_id = $request->user_id;   
        $roomlist->save();
        return redirect()->route('camp_roomlist')->with('success', 'Successfully updated.');    
    }
    public function roomlist_destroy($id){
        $ct_camp = Ct_room::find($id);
        $ct_camp->delete();
        return back()->with('success', 'Deleted Successfully');
    }
    //roomlist end

    //bedlist start
    public function camp_bedlist(){
        $ct_bed = Ct_bed::all();
        $zg_user = Zg_user::where('group_id', 7)->get();
        $ct_room = Ct_room::all();
        return view('admin.camp.camp_bedlist', compact('ct_bed','zg_user','ct_room'))
        ->with('active', 'camp')->with('sidebar_active', 'camp_bedlist');
    }
    public function bedlist_create(){
        $zg_user = Zg_user::where('group_id', 7)->get();
        $ct_room = Ct_room::all();
        return view('admin.camp.bedlist.create', compact('zg_user','ct_room'))
        ->with('active', 'camp')->with('sidebar_active', 'camp_bedlist');
    }
    public function bedlist_store(Request $request){
        $v = Validator::make($request->all(), [
            'title' => 'required',
            'room_id' => 'required',
            'user_id' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $bedlist = new Ct_bed(); 
        $bedlist->title = $request->title;       
        $bedlist->room_id = $request->room_id;       
        $bedlist->user_id = $request->user_id;   
        $bedlist->save();
        return back()->with('success', 'Successfully created.');    
    }
    public function bedlist_edit(Request $request, $id){
        $ct_bed = Ct_bed::find($id);
        $zg_user = Zg_user::where('group_id', 7)->get();
        $ct_room = Ct_room::all();
        return view('admin.camp.bedlist.edit',
        compact('ct_bed','zg_user','ct_room'))
        ->with('active', 'camp')
        ->with('sidebar_active', 'camp_bedlist'); 
    }
    public function bedlist_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'title' => 'required',
            'room_id' => 'required',
            'user_id' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $bedlist = Ct_bed::find($id); 
        $bedlist->title = $request->title;       
        $bedlist->room_id = $request->room_id;       
        $bedlist->user_id = $request->user_id;   
        $bedlist->save();
        return redirect()->route('camp_bedlist')->with('success', 'Successfully updated.');    
    }
    public function bedlist_destroy($id){
        $ct_bed = Ct_bed::find($id);
        $ct_bed->delete();
        return back()->with('success', 'Deleted Successfully');
    }
    public function bedlist_active(Request $request){
        $ct_bed = Ct_bed::find($request->user_id);
        if($request->value == 1){
            $ct_bed->active = 0;
        }else{
            $ct_bed->active = 1;
        }
        $ct_bed->save();
        echo(1);
    }
}
