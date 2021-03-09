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
                    <h1 class="text-2xl text-theme-9 font-medium leading-none">Create New Item</h1>
                </div>
                <form action="{{route('warehouse.item.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 box px-5 py-8 mt-5">
                    <div class="col-span-12 sm:col-span-4 xl:col-span-3 flex flex-col justify-end items-center">
                        <div class="upload mt-4 pr-md-4" style="width:200px;">
                            <input type="file" id="input-file-max-fs" name = "image" class="dropify" data-default-file="{{asset('assets/img/200x200.jpg')}}" data-max-file-size="5M" />
                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> {{ trans('employee.upload_picture')}}</p>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-8 xl:col-span-9 flex flex-col justify-end ">
                        
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                        <p>BarCode</p>
                        <input type="text" name="barcode" value="{{ old('barcode')}}" class="input w-full border mt-2">
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                        <p>Title</p>
                        <input type="text" name="title" value="{{ old('title')}}" class="input w-full border mt-2">
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                        <p>Company</p>
                        <select data-search="true" class="tail-select w-full" name="company_id" style="width:100%;">
                            @foreach($company as $temp)
                            <option value="{{$temp->id}}">{{$temp->title}}</option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                        <p>User</p>
                        <select data-search="true" class="tail-select w-full"  name="user_id" style="width:100%;">
                            @foreach($user as $temp)
                            <option value="{{$temp->id}}">{{$temp->username}}</option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                        <p>Item Type</p>
                        <select data-search="true" class="tail-select w-full"  name="item_type_id" style="width:100%;">
                            @foreach($item_type as $temp)
                            <option value="{{$temp->id}}">{{$temp->title}}</option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                        <p>Measurement</p>
                        <select data-search="true" class="tail-select w-full"  name="measurement_id" style="width:100%;">
                            @foreach($measurement as $temp)
                            <option value="{{$temp->id}}">{{$temp->title}}</option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end ">
                       
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end">
                        <p>Description</p>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
                        </div> 
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