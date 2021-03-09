<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function timeoff(){
        return view('admin.time.timeoff')->with('active', 'timeoff')->with('sidebar_active', 'timeoff');
    }
    public function timesheet(){
        return view('admin.time.timesheet')->with('active', 'timesheet')->with('sidebar_active', 'timesheet');
    }
}
