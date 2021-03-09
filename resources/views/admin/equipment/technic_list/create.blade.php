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
            <h1 class="text-2xl text-theme-9 font-medium leading-none">Create New Room</h1>
        </div>
        <form action="{{route('equipment.technic_list.store')}}" method="post" enctype="multipart/form-data">
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
                    <label>Company</label>
                    <select data-search="true" onchange="company_change(this)" class="tail-select w-full" name="company_id" style="width:100%;">
                        @foreach($zg_company as $temp)
                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                        @endforeach
                    </select>             
                </div>
                <div id="customer" class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                    <label>Customer</label>
                    <select data-search="true" class="tail-select w-full" name="customer_id" style="width:100%;">
                        <option>Select</option>
                        @foreach($customer as $temp)
                        <option value="{{$temp->id}}">{{$temp->customer_name}}</option>
                        @endforeach
                    </select> 
                </div>
                <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                    <label>Model</label>
                    <select data-search="true" class="tail-select w-full" name="model_id" style="width:100%;">
                        @foreach($model as $temp)
                        <option value="{{$temp->id}}">{{$temp->model}}</option>
                        @endforeach
                    </select> 
                </div>
                <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                    <label>Technic Type</label>
                    <select data-search="true" class="tail-select w-full"  name="type_id" style="width:100%;">
                        @foreach($technic_type as $temp)
                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                        @endforeach
                    </select> 
                </div>
                <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                    <label>Category</label>
                    <select data-search="true" class="tail-select w-full"  name="category_id" style="width:100%;">
                        @foreach($category as $temp)
                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                        @endforeach
                    </select> 
                </div>
                <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                    <label>ID Card №</label>
                    <input type="text" name="id_card_num" value="{{ old('id_card_num')}}" class="input w-full border mt-2" placeholder="title">
                </div>
                <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                    <label>Plate Number</label>
                    <input type="text" name="plate_num" value="{{ old('plate_num')}}" class="input w-full border mt-2" placeholder="title">
                </div>
                <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                    <label>Park Number</label>
                    <input type="text" name="park_num" value="{{ old('park_num')}}" class="input w-full border mt-2" placeholder="title">
                </div>
                <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                    <label>Owner Status</label>
                    <select data-search="true" class="tail-select w-full"  name="owner_status_id" style="width:100%;">
                        @foreach($owner_status as $temp)
                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                        @endforeach
                    </select> 
                </div>
                <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                    <label>Owner Comapy</label>
                    <select data-search="true" class="tail-select w-full"  name="owner_company_id" style="width:100%;">
                        @foreach($zg_company as $temp)
                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                        @endforeach
                    </select> 
                </div> 
                <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                    <label>Manufactured Country</label>
                    <select data-search="true" class="tail-select w-full"  name="manufactured_country_id" style="width:100%;">
                        @foreach($country as $temp)
                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                        @endforeach
                    </select> 
                </div>
                <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                    <label>Manufactured Date</label>
                    <input value="{{ old('manufactured_date')}}" name="manufactured_date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
                </div>
                <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                    <label>Engine Number</label>
                    <input type="text" name="engine_num" value="{{ old('engine_num')}}" class="input w-full border mt-2" placeholder="title">
                </div>
                <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                    <label>VIN Number</label>
                    <input type="text" name="vin_num" value="{{ old('vin_num')}}" class="input w-full border mt-2" placeholder="title">
                </div>   
                <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                    <label>Color</label>
                    <input type="text" name="color" value="{{ old('color')}}" class="input w-full border mt-2" placeholder="title">
                </div>
                <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                    <label>Started Using Date</label>
                    <input value="{{ old('start_date')}}" name="start_date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
                </div>
                <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                    <label>Motor Power</label>
                    <input type="text" name="motor_power" value="{{ old('motor_power')}}" class="input w-full border mt-2" placeholder="title">
                </div>
                <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                    <label>Weight(Kg)</label>
                    <input type="number" min="0" max="100000" step="0.001" name="weight_kg" value="{{ old('weight_kg')}}" class="input w-full border mt-2" placeholder="title">
                </div>
                <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                    <label>Load Capacity</label>
                    <input type="number" min="0" max="100000" step="0.001" name="load_capacity" value="{{ old('load_capacity')}}" class="input w-full border mt-2" placeholder="title">
                </div>
                <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                    <label>Load Capacity Measurement</label>
                    <select data-search="true" class="tail-select w-full"  name="load_capacity_measurement_id" style="width:100%;">
                        @foreach($load_measurement as $temp)
                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                        @endforeach
                    </select> 
                </div>
                <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                    <label>Seat</label>
                    <input type="number" name="seat" value="{{ old('seat')}}" class="input w-full border mt-2" placeholder="title">
                </div>
                <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                    <label>Active</label>
                    <select data-search="true" class="tail-select w-full"  name="active" style="width:100%;">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
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

@section('script')
<link rel="stylesheet" href="{{ asset('dist/css/template.css')}}">
<link rel="stylesheet" href="{{ asset('dist/css/select2.min.css')}}" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script>
    $(function() {
        $( "#DateInput" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
    });

    function applySelect2() {
        var lll = $(".js-example-basic-single");
        console.log(lll.length);
        $(".js-example-basic-single").select2();
    }
    $(function() {
        $( "#DateInput" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
    function company_change(e){
        $.ajax({
            type:'POST',
            url:'/equipment/technic_list/get_customer',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "company_id" : e.value},
            success: function(data){
                $("#customer").html("");
                $("#customer").append(data);
            }
        });
        
    }
</script>
@endsection