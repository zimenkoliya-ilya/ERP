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
                    <h1 class="text-2xl font-medium leading-none">Create New Order</h1>
                </div>
                <form action="{{route('warehouse.order.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 box px-5 py-8 mt-5">
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                        <p>Order Number</p>
                        <input type="number" name="order_num" value="{{ old('order_num')}}" class="input w-full border mt-2">
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                        <p>Order Date</p>
                        <input value="{{old('order_date')}}" name="order_date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
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
                        <p>Order User</p>
                        <select data-search="true" class="tail-select w-full"  name="order_user_id" style="width:100%;">
                            @foreach($order_user as $temp)
                                <option value="{{$temp->id}}">{{$temp->username}}</option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                        <p>Supply User</p>
                        <select data-search="true" class="tail-select w-full"  name="supply_user_id" style="width:100%;">
                            @foreach($supply_user as $temp)
                                <option value="{{$temp->id}}">{{$temp->username}}</option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                        <p>Supply Date</p>
                        <input value="{{old('supply_date')}}" name="supply_date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
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