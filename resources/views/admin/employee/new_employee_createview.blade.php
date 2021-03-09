@extends('standard.layout')

@section('title', 'new employee')

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
                    <h1 class="text-2xl text-theme-9 font-medium leading-none">{{ trans('employee.create_new_employee')}}</h1>
                </div>
                <form action="{{route('new_employee_create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 box px-5 py-8 mt-5">
                        <div class="col-span-12 sm:col-span-4 xl:col-span-3 flex flex-col justify-end items-center">
                            <div class="upload mt-4 pr-md-4" style="width:200px;">
                                <input type="file" id="input-file-max-fs" name = "image" class="dropify" data-default-file="{{asset('assets/img/200x200.jpg')}}" data-max-file-size="5M" />
                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> {{ trans('employee.upload_picture')}}</p>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-8 xl:col-span-9 flex flex-col justify-end items-center">
                        
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.first_name')}}</label>
                            <input type="text"  name="first_name" value="{{ old('first_name')}}" class="input w-full border mt-2" placeholder="First Name">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.middle_name')}}</label>
                            <input type="text" name="middle_name" value="{{ old('middle_name')}}" class="input w-full border mt-2" placeholder="Middle Name">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.last_name')}}</label>
                            <input type="text" name="last_name" value="{{ old('last_name')}}" class="input w-full border mt-2" placeholder="Last Name">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.birthdate')}}</label>
                            <input value="{{ old('birth_date')}}" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;" name="birth_date">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.registration_number')}}</label>
                            <input type="text" name="registration_num" value="{{ old('registration_num')}}" class="input w-full border mt-2" placeholder="Registration Number">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.phone')}}</label>
                            <input type="text" name="phone" value="{{ old('phone')}}" class="input w-full border mt-2" placeholder="Phone">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.email')}}</label>
                            <input type="text" name="email" value="{{ old('email')}}" class="input w-full border mt-2" placeholder="Email">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.address_state')}}</label>
                            <select data-search="true" class="tail-select w-full " name="state_id" style="width:100%; border-color:black;">
                                @foreach($hr_state as $temp)
                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.address_district')}}</label>
                            <select data-search="true" class="tail-select w-full" name="district_id" style="width:100%;">
                                @foreach($hr_district as $temp)
                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.address')}}</label>
                            <input type="text" name="address" value="{{ old('address')}}" class="input w-full border mt-2" placeholder="Address">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.sex')}}</label>
                            <select data-search="true" class="tail-select w-full"  name="sex_id" style="width:100%;">
                                @foreach($hr_sex as $temp)
                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.birthplace')}}</label>
                            <select data-search="true" class="tail-select w-full" name="birth_place" style="width:100%;">
                                @foreach($hr_state as $temp)
                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.insurance_book_number')}}</label>
                            <input type="text" name="insurance_book_num" value="{{ old('insurance_book_num')}}" class="input w-full border mt-2" placeholder="insurance_book_num ">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.military_service')}}</label>
                            <select data-search="true" class="tail-select w-full" name="military_service" style="width:100%;">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.drivers_license')}}</label>
                            <select data-search="true" class="tail-select w-full" name="drivers_license" style="width:100%;">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.driver_license_number')}}</label>
                            <input type="text" name="driver_license_num" value="{{ old('driver_license_num')}}" class="input w-full border mt-2" placeholder="Driver License Number">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.blood_type')}}</label>
                            <select data-search="true" class="tail-select w-full" name="blood_type_id" style="width:100%;">
                                @foreach($hr_blood_type as $temp)
                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.mechanism_license_number')}}</label>
                            <input type="text" name="mechanism_license_num" value="{{ old('mechanism_license_num')}}" class="input w-full border mt-2" placeholder="Mechanism License Number">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.prodriver_license_number')}}</label>
                            <input type="text" name="pro_driver_license_num" value="{{ old('pro_driver_license_num')}}" class="input w-full border mt-2" placeholder="Pro Driver License Number">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.height')}}</label>
                            <input type="number" name="height" value="{{ old('height')}}" class="input w-full border mt-2" placeholder="Height(Cm)">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.weight')}}</label>
                            <input type="number" name="weight" value="{{ old('weight')}}" class="input w-full border mt-2" placeholder="Weight(Kg)">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.cloth_size')}}</label>
                            <input type="text" name="cloth_size" value="{{ old('cloth_size')}}" class="input w-full border mt-2" placeholder="Cloth Size">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.shoe_size')}}</label>
                            <input type="text" name="shoe_size" value="{{ old('shoe_size')}}" class="input w-full border mt-2" placeholder="Shoe Size">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.bank_account')}}</label>
                            <select data-search="true" class="tail-select w-full" name="bank_account_id" style="width:100%;">
                                @foreach($hr_bank as $temp)
                                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.bank_account_number')}}</label>
                            <input type="number" name="bank_account_number" value="{{ old('bank_account_number')}}" class="input w-full border mt-2" placeholder="Additional Info">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.additional_info')}}</label>
                            <input type="text" name="additional_info" value="{{ old('additional_info')}}" class="input w-full border mt-2" placeholder="Additional Info">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.excepted_salary')}}</label>
                            <input type="number" name="expected_salary" value="{{ old('expected_salary')}}" class="input w-full border mt-2" placeholder="Expected Salary">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.interested_position')}}</label>
                            <select data-search="true" class="tail-select w-full" name="interested_position_id" style="width:100%;">
                                @foreach($hr_position as $temp)
                                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>Department</label>
                            <select data-search="true" class="tail-select w-full" name="department_id" style="width:100%;">
                                @foreach($department as $temp)
                                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.availability_date')}}</label>
                            <input value="{{ old('availability_date')}}" name="availability_date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.proposed_salary')}}</label>
                            <input type="number" name="proposed_salary" value="{{ old('proposed_salary')}}" class="input w-full border mt-2" placeholder="Proposed Salary">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.source')}}</label>
                            <select data-search="true" class="tail-select w-full" name="source_id" style="width:100%;">
                                @foreach($hr_source as $temp)
                                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.status')}}</label>
                            <select data-search="true" class="tail-select w-full" name="status_id" style="width:100%;">
                                @foreach($hr_status as $temp)
                                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.company')}}</label>
                            <select data-search="true" class="tail-select w-full" name="company_id" style="width:100%;">
                                @foreach($zg_company as $temp)
                                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.barcode')}}</label>
                            <input type="text" name="barcode" value="{{ old('barcode')}}" class="input w-full border mt-2" placeholder="BarCode">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>{{ trans('employee.position_type')}}</label>
                            <select data-search="true" class="tail-select w-full" name="position_type_id" style="width:100%;">
                                @foreach($hr_position_type as $temp)
                                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>Project</label>
                            <select data-search="true" class="tail-select w-full" name="project_id" style="width:100%;">
                                @foreach($zg_project as $temp)
                                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-span-12 sm:col-span-12 xl:col-span-12">
                            <button type="submit" class="button w-24 mr-1 mb-2 bg-theme-9 text-white" style="float:right;">{{ trans('employee.submit')}}</button>
                        </div>
                    </div>
                    
                </form>
            </div>
            <!-- END: Content -->
        </div>
@endsection
