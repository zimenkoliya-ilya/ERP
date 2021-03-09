@extends('standard.layout')

@section('title', 'Edit employee')

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

                <div class="intro-y flex items-center mt-8">
                    <h5 class="text-2xl text-theme-9 font-medium leading-none">{{ trans('employee.edit_employee')}}</h5>
                </div>
                <!-- this is dashboard  -->
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
                        <div class="intro-y box mt-5">
                            <div class="relative flex items-center p-3">
                                <img src="{{ asset($employee->image)}}" style="width:150px; height:150px; border-radius:50%; " />
                                <div class="ml-4 mr-auto">
                                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{$employee->first_name}} {{$employee->last_name}}</div>
                                    <div class="text-gray-600 ">{{$employee->interested_position->title}}</div>
                                </div>
                            </div>
                            <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                                <a id="personal_info" class="flex items-center text-theme-1 dark:text-theme-10 font-medium" href="#"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity w-4 h-4 mr-2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg> 
                                    Personal Information 
                                </a>
                                <a id= "relative_info" class="flex items-center mt-5" href="#"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box w-4 h-4 mr-2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg> 
                                    Relative Information 
                                </a>
                            </div>
                        </div>
                    </div>

                    <div id="personal" class="col-span-12 lg:col-span-8 xxl:col-span-9">
                        <div class="intro-y box lg:mt-5 mt-5">
                            <form action="{{route('employee_list.update', $employee->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="intro-y box px-2 pt-2 mt-1">
                                    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-1 -mx-5">
                                        <div class="flex  lg:justify-start pl-5">
                                            <div class="col-span-12 sm:col-span-4 xl:col-span-3 flex flex-col items-center">
                                                <div class="upload mt-4 pr-md-4" style="width:200px; border-round:50%;">
                                                    <input type="file" id="input-file-max-fs" name = "image" class="dropify img-circle" data-default-file="{{asset($employee->image)}}" data-max-file-size="5M" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="lg:mt-0 flex-1 dark:text-gray-300 lg:pt-0 pr-3">
                                            <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 mt-4">
                                                <div class="col-span-6 sm:col-span-6 xl:col-span-4 flex flex-col justify-end items-center">
                                                    <label>{{ trans('employee.first_name')}}</label>
                                                    <input type="text" name="first_name" value="{{ $employee->first_name}}" class="input w-full border mt-2" placeholder="First Name">
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 xl:col-span-4 flex flex-col justify-end items-center">
                                                    <label>{{ trans('employee.middle_name')}}</label>
                                                    <input type="text" name="middle_name" value="{{ $employee->middle_name}}" class="input w-full border mt-2" placeholder="Middle Name">
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 xl:col-span-4 flex flex-col justify-end items-center">
                                                    <label>{{ trans('employee.last_name')}}</label>
                                                    <input type="text" name="last_name" value="{{$employee->last_name}}" class="input w-full border mt-2" placeholder="Last Name">
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 xl:col-span-4 flex flex-col justify-end items-center">
                                                    <label>{{ trans('employee.company')}}</label>
                                                    <select data-search="true" class="tail-select w-full" name="company_id" style="width:100%;">
                                                        @foreach($zg_company as $temp)
                                                            @if($employee->company_id==$temp->id)
                                                                <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                                            @else
                                                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select> 
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 xl:col-span-4 flex flex-col justify-end items-center">
                                                    <label>{{ trans('employee.interested_position')}}</label>
                                                    <select data-search="true" class="tail-select w-full" name="interested_position_id" style="width:100%;">
                                                        @foreach($hr_position as $temp)
                                                            @if($employee->interested_position_id==$temp->id)
                                                                <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                                            @else
                                                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 xl:col-span-4 flex flex-col justify-end items-center">
                                                    <label>{{ trans('employee.position_type')}}</label>
                                                    <select data-search="true" class="tail-select w-full" name="position_type_id" style="width:100%;">
                                                        @foreach($hr_position_type as $temp)
                                                            @if($employee->position_type_id==$temp->id)
                                                                <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                                            @else
                                                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select> 
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 xl:col-span-4 flex flex-col justify-end items-center">
                                                    <label>Project</label>
                                                    <select data-search="true" class="tail-select w-full" name="project_id" style="width:100%;">
                                                        @foreach($zg_project as $temp)
                                                            @if($employee->project_id==$temp->id)
                                                                <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                                            @else
                                                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select> 
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 xl:col-span-4 flex flex-col justify-end items-center">
                                                    <label>Employee Schedule</label>
                                                    <select data-search="true" class="tail-select w-full" name="employee_schedule_id" style="width:100%;">
                                                        @if($hr_history->schedule_id !==null)
                                                            @foreach($hr_employee_schedule as $temp)
                                                                @if($hr_history->schedule_id==$temp->id)
                                                                    <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                                                @else
                                                                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            @foreach($hr_employee_schedule as $temp)
                                                            <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select> 
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 xl:col-span-4 flex flex-col justify-end items-center">
                                                    <label>{{ trans('employee.phone')}}</label>
                                                    <input type="text" name="phone" value="{{$employee->phone}}" class="input w-full border mt-2" placeholder="Phone">
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 xl:col-span-4 flex flex-col justify-end items-center">
                                                    <label>{{ trans('employee.email')}}</label>
                                                    <input type="text" name="email" value="{{$employee->email}}" class="input w-full border mt-2" placeholder="Email">
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 xl:col-span-4 flex flex-col justify-end items-center">
                                                    <label>{{ trans('employee.bank_account')}}</label>
                                                    <select data-search="true" class="tail-select w-full" name="bank_account_id" style="width:100%;">
                                                        @foreach($hr_bank as $temp)
                                                            @if($employee->bank_account_id==$temp->id)
                                                                <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                                            @else
                                                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 xl:col-span-4 flex flex-col justify-end items-center">
                                                    <label>{{ trans('employee.bank_account_number')}}</label>
                                                    <input type="text" name="bank_account_number" value="{{$employee->bank->account_number}}" class="input w-full border mt-2" placeholder="Additional Info">
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 xl:col-span-4 flex flex-col justify-end items-center">
                                                    <label>History Type</label>
                                                    <select data-search="true" class="tail-select w-full" name="history_type_id" style="width:100%;">
                                                        @foreach($hr_history_type as $temp)
                                                            @if($hr_history->type_id==$temp->id)
                                                                <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                                            @else
                                                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 xl:col-span-4 flex flex-col justify-end items-center">
                                                    <label>History Status</label>
                                                    <select data-search="true" class="tail-select w-full" name="history_status_id" style="width:100%;">
                                                        @foreach($hr_history_status as $temp)
                                                            @if($hr_history->history_status_id==$temp->id)
                                                                <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                                            @else
                                                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 xl:col-span-12 flex flex-col justify-end items-center">
                                                    <label>{{ trans('employee.address')}}</label>
                                                    <input type="text" name="address" value="{{$employee->address}}" class="input w-full border mt-2" placeholder="Address">
                                                </div>
                                                <div class="col-span-12 sm:col-span-12 xl:col-span-12 flex flex-col justify-end">
                                                    <label>Description</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="5" id="comment" name="discription">{{($hr_history->description)?$hr_history->description:''}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-span-12 sm:col-span-12 xl:col-span-12">
                                                    <button type="submit" class="button w-24 mr-1 mb-2 bg-theme-9 text-white" style="float:right;">{{ trans('employee.submit')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- BEGIN: Top Categories -->
                        <div class="intro-y box lg:mt-5">
                            <div class="flex items-center p-3 ml-3 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">
                                    Contracts
                                </h2>
                                <div class="dropdown ml-auto">
                                    <a href="#" data-toggle="modal" data-target="#new_contract" class="button w-30 inline-block mr-1 mb-2 bg-theme-1 text-white">Add New Contract</a>
                                </div>
                                <div class="modal" id="new_contract">
                                    <div class="modal__content" style="width:50%;">
                                        <div class="flex items-center px-5 py-4 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                            <h2 class="font-medium text-base mr-auto text-theme-1">Executive director desicions for this employee </h2>
                                        </div>
                                        <form action="{{route('employee_list_edit.create_contract', $employee->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="p-5 grid grid-cols-12 gap-4 gap-y-3">
                                                <div class="col-span-12 sm:col-span-6"> 
                                                    <label>Contract#</label> 
                                                    <input type="text" name="contract_num" class="input w-full border mt-2" placeholder="Decistion"> 
                                                </div> 
                                                <div class="col-span-12 sm:col-span-6"> 
                                                    <label>Company</label> 
                                                    <select data-search="true" class="tail-select w-full" name="company_id" style="width:100%;">
                                                        @foreach($zg_company as $tempp)
                                                            <option value="{{$tempp->id}}">{{$tempp->title}}</option>
                                                        @endforeach
                                                    </select> 
                                                </div>
                                                <div class="col-span-12 sm:col-span-6"> 
                                                    <label>Start Date</label> 
                                                    <input  name="start_date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
                                                </div>
                                                <div class="col-span-12 sm:col-span-6"> 
                                                    <label>End Date</label> 
                                                    <input  name="end_date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
                                                </div>
                                                <div class="col-span-12 sm:col-span-6"> 
                                                    <label>Status</label> 
                                                    <select data-search="true" class="tail-select w-full" name="active" style="width:100%;">
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select> 
                                                </div>
                                                <div class="col-span-12 sm:col-span-6"> 
                                                    <label>Extension</label> 
                                                    <select data-search="true" class="tail-select w-full" name="extension" style="width:100%;">
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select> 
                                                </div>
                                                <div class="col-span-12 sm:col-span-6"> 
                                                    <label>Manager</label> 
                                                    <select data-search="true" class="tail-select w-full" name="manager" style="width:100%;">
                                                        @foreach($zg_user_manager as $tempp)
                                                            <option value="{{$tempp->id}}">{{$tempp->username}}</option>
                                                        @endforeach
                                                    </select> 
                                                </div>    
                                                <div class="col-span-12 sm:col-span-6"> 
                                                    <label>File</label> 
                                                    <input  name="file" class="input w-56 border block mx-auto" type="file" style="width:100%;">
                                                </div>   
                                            </div>
                                            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> 
                                                <button type="submit" class="button w-20 bg-theme-1 text-white">Submit</button> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">contract#</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">company</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">start date</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">end date</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">status</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">extended</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Hr Manerger</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="contract">
                                                @php $i=0; @endphp
                                                @foreach($hr_contract_employee as $temp)
                                                    <tr>
                                                        <td class="border-b dark:border-dark-5">
                                                            {{$temp->contract_num}}
                                                        </td>
                                                        <td class="border-b dark:border-dark-5">
                                                            {{$temp->company->title}}
                                                        </td>
                                                        <td class="border-b dark:border-dark-5">
                                                            {{$temp->start_date}}
                                                        </td>
                                                        <td class="border-b dark:border-dark-5">
                                                            {{$temp->end_date}}
                                                        </td>
                                                        <td class="border-b dark:border-dark-5">
                                                            @if($temp->active==1)
                                                                <div class="col-span-6 sm:col-span-3 lg:col-span-2 xl:col-span-1 text-theme-9">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun mx-auto"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg> 
                                                                </div>
                                                            @else
                                                                <div class="col-span-6 sm:col-span-3 lg:col-span-2 xl:col-span-1 text-theme-6">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun mx-auto"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg> 
                                                                </div>
                                                            @endif
                                                        </td>
                                                        <td class="border-b dark:border-dark-5">
                                                            @if($temp->extension==1)
                                                                <input type="button"  class="button w-35 mr-1 mb-2 bg-theme-9 text-white" value="Yes">
                                                            @else
                                                                <input type="button"  class="button w-35 mr-1 mb-2 bg-theme-6 text-white" value="No">
                                                            @endif
                                                        </td>
                                                        <td class="border-b dark:border-dark-5">
                                                            {{$temp->user->username}}
                                                        </td>
                                                        <td class="border-b dark:border-dark-5">
                                                            <div class="flex justify-center items-center">
                                                                <a href="#" data-toggle="modal" data-target="#contract{{$i}}" class="flex items-center text-theme-9 mr-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> 
                                                                </a>
                                                                <a href="#" onclick="delete_contract(this,{{$temp->id}})" class="flex items-center text-theme-6 mr-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mx-auto"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                </a>
                                                            </div>
                                                            <div class="modal" id="contract{{$i}}">
                                                                <div class="modal__content" style="width:50%;">
                                                                    <div class="flex items-center px-5 py-4 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                                                        <h2 class="font-medium text-base mr-auto text-theme-1">Executive director desicions for this employee </h2>
                                                                    </div>
                                                                    <form action="{{route('employee_list_edit.edit_contract', $temp->id)}}" method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="p-5 grid grid-cols-12 gap-4 gap-y-3">
                                                                            <div class="col-span-12 sm:col-span-6"> 
                                                                                <label>Contract#</label> 
                                                                                <input type="text" value="{{$temp->contract_num}}" name="contract_num" class="input w-full border mt-2" placeholder="Decistion"> 
                                                                            </div> 
                                                                            <div class="col-span-12 sm:col-span-6"> 
                                                                                <label>Company</label> 
                                                                                <select data-search="true" class="tail-select w-full" name="company_id" style="width:100%;">
                                                                                    @foreach($zg_company as $tempp)
                                                                                        @if($temp->company_id == $tempp->id)
                                                                                        <option value="{{$tempp->id}}" selected>{{$tempp->title}}</option>
                                                                                        @else
                                                                                        <option value="{{$tempp->id}}">{{$tempp->title}}</option>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </select> 
                                                                            </div>
                                                                            <div class="col-span-12 sm:col-span-6"> 
                                                                                <label>Start Date</label> 
                                                                                <input  name="start_date" value="{{$temp->start_date}}" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
                                                                            </div>
                                                                            <div class="col-span-12 sm:col-span-6"> 
                                                                                <label>End Date</label> 
                                                                                <input  name="end_date" value="{{$temp->end_date}}" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
                                                                            </div>
                                                                            <div class="col-span-12 sm:col-span-6"> 
                                                                                <label>Status</label> 
                                                                                <select data-search="true" class="tail-select w-full" name="active" style="width:100%;">
                                                                                    @if($temp->active == 1)
                                                                                    <option value="1" selected>Yes</option>
                                                                                    @else
                                                                                    <option value="1">Yes</option>
                                                                                    @endif
                                                                                    @if($temp->active == 0)
                                                                                    <option value="0" selected>No</option>
                                                                                    @else
                                                                                    <option value="0">No</option>
                                                                                    @endif
                                                                                </select> 
                                                                            </div>
                                                                            <div class="col-span-12 sm:col-span-6"> 
                                                                                <label>Extension</label> 
                                                                                <select data-search="true" class="tail-select w-full" name="extension" style="width:100%;">
                                                                                    @if($temp->extension == 1)
                                                                                        <option value="1" selected>Yes</option>
                                                                                    @else
                                                                                        <option value="1">Yes</option>
                                                                                    @endif
                                                                                    @if($temp->extension == 0)
                                                                                        <option value="0" selected>No</option>
                                                                                    @else
                                                                                        <option value="0">No</option>
                                                                                    @endif
                                                                                </select> 
                                                                            </div>
                                                                            <div class="col-span-12 sm:col-span-6"> 
                                                                                <label>Manager</label> 
                                                                                <select data-search="true" class="tail-select w-full" name="manager" style="width:100%;">
                                                                                    @foreach($zg_user_manager as $tempp)
                                                                                        @if($temp->user_id)
                                                                                        <option value="{{$tempp->id}}" selected>{{$tempp->username}}</option>
                                                                                        @else
                                                                                        <option value="{{$tempp->id}}">{{$tempp->username}}</option>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </select> 
                                                                            </div>     
                                                                            <div class="col-span-12 sm:col-span-6"> 
                                                                                <label>File</label> 
                                                                                <input  name="file" class="input w-56 border block mx-auto" type="file" style="width:100%;">
                                                                            </div>   
                                                                        </div>
                                                                        <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> 
                                                                            <button type="submit" class="button w-20 bg-theme-1 text-white">Submit</button> 
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>  
                                                    </tr>
                                                    @php $i++; @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Top Categories -->
                        <!-- BEGIN: executive decision -->
                        <div class="intro-y box lg:mt-5">
                            <div class="flex items-center p-3 ml-3 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">
                                    Executive director desicions for this employee
                                </h2>
                                <div class="dropdown ml-auto">
                                    <a href="#" data-toggle="modal" data-target="#new_decision" class="button w-30 inline-block mr-1 mb-2 bg-theme-1 text-white">Add New</a>
                                </div>
                                <div class="modal" id="new_decision">
                                    <div class="modal__content" style="width:50%;">
                                        <div class="flex items-center px-5 py-4 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                            <h2 class="font-medium text-base mr-auto text-theme-1">Executive director desicions for this employee </h2>
                                        </div>
                                        <form action="{{route('employee_list_edit.create_decision', $hr_history->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="p-5 grid grid-cols-12 gap-4 gap-y-3">
                                                <div class="col-span-12 sm:col-span-6"> 
                                                    <label>Date</label> 
                                                    <input  name="date" value="{{old('date')}}" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
                                                </div>
                                                <div class="col-span-12 sm:col-span-6"> 
                                                    <label>Decision Type</label> 
                                                    <select data-search="true" class="tail-select w-full" name="type_id" style="width:100%;">
                                                        @foreach($hr_order_type as $tempp)
                                                            <option value="{{$tempp->id}}">{{$tempp->title}}</option>
                                                        @endforeach
                                                    </select> 
                                                </div>
                                                <div class="col-span-12 sm:col-span-6"> 
                                                    <label>Manager</label> 
                                                    <select data-search="true" class="tail-select w-full" name="user_id" style="width:100%;">
                                                        @foreach($zg_user_manager as $tempp)
                                                            <option value="{{$tempp->id}}">{{$tempp->username}}</option>
                                                        @endforeach
                                                    </select> 
                                                </div>                        
                                                <div class="col-span-12 sm:col-span-6"> 
                                                    <label>File</label> 
                                                    <input name="file" value="{{ old('file')}}" type="file" class="input w-full border mt-2" placeholder="Decistion"> 
                                                </div> 
                                            </div>
                                            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> 
                                                <button type="submit" class="button w-20 bg-theme-1 text-white">Submit</button> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">decision#</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">company</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">date</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">decision type</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">manager</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="decision_executive">
                                                @php $i=0; @endphp
                                                @foreach($hr_order as $temp)
                                                    <tr>
                                                        <td class="border-b dark:border-dark-5">
                                                            {{$temp->order_num}}
                                                        </td>
                                                        <td class="border-b dark:border-dark-5">
                                                            {{$temp->company_get($temp->type_id)}}
                                                        </td>
                                                        <td class="border-b dark:border-dark-5">
                                                            {{$temp->date}}
                                                        </td>
                                                        <td class="border-b dark:border-dark-5">
                                                            {{$temp->type->title}}
                                                        </td>
                                                        <td class="border-b dark:border-dark-5">
                                                            {{$temp->user->username}}
                                                        </td>
                                                        <td class="border-b dark:border-dark-5" style="display:none;">
                                                            {{$temp->id}}
                                                        </td>
                                                        <td class="border-b dark:border-dark-5">
                                                            <div class="flex justify-center items-center">
                                                                <a href="#" data-toggle="modal" data-target="#decision{{$i}}" class="flex items-center text-theme-9 mr-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> 
                                                                </a>
                                                                <a href="#" onclick="delete_decision(this,{{$temp->id}})" class="flex items-center text-theme-6 mr-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mx-auto"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                </a>
                                                                <div class="modal" id="decision{{$i}}">
                                                                    <div class="modal__content" style="width:50%;">
                                                                        <div class="flex items-center px-5 py-4 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                                                            <h2 class="font-medium text-base mr-auto text-theme-1">Executive director desicions for this employee </h2>
                                                                        </div>
                                                                        <form action="{{route('employee_list_edit.edit_decision', $temp->id)}}" method="post" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="p-5 grid grid-cols-12 gap-4 gap-y-3">
                                                                                <div class="col-span-12 sm:col-span-6"> 
                                                                                    <label>Date</label> 
                                                                                    <input  name="date" value="{{$temp->date}}" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
                                                                                </div>
                                                                                <div class="col-span-12 sm:col-span-6"> 
                                                                                    <label>Decision Type</label> 
                                                                                    <select data-search="true" class="tail-select w-full" name="type_id" style="width:100%;">
                                                                                        @foreach($hr_order_type as $tempp)
                                                                                            @if($temp->type_id==$tempp->id)
                                                                                            <option value="{{$tempp->id}}" selected>{{$tempp->title}}</option>
                                                                                            @else
                                                                                            <option value="{{$tempp->id}}">{{$tempp->title}}</option>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </select> 
                                                                                </div>
                                                                                <div class="col-span-12 sm:col-span-6"> 
                                                                                    <label>Manager</label> 
                                                                                    <select data-search="true" class="tail-select w-full" name="user_id" style="width:100%;">
                                                                                        @foreach($zg_user_manager as $tempp)
                                                                                            @if($temp->user_id == $tempp->id)
                                                                                            <option value="{{$tempp->id}}" selected>{{$tempp->username}}</option>
                                                                                            @else
                                                                                            <option value="{{$tempp->id}}" selected>{{$tempp->username}}</option>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </select> 
                                                                                </div>                        
                                                                                <div class="col-span-12 sm:col-span-6"> 
                                                                                    <label>File</label> 
                                                                                    <input name="file" value="{{ old('file')}}" type="file" class="input w-full border mt-2" placeholder="Decistion"> 
                                                                                </div> 
                                                                            </div>
                                                                            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> 
                                                                                <button type="submit" class="button w-20 bg-theme-1 text-white">Submit</button> 
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>  
                                                        @php $i++; @endphp
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Work In Progress -->
                        <!-- BEGIN: Daily Sales -->
                        <div class="intro-y box lg:mt-5">
                            <div class="flex items-center p-3 ml-3 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">
                                    Salary Change
                                </h2>
                                <div class="dropdown ml-auto">
                                    <a href="#" data-toggle="modal" data-target="#new_salary" class="button w-30 inline-block mr-1 mb-2 bg-theme-1 text-white">Add New Salary</a>
                                </div>
                                <div class="modal" id="new_salary">
                                    <div class="modal__content" style="width:50%;">
                                        <div class="flex items-center px-5 py-4 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                            <h2 class="font-medium text-base mr-auto text-theme-1">Executive director desicions for this employee </h2>
                                        </div>
                                        <form action="{{route('employee_list_edit.create_salary', $hr_history->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="p-5 grid grid-cols-12 gap-4 gap-y-3">
                                                <div class="col-span-12 sm:col-span-6"> 
                                                    <label>Type</label> 
                                                    <select data-search="true" class="tail-select w-full" name="type_id" style="width:100%;">
                                                        @foreach($hr_wage_type as $tempp)
                                                            <option value="{{$tempp->id}}">{{$tempp->title}}</option>
                                                        @endforeach
                                                    </select> 
                                                </div>
                                                <div class="col-span-12 sm:col-span-6"> 
                                                    <label>Order</label> 
                                                    <select data-search="true" class="tail-select w-full" name="order_id" style="width:100%;">
                                                        @foreach($hr_order as $tempp)
                                                            <option value="{{$tempp->id}}">{{$tempp->type->title}} {{$tempp->order_num}}</option>
                                                        @endforeach
                                                    </select> 
                                                </div>                   
                                                <div class="col-span-12 sm:col-span-6"> 
                                                    <label>New Salary</label> 
                                                    <input type="number" name="wage_amount" value="{{ old('wage_amount')}}" class="input w-full border mt-2" placeholder="Amount"> 
                                                </div> 
                                                <div class="col-span-12 sm:col-span-6"> 
                                                    <label>Current</label> 
                                                    <select data-search="true" class="tail-select w-full" name="currency_id" style="width:100%;">
                                                        @foreach($hr_wage_currency as $tempp)
                                                            <option value="{{$tempp->id}}">{{$tempp->title}}({{$tempp->symbol}})</option>
                                                        @endforeach
                                                    </select>
                                                </div> 
                                                <div class="col-span-12 sm:col-span-6"> 
                                                    <label>Date</label> 
                                                    <input  name="date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
                                                </div> 
                                            </div>
                                            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> 
                                                <button type="submit" class="button w-20 bg-theme-1 text-white">Submit</button> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">decision#</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">company</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">date</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">New Salary</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Salary Difference</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="salary_change">
                                                @php $i=0; @endphp
                                                @foreach($hr_wage as $temp)
                                                    <tr>
                                                        <td class="border-b dark:border-dark-5">
                                                            @if($temp->order_id)
                                                            {{$temp->order->order_num}}
                                                            @else
                                                            @endif
                                                        </td>
                                                        <td class="border-b dark:border-dark-5">
                                                            {{$temp->company->title}}
                                                        </td>
                                                        <td class="border-b dark:border-dark-5">
                                                            {{$temp->date}}
                                                        </td>
                                                        <td class="border-b dark:border-dark-5">
                                                            {{$temp->wage_amount}}{{$temp->currency->symbol}}
                                                        </td>
                                                        <td class="border-b dark:border-dark-5">
                                                            @if($temp->changed_amount>0)
                                                                +{{$temp->changed_amount}}{{$temp->currency->symbol}}
                                                            @else
                                                                {{$temp->changed_amount}}{{$temp->currency->symbol}}   
                                                            @endif
                                                        </td>
                                                        <td class="border-b dark:border-dark-5">
                                                            @if($temp->changed_amount>=0)
                                                                <input type="button"  class="button w-35 mr-1 mb-2 bg-theme-9 text-white" value="Increased">
                                                            @else
                                                                <input type="button"  class="button w-35 mr-1 mb-2 bg-theme-6 text-white" value="Decreased">
                                                            @endif
                                                        </td>
                                                        <td class="border-b dark:border-dark-5">
                                                            <!-- <div class="flex justify-center items-center">
                                                                <a href="#" data-toggle="modal" data-target="#salary{{$i}}" class="flex items-center text-theme-9 mr-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> 
                                                                </a>
                                                                <a href="#" onclick="delete_salary(this,{{$temp->id}})" class="flex items-center text-theme-6 mr-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mx-auto"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                </a>
                                                            </div> -->
                                                            <div class="modal" id="salary{{$i}}">
                                                                <div class="modal__content" style="width:50%;">
                                                                    <div class="flex items-center px-5 py-4 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                                                        <h2 class="font-medium text-base mr-auto text-theme-1">Executive director desicions for this employee </h2>
                                                                    </div>
                                                                    <form action="{{route('employee_list_edit.edit_salary', $hr_history->id)}}" method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="p-5 grid grid-cols-12 gap-4 gap-y-3">
                                                                            <div class="col-span-12 sm:col-span-6"> 
                                                                                <label>Type</label> 
                                                                                <select data-search="true" class="tail-select w-full" name="type_id" style="width:100%;">
                                                                                    @foreach($hr_wage_type as $tempp)
                                                                                        @if($temp->type_id==$tempp->id)
                                                                                        <option value="{{$tempp->id}}" selected>{{$tempp->title}}</option>
                                                                                        @else
                                                                                        <option value="{{$tempp->id}}">{{$tempp->title}}</option>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </select> 
                                                                            </div>
                                                                            <div class="col-span-12 sm:col-span-6"> 
                                                                                <label>Order</label> 
                                                                                <select data-search="true" class="tail-select w-full" name="order_id" style="width:100%;">
                                                                                    @foreach($hr_order as $tempp)
                                                                                        @if($temp->order_id == $tempp->id)
                                                                                        <option value="{{$tempp->id}}" selected>{{$tempp->type->title}} {{$tempp->order_num}}</option>
                                                                                        @else
                                                                                        <option value="{{$tempp->id}}">{{$tempp->type->title}} {{$tempp->order_num}}</option>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </select> 
                                                                            </div>                  
                                                                            <div class="col-span-12 sm:col-span-6"> 
                                                                                <label>New Salary</label> 
                                                                                <input type="number" name="wage_amount" value="{{ old('wage_amount')}}" class="input w-full border mt-2" placeholder="Amount"> 
                                                                            </div> 
                                                                            <div class="col-span-12 sm:col-span-6"> 
                                                                                <label>Current</label> 
                                                                                <select data-search="true" class="tail-select w-full" name="currency_id" style="width:100%;">
                                                                                    @foreach($hr_wage_currency as $tempp)
                                                                                        @if($temp->currency_id == $tempp->id)
                                                                                        <option value="{{$tempp->id}}" selected>{{$tempp->title}}({{$tempp->symbol}})</option>
                                                                                        @else
                                                                                        <option value="{{$tempp->id}}">{{$tempp->title}}({{$tempp->symbol}})</option>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </select>
                                                                            </div> 
                                                                            <div class="col-span-12 sm:col-span-6"> 
                                                                                <label>Date</label> 
                                                                                <input  name="date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
                                                                            </div>  
                                                                        </div>
                                                                        <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> 
                                                                            <button type="submit" class="button w-20 bg-theme-1 text-white">Submit</button> 
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>  
                                                    </tr>
                                                    @php $i++; @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Daily Sales -->
                        <!-- BEGIN: Latest Tasks -->
                        <!-- END: timeoff -->
                        <div class="intro-y box lg:mt-5">
                            <div class="flex items-center p-3 ml-3 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">
                                    Time On/Off Log
                                </h2>
                                @if($employee->timeoff_active($employee->id)==1)
                                    <div class="dropdown ml-auto">
                                        <a href="#" data-toggle="modal" data-target="#new_timeoff1" class="button w-30 inline-block mr-1 mb-2 bg-theme-1 text-white">Add TimeOff</a>
                                    </div>
                                    <div class="modal" id="new_timeoff1">
                                        <div class="modal__content" style="width:50%;">
                                            <div class="flex items-center px-5 py-3 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                                <h2 class="font-medium text-base mr-auto">Add TIme Off</h2>
                                            </div>
                                            <form action="{{route('employee_list.timeoff_add', $employee->id)}}" method="post">
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
                                    <div class="dropdown ml-auto">
                                        <a href="#" data-toggle="modal" data-target="#new_timeoff0" class="button w-30 inline-block mr-1 mb-2 bg-theme-1 text-white">Add TimeOff</a>
                                    </div>
                                    <div class="modal" id="new_timeoff0">
                                        <div class="modal__content" style="width:50%;">
                                            <div class="flex items-center px-5 py-3 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                                
                                                <h2 class="font-medium text-base mr-auto">Add TIme Off Ended</h2>
                                            </div>
                                            <form action="{{route('employee_list.timeoff_update', $employee->id)}}" method="post">
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
                                @endif
                                
                            </div>
                            <div class="p-2">
                                <div class="preview">
                                    <div class="overflow-x-auto">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">start date</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">end date</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">reason</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">days</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">status</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">time off type</th>
                                                </tr>
                                            </thead>
                                            <tbody id="timeoff">
                                                @foreach($hr_timeoff as $temp)
                                                    <tr>
                                                        <td class="border-b dark:border-dark-5">
                                                            {{$temp->from_date}}
                                                        </td>
                                                        <td class="border-b dark:border-dark-5">
                                                            @if($temp->approval_status==1)
                                                                {{$temp->ended_date}}
                                                            @else
                                                                {{$temp->to_date}}
                                                            @endif
                                                        </td>
                                                        <td class="border-b dark:border-dark-5">
                                                            {{$temp->description}}
                                                        </td>
                                                        <td class="border-b dark:border-dark-5">
                                                            {{$temp->timeoff_duration}}
                                                        </td>
                                                        <td class="border-b dark:border-dark-5">

                                                        </td>
                                                        <td class="border-b dark:border-dark-5">
                                                            @if($temp->approval_status==1)
                                                            <input type="button"  class="button w-35 mr-1 mb-2 bg-theme-9 text-white" value="{{$temp->timeoff_type->title}}">
                                                            @else
                                                            <input type="button"  class="button w-35 mr-1 mb-2 bg-theme-6 text-white" value="{{$temp->timeoff_type->title}}">
                                                            @endif
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
                    <div id="relative" style="display:none;" class="col-span-12 lg:col-span-8 xxl:col-span-9">
                        <!-- relative etc -->
                        <!-- family  -->
                        <div class="intro-y tab-content mt-5">
                            <div class="tab-content__pane active" id="dashboard">
                                <div class="grid grid-cols-12 gap-6">
                                    <!-- BEGIN: General Statistic -->
                                    <div class="intro-y box col-span-12">
                                        <div class="flex items-center px-5 py-3 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                            <h2 class="font-medium text-base mr-auto">
                                                Family Information
                                            </h2>
                                            <a href="#" id="family_create" class="button w-30 inline-block mr-1 mb-2 bg-theme-1 text-white">Add New Row</a>
                                        </div>
                                        <div class="overflow-x-auto">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Full Name</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">realtion</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Birthdate</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Phone Number</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Current Work, School</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="family_input">
                                                    @foreach($hr_family as $temp)
                                                        <tr>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->name}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->relation_family->title}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->birth_date}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->phone_number}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->current_school}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5" style="display:none;">
                                                                {{$temp->id}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                <div class="flex justify-center items-center">
                                                                    <a href="#" class="flex items-center text-theme-9 mr-3 edit_family">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> 
                                                                    </a>
                                                                    <a href="#" onclick="delete_family(this,{{$temp->id}})" class="flex items-center text-theme-6 mr-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mx-auto"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                    </a>
                                                                </div>
                                                            </td>  
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END: General Statistic -->
                                </div>
                            </div>
                        </div>
                        <!-- Relative -->
                        <div class="intro-y tab-content mt-5">
                            <div class="tab-content__pane active" id="dashboard">
                                <div class="grid grid-cols-12 gap-6">
                                    <!-- BEGIN: General Statistic -->
                                    <div class="intro-y box col-span-12">
                                        <div class="flex items-center px-5 py-3 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                            <h2 class="font-medium text-base mr-auto">
                                                Relative
                                            </h2>
                                            <a href="#" id="relative_create" class="button w-30 inline-block mr-1 mb-2 bg-theme-1 text-white">Add New Row</a>
                                        </div>
                                        <div class="overflow-x-auto">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">First Name</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">realtion</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Birthdate</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Phone Number</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Current Work, School</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="relative_input">
                                                    @foreach($hr_relative as $temp)
                                                        <tr>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->name}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->relation_relative->title}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->birth_date}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->phone_number}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->current_school}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5" style="display:none;">
                                                                {{$temp->id}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                <div class="flex justify-center items-center">
                                                                    <a href="#" class="flex items-center text-theme-9 mr-3 edit_relative">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> 
                                                                    </a>
                                                                    <a href="#" onclick="delete_relative(this,{{$temp->id}})" class="flex items-center text-theme-6 mr-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mx-auto"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                    </a>
                                                                </div>
                                                            </td>  
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END: General Statistic -->
                                </div>
                            </div>
                        </div>
                        
                        <!-- education -->
                        <div class="intro-y tab-content mt-5">
                            <div class="tab-content__pane active" id="dashboard">
                                <div class="grid grid-cols-12 gap-6">
                                    <!-- BEGIN: General Statistic -->
                                    <div class="intro-y box col-span-12">
                                        <div class="flex items-center px-5 py-3 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                            <h2 class="font-medium text-base mr-auto">
                                                Education
                                            </h2>
                                            <a href="#" id="education_create" class="button w-30 inline-block mr-1 mb-2 bg-theme-1 text-white">Add New Row</a>
                                        </div>
                                        <div class="overflow-x-auto">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">School, University</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Attended</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Graduate</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Degree</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Major</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="education_input">
                                                    @foreach($hr_education as $temp)
                                                        <tr>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->education_type->title}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->attend}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->graduate}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->degree}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->major}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5" style="display:none;">
                                                                {{$temp->id}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                <div class="flex justify-center items-center">
                                                                    <a href="#" class="flex items-center text-theme-9 mr-3 edit_education">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> 
                                                                    </a>
                                                                    <a href="#" onclick="delete_education(this,{{$temp->id}})" class="flex items-center text-theme-6 mr-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mx-auto"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                    </a>
                                                                </div>
                                                            </td>  
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END: General Statistic -->
                                </div>
                            </div>
                        </div>

                        <!-- Professional traning -->
                        <div class="intro-y tab-content mt-5">
                            <div class="tab-content__pane active" id="dashboard">
                                <div class="grid grid-cols-12 gap-6">
                                    <!-- BEGIN: General Statistic -->
                                    <div class="intro-y box col-span-12">
                                        <div class="flex items-center px-5 py-3 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                            <h2 class="font-medium text-base mr-auto">
                                                Professinal Traning
                                            </h2>
                                            <a href="#" id="training_create" class="button w-30 inline-block mr-1 mb-2 bg-theme-1 text-white">Add New Row</a>
                                        </div>
                                        <div class="overflow-x-auto">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">School, University</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">attended</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Graduated</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Duration</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Certificate#</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Profession, Major, skill</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="training_input">
                                                    @foreach($hr_training as $temp)
                                                        <tr>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->education_type->title}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->attend}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->graduate}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->duration}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->certificate}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->major}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5" style="display:none;">
                                                                {{$temp->id}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                <div class="flex justify-center items-center">
                                                                    <a href="#" class="flex items-center text-theme-9 mr-3 edit_training">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> 
                                                                    </a>
                                                                    <a href="#" onclick="delete_training(this,{{$temp->id}})" class="flex items-center text-theme-6 mr-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mx-auto"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                    </a>
                                                                </div>
                                                            </td>  
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END: General Statistic -->
                                </div>
                            </div>
                        </div>
                        <!-- Professional traning -->
                        <div class="intro-y tab-content mt-5">
                            <div class="tab-content__pane active" id="dashboard">
                                <div class="grid grid-cols-12 gap-6">
                                    <!-- BEGIN: General Statistic -->
                                    <div class="intro-y box col-span-12">
                                        <div class="flex items-center px-5 py-3 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                            <h2 class="font-medium text-base mr-auto">
                                                Work Experiences
                                            </h2>
                                            <a href="#" id="work_create" class="button w-30 inline-block mr-1 mb-2 bg-theme-1 text-white">Add New Row</a>
                                        </div>
                                        <div class="overflow-x-auto">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Company, Address</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Start Date</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">End Date</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">job position</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Quit Reason</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Job Responsibilities</th>
                                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="work_input">
                                                    @foreach($hr_work as $temp)
                                                        <tr>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->company}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->start_date}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->end_date}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->position}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->quit_reason}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                {{$temp->job_responsibility}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5" style="display:none;">
                                                                {{$temp->id}}
                                                            </td>
                                                            <td class="border-b dark:border-dark-5">
                                                                <div class="flex justify-center items-center">
                                                                    <a href="#" class="flex items-center text-theme-9 mr-3 edit_work">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> 
                                                                    </a>
                                                                    <a href="#" onclick="delete_work(this,{{$temp->id}})" class="flex items-center text-theme-6 mr-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mx-auto"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                    </a>
                                                                </div>
                                                            </td>  
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END: General Statistic -->
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                
                
            </div>
            <!-- END: Content -->
        </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $("#personal_info").click(function(){
                $("#personal").show();
                $("#relative").hide();
                $("#personal_info").addClass("text-theme-1");
                $("#relative_info").removeClass("text-theme-1");
            });
            $("#relative_info").click(function(){
                $("#personal").hide();
                $("#relative").show();
                $("#personal_info").removeClass("text-theme-1");
                $("#relative_info").addClass("text-theme-1");
            });
            //family member
            $("#family_create").click(function() {
                $('#family_input').append(`
                    <tr>
                        <td class="border-b dark:border-dark-5">
                        <input name="family_name[]" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <select  class="form-control" name="family_relation[]">
                                @foreach($hr_family_type as $temp)
                                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endforeach
                            </select> 
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <input name="family_birth_date[]" type="date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;"  required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <input name="family_phone_number[]" type="number" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <input name="family_current_school[]" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                        </td>
                        <td class="border-b dark:border-dark-5" style="display:none;">
                            <input value="{{$employee->id}}" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <div class="flex justify-center items-center">
                                <a href="#" class="flex items-center text-theme-9 mr-3 save_family">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save mx-auto"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                                </a>
                                <a href="#" onclick="delete_family(this)" class="flex items-center text-theme-6 mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mx-auto"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                `);
            }); 
            $(document).on("click",".save_family",function(){
                var tr0 = $(this).parents('td').siblings().eq(0).children('input').val();
                var tr1 = $(this).parents('td').siblings().eq(1).children('select').val();
                var tr2 = $(this).parents('td').siblings().eq(2).children('input').val();
                var tr3 = $(this).parents('td').siblings().eq(3).children('input').val();
                var tr4 = $(this).parents('td').siblings().eq(4).children('input').val();
                var tr5 = $(this).parents('td').siblings().eq(5).children('input').val();
                var tr6 = $(this).parents('td').siblings().eq(6).children('input').val();
                var parent = $(this).parents('tr');
                $.ajax({
                    type:'POST',
                    url:'/employee_list_edit/family_create',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: { "family_name" : tr0, 
                            "family_relation": tr1,
                            "family_birth_date": tr2, 
                            "family_phone_number": tr3, 
                            "family_current_school":tr4,
                            "employee":tr5,
                            "family_id":tr6,},
                    success: function(data){
                        if(data){
                            
                            parent.html('');
                            parent.append(`
                                <td class="border-b dark:border-dark-5">
                                    `+tr0+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    `+data.title+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    `+tr2+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    `+tr3+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    `+tr4+`
                                </td>
                                <td class="border-b dark:border-dark-5" style="display:none">
                                    `+data.id+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    <div class="flex justify-center items-center">
                                        <a href="#" class="flex items-center text-theme-9 mr-3 edit_family">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> 
                                        </a>
                                        <a href="#" onclick="delete_family(this,`+data.id+`)" class="flex items-center text-theme-6 mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mx-auto"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </a>
                                    </div>
                                </td>
                            `);
                        }
                    }
                });
                
            });
            $(document).on("click",".edit_family",function(){
                var tr0 = $(this).parents('td').siblings().eq(0).html();
                var tr1 = $(this).parents('td').siblings().eq(1).html();
                var tr2 = $(this).parents('td').siblings().eq(2).html();
                var tr3 = $(this).parents('td').siblings().eq(3).html();
                var tr4 = $(this).parents('td').siblings().eq(4).html();
                var tr5 = $(this).parents('td').siblings().eq(5).html();
                var parent = $(this).parents('tr');
                parent.html('');
                parent.append(`
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr0+` class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <select  class="form-control" name="family_relation[]">
                            @foreach($hr_family_type as $temp)
                                @if($temp->id ==`+tr1+`)
                                <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                @else
                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endif
                            @endforeach
                        </select> 
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr2+` type="date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;"  required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr3+` type="number" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr4+` class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5" style="display:none;">
                        <input value="{{$employee->id}}" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5" style="display:none;">
                        <input value=`+Number(tr5)+` class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <div class="flex justify-center items-center">
                            <a href="#" class="flex items-center text-theme-9 mr-3 save_family">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save mx-auto"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                            </a>
                        </div>
                    </td>
                `);
            });
            // family relation
            $("#relative_create").click(function() {
                $('#relative_input').append(`
                    <tr>
                        <td class="border-b dark:border-dark-5">
                        <input name="relative_name[]" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <select  class="form-control" name="relative_relation[]">
                                @foreach($hr_family_type as $temp)
                                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endforeach
                            </select> 
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <input name="relative_birth_date[]" type="date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;"  required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <input name="relative_phone_number[]" type="number" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <input name="relative_current_school[]" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                        </td>
                        <td class="border-b dark:border-dark-5" style="display:none;">
                            <input value="{{$employee->id}}" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <div class="flex justify-center items-center">
                                <a href="#" class="flex items-center text-theme-9 mr-3 save_relative">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save mx-auto"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                `);
            });
            $(document).on("click",".save_relative",function(){
                var tr0 = $(this).parents('td').siblings().eq(0).children('input').val();
                var tr1 = $(this).parents('td').siblings().eq(1).children('select').val();
                var tr2 = $(this).parents('td').siblings().eq(2).children('input').val();
                var tr3 = $(this).parents('td').siblings().eq(3).children('input').val();
                var tr4 = $(this).parents('td').siblings().eq(4).children('input').val();
                var tr5 = $(this).parents('td').siblings().eq(5).children('input').val();
                var tr6 = $(this).parents('td').siblings().eq(6).children('input').val();
                var parent = $(this).parents('tr');
                $.ajax({
                    type:'POST',
                    url:'/employee_list_edit/relative_create',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: { "relative_name" : tr0, 
                            "relative_relation": tr1,
                            "relative_birth_date": tr2, 
                            "relative_phone_number": tr3, 
                            "relative_current_school":tr4,
                            "employee":tr5,
                            "relative_id":tr6,},
                    success: function(data){
                        if(data){
                            parent.html('');
                            parent.append(`
                                <td class="border-b dark:border-dark-5">
                                    `+tr0+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    `+data.title+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    `+tr2+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    `+tr3+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    `+tr4+`
                                </td>
                                <td class="border-b dark:border-dark-5" style="display:none">
                                    `+data.id+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    <div class="flex justify-center items-center">
                                        <a href="#" class="flex items-center text-theme-9 mr-3 edit_relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> 
                                        </a>
                                        <a href="#" onclick="delete_relative(this,`+data.id+`)" class="flex items-center text-theme-6 mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mx-auto"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </a>
                                    </div>
                                </td>
                            `);
                        }
                    }
                });
                
            });
            $(document).on("click",".edit_relative",function(){
                var tr0 = $(this).parents('td').siblings().eq(0).html();
                var tr1 = $(this).parents('td').siblings().eq(1).html();
                var tr2 = $(this).parents('td').siblings().eq(2).html();
                var tr3 = $(this).parents('td').siblings().eq(3).html();
                var tr4 = $(this).parents('td').siblings().eq(4).html();
                var tr5 = $(this).parents('td').siblings().eq(5).html();
                var parent = $(this).parents('tr');
                parent.html('');
                parent.append(`
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr0+` class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <select  class="form-control" name="relative_relation[]">
                            @foreach($hr_family_type as $temp)
                                @if($temp->id ==`+tr1+`)
                                <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                @else
                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endif
                            @endforeach
                        </select> 
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr2+` type="date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;"  required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr3+` type="number" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr4+` class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5" style="display:none;">
                        <input value="{{$employee->id}}" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5" style="display:none;">
                        <input value=`+Number(tr5)+` class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <div class="flex justify-center items-center">
                            <a href="#" class="flex items-center text-theme-9 mr-3 save_relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save mx-auto"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                            </a>
                        </div>
                    </td>
                `);
            });
            //educatin
            $("#education_create").click(function() {
                $('#education_input').append(`
                    <tr>
                        <td class="border-b dark:border-dark-5">
                            <select  class="form-control" name="education_type[]">
                                @foreach($hr_education_type as $temp)
                                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endforeach
                            </select> 
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <input name="education_attend[]" type="date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;"  required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <input name="education_graduate[]" type="date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;"  required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <input name="education_degree[]" type="text" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <input name="education_major[]" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                        </td>
                        <td class="border-b dark:border-dark-5" style="display:none;">
                            <input value="{{$employee->id}}" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <div class="flex justify-center items-center">
                                <a href="#" class="flex items-center text-theme-9 mr-3 save_education">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save mx-auto"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                `);
            });
            $(document).on("click",".save_education",function(){
                var tr0 = $(this).parents('td').siblings().eq(0).children('select').val();
                var tr1 = $(this).parents('td').siblings().eq(1).children('input').val();
                var tr2 = $(this).parents('td').siblings().eq(2).children('input').val();
                var tr3 = $(this).parents('td').siblings().eq(3).children('input').val();
                var tr4 = $(this).parents('td').siblings().eq(4).children('input').val();
                var tr5 = $(this).parents('td').siblings().eq(5).children('input').val();
                var tr6 = $(this).parents('td').siblings().eq(6).children('input').val();
                var parent = $(this).parents('tr');
                $.ajax({
                    type:'POST',
                    url:'/employee_list_edit/education_create',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: { "education_name" : tr0, 
                            "education_attend": tr1,
                            "education_graduate": tr2, 
                            "education_degree": tr3, 
                            "education_major":tr4,
                            "employee":tr5,
                            "education_id":tr6,},
                    success: function(data){
                        if(data){
                            parent.html('');
                            parent.append(`
                                <td class="border-b dark:border-dark-5">
                                    `+data.title+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    `+tr1+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    `+tr2+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    `+tr3+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    `+tr4+`
                                </td>
                                <td class="border-b dark:border-dark-5" style="display:none">
                                    `+data.id+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    <div class="flex justify-center items-center">
                                        <a href="#" class="flex items-center text-theme-9 mr-3 edit_education">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> 
                                        </a>
                                        <a href="#" onclick="delete_education(this,`+data.id+`)" class="flex items-center text-theme-6 mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mx-auto"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </a>
                                    </div>
                                </td>
                            `);
                        }
                    }
                });
                
            });
            $(document).on("click",".edit_education",function(){
                var tr0 = $(this).parents('td').siblings().eq(0).html();
                var tr1 = $(this).parents('td').siblings().eq(1).html();
                var tr2 = $(this).parents('td').siblings().eq(2).html();
                var tr3 = $(this).parents('td').siblings().eq(3).html();
                var tr4 = $(this).parents('td').siblings().eq(4).html();
                var tr5 = $(this).parents('td').siblings().eq(5).html();
                var parent = $(this).parents('tr');
                parent.html('');
                parent.append(`
                    
                    <td class="border-b dark:border-dark-5">
                        <select  class="form-control" name="education_type[]">
                            @foreach($hr_education_type as $temp)
                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                            @endforeach
                        </select> 
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr1+` type="date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr2+` type="date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;"  required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr3+` type="text" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr4+` class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5" style="display:none;">
                        <input value="{{$employee->id}}" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5" style="display:none;">
                        <input value=`+Number(tr5)+` class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <div class="flex justify-center items-center">
                            <a href="#" class="flex items-center text-theme-9 mr-3 save_education">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save mx-auto"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                            </a>
                        </div>
                    </td>
                `);
            });
            //professional training
            $("#training_create").click(function() {
                $('#training_input').append(`
                    <tr>
                        <td class="border-b dark:border-dark-5">
                            <select  class="form-control" name="training_type[]">
                                @foreach($hr_education_type as $temp)
                                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endforeach
                            </select> 
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <input name="training_attend[]" type="date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;"  required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <input name="training_graduate[]" type="date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <input name="training_duration[]" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <input name="training_certificate[]" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <input name="training_major[]" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                        </td>
                        <td class="border-b dark:border-dark-5" style="display:none;">
                            <input value="{{$employee->id}}" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <div class="flex justify-center items-center">
                                <a href="#" class="flex items-center text-theme-9 mr-3 save_training">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save mx-auto"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                `);
            });
            $(document).on("click",".save_training",function(){
                var tr0 = $(this).parents('td').siblings().eq(0).children('select').val();
                var tr1 = $(this).parents('td').siblings().eq(1).children('input').val();
                var tr2 = $(this).parents('td').siblings().eq(2).children('input').val();
                var tr3 = $(this).parents('td').siblings().eq(3).children('input').val();
                var tr4 = $(this).parents('td').siblings().eq(4).children('input').val();
                var tr5 = $(this).parents('td').siblings().eq(5).children('input').val();
                var tr6 = $(this).parents('td').siblings().eq(6).children('input').val();
                var tr7 = $(this).parents('td').siblings().eq(7).children('input').val();
                var parent = $(this).parents('tr');
                $.ajax({
                    type:'POST',
                    url:'/employee_list_edit/training_create',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: { "training_type" : tr0, 
                            "training_attend": tr1,
                            "training_graduate": tr2, 
                            "training_duration": tr3, 
                            "training_certificate":tr4,
                            "training_major":tr5,
                            "employee":tr6,
                            "training_id":tr7,},
                    success: function(data){
                        if(data){
                            parent.html('');
                            parent.append(`
                                <td class="border-b dark:border-dark-5">
                                    `+data.title+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    `+tr1+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    `+tr2+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    `+tr3+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    `+tr4+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    `+tr5+`
                                </td>
                                <td class="border-b dark:border-dark-5" style="display:none">
                                    `+data.id+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    <div class="flex justify-center items-center">
                                        <a href="#" class="flex items-center text-theme-9 mr-3 edit_training">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> 
                                        </a>
                                        <a href="#" onclick="delete_training(this,`+data.id+`)" class="flex items-center text-theme-6 mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mx-auto"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </a>
                                    </div>
                                </td>
                            `);
                        }
                    }
                });
                
            });
            $(document).on("click",".edit_training",function(){
                var tr0 = $(this).parents('td').siblings().eq(0).html();
                var tr1 = $(this).parents('td').siblings().eq(1).html();
                var tr2 = $(this).parents('td').siblings().eq(2).html();
                var tr3 = $(this).parents('td').siblings().eq(3).html();
                var tr4 = $(this).parents('td').siblings().eq(4).html();
                var tr5 = $(this).parents('td').siblings().eq(5).html();
                var tr6 = $(this).parents('td').siblings().eq(6).html();
                var parent = $(this).parents('tr');
                parent.html('');
                parent.append(`
                    
                    <td class="border-b dark:border-dark-5">
                        <select  class="form-control" name="training_type[]">
                            @foreach($hr_education_type as $temp)
                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                            @endforeach
                        </select> 
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr1+` type="date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr2+` type="date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;"  required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr3+` type="text" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr4+` class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr5+` class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5" style="display:none;">
                        <input value="{{$employee->id}}" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5" style="display:none;">
                        <input value=`+Number(tr6)+` class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <div class="flex justify-center items-center">
                            <a href="#" class="flex items-center text-theme-9 mr-3 save_training">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save mx-auto"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                            </a>
                        </div>
                    </td>
                `);
            });
            //work responsibility
            $("#work_create").click(function() {
                $('#work_input').append(`
                    <tr>
                        <td class="border-b dark:border-dark-5">
                            <input name="work_company[]" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;"  required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <input name="work_start_date[]" type="date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;"  required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <input name="work_end_date[]" type="date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <input name="work_job_position[]" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <input name="work_quit_reason[]" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <input name="work_job_responsibility[]" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                        </td>
                        <td class="border-b dark:border-dark-5" style="display:none;">
                            <input value="{{$employee->id}}" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <div class="flex justify-center items-center">
                                <a href="#" class="flex items-center text-theme-9 mr-3 save_work">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save mx-auto"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                `);
            });
            $(document).on("click",".save_work",function(){
                var tr0 = $(this).parents('td').siblings().eq(0).children('input').val();
                var tr1 = $(this).parents('td').siblings().eq(1).children('input').val();
                var tr2 = $(this).parents('td').siblings().eq(2).children('input').val();
                var tr3 = $(this).parents('td').siblings().eq(3).children('input').val();
                var tr4 = $(this).parents('td').siblings().eq(4).children('input').val();
                var tr5 = $(this).parents('td').siblings().eq(5).children('input').val();
                var tr6 = $(this).parents('td').siblings().eq(6).children('input').val();
                var tr7 = $(this).parents('td').siblings().eq(7).children('input').val();
                var parent = $(this).parents('tr');
                $.ajax({
                    type:'POST',
                    url:'/employee_list_edit/work_create',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: { "work_company" : tr0, 
                            "work_start_date": tr1,
                            "work_end_date": tr2, 
                            "work_position": tr3, 
                            "work_quit_reason":tr4,
                            "work_job_responsibility":tr5,
                            "employee":tr6,
                            "work_id":tr7,},
                    success: function(data){
                        if(data){
                            parent.html('');
                            parent.append(`
                                <td class="border-b dark:border-dark-5">
                                    `+tr0+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    `+tr1+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    `+tr2+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    `+tr3+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    `+tr4+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    `+tr5+`
                                </td>
                                <td class="border-b dark:border-dark-5" style="display:none">
                                    `+data.id+`
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    <div class="flex justify-center items-center">
                                        <a href="#" class="flex items-center text-theme-9 mr-3 edit_work">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> 
                                        </a>
                                        <a href="#" onclick="delete_work(this,`+data.id+`)" class="flex items-center text-theme-6 mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mx-auto"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </a>
                                    </div>
                                </td>
                            `);
                        }
                    }
                });
                
            });
            $(document).on("click",".edit_work",function(){
                var tr0 = $(this).parents('td').siblings().eq(0).html();
                var tr1 = $(this).parents('td').siblings().eq(1).html();
                var tr2 = $(this).parents('td').siblings().eq(2).html();
                var tr3 = $(this).parents('td').siblings().eq(3).html();
                var tr4 = $(this).parents('td').siblings().eq(4).html();
                var tr5 = $(this).parents('td').siblings().eq(5).html();
                var tr6 = $(this).parents('td').siblings().eq(6).html();
                var parent = $(this).parents('tr');
                parent.html('');
                parent.append(`
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr0+` class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr1+` type="date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr2+` type="date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;"  required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr3+` type="text" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr4+` class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <input value=`+tr5+` class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5" style="display:none;">
                        <input value="{{$employee->id}}" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5" style="display:none;">
                        <input value=`+Number(tr6)+` class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" required>
                    </td>
                    <td class="border-b dark:border-dark-5">
                        <div class="flex justify-center items-center">
                            <a href="#" class="flex items-center text-theme-9 mr-3 save_work">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save mx-auto"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                            </a>
                        </div>
                    </td>
                `);
            });
            //profile image save
            $(document).on("change", "#image_save", function(){
                $("#submit_button").trigger("click");
            });
        });
        function delete_family(e, family_id){
            if(confirm("are you really?")){
                e.parentNode.parentNode.parentNode.remove();
                $.ajax({
                    type:'POST',
                    url:'/employee_list_edit/family_delete',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: { "family_id" : family_id},
                    success: function(data){
                        if(data==1){
                        
                        }
                    }
                });
            }
        }
        function delete_relative(e, relative_id){
            if(confirm("are you really?")){
                e.parentNode.parentNode.parentNode.remove();
                $.ajax({
                    type:'POST',
                    url:'/employee_list_edit/relative_delete',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: { "relative_id" : relative_id},
                    success: function(data){
                        if(data==1){
                           
                        }
                    }
                });
            }
        }
        function delete_education(e, education_id){
            if(confirm("are you really?")){
                e.parentNode.parentNode.parentNode.remove();
                $.ajax({
                    type:'POST',
                    url:'/employee_list_edit/education_delete',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: { "education_id" : education_id},
                    success: function(data){
                        if(data==1){
                           
                        }
                    }
                });
            }
        }
        function delete_training(e, training_id){
            if(confirm("are you really?")){
                e.parentNode.parentNode.parentNode.remove();
                $.ajax({
                    type:'POST',
                    url:'/employee_list_edit/training_delete',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: { "training_id" : training_id},
                    success: function(data){
                        if(data==1){
                           
                        }
                    }
                });
            }
        }
        function delete_work(e, work_id){
            if(confirm("are you really?")){
                e.parentNode.parentNode.parentNode.remove();
                $.ajax({
                    type:'POST',
                    url:'/employee_list_edit/work_delete',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: { "work_id" : work_id},
                    success: function(data){
                        if(data==1){
                           
                        }
                    }
                });
            }
        }
        
        function delete_contract(e, contract_id){
            if(confirm("are you really?")){
                e.parentNode.parentNode.parentNode.remove();
                $.ajax({
                    type:'POST',
                    url:'/employee_list_edit/contract_delete',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: { "contract_id" : contract_id},
                    success: function(data){
                        if(data==1){
                           
                        }
                    }
                });
            }
        }
        function delete_decision(e, decision_id){
            if(confirm("are you really?")){
                e.parentNode.parentNode.parentNode.remove();
                $.ajax({
                    type:'POST',
                    url:'/employee_list_edit/decision_delete',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: { "decision_id" : decision_id},
                    success: function(data){
                        if(data==1){
                           
                        }
                    }
                });
            }
        }
        function delete_salary(e, salary_id){
            if(confirm("are you really?")){
                e.parentNode.parentNode.parentNode.remove();
                $.ajax({
                    type:'POST',
                    url:'/employee_list_edit/salary_delete',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: { "salary_id" : salary_id},
                    success: function(data){
                        if(data==1){
                           
                        }
                    }
                });
            }
        }
    </script>
@endsection