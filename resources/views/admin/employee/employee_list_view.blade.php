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
                <div class="intro-y flex  mt-8">
                    <h1 class="text-4xl text-theme-9 font-medium leading-none">{{ trans('employee.employee_detail')}}</h1>
                </div>
                
                <div class="intro-y grid grid-cols-12 sm:gap-1 gap-y-1 box px-5 py-8 mt-5">
                    <div class="col-span-12 sm:col-span-4 xl:col-span-3 flex flex-col justify-end ">
                        <img src="{{asset($employee->image)}}" style="width:200px;">
                    </div>
                    <div class="col-span-12 sm:col-span-8 xl:col-span-9 flex flex-col justify-end ">
                       
                    </div>
                    
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end " style="margin-top:25px;">
                        <span>{{ trans('employee.first_name')}}: {{$employee->first_name}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.middle_name')}}: {{$employee->middle_name}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.last_name')}}: {{$employee->last_name}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.birthdate')}}: {{$employee->birth_date}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.registration_number')}}: {{$employee->registration_num}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.phone')}}: {{$employee->phone}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.email')}}: {{$employee->email}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.address_state')}}: {{$employee->state->title}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.address_district')}}: {{$employee->district->title}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.address')}}: {{$employee->address}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.sex')}}: {{$employee->sex->title}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.birthplace')}}: {{$employee->birthplace->title}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.insurance_book_number')}}: {{$employee->insurance_book_number}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.military_service')}}: {{($employee->military_service==1)?'Yes':'No'}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.drivers_license')}}: {{($employee->drivers_license==1)?'Yes':'No'}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.blood_type')}}: {{$employee->blood_type->title}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.mechanism_license_number')}}: {{$employee->mechanism_license_number}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.prodriver_license_number')}}: {{$employee->pro_driver_license_num}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.height')}}: {{$employee->height}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.weight')}}: {{$employee->weight}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.cloth_size')}}: {{$employee->cloth_size}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.shoe_size')}}: {{$employee->shoe_size}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.bank_account')}}: {{$employee->bank_account->title}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.additional_info')}}: {{$employee->additional_info}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.excepted_salary')}}: {{$employee->expected_salary}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.interested_position')}}: {{$employee->interested_position->title}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.availability_date')}}: {{$employee->availability_date}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.proposed_salary')}}: {{$employee->proposed_salary}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.source')}}: {{$employee->source->title}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.status')}}: {{$employee->status->title}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.company')}}: {{$employee->company->title}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>{{ trans('employee.barcode')}}: {{$employee->barcode}}</span>
                    </div>
                </div>
            </div>
            <!-- END: Content -->
        </div>
@endsection