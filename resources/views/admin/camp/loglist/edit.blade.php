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
                    <h1 class="text-2xl text-theme-9 font-medium leading-none">Create New Log</h1>
                </div>
                <form action="{{route('camp.loglist.update',$loglist->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 box px-5 py-8 mt-5">
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                        <label>Employee</label>
                        <select class="form-control" name="employee_id">
                            @foreach($employee as $temp)
                                @if($loglist->employee->id==$temp->id)
                                <option value="{{$temp->id}}" selected>{{$temp->first_name}}</option>
                                @else
                                <option value="{{$temp->id}}">{{$temp->first_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div  class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                        <label>Camp</label>
                        <select class="form-control" id="roomget" name="camp_id">
                            @foreach($camps as $temp)
                                @if($camps_first->id==$temp->id)
                                <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                @else
                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div id="rooms" class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                        <label>Room</label>
                        <select class="form-control" id="bedget" name="room_id">
                            @foreach($rooms as $temp)
                                @if($rooms_first->id==$temp->id)
                                <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                @else
                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endif
                            @endforeach
                        </select> 
                    </div>
                    <div id="beds" class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                        <label>Bed</label>
                        <select  class="form-control" name="bed_id">
                            @foreach($beds as $temp)
                                @if($beds_first->id==$temp->id)
                                <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                @else
                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endif
                            @endforeach
                        </select> 
                    </div>
                    <div id="checkin" class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                        <label>Check In Date</label>
                        <input value="{{$loglist->check_in_date}}" name="checkin" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
                    </div>
                    <div id="checkout" class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                        <label>Check Out Date</label>
                        <input value="{{ $loglist->check_out_date}}" name="checkout" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
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
    <script>
        $(document).ready(function () {
            $("#roomget").change(function() {
                var camp_id = $(this).val();
                var rooms="";
                $.ajax({
                    type:'POST',
                    url:'/camp/loglist/roomget',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: { "camp_id" : camp_id},
                    success: function(res){
                        var i = 0;
                        for(i=0;i<res.length;i++){
                            rooms = rooms + "<option value="+res[i].id+">"+res[i].title+"</option>";
                        }
                        $('#rooms').html('');
                        $('#rooms').append(`
                            <label>Room</label>
                            <select class="form-control" id="bedget name="room_id">
                                `+rooms+`
                            </select> 
                        `);
                        var room_id = res[0].id;
                        var beds = "";
                        $.ajax({
                            type:'POST',
                            url:'/camp/loglist/bedget',
                            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                            data: { "room_id" : room_id},
                            success: function(ret){
                                var i = 0;
                                for(i=0;i<ret.length;i++){
                                    beds = beds + "<option value="+ret[i].id+">"+ret[i].title+"</option>";
                                }
                                console.log(beds)
                                $('#beds').html('');
                                $('#beds').append(`
                                    <label>Bed</label>
                                    <select class="form-control" name="bed_id">
                                        `+beds+`
                                    </select> 
                                `);
                            }
                        });
                    }
                });
            });
        });
        $(document).ready(function () {
            $("#bedget").change(function() {
                var room_id = $(this).val();
                var beds="";
                $.ajax({
                    type:'POST',
                    url:'/camp/loglist/bedget',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: { "room_id" : room_id},
                    success: function(res){
                        var i = 0;
                        for(i=0;i<res.length;i++){
                            beds = beds + "<option value="+res[i].id+">"+res[i].title+"</option>";
                        }
                        $('#beds').html('');
                        $('#beds').append(`
                            <label>Bed</label>
                            <select class="form-control" name="bed_id">
                                `+beds+`
                            </select> 
                        `);
                    }
                });
            });
        });
    </script>
        
@endsection