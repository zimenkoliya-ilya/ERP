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
                    <h1 class="text-2xl text-theme-9 font-medium leading-none">Create New Bed</h1>
                </div>
                <form action="{{route('camp.bedlist.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 box px-5 py-8 mt-5">
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ old('title')}}" class="input w-full border mt-2" placeholder="title">
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                        <label>Room</label>
                        <select data-search="true" class="tail-select w-full" name="room_id" style="width:100%;">
                            @foreach($ct_room as $temp)
                            <option value="{{$temp->id}}">{{$temp->title}}</option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                        <label>User</label>
                        <select data-search="true" class="tail-select w-full"  name="user_id" style="width:100%;">
                            @if($zg_user == null)
                                <option >No User</option>
                            @else
                                @foreach($zg_user as $temp)
                                <option value="{{$temp->id}}">{{$temp->username}}</option>
                                @endforeach
                            @endif
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