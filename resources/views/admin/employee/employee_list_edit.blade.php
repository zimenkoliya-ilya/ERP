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
                <form action="{{route('edit_employee', $employee->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 box px-5 py-8 mt-5">
                        <div class="col-span-12 sm:col-span-4 xl:col-span-3 flex flex-col justify-end items-center">
                            <div class="upload mt-4 pr-md-4" style="width:200px;">
                                <input type="file" id="input-file-max-fs" name = "image" class="dropify" data-default-file="{{asset($employee->image)}}" data-max-file-size="5M" />
                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> {{ trans('employee.upload_picture')}}</p>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-8 xl:col-span-9 flex flex-col justify-end items-center">
                        
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.first_name')}}</label>
                            <input type="text" name="first_name" value="{{ $employee->first_name}}" class="input w-full border mt-2" placeholder="First Name">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.middle_name')}}</label>
                            <input type="text" name="middle_name" value="{{ $employee->middle_name}}" class="input w-full border mt-2" placeholder="Middle Name">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.last_name')}}</label>
                            <input type="text" name="last_name" value="{{$employee->last_name}}" class="input w-full border mt-2" placeholder="Last Name">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.birthdate')}}</label>
                            <input value="{{$employee->birth_date}}" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" name="birth_date">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.registration_number')}}</label>
                            <input type="text" name="registration_num" value="{{$employee->registration_num}}" class="input w-full border mt-2" placeholder="Registration Number">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.phone')}}</label>
                            <input type="text" name="phone" value="{{$employee->phone}}" class="input w-full border mt-2" placeholder="Phone">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.email')}}</label>
                            <input type="text" name="email" value="{{$employee->email}}" class="input w-full border mt-2" placeholder="Email">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.address_state')}}</label>
                            <select data-search="true" class="tail-select w-full " name="state_id" style="width:100%; border-color:black;">
                                @foreach($hr_state as $temp)
                                    @if($employee->state_id==$temp->id)
                                    <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                    @else
                                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                                    @endif
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.address_district')}}</label>
                            <select data-search="true" class="tail-select w-full" name="district_id" style="width:100%;">
                                @foreach($hr_district as $temp)
                                    @if($employee->district_id==$temp->id)
                                        <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                    @else
                                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                                    @endif
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.address')}}</label>
                            <input type="text" name="address" value="{{$employee->address}}" class="input w-full border mt-2" placeholder="Address">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.sex')}}</label>
                            <select data-search="true" class="tail-select w-full"  name="sex_id" style="width:100%;">
                                @foreach($hr_sex as $temp)
                                    @if($employee->sex_id==$temp->id)
                                        <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                    @else
                                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                                    @endif
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.birthplace')}}</label>
                            <select data-search="true" class="tail-select w-full" name="birth_place" style="width:100%;">
                                @foreach($hr_state as $temp)
                                    @if($employee->birth_place==$temp->id)
                                        <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                    @else
                                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                                    @endif
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.insurance_book_number')}}</label>
                            <input type="text" name="insurance_book_num" value="{{$employee->insurance_book_num}}" class="input w-full border mt-2" placeholder="insurance_book_num ">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.military_service')}}</label>
                            <select data-search="true" class="tail-select w-full" name="military_service" style="width:100%;">
                                <option value="1" {{($employee->military_service==1)?'selected':''}}>Yes</option>
                                <option value="0" {{($employee->military_service==0)?'selected':''}}>No</option>
                            </select> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.drivers_license')}}</label>
                            <select data-search="true" class="tail-select w-full" name="drivers_license" style="width:100%;">
                                <option value="1" {{($employee->drivers_license==1)?'selected':''}}>Yes</option>
                                <option value="0" {{($employee->drivers_license==0)?'selected':''}}>No</option>
                            </select> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.driver_license_number')}}</label>
                            <input type="text" name="driver_license_num" value="{{ $employee->driver_license_num}}" class="input w-full border mt-2" placeholder="Driver License Number">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.blood_type')}}</label>
                            <select data-search="true" class="tail-select w-full" name="blood_type_id" style="width:100%;">
                                @foreach($hr_blood_type as $temp)
                                    @if($employee->blood_type_id==$temp->id)
                                        <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                    @else
                                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                                    @endif
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.mechanism_license_number')}}</label>
                            <input type="text" name="mechanism_license_num" value="{{$employee->mechanism_license_num}}" class="input w-full border mt-2" placeholder="Mechanism License Number">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.prodriver_license_number')}}</label>
                            <input type="text" name="pro_driver_license_num" value="{{$employee->pro_driver_license_num}}" class="input w-full border mt-2" placeholder="Pro Driver License Number">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.height')}}</label>
                            <input type="number" name="height" value="{{$employee->height}}" class="input w-full border mt-2" placeholder="Height(Cm)">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.weight')}}</label>
                            <input type="number" name="weight" value="{{$employee->weight}}" class="input w-full border mt-2" placeholder="Weight(Kg)">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.cloth_size')}}</label>
                            <input type="text" name="cloth_size" value="{{$employee->cloth_size}}" class="input w-full border mt-2" placeholder="Cloth Size">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.shoe_size')}}</label>
                            <input type="text" name="shoe_size" value="{{$employee->shoe_size}}" class="input w-full border mt-2" placeholder="Shoe Size">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
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
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.bank_account_number')}}</label>
                            <input type="text" name="bank_account_number" value="{{$employee->bank->account_number}}" class="input w-full border mt-2" placeholder="Additional Info">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.additional_info')}}</label>
                            <input type="text" name="additional_info" value="{{$employee->additional_info}}" class="input w-full border mt-2" placeholder="Additional Info">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.excepted_salary')}}</label>
                            <input type="number" name="expected_salary" value="{{$employee->expected_salary}}" class="input w-full border mt-2" placeholder="Expected Salary">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
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
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.availability_date')}}</label>
                            <input value="{{$employee->availability_date}}" name="availability_date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.proposed_salary')}}</label>
                            <input type="number" name="proposed_salary" value="{{$employee->proposed_salary}}" class="input w-full border mt-2" placeholder="Proposed Salary">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.source')}}</label>
                            <select data-search="true" class="tail-select w-full" name="source_id" style="width:100%;">
                                @foreach($hr_source as $temp)
                                    @if($employee->source_id==$temp->id)
                                        <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                    @else
                                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                                    @endif
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.status')}}</label>
                            <select data-search="true" class="tail-select w-full" name="status_id" style="width:100%;">
                                @foreach($hr_status as $temp)
                                    @if($employee->status_id==$temp->id)
                                        <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                    @else
                                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                                    @endif
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
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
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.barcode')}}</label>
                            <input type="text" name="barcode" value="{{$employee->barcode}}" class="input w-full border mt-2" placeholder="BarCode">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
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
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>Project</label>
                            <select data-search="true" class="tail-select w-full" name="position_type_id" style="width:100%;">
                                @foreach($zg_project as $temp)
                                    @if($employee->project_id==$temp->id)
                                        <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                    @else
                                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                                    @endif
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-span-12 sm:col-span-12 xl:col-span-12">
                            <button type="submit" class="button w-24 mr-1 mb-2 bg-theme-9 text-white" style="float:right;">{{ trans('employee.submit')}}</button>
                        </div>
                    </div>
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
                </form>
            </div>
            <!-- END: Content -->
        </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
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
    </script>
@endsection