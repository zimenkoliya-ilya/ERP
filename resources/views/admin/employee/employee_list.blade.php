@extends('standard.layout')

@section('title', 'employee list')

@section('content')  
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{$message}}</strong> 
    </div>
@endif

@if ($message = Session::get('destroy'))
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{$message}}</strong> 
    </div>
@endif
@if (count($errors) > 0)
    <div class = "alert alert-danger fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
        <!-- BEGIN: General Report -->
        <div class="col-span-12 mt-8">
            <div class="intro-y flex items-center h-10">
                <h3>
                    Employee List
                </h3>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-1">
                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                    <div class="zoom-in">
                        <div class="box p-4">
                            <div class="flex">
                                <span class="text-3xl font-bold leading-8">{{$working_employee}}</span>
                                <div class="ml-auto">
                                    <button style="width:60px" class="button button--sm w-200 mb-0 bg-theme-9 text-white">
                                        {{$working_percent}}
                                        <svg xmlns="http://www.w3.org/2000/svg" style="float:right;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                    </button>
                                </div>
                            </div>
                            <div class="text-gray-600 mt-1">Working This Month</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                    <div class="zoom-in">
                        <div class="box p-4">
                            <div class="flex">
                                <span class="text-3xl font-bold leading-8">{{$rost_time}}</span>
                                <div class="ml-auto">
                                    <button style="width:60px" class="button button--sm w-200 mb-0 bg-theme-9 text-white">
                                        {{number_format($rost_time/$total_employee*100,1)}}
                                        <svg xmlns="http://www.w3.org/2000/svg" style="float:right;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                    </button>
                                </div>
                            </div>
                            <div class="text-gray-600 mt-1">On Rost Time Off</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                    <div class="zoom-in">
                        <div class="box p-4">
                            <div class="flex">
                                <span class="text-3xl font-bold leading-8">{{$leave_time}}</span>
                                <div class="ml-auto">
                                    <button style="width:60px" class="button button--sm w-200 mb-0 bg-theme-9 text-white">
                                        {{number_format($leave_time/$total_employee*100,1)}}
                                        <svg xmlns="http://www.w3.org/2000/svg" style="float:right;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                    </button>
                                </div>
                            </div>
                            <div class="text-gray-600 mt-1">On Long Term Leave</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                    <div class="zoom-in">
                        <div class="box p-4">
                            <div class="flex">
                                <span class="text-3xl font-bold leading-8">{{$new_emp}}</span>
                                <div class="ml-auto">
                                    <button style="width:60px" class="button button--sm w-200 mb-0 bg-theme-9 text-white">
                                        {{number_format($new_emp/$total_employee*100,1)}}
                                        <svg xmlns="http://www.w3.org/2000/svg" style="float:right;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                    </button>
                                </div>
                            </div>
                            <div class="text-gray-600 mt-1">New Employee</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                    <div class="zoom-in">
                        <div class="box p-4">
                            <div class="flex">
                                <span class="text-3xl font-bold leading-8">{{$fired_emp}}</span>
                                <div class="ml-auto">
                                    <button style="width:60px" class="button button--sm w-200 mb-0 bg-theme-9 text-white">
                                        {{number_format($fired_emp/$total_employee*100,1)}}
                                        <svg xmlns="http://www.w3.org/2000/svg" style="float:right;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                    </button>
                                </div>
                            </div>
                            <div class="text-gray-600 mt-1">Fired/Quit This Month</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="{{route('employee.search')}}" method="get">
    @csrf
    <div class="grid grid-cols-12 gap-6 mt-1">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="w-full sm:w-auto mt-0 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input name="username" type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                    <svg id="text_search" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> 
                </div>
            </div>
            <div class="w-full sm:w-auto mt-0 sm:mt-0 sm:ml-auto md:ml-0 ml-3">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input  name="start_date" class="datepicker input w-56 block mx-auto" data-single-mode="true" style="width:100%;" value="Job Position Start Date" placeholder="Job Position Start Date">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><line x1="17" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="17" y1="18" x2="3" y2="18"></line></svg>
                </div>
            </div>
            <div class="w-full sm:w-auto mt-0 sm:mt-0 sm:ml-auto md:ml-0 ml-3">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input name="end_date" class="datepicker input w-56 block mx-auto" data-single-mode="true" style="width:100%;" value="Job Position Start Date" placeholder="Job Position End Date">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><line x1="17" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="17" y1="18" x2="3" y2="18"></line></svg>
                </div>
            </div>
            <div class="w-full sm:w-auto mt-0 sm:mt-0 sm:ml-auto md:ml-0 ml-3">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <button type="submit" type="submit" class="button w-20 bg-theme-9 dark:text-gray-300" style="width:100%;">Search</button> 
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-1">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="w-56 text-gray-600" >
                <select name="company" data-search="true" class="w-56 tail-select w-full" name="company_id" style="width:140px !important;">
                    <option value="">Select Company</option>
                    @foreach($company as $temp)
                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                    @endforeach
                </select> 
            </div>
            <div class="w-56 text-gray-600 ml-3" >
                <select name="project" data-search="true" class="w-56 tail-select w-full" name="company_id" style="width:140px !important;">
                    <option value="">Select Project</option>
                    @foreach($project as $temp)
                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                    @endforeach
                </select> 
            </div>
            <div class="w-56 text-gray-600 ml-3" >
                <select name="department" data-search="true" class="w-56 tail-select w-full" name="company_id" style="width:140px !important;">
                    <option value="">Select Department</option>
                    @foreach($department as $temp)
                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                    @endforeach
                </select> 
            </div>
            <div class="w-56 text-gray-600 ml-3" >
                <select name="position" data-search="true" class="w-56 tail-select w-full" name="company_id" style="width:140px !important;">
                    <option value="">Select Position</option>
                    @foreach($position as $temp)
                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                    @endforeach
                </select> 
            </div>
        </div>
    </div>
</form>
<div class="layout-px-spacing mt-5">
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>{{trans('employee.employee_name')}}</th>
                                <th>{{trans('employee.position')}}</th>
                                <th>{{trans('employee.timeoff')}}</th>
                                <th style="width:10%;">{{trans('employee.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0;?>
                            @foreach($employee as $temp)
                                <?php $i++;?>
                                <tr>
                                    <td>
                                        <div class="m-auto items-center">
                                                <img  alt="avatar" class="items-center rounded-circle" src="{{ asset($temp->image)}}" style="width:80px; height:80px; margin:auto;">
                                        </div>
                                        <div style="width:135px; margin:auto;" class="rounded-md items-center mt-2 px-0 py-1 mb-0 bg-theme-9 text-white">
                                            <div class="text-xs text-center">
                                                {{$temp->position_type->title}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            <a href="{{ route('employee_list.view',$temp->id)}}" class="flex items-center text-theme-1 mr-3"> 
                                                <h6>{{$temp->first_name}}(№ {{$temp->id}})</h6>
                                            </a>
                                        </div> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            {{$temp->interested_position->title}}
                                        </div> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            {{$temp->company->title}}
                                        </div> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            {{$temp->registration_num}}
                                        </div> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            {{$temp->phone}}
                                        </div> 
                                    </td>
                                    <td>
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Salary: {{$temp->salary($temp->id)}}₮  
                                            @php 
                                                $state = $temp->increase($temp->id);
                                                if($state>0){
                                                    $class = "bg-theme-9";
                                                    $status = 'increase +';
                                                }elseif($state<0){
                                                    $class = "bg-theme-6";
                                                    $status = 'decrease';
                                                }else{
                                                    $class = "bg-theme-12";
                                                    $status = '';
                                                }
                                            @endphp
                                            <span>
                                                <button class="button button--sm w-40 ml-5 pr-3 pl-3 mb-0 {{$class}} text-white">
                                                {{$status}} {{$state}}
                                                </button>
                                                
                                            <span>
                                        </div> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Date of Appointment: {{date("Y-m-d",strtotime($temp->created_at))}}
                                        </div>            
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Agreement №: {{$temp->contract($temp->id)}}
                                        </div>           
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Id Card №: {{$temp->barcode}}
                                        </div> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Project: {{$temp->project->title}}
                                        </div>                   
                                    </td>
                                    <td>
                                        @if($temp->timeoff_active($temp->id)==1)
                                            <div class="rounded-md items-center px-5 py-1 mb-0 bg-theme-9 text-white">
                                                <div class="text-xs text-center">
                                                    Working
                                                </div>
                                            </div>
                                            <div class="rounded-md items-center px-5 py-1 mb-2 bg-gray-200 text-gray">
                                                <div class="text-xs text-center mt-3">
                                                    Shift started: <span style="color:black;">{{$temp->timeoff($temp->id)}}</span>
                                                </div>
                                                <div class="text-xs text-center">
                                                    Days: <span style="color:black;">{{$temp->remain_date($temp->id, 1)}} days</span>
                                                </div>
                                                <div class="flex justify-center items-center mt-4">
                                                    <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview{{$i}}">
                                                        <button class="button button--sm w-100 pr-3 pl-3 mb-0 bg-theme-9 text-white">Start Time Off</button>
                                                    </a>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="modal" id="header-footer-modal-preview{{$i}}">
                                                <div class="modal__content" style="width:50%;">
                                                    <div class="flex items-center px-5 py-3 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                                        <h2 class="font-medium text-base mr-auto">Add TIme Off</h2>
                                                    </div>
                                                    <form action="{{route('employee_list.timeoff_add', $temp->id)}}" method="post">
                                                        @csrf
                                                        <div class="p-5 grid grid-cols-12 gap-4 gap-y-3">
                                                            <div class="col-span-12 sm:col-span-6"> 
                                                                <label>From</label> 
                                                                <input  name="from_date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
                                                            </div>
                                                            <div class="col-span-12 sm:col-span-6"> 
                                                                <label>To</label> 
                                                                <input  name="to_date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
                                                            </div>
                                                            <div class="col-span-12 sm:col-span-6"> 
                                                                <label>TimeOff Type</label> 
                                                                <select data-search="true" class="tail-select w-full" name="timeoff_type" style="width:100%;">
                                                                    @foreach($hr_timeoff_type as $tempp)
                                                                        <option value="{{$tempp->id}}">{{$tempp->title}}</option>
                                                                    @endforeach
                                                                </select> 
                                                            </div>
                                                            <div class="col-span-12 sm:col-span-12"> 
                                                                <label>Description</label> 
                                                                <div class="form-group">
                                                                    <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> 
                                                            <button type="submit" class="button w-20 bg-theme-1 text-white">Update</button> 
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @else
                                            
                                            <div class="rounded-md items-center px-5 py-1 mb-0 bg-gray-600 text-white">
                                                <div class="text-xs text-center">
                                                    {{$temp->timeoff_type($temp->id)}}
                                                </div>
                                            </div>
                                            <div class="rounded-md items-center px-5 py-1 mb-2 bg-gray-200 text-gray">
                                                <div class="text-xs text-center mt-3">
                                                    Start: <span style="color:black;">{{$temp->timeoff($temp->id)}}</span>
                                                </div>
                                                <div class="text-xs text-center">
                                                    End: <span style="color:black;">{{$temp->timeoff_end($temp->id)}}</span>
                                                </div>
                                                <div class="text-xs text-center">
                                                    Reason: <span style="color:black;">{{$temp->timeoff_type($temp->id)}}</span>
                                                </div>
                                                <div class="text-xs text-center">
                                                    days: <span style="color:black;">{{$temp->remain_date($temp->id, 0)}} days</span>
                                                </div>
                                                <div class="flex justify-center items-center mt-1">
                                                    <a class="flex items-center text-theme-6" href="javascript:;"  data-toggle="modal" data-target="#header-footer-modal-preview{{$i}}">
                                                        <button style="width:120px;" class="button button--sm mb-0 bg-theme-6 text-white">End Time Off</button>
                                                    </a>
                                                    <a class="flex items-center text-theme-6" href="javascript:;"  data-toggle="modal" data-target="#timeoff_extend{{$i}}">
                                                        <button class="button button--sm  mb-0 bg-theme-6 text-white ml-3" style="width:120px;">Extend Time Off</button>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="modal" id="header-footer-modal-preview{{$i}}">
                                                <div class="modal__content" style="width:50%;">
                                                    <div class="flex items-center px-5 py-3 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                                        
                                                        <h2 class="font-medium text-base mr-auto">Add TIme Off Ended</h2>
                                                    </div>
                                                    <form action="{{route('employee_list.timeoff_update', $temp->id)}}" method="post">
                                                        @csrf
                                                        <div class="p-5 grid grid-cols-12 gap-4 gap-y-3">
                                                            <div class="col-span-12 sm:col-span-6"> 
                                                                <label>Ended Date</label> 
                                                                <input  name="timeoff_end" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
                                                            </div>
                                                            <div class="col-span-12 sm:col-span-6"> 
                                                                <label>TimeOff Type</label> 
                                                                <select data-search="true" class="tail-select w-full" name="timeoff_type" style="width:100%;">
                                                                    @foreach($hr_timeoff_type as $tempp)
                                                                        <option value="{{$tempp->id}}">{{$tempp->title}}</option>
                                                                    @endforeach
                                                                </select> 
                                                            </div>
                                                            <div class="col-span-12 sm:col-span-12"> 
                                                                <label>Description</label> 
                                                                <div class="form-group">
                                                                    <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> 
                                                            <button type="submit" class="button w-20 bg-theme-1 text-white">Update</button> 
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="modal" id="timeoff_extend{{$i}}">
                                                <div class="modal__content" style="width:50%;">
                                                    <div class="flex items-center px-5 py-3 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                                        <h2 class="font-medium text-base mr-auto">Add Extended TIme Off</h2>
                                                    </div>
                                                    <form action="{{route('employee_list.timeoff_extend', $temp->id)}}" method="post">
                                                        @csrf
                                                        <div class="p-5 grid grid-cols-12 gap-4 gap-y-3">
                                                            <div class="col-span-12 sm:col-span-6"> 
                                                                <label>Extended Date</label> 
                                                                <input  name="timeoff_end" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
                                                            </div>
                                                            <div class="col-span-12 sm:col-span-6"> 
                                                                <label>TimeOff Type</label> 
                                                                <select data-search="true" class="tail-select w-full" name="timeoff_type" style="width:100%;">
                                                                    @foreach($hr_timeoff_type as $tempp)
                                                                        <option value="{{$tempp->id}}">{{$tempp->title}}</option>
                                                                    @endforeach
                                                                </select> 
                                                            </div>
                                                            <div class="col-span-12 sm:col-span-12"> 
                                                                <label>Description</label> 
                                                                <div class="form-group">
                                                                    <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> 
                                                            <button type="submit" class="button w-20 bg-theme-1 text-white">Update</button> 
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex justify-center items-center">
                                            <a href="{{ route('employee_list.edit',$temp->id)}}" class="flex items-center text-theme-1 mr-3" href="javascript:;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('script')
    <script>
        function delete_check(e){
            
            var delete_item = document.getElementsByClassName("delete_item");
            var i = 0;
            if(e.checked==true){
                for(i=0;i<delete_item.length;i++){
                    delete_item[i].checked =true;
                    console.log(delete_item[i].checked);
                }
            }else{
                for(i=0;i<delete_item.length;i++){
                    delete_item[i].checked =false;
                    console.log(delete_item[i].checked);
                }                
            }
           
        }
    </script>
@endsection