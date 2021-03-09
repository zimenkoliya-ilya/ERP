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
                    <h1 class="text-2xl font-medium leading-none">Edit Storage</h1>
                </div>
                <form action="{{route('warehouse.storage.update', $storage->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 box px-5 py-8 mt-5">
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                        <p>Title</p>
                        <input type="text" name="title" value="{{ $storage->title}}" class="input w-full border mt-2">
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                        <p>Company</p>
                        <select data-search="true" class="tail-select w-full" name="company_id" style="width:100%;">
                            @foreach($company as $temp)
                                @if($storage->company_id == $temp->id)
                                <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                @else
                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endif
                            @endforeach
                        </select> 
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                        <p>Project</p>
                        <select data-search="true" class="tail-select w-full"  name="project_id" style="width:100%;">
                            @foreach($project as $temp)
                                @if($storage->project_id == $temp->id)
                                <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                @else
                                <option value="{{$temp->id}}">{{$temp->title}}</option>
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