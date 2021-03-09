<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function employee_list(){
        return view('admin.employee.employee_list')->with('active','employee_list')->with('sidebar_active','employee');
    }
    public function new_employee_createview(){
        return view('admin.employee.new_employee_createview')->with('active','employee_list')->with('sidebar_active','employee');
    }
    public function employee_quick_working(){
        return view('admin.employee.employee_quick_working')->with('active','employee_quick_working')->with('sidebar_active','employee');
    }
    public function employee_recruitment_list(){
        return view('admin.employee.employee_recruitment_list')->with('active','employee_recruitment_list')->with('sidebar_active','employee');
    }
}
