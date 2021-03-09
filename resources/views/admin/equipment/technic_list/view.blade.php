@extends('standard.layout')

@section('title', 'technic detail')

@section('content')  
                <div class="intro-y flex  mt-8">
                    <h1 class="text-4xl text-theme-9 font-medium leading-none">Technic</h1>
                </div>
                
                <div class="intro-y grid grid-cols-12 sm:gap-1 gap-y-1 box px-5 py-8 mt-5">
                    <div class="col-span-12 sm:col-span-4 xl:col-span-3 flex flex-col justify-end ">
                        <img src="{{asset($technic->image)}}" style="width:200px;">
                    </div>
                    <div class="col-span-12 sm:col-span-8 xl:col-span-9 flex flex-col justify-end ">
                       
                    </div>
                    
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end " style="margin-top:25px;">
                        <span>Company: {{$technic->company->title}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>Model: {{$technic->model->model}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>Type: {{$technic->type->title}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>Category: {{$technic->category->title}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>Plate Number: {{$technic->plate_num}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>Park Number: {{$technic->park_num}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>Owner Status: {{$technic->owner_status->title}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>Owner Company: {{$technic->owner_company->title}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>Manufactured Country: {{$technic->manufactured_country->title}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>Manufactured Date: {{$technic->manufactured_date}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>Engine Number: {{$technic->engine_num}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>VIN Number: {{$technic->vin_num}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>Color: {{$technic->color}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>Started Using Date: {{$technic->start_date}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>Motor Power: {{$technic->motor_power}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>Weight(Kg): {{$technic->weight_kg}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>Load Capacity: {{$technic->load_capacity}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>Load Capacity Measurement: {{$technic->load_capacity_measurement->title}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>Seat: {{$technic->seat}}</span>
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                        <span>Active: {{($technic->active==1)?"Yes":"No"}}</span>
                    </div>
                </div>
            </div>
            <!-- END: Content -->
        </div>
@endsection