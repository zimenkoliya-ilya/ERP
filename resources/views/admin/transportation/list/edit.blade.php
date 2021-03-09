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
                    <h4 class="leading-none">Edit Transport Job</h4>
                </div>
        <div class="intro-y box">
            <div class="p-5">
                <form action="{{route('transportation.list.update', $job_list->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div id="transport" class="grid grid-cols-12 gap-4 gap-y-5">
                        <div class="intro-y col-span-3">
                            <label>Date*</label>
                            <input  name="date" value="{{ $job_list->date}}" type="date" class="input w-full border mt-2 block" placeholder="Transaction Date" autocomplete="off" required="required">
                        </div>
                        <div class="intro-y col-span-3">
                            <label>Company</label>
                            <div class="mt-2">
                                <select onchange="company_change(this)" name="company_id"  data-search="true" class="tail-select w-full" required="required">
                                    @foreach($company as $temp)
                                        @if($job_list->company_id == $temp->id)
                                            <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                        @else
                                            <option value="{{$temp->id}}">{{$temp->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3">
                            <label>Job Type</label>
                            <div class="mt-2">
                                <select data-search="true" name="job_type_id" data-search="true" class="tail-select w-full" required="required">
                                    <option>Select</option>
                                    @foreach($job_type as $temp)
                                        @if($job_list->job_type_id == $temp->id)
                                            <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                        @else
                                            <option value="{{$temp->id}}">{{$temp->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3">
                            <label>Technic</label>
                            <div class="mt-2">
                                <select name="technic_id" data-search="true" class="tail-select w-full" required="required">
                                    <option>Select</option>
                                    @foreach($technic as $temp)
                                        @if($job_list->tech_id == $temp->id)
                                            <option value="{{$temp->id}}" selected {{($temp->status_id !== 1)?"disabled":''}}>
                                                {{$temp->make($temp->model_id)}}{{$temp->model->model}}/{{$temp->type->title}}{{($temp->plate_num!==null)?$temp->plate_num:''}}
                                            </option>
                                        @else
                                            <option value="{{$temp->id}}" {{($temp->status_id !== 1)?"disabled":''}}>
                                                {{$temp->make($temp->model_id)}}{{$temp->model->model}}/{{$temp->type->title}}{{($temp->plate_num!==null)?$temp->plate_num:''}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3">
                            <label>Driver</label>
                            <div class="mt-2">
                                <select name="driver_id" data-search="true" class="tail-select w-full" required="required">
                                    <option>Select</option>
                                    @foreach($employee as $temp)
                                        @if($job_list->employee_id==$temp->id)
                                            <option value="{{$temp->id}}" selected>{{$temp->last_name}}{{$temp->first_name}}/{{$temp->interested_position->title}}</option>
                                        @else
                                            <option value="{{$temp->id}}">{{$temp->last_name}}{{$temp->first_name}}/{{$temp->interested_position->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3">
                            <label>Origin location</label>
                            <div class="mt-2">
                                <select name="origin_location_id" data-search="true" class="tail-select w-full" required="required">
                                    <option>Select</option>
                                    @foreach($location as $temp)
                                        @if($job_list->origin_id == $temp->id)
                                            <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                        @else
                                            <option value="{{$temp->id}}">{{$temp->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3">
                            <label>Transport Start Datetime</label>
                            <input type="datetime-local" name="start_date" value="{{ $job_list->origin_datetime}}" class="mt-2 input w-56 border block mx-auto" data-single-mode="true" placeholder="{{$job_list->origin_datetime}}">
                        </div>
                        <div class="intro-y col-span-3">
                            <label>Destination location</label>
                            <div class="mt-2">
                                <select name="destinc_location_id" data-search="true" class="tail-select w-full" required="required">
                                    <option>Select</option>
                                    @foreach($location as $temp)
                                        @if($job_list->destination_id == $temp->id)
                                            <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                        @else
                                            <option value="{{$temp->id}}">{{$temp->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3 mt-1">
                            <label>Scheduled Destination Datetime</label>
                            <input type="datetime-local" name="scheduled_datetime" value="{{ $job_list->scheduled_datetime}}" class="input w-56 border block mx-auto" data-single-mode="true"  placeholder="$job_list->scheduled_datetime}}">
                        </div>
                        <div class="intro-y col-span-3">
                            <label class = "mt-3">Status</label>
                            <div class="mt-2">
                                <select name="status_id" data-search="true" class="tail-select w-full" required="required">
                                    <option value="">Select</option>
                                    @if($job_list->status_id == 1)
                                    <option value="1" selected>Scheduled</option>
                                    @else
                                    <option value="1">Scheduled</option>
                                    @endif
                                    @if($job_list->status_id == 2)
                                    <option value="2" selected>Active On Job</option>
                                    @else
                                    <option value="2">Active On Job</option>
                                    @endif
                                </select>
                            </div> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end items-center">
                            <label>Description</label>
                            <input type="text" name="description" value="{{ $job_list->description}}" class="input w-full border mt-2" placeholder="title">
                        </div>
                        <div class="col-span-12 sm:col-span-12 xl:col-span-12">
                            <button type="submit" class="button w-24 mr-1 mb-2 bg-theme-9 text-white" style="float:right;">{{ trans('employee.submit')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
            url:'/transportaion/get_company',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "company_id" : e.value},
            success: function(data){
                $("#transport").html("");
                $("#transport").append(data);
            }
        });
        
    }
</script>
@endsection