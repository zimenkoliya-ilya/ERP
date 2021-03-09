<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Zg_company;
use App\Models\Wh_storage;
use App\Models\Wh_item_type;
use App\Models\Fuel_tank;
use Validator;
class FuelController extends Controller
{
    public function transaction(){
        $fuel = Fuel_tank::all();
        return view('admin.fuel.transaction.index', compact('fuel'))
        ->with('active','fuel')
        ->with('sidebar_active','fuel_transaction');
    }

    public function transaction_create(){
        $company = Zg_company::all();
        $first_company = Zg_company::all()->first();
        $storage = Wh_storage::where('company_id', $first_company->id)->get();
        $item = Wh_item_type::all();
        
        return view('admin.fuel.transaction.create', 
        compact('company','storage','item'))
        ->with('active','fuel')
        ->with('sidebar_active','fuel_transaction');
    }
    public function get_storage(Request $request){
        $first_company = Zg_company::find($request->company_id);
        $storage = Wh_storage::where('company_id', $first_company->id)->get();
        
        return view('admin.fuel.transaction.get_storage',compact('storage'));
    }
    public function transaction_store(Request $request){
        $v = Validator::make($request->all(),[
            "company_id" => 'required',
            "storage_id" => 'required',
            "item_id" => 'required',
            "min" => 'required',
            "max" => 'required',
            "remaining" => 'required',
            "capacity" => 'required',
        ]);
        if($v->fails()){
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $fuel = new Fuel_tank();
        $fuel->company_id = $request->company_id;
        $fuel->storage_id = $request->storage_id;
        $fuel->item_id = $request->item_id;
        $fuel->min = $request->min;
        $fuel->max = $request->max;
        $fuel->remaining = $request->remaining;
        $fuel->capacity = $request->capacity;
        $fuel->save();
        return back()->with('success','Created Successfully!');
    }
    
    public function transaction_edit($id){
        $fuel = Fuel_tank::find($id);
        $company = Zg_company::all();
        $storage = Wh_storage::where('company_id', $fuel->company_id)->get();
        $item = Wh_item_type::all();
        
        return view('admin.fuel.transaction.edit', 
        compact('company','storage','item','fuel'))
        ->with('active','fuel')
        ->with('sidebar_active','fuel_transaction');
    }
    public function transaction_update(Request $request, $id){
        $v = Validator::make($request->all(),[
            "company_id" => 'required',
            "storage_id" => 'required',
            "item_id" => 'required',
            "min" => 'required',
            "max" => 'required',
            "remaining" => 'required',
            "capacity" => 'required',
        ]);
        if($v->fails()){
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $fuel = Fuel_tank::find($id);
        $fuel->company_id = $request->company_id;
        $fuel->storage_id = $request->storage_id;
        $fuel->item_id = $request->item_id;
        $fuel->min = $request->min;
        $fuel->max = $request->max;
        $fuel->remaining = $request->remaining;
        $fuel->capacity = $request->capacity;
        $fuel->save();
        return redirect()->route('fuel.transaction')->with('success','Updated Successfully!');
    }
}
