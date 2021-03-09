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
            <h4 class="leading-none">Create Fuel Transaction</h4>
        </div>
        <div class="intro-y box">
            <div class="p-5">
                <form action="{{route('repair.list.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-12 gap-4 gap-y-5" id="repair">
                        <div class="intro-y col-span-3">
                            <span>Company</span>
                            <div class="mt-2">
                                <select onchange="company_change(this)" name="company_id"  data-search="true" class="tail-select w-full" required="required">
                                    @foreach($company as $temp)
                                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3">
                            <span>Customer</span>
                            <div class="mt-2">
                                <select data-search="true" name="customer_id" data-search="true" class="tail-select w-full" required="required">
                                    <option>Select</option>
                                    @foreach($customer as $temp)
                                    <option value="{{$temp->id}}">{{$temp->customer->customer_name}}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3">
                            <span>Projct</span>
                            <div class="mt-2">
                                <select name="project_id"  data-search="true" class="tail-select w-full" required="required">
                                    <option>Select</option>
                                    @foreach($project as $temp)
                                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3">
                            <span>Employee</span>
                            <div class="mt-2">
                                <select name="employee_id"  data-search="true" class="tail-select w-full" required="required">
                                    <option>Select</option>
                                    @foreach($employee as $temp)
                                    <option value="{{$temp->id}}">{{$temp->first_name}}/{{$temp->registration_num}}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3">
                            <span>Start Date</span>
                            <input style="border-color:lightgray !important;" name="start_datetime" type="datetime-local" value="{{old('start_datetime')}}" id="DateInput" class="input w-full border mt-2 block" autocomplete="off" required="required">                        
                        </div>
                        <div class="intro-y col-span-3">
                            <span>Time Type</span>
                            <div class="mt-2">
                                <select name="time_type_id"  data-search="true" class="tail-select w-full" required="required">
                                    <option>Select</option>
                                    @foreach($time_type as $temp)
                                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3">
                            <span>repair_reason</span>
                            <input style="border-color:lightgray !important;" type="text" name="repair_reason" value="{{ old('repair_reason')}}" class="input w-full border mt-2">
                        </div>
                        <div class="intro-y col-span-3">
                            <span>Description</span>
                            <input style="border-color:lightgray !important;" type="text" name="repair_description" value="{{ old('repair_description')}}" class="input w-full border mt-2">
                        </div>
                        <div class="intro-y col-span-3">
                            <span>Shift</span>
                            <input style="border-color:lightgray !important;" type="text" name="shift_id" value="{{ old('shift_id')}}" class="input w-full border mt-2">
                        </div>
                        <div class="intro-y col-span-3">
                            <span>In Moto Hour</span>
                            <input style="border-color:lightgray !important;" type="text" name="in_moto_hour" value="{{ old('in_moto_hour')}}" class="input w-full border mt-2">
                        </div>
                        <div class="intro-y col-span-3">
                            <span>Out Moto Hour</span>
                            <input style="border-color:lightgray !important;" type="text" name="out_moto_hour" value="{{ old('out_moto_hour')}}" class="input w-full border mt-2">
                        </div>
                        <div class="intro-y col-span-3">
                            <span>In Speedometer</span>
                            <input style="border-color:lightgray !important;" type="text" name="in_speedometer" value="{{ old('in_speedometer')}}" class="input w-full border mt-2">
                        </div>
                        <div class="intro-y col-span-3">
                            <span>On Speedometer</span>
                            <input style="border-color:lightgray !important;" type="text" name="on_speedometer" value="{{ old('on_speedometer')}}" class="input w-full border mt-2">
                        </div>
                        <div class="intro-y col-span-3">
                            <span>Category</span>
                            <div class="mt-2">
                                <select name="category_id"  data-search="true" class="tail-select w-full" required="required">
                                    <option>Select</option>
                                    @foreach($category as $temp)
                                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3">
                            <span>Repair Type</span>
                            <div class="mt-2">
                                <select name="repair_type_id"  data-search="true" class="tail-select w-full" required="required">
                                    <option>Select</option>
                                    @foreach($type as $temp)
                                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                                    @endforeach
                                </select>
                            </div> 
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
            url:'/repair/list/get_data',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "company_id" : e.value},
            success: function(data){
                $("#repair").html("");
                $("#repair").append(data);
            }
        });
        
    }
</script>
@endsection