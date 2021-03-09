<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ct_product_category;
use App\Models\Ct_order_category;
use App\Models\Ct_product_material;
use App\Models\Ct_product_order;
use App\Models\Ct_product;
use App\Models\Zg_company;
use App\Models\Zg_user;
use App\Models\Wh_item;
use App\Models\Wh_storage;
use Validator;
class ManufactureController extends Controller
{
    public function material(){
        $material = Ct_product_material::all();
        $item = Wh_item::all();
        $product = Ct_product::all();
        $storage = Wh_storage::all();
        $company = Zg_company::all();
        return view('admin.manufacture.material.index',
        compact('material', 'item', 'product', 'storage', 'company'))
        ->with('active', 'manufacturing')
        ->with('sidebar_active', 'manufacturing_material_list');
    }
    public function material_store(Request $request){
        $v = Validator::make($request->all(),[
            'company_id' => 'required',
            'item_id'=>'required',
            'storage_id'=>'required',
            'product_id'=>'required',
            'quantity' => 'required'
        ]);
        if($v->fails()){
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $material = new Ct_product_material();
        $material->quantity = $request->quantity;
        $material->item_id = $request->item_id;
        $material->company_id = $request->company_id;
        $material->storage_id = $request->storage_id;
        $material->product_id = $request->product_id;
        $material->save();
        return back()->with('success', 'Created Successfully!');
    }
    public function material_update(Request $request, $id){
        $v = Validator::make($request->all(),[
            'company_id' => 'required',
            'item_id'=>'required',
            'product_id'=>'required',
            'storage_id'=>'required',
            'quantity' => 'required'
        ]);
        if($v->fails()){
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $material = Ct_product_material::find($id);
        $material->quantity = $request->quantity;
        $material->item_id = $request->item_id;
        $material->company_id = $request->company_id;
        $material->storage_id = $request->storage_id;
        $material->product_id = $request->product_id;
        $material->save();
        return back()->with('success', 'Updated Successfully!');
    }
    public function material_destroy($id){
        Ct_product_material::find($id)->delete();
        return back()->with('success', 'Deleted Successfully');
    }


    //category
    public function category(){
        $category = Ct_product_category::all();
        $company = Zg_company::all();
        $users = Zg_user::where('group_id', 1)->get();
        return view('admin.manufacture.category.index', compact('category', 'company', 'users'))
            ->with('active', 'manufacturing')
            ->with('sidebar_active','manufacturing_product_category');
    }
    public function category_store(Request $request){
        $v = Validator::make($request->all(),[
            'company_id' => 'required',
            'user_id'=>'required',
            'title' => 'required'
        ]);
        if($v->fails()){
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $category = new Ct_product_category();
        $category->title = $request->title;
        $category->company_id = $request->company_id;
        $category->user_id = $request->user_id;
        $category->save();
        return back()->with('success', 'Created Successfully!');
    }
    public function category_update(Request $request, $id){
        $v = Validator::make($request->all(),[
            'company_id' => 'required',
            'user_id'=>'required',
            'title' => 'required'
        ]);
        if($v->fails()){
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $category = Ct_product_category::find($id);
        $category->title = $request->title;
        $category->company_id = $request->company_id;
        $category->user_id = $request->user_id;
        $category->save();
        return back()->with('success', 'Updated Successfully!');
    }
    public function category_destroy($id){
        Ct_product_category::find($id)->delete();
        return back()->with('success', 'Deleted Successfully');
    }

    // product
    public function product(){
        $product = Ct_product::all();
        $category = Ct_product_category::all();
        $company = Zg_company::all();
        $users = Zg_user::where('group_id', 1)->get();
        return view('admin.manufacture.product.index', compact('product', 'company', 'users','category'))
            ->with('active', 'manufacturing')
            ->with('sidebar_active','manufacturing_products');
    }
    public function product_store(Request $request){
        $v = Validator::make($request->all(),[
            'company_id' => 'required',
            'user_id'=>'required',
            'product_code'=>'required',
            'category_id'=>'required',
            'title' => 'required'
        ]);
        if($v->fails()){
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $product = new Ct_product();
        $product->product_code = $request->product_code;
        $product->title = $request->title;
        $product->company_id = $request->company_id;
        $product->user_id = $request->user_id;
        $product->category_id = $request->category_id;
        $product->save();
        return back()->with('success', 'Created Successfully!');
    }
    public function product_update(Request $request, $id){
        $v = Validator::make($request->all(),[
            'company_id' => 'required',
            'category_id' => 'required',
            'user_id'=>'required',
            'product_code'=>'required',
            'title' => 'required'
        ]);
        if($v->fails()){
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $product = Ct_product::find($id);
        $product->product_code = $request->product_code;
        $product->title = $request->title;
        $product->company_id = $request->company_id;
        $product->user_id = $request->user_id;
        $product->category_id = $request->category_id;
        $product->save();
        return back()->with('success', 'Updated Successfully!');
    }
    public function product_destroy($id){
        Ct_product::find($id)->delete();
        return back()->with('success', 'Deleted Successfully');
    }


    // order category
    public function order_category(){
        $order_category = Ct_order_category::all();
        $users = Zg_user::where('group_id', 1)->get();
        return view('admin.manufacture.order_category.index', compact('order_category', 'users',))
            ->with('active', 'manufacturing')
            ->with('sidebar_active','manufacturing_order_category');
    }
    public function order_category_store(Request $request){
        $v = Validator::make($request->all(),[
            'user_id'=>'required',
            'title' => 'required'
        ]);
        if($v->fails()){
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $order_category = new Ct_order_category();
        $order_category->title = $request->title;
        $order_category->user_id = $request->user_id;
        $order_category->save();
        return back()->with('success', 'Created Successfully!');
    }
    public function order_category_update(Request $request, $id){
        $v = Validator::make($request->all(),[
            'user_id'=>'required',
            'title' => 'required'
        ]);
        if($v->fails()){
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $order_category = Ct_order_category::find($id);
        $order_category->title = $request->title;
        $order_category->user_id = $request->user_id;
        $order_category->save();
        return back()->with('success', 'Updated Successfully!');
    }
    public function order_category_destroy($id){
        Ct_order_category::find($id)->delete();
        return back()->with('success', 'Deleted Successfully');
    }

    // product order
    public function product_order(){
        $product_order = Ct_product_order::all();
        return view('admin.manufacture.product_order.index', compact('product_order',))
            ->with('active', 'manufacturing')
            ->with('sidebar_active','manufacturing_order_category');
    }
    public function product_order_create(){
        $product_order = Ct_product_order::all();
        $category = Ct_order_category::all();
        
        return view('admin.manufacture.product_order.create', compact('product_order',))
            ->with('active', 'manufacturing')
            ->with('sidebar_active','manufacturing_order_category');
    }
    public function product_order_store(){
        $product_order = Ct_product_order::all();
        return view('admin.manufacture.product_order.index', compact('product_order',))
            ->with('active', 'manufacturing')
            ->with('sidebar_active','manufacturing_order_category');
    }
    public function product_order_edit(){
        $product_order = Ct_product_order::all();
        return view('admin.manufacture.product_order.index', compact('product_order',))
            ->with('active', 'manufacturing')
            ->with('sidebar_active','manufacturing_order_category');
    }
    public function product_order_update(){
        $product_order = Ct_product_order::all();
        return view('admin.manufacture.product_order.index', compact('product_order',))
            ->with('active', 'manufacturing')
            ->with('sidebar_active','manufacturing_order_category');
    }
    public function product_order_destroy(){
        
    }
}
