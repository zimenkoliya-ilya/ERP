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
            <h4 class="leading-none">Create Location</h4>
        </div>
        <div class="intro-y box">
            <div class="p-5">
                <form action="{{route('transportation.location.update', $location->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div id="transport" class="grid grid-cols-12 gap-4 gap-y-5">
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>Title</label>
                            <input type="text" name="title" value="{{ $location->title}}" class="input w-full border mt-2">
                        </div>
                        <div class="intro-y col-span-3">
                            <label>Project</label>
                            <div class="mt-2">
                                <select name="project_id"  data-search="true" class="tail-select w-full" required="required">
                                    @foreach($project as $temp)
                                        @if($location->project_id == $temp->id)
                                            <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                        @else
                                            <option value="{{$temp->id}}">{{$temp->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>Latitude</label>
                            <input type="text" name="latitude" value="{{ $location->latitude}}" class="input w-full border mt-2">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>Longitude</label>
                            <input type="text" name="longitude" value="{{ $location->longitude}}" class="input w-full border mt-2">
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>Address</label>
                            <input type="text" name="address" value="{{ $location->address}}" class="input w-full border mt-2">
                        </div>
                        <div class="intro-y col-span-3">
                            <label>State</label>
                            <div class="mt-2">
                                <select data-search="true" name="state_id" data-search="true" class="tail-select w-full" required="required">
                                    @foreach($state as $temp)
                                        @if($location->state_id == $temp->id)
                                            <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                        @else
                                            <option value="{{$temp->id}}">{{$temp->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3">
                            <label>District</label>
                            <div class="mt-2">
                                <select name="district_id" data-search="true" class="tail-select w-full" required="required">
                                    @foreach($district as $temp)
                                        @if($location->district_id == $temp->id)
                                            <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                        @else
                                            <option value="{{$temp->id}}">{{$temp->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                            <label>Additional Point Info</label>
                            <input type="text" name="additional_point_info" value="{{$location->additional_point_info}}" class="input w-full border mt-2">
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