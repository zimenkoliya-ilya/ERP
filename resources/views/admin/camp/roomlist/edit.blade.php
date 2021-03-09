@extends('standard.layout')

@section('title', 'new employee')

@section('content')  
                <div class="intro-y flex items-center mt-8">
                    <h1 class="text-2xl text-theme-9 font-medium leading-none">Edit Room</h1>
                </div>
                <form action="{{route('camp.roomlist.update',$ct_room->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 box px-5 py-8 mt-5">
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                        <label>Title</label>
                        <input type="text" name="title" value="{{$ct_room->title}}" class="input w-full border mt-2" placeholder="title">
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                        <label>Camp</label>
                        <select data-search="true" class="tail-select w-full" name="camp_id" style="width:100%;">
                            @foreach($ct_camp as $temp)
                                @if($ct_room->camp_id == $temp->id)
                                <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                @else
                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endif
                            @endforeach
                        </select> 
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                        <label>User</label>
                        <select data-search="true" class="tail-select w-full"  name="user_id" style="width:100%;">
                            @foreach($zg_user as $temp)
                                @if($ct_room->user_id == $temp->id)
                                <option value="{{$temp->id}}" selected>{{$temp->username}}</option>
                                @else
                                <option value="{{$temp->id}}">{{$temp->username}}</option>
                                @endif
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