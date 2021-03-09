<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wh_customer;
use App\Models\Zg_company;
use App\Models\Zg_user;
use App\Models\Wh_storage;
use App\Models\Zg_project;
use App\Models\Wh_item_type;
use App\Models\Wh_item;
use App\Models\Wh_item_measurement;
use App\Models\Wh_category;
use App\Models\Wh_order;
use App\Models\Wh_journal;
use App\Models\Wh_item_remain;
use App\helpers;
use Validator;
use DB;
class WarehouseController extends Controller
{
    public function transaction(){
        $page_title = 'Journal list';
        // $test = Wh_journal::from('wh_journals as a')
        //         ->selectRaw('(wh.created_at) as mm, (wh.created_at) as mff, a.*')
        //         ->leftJoin('wh_items as wh', 'a.item_id','wh.id')
        //         ->get();
        //         dd($test);
    	$journal_list = DB::table('wh_journals as a')
    		->select('a.*', 'b.title as item_title', 'b.barcode', 'c.title as storage_title', 'd.title as category_title', 'e.customer_name', 'e.customer_code', 'g.title as company_title', 'h.title as related_storage_title',
    				DB::raw('(CASE WHEN a.type_id = "1" THEN "Debit" ELSE "Credit" END) AS type_title'),
    				DB::raw('(CASE WHEN a.type_id = "1" THEN "text-theme-1" ELSE "text-theme-6" END) AS type_class'),
    				DB::raw('(CASE WHEN a.journal_type_id = "1" THEN "Regular transaction" ELSE "Transaction between storages" END) AS journal_type_title'))
    		->leftJoin('wh_items as b', 'a.item_id', '=', 'b.id')
    		->leftJoin('wh_storages as c', 'a.storage_id', '=', 'c.id')
    		->leftJoin('wh_categories as d', 'a.category_id', '=', 'd.id')
    		->leftJoin('wh_customers as e', 'a.customer_id', '=', 'e.id')
    		->leftJoin('zg_companies as g', 'a.customer_id', '=', 'g.id')
    		->leftJoin('wh_storages as h', 'a.related_storage_id', '=', 'h.id')
    		->get();
    	return view('admin.warehouse.transaction.index', [
        	'page_title' => $page_title,
            'journal_list' => $journal_list
        ])->with('active','warehouse')
        ->with('sidebar_active', 'warehouse_transaction');
        // return view('admin.warehouse.transaction.index')
        // ->with('active','warehouse')
        // ->with('sidebar_active', 'warehouse_transaction');
    }
    public function customer(){
        $customer = Wh_customer::all();
        $company = Zg_company::all();
        $user = Zg_user::where('group_id', '2')->get();
        return view('admin.warehouse.customer.index', compact('customer','company','user'))
        ->with('active','warehouse')
        ->with('sidebar_active', 'warehouse_customers');
    }
    public function customer_create(){
        $company = Zg_company::all();
        $user = Zg_user::where('group_id', '2')->get();
        return view('admin.warehouse.customer.create', compact('company','user'))
        ->with('active','warehouse')
        ->with('sidebar_active', 'warehouse_customers');
    }
    public function customer_store(Request $request){
        $v = Validator::make($request->all(), [
            'customer_name' => 'required',
            'customer_code' => 'required|unique:wh_customers',
            'company_id' => 'required',
            'user_id' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $customer = new Wh_customer();
        $customer->customer_name = $request->customer_name;
        $customer->customer_code = $request->customer_code;
        $customer->company_id = $request->company_id;
        $customer->user_id = $request->user_id;
        $customer->save();
        return back()->with('success', 'Created Successfully');
    }
    public function customer_edit($id){
        $customer = Wh_customer::find($id);
        $company = Zg_company::all();
        $user = Zg_user::where('group_id', '2')->get();
        return view('admin.warehouse.customer.edit', compact('company','user', 'customer'))
        ->with('active','warehouse')
        ->with('sidebar_active', 'warehouse_customers');
    }
    public function customer_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'customer_name' => 'required',
            'company_id' => 'required',
            'user_id' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $customer = Wh_customer::find($id);
        $customer->customer_name = $request->customer_name;
        $customer->customer_code = $request->customer_code;
        $customer->company_id = $request->company_id;
        $customer->user_id = $request->user_id;
        $customer->save();
        return redirect()->route('warehouse.customer')->with('success', 'updated Successfully');
    }
    public function customer_destroy($id){
        $ct_camp = Wh_customer::find($id);
        $ct_camp->delete();
        return back()->with('success', 'Deleted Successfully');
    }
    // this is storage CRUD
    public function storage(){
        $storage = Wh_storage::all();
        $company = Zg_company::all();
        $project = Zg_project::all();
        return view('admin.warehouse.storage.index', compact('storage','company','project'))
        ->with('active','warehouse')
        ->with('sidebar_active', 'warehouse_storages');
    }
    public function storage_create(){
        $company = Zg_company::all();
        $project = Zg_project::all();
        return view('admin.warehouse.storage.create', compact('company','project'))
        ->with('active','warehouse')
        ->with('sidebar_active', 'warehouse_storages');
    }
    public function storage_store(Request $request){
        $v = Validator::make($request->all(), [
            'title' => 'required',
            'company_id' => 'required',
            'project_id' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $storage = new Wh_storage();
        $storage->title = $request->title;
        $storage->company_id = $request->company_id;
        $storage->project_id = $request->project_id;
        $storage->save();
        return back()->with('success', 'Created Successfully');
    }
    public function storage_edit($id){
        $storage = Wh_storage::find($id);
        $company = Zg_company::all();
        $project = Zg_project::all();
        return view('admin.warehouse.storage.edit', compact('company','project', 'storage'))
        ->with('active','warehouse')
        ->with('sidebar_active', 'warehouse_storages');
    }
    public function storage_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'title' => 'required',
            'company_id' => 'required',
            'project_id' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $storage = Wh_storage::find($id);
        $storage->title = $request->title;
        $storage->company_id = $request->company_id;
        $storage->project_id = $request->project_id;
        $storage->save();
        return redirect()->route('warehouse.storage')->with('success', 'updated Successfully');
    }
    public function storage_destroy($id){
        $ct_camp = Wh_storage::find($id);
        $ct_camp->delete();
        return back()->with('success', 'Deleted Successfully');
    }

    // this is Item List CRUD
    public function item(){
        $item = Wh_item::all();
        return view('admin.warehouse.item.index', compact('item'))
        ->with('active','warehouse')
        ->with('sidebar_active', 'warehouse_items');
    }
    public function item_create(){
        $company = Zg_company::all();
        $item_type = Wh_item_type::all();
        $measurement = Wh_item_measurement::all();
        $user = Zg_user::where('group_id',2)->get();
        return view('admin.warehouse.item.create', 
        compact('company','user','measurement','item_type'))
        ->with('active','warehouse')
        ->with('sidebar_active', 'warehouse_items');
    }
    public function item_store(Request $request){
        $v = Validator::make($request->all(), [
            'title' => 'required',
            'company_id' => 'required',
            'user_id' => 'required',
            'item_type_id' => 'required',
            'measurement_id' => 'required',
            'barcode' => 'required',
            'image' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $item = new Wh_item();
        if($request->image) {
            $imageName = time().'.'.$request->image->extension();  
                
            $request->image->move(public_path('employee/warehouse'), $imageName);
            $pic = 'employee/warehouse/'.$imageName;
            $item->image = $pic;
        }
        $item->title = $request->title;
        $item->company_id = $request->company_id;
        $item->user_id = $request->user_id;
        $item->item_type_id = $request->item_type_id;
        $item->measurement_id = $request->measurement_id;
        $item->barcode = $request->barcode;
        $item->description = $request->description;
        $item->save();
        return back()->with('success', 'Created Successfully');
    }
    public function item_edit($id){
        $item = Wh_item::find($id);
        $company = Zg_company::all();
        $item_type = Wh_item_type::all();
        $measurement = Wh_item_measurement::all();
        $user = Zg_user::where('group_id',2)->get();
        return view('admin.warehouse.item.edit',
        compact('measurement','company','user', 'item','item_type'))
        ->with('active','warehouse')
        ->with('sidebar_active', 'warehouse_items');
    }
    public function item_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'title' => 'required',
            'company_id' => 'required',
            'user_id' => 'required',
            'item_type_id' => 'required',
            'measurement_id' => 'required',
            'barcode' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $item = Wh_item::find($id);
        if($request->image) {
            $imageName = time().'.'.$request->image->extension();  
                
            $request->image->move(public_path('employee/warehouse'), $imageName);
            $pic = 'employee/warehouse/'.$imageName;
            $item->image = $pic;
        }
        $item->title = $request->title;
        $item->company_id = $request->company_id;
        $item->user_id = $request->user_id;
        $item->item_type_id = $request->item_type_id;
        $item->measurement_id = $request->measurement_id;
        $item->barcode = $request->barcode;
        $item->description = $request->description;
        $item->save();
        return redirect()->route('warehouse.item')->with('success', 'Updated Successfully');
    }
    public function item_destroy($id){
        $ct_camp = Wh_item::find($id);
        $ct_camp->delete();
    }

    // item type
    public function item_type(){
        $item_type = Wh_item_type::all();
        return view('admin.warehouse.item_type.index', compact('item_type'))
        ->with('active','warehouse')
        ->with('sidebar_active', 'warehouse_item_types');
    }
    public function item_type_store(Request $request){
        $v = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $item_type = new Wh_item_type();
        $item_type->title = $request->title;
        $item_type->save();
        return back()->with('success', 'Created Successfully');
    }
    public function item_type_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $item_type = Wh_item_type::find($id);
        $item_type->title = $request->title;
        $item_type->save();
        return redirect()->route('warehouse.item_type')->with('success', 'updated Successfully');
    }
    public function item_type_destroy($id){
        $item_type = Wh_item_type::find($id);
        $item_type->delete();
        return back()->with('success','Deleted Succesfully');
    }
    
    //measurement
    public function measurement(){
        $measurement = Wh_item_measurement::all();
        return view('admin.warehouse.measurement.index', compact('measurement'))
        ->with('active','warehouse')
        ->with('sidebar_active', 'warehouse_measurements');
    }
    public function measurement_store(Request $request){
        $v = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $measurement = new Wh_item_measurement();
        $measurement->title = $request->title;
        $measurement->save();
        return back()->with('success', 'Created Successfully');
    }
    public function measurement_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $measurement = Wh_item_measurement::find($id);
        $measurement->title = $request->title;
        $measurement->save();
        return redirect()->route('warehouse.measurement')->with('success', 'updated Successfully');
    }
    public function measurement_destroy($id){
        $measurement = Wh_item_measurement::find($id);
        $measurement->delete();
        return back()->with('success','Deleted Succesfully');
    }

    //category
    public function category(){
        $category = Wh_category::all();
        return view('admin.warehouse.category.index', compact('category'))
        ->with('active','warehouse')
        ->with('sidebar_active', 'warehouse_categorys');
    }
    public function category_store(Request $request){
        $v = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $category = new Wh_category();
        $category->title = $request->title;
        $category->save();
        return back()->with('success', 'Created Successfully');
    }
    public function category_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $category = Wh_category::find($id);
        $category->title = $request->title;
        $category->save();
        return redirect()->route('warehouse.category')->with('success', 'updated Successfully');
    }
    public function category_destroy($id){
        $category = Wh_category::find($id);
        $category->delete();
        return back()->with('success','Deleted Succesfully');
    }

    // order
    public function order(){
        $order = Wh_order::all();
        return view('admin.warehouse.order.index', compact('order'))
        ->with('active','warehouse')
        ->with('sidebar_active', 'warehouse_orders');
    }
    public function order_create(){
        $company = Zg_company::all();
        $order_user = Zg_user::all();
        $supply_user = Zg_user::where('group_id', 2)->get();
         return view('admin.warehouse.order.create', compact('company','order_user', 'supply_user'))
        ->with('active','warehouse')
        ->with('sidebar_active', 'warehouse_orders');
    }
    public function order_store(Request $request){
        $v = Validator::make($request->all(), [
            'order_num' => 'required|unique:wh_orders',
            'company_id' => 'required',
            'order_user_id' => 'required',
            'supply_user_id' => 'required',
            'order_date' => 'required',
            'supply_date' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $order = new Wh_order();
        $order->order_num = $request->order_num;
        $order->company_id = $request->company_id;
        $order->supply_user_id = $request->supply_user_id;
        $order->order_user_id = $request->order_user_id;
        $order->order_date = date("Y-m-d", strtotime($request->order_date));
        $order->supply_date = date("Y-m-d", strtotime($request->supply_date));
        $order->save();
        return back()->with('success', 'Created Successfully');
    }
    public function order_edit($id){
        $order = Wh_order::find($id);
        $company = Zg_company::all();
        $order_user = Zg_user::all();
        $supply_user = Zg_user::where('group_id', 2)->get();
         return view('admin.warehouse.order.edit', 
         compact('company','order_user', 'supply_user', 'order'))
        ->with('active','warehouse')
        ->with('sidebar_active', 'warehouse_orders');
    }
    public function order_update(Request $request, $id){
        $v = Validator::make($request->all(), [
            'company_id' => 'required',
            'order_user_id' => 'required',
            'supply_user_id' => 'required',
            'order_date' => 'required',
            'supply_date' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $order = Wh_order::find($id);
        $order->order_num = $request->order_num;
        $order->company_id = $request->company_id;
        $order->supply_user_id = $request->supply_user_id;
        $order->order_user_id = $request->order_user_id;
        $order->order_date = date("Y-m-d", strtotime($request->order_date));
        $order->supply_date = date("Y-m-d", strtotime($request->supply_date));
        $order->save();
        return redirect()->route('warehouse.order')->with('success', 'Updated Successfully');
    }
    public function order_destroy($id){
        $order = Wh_order::find($id);
        $order->delete();
        return back()->with('success', 'Deleted Successfully');
    }

    //transaction

    public function transaction_create() {
		$page_title = 'Add Journal';
		$company_list = Zg_company::all();
		$category_list = Wh_category::all();
		return view('admin.warehouse.transaction.create', [
        	'page_title' => $page_title,
        	'company_list' => $company_list,
        	'category_list' => $category_list
        ]) 
        ->with('active','warehouse')
        ->with('sidebar_active', 'warehouse_transaction');
	}
	
	public function transaction_store() {
		if(request('journal_type_id') == 1) {
			if(request('type_id') == 1) {
				//app/helpers.php custom function
				$debit_id = saveDebit(request());
			} else {
				//app/helpers.php custom function
				$credit_id = saveCredit(request());
			}
		} else {
			//app/helpers.php custom function
			$credit_id = saveCredit(request());
			$debit_id = saveFromStorageDebit(request(), $credit_id);
			$credit = Wh_journal::find($credit_id);
			$credit->related_journal_id = $debit_id;
			$credit->save();
		}
		return back();
	}
	
	public function transaction_destroy($id) {
		deleteJournal($id);
		return back();
	}
	
	public function getStorageList(Request $request) {
		$company_id = $request->company_id;
        $storages = Wh_storage::where('company_id',$company_id)->orderBy('title', 'asc')->get();
        return view('admin.warehouse.transaction.ajax_storage_list', [
        	'storages' => $storages
        ]);
	}
	
	public function getItemList(Request $request) {
		$company_id = $request->company_id;
        $items = Wh_item::where('company_id',$company_id)->orderBy('barcode', 'asc')->get();
        return view('admin.warehouse.transaction.ajax_item_list', [
        	'items' => $items
        ]);
	}
	
	public function getJournalTypeList(Request $request) {
		$type_id = $request->type_id;
		if($type_id == 1) {
			$journal_type_list = array(
				1 => "Regular transaction"
			);
		} elseif($type_id == 2) {
			$journal_type_list = array(
				1 => "Regular transaction",
				2 => "Storage to storage transaction"
			);
		}
        return view('admin.warehouse.transaction.ajax_journal_type_list', [
        	'journal_type_list' => $journal_type_list
        ]);
	}
    public function getCustomerList(Request $request) {
		$company_id = $request->company_id;
        $customers = Wh_customer::where('company_id',$company_id)->orderBy('customer_code', 'asc')->get();
        return view('admin.warehouse.transaction.ajax_customer_list', [
        	'customers' => $customers
        ]);
	}
	
	public function geStorageToStorageList(Request $request) {
		$company_id = $request->company_id;
		$journal_type_id = $request->journal_type_id;
		if($journal_type_id > 1) :
        	$storages = Wh_storage::where('company_id',$company_id)->orderBy('title', 'asc')->get();
        	return view('admin.warehouse.transaction.ajax_storage_to_storage_list', [
        		'storages' => $storages
        	]);
        endif;
	}
	
	public function getUnitPrice(Request $request) {
		$item_id = $request->item_id;
		$storage_id = $request->storage_id;
		$date = $request->date;
		$type_id = $request->type_id;
		$previous_item_remain = Wh_item_remain::where('storage_id', '=', $storage_id)->where('item_id', '=', $item_id)->whereDate('date', '<=', $date)->orderBy('date', 'DESC')->first();
        if($type_id == 2) {
			if($previous_item_remain != NULL) {
				return $previous_item_remain['unit_price'];	
			}	
		} else {
			return 'debit';
		}
	}
	
	public function getItemRemain(Request $request) {
		$item_id = $request->item_id;
		$storage_id = $request->storage_id;
		$date = $request->date;
		$type_id = $request->type_id;
		$quantity = $request->quantity;
		if($item_id != NULL && $storage_id != NULL && $date != NULL && $quantity != NULL && $type_id == 2) {
			$previous_item_remain = Wh_item_remain::where('storage_id', '=', $storage_id)->where('item_id', '=', $item_id)->whereDate('date', '<=', $date)->orderBy('date', 'DESC')->first();
        	if($previous_item_remain != NULL && $quantity > 0) {
				$remain = $previous_item_remain['quantity'] - $quantity;
				if($remain >= 0) {
					return $remain;
				} else {
					return 'negative';
				}
			} else {
				return 'negative';
			}
		}
	}
}
