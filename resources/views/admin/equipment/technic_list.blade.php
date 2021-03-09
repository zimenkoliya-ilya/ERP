@extends('standard.layout')

@section('title', 'technic list')

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
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
        <!-- BEGIN: General Report -->
        <div class="col-span-12 mt-8">
            <div class="intro-y flex items-center h-10">
                <h3>
                    Technic List
                </h3>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-1">
                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                    <div class="zoom-in">
                        <div class="box p-4">
                            <div class="flex">
                                <span class="text-3xl font-bold leading-8">{{$today_available_vehicle}}</span>
                                <div class="ml-auto">
                                    @if($dif_vehicle >= 0)
                                    <button style="width:75px" class="button button--sm w-200 mb-0 bg-theme-9 text-white">
                                        {{$inc_vehicle}}%
                                        <svg xmlns="http://www.w3.org/2000/svg" style="float:right;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                    </button>
                                    @else
                                    <button style="width:75px" class="button button--sm w-200 mb-0 bg-theme-6 text-white">
                                        {{ $inc_vehicle}}%
                                        <svg xmlns="http://www.w3.org/2000/svg" style="float:right;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down w-4 h-4"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </button>
                                    @endif
                                </div>
                            </div>
                            <div class="text-gray-600 mt-2">Ready</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                    <div class="zoom-in">
                        <div class="box p-4">
                            <div class="flex">
                                <span class="text-3xl font-bold leading-8">{{$today_hold_vehicle}}</span>
                                <div class="ml-auto">
                                    @if($dif_hold >= 0)
                                    <button style="width:75px" class="button button--sm w-200 mb-0 bg-theme-9 text-white">
                                        {{$inc_hold}}%
                                        <svg xmlns="http://www.w3.org/2000/svg" style="float:right;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                    </button>
                                    @else
                                    <button style="width:75px" class="button button--sm w-200 mb-0 bg-theme-6 text-white">
                                        {{ $inc_hold}}%
                                        <svg xmlns="http://www.w3.org/2000/svg" style="float:right;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down w-4 h-4"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </button>
                                    @endif
                                </div>
                            </div>
                            <div class="text-gray-600 mt-1">On Hold</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                    <div class="zoom-in">
                        <div class="box p-4">
                            <div class="flex">
                                <span class="text-3xl font-bold leading-8">{{$today_trans}}</span>
                                <div class="ml-auto">
                                    @if($dif_trans >= 0)
                                    <button style="width:75px" class="button button--sm w-200 mb-0 bg-theme-9 text-white">
                                        {{$inc_trans}}%
                                        <svg xmlns="http://www.w3.org/2000/svg" style="float:right;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                    </button>
                                    @else
                                    <button style="width:75px" class="button button--sm w-200 mb-0 bg-theme-6 text-white">
                                        {{ $inc_trans}}%
                                        <svg xmlns="http://www.w3.org/2000/svg" style="float:right;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down w-4 h-4"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </button>
                                    @endif
                                </div>
                            </div>
                            <div class="text-gray-600 mt-1">On Transit</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                    <div class="zoom-in">
                        <div class="box p-4">
                            <div class="flex">
                                <span class="text-3xl font-bold leading-8">{{$repair_today}}</span>
                                <div class="ml-auto">
                                    @if($dif_repair >= 0)
                                    <button style="width:75px" class="button button--sm w-200 mb-0 bg-theme-9 text-white">
                                        {{$inc_repair}}%
                                        <svg xmlns="http://www.w3.org/2000/svg" style="float:right;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                    </button>
                                    @else
                                    <button style="width:75px" class="button button--sm w-200 mb-0 bg-theme-6 text-white">
                                        {{ $inc_repair}}%
                                        <svg xmlns="http://www.w3.org/2000/svg" style="float:right;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down w-4 h-4"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </button>
                                    @endif
                                </div>
                            </div>
                            <div class="text-gray-600 mt-1">On Repair</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                    <div class="zoom-in">
                        <div class="box p-4">
                            <div class="flex">
                                <span class="text-3xl font-bold leading-8">{{$today_broken}}</span>
                                <div class="ml-auto">
                                    @if($dif_broken >= 0)
                                    <button style="width:75px" class="button button--sm w-200 mb-0 bg-theme-9 text-white">
                                        {{$inc_broken}}%
                                        <svg xmlns="http://www.w3.org/2000/svg" style="float:right;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                    </button>
                                    @else
                                    <button style="width:75px" class="button button--sm w-200 mb-0 bg-theme-6 text-white">
                                        {{ $inc_broken}}%
                                        <svg xmlns="http://www.w3.org/2000/svg" style="float:right;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down w-4 h-4"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </button>
                                    @endif
                                </div>
                            </div>
                            <div class="text-gray-600 mt-1">Broken Down</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="{{route('equipment.technic_list.search')}}" method="get">
    @csrf
    <div class="grid grid-cols-12 gap-6 mt-1">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="w-full sm:w-auto mt-0 sm:mt-0 sm:ml-auto md:ml-0 ml-3">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input name="username" type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                    <svg id="text_search" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> 
                </div>
            </div>
            <div class="w-full sm:w-auto mt-0 sm:mt-0 sm:ml-auto md:ml-0 ml-3">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input  name="start_date" class="datepicker input w-56 block mx-auto" data-single-mode="true" style="width:100%;" value="Manufactured Start Date" placeholder="Manufactured Start Date">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><line x1="17" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="17" y1="18" x2="3" y2="18"></line></svg>
                </div>
            </div>
            <div class="w-full sm:w-auto mt-0 sm:mt-0 sm:ml-auto md:ml-0 ml-3">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input name="end_date" class="datepicker input w-56 block mx-auto" data-single-mode="true" style="width:100%;" value="Manufactured Start Date" placeholder="Manufactured End Date">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><line x1="17" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="17" y1="18" x2="3" y2="18"></line></svg>
                </div>
            </div>
            <div class="w-full sm:w-auto mt-0 sm:mt-0 sm:ml-auto md:ml-0 ml-3">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <select name="type" data-search="true" class="w-56 tail-select w-full"  style="width:140px !important;">
                        <option value="">Select Type</option>
                        @foreach($type as $temp)
                            <option value="{{$temp->id}}">{{$temp->title}}</option>
                        @endforeach
                    </select> 
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-1">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="w-56 text-gray-600 ml-3">
                <select name="company" data-search="true" class="w-56 tail-select w-full"  style="width:140px !important;">
                    <option value="">Select Company</option>
                    @foreach($company as $temp)
                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                    @endforeach
                </select> 
            </div>
            <div class="w-56 text-gray-600 ml-3" >
                <select name="customer" data-search="true" class="w-56 tail-select w-full"  style="width:140px !important;">
                    <option value="">Select Customer</option>
                    @foreach($customer as $temp)
                        <option value="{{$temp->id}}">{{$temp->customer_name}}</option>
                    @endforeach
                </select> 
            </div>
            <div class="w-56 text-gray-600 ml-3" >
                <select name="model" data-search="true" class="w-56 tail-select w-full"  style="width:140px !important;">
                    <option value="">Select Model</option>
                    @foreach($model as $temp)
                        <option value="{{$temp->id}}">{{$temp->model}}</option>
                    @endforeach
                </select> 
            </div>
            <div class="w-56 text-gray-600 ml-3" >
                <select name="category" data-search="true" class="w-56 tail-select w-full"  style="width:140px !important;">
                    <option value="">Select Category</option>
                    @foreach($category as $temp)
                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                    @endforeach
                </select> 
            </div>
            <div class="w-56 text-gray-600 ml-3" >
                <button type="submit" type="submit" class="button w-15 bg-theme-9 dark:text-gray-300" style="width:100%;">Search</button> 
            </div>
        </div>
    </div>
</form>
<div class="layout-px-spacing">
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0 ">
        <a href="{{route('equipment.technic_list.create')}}" class="ml-auto mr-2">
            <button type="button" class="button text-white bg-theme-1 shadow-md mr-2 ml-auto">
                Add Technic
            </button>
        </a>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr> 
                                <th>№</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th style="width:10%;">{{trans('employee.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0; @endphp
                            @foreach($technic as $temp)
                            @php $i++; @endphp
                            <tr>
                                <td>{{$i}}</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="mr-3">
                                            <img alt="avatar" class="img-fluid" src="{{ asset($temp->image)}}" style="width:140px; height:105px;">
                                        </div>
                                        <div>
                                            <a href="{{ route('equipment.technic_list.view',$temp->id)}}"><h6>{{$temp->plate_num}} (№ {{$temp->park_num}})</h6></a>
                                            <p style="margin:0px !important;">{{$temp->make($temp->model_id)}} {{$temp->model->model}}</p>
                                            <p style="margin:0px !important;">{{$temp->company->title}}</p>
                                            <p style="margin:0px !important;">{{$temp->type->title}}</p>
                                            <p style="margin:0px !important;">{{$temp->category->title}}</p>
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-1 mb-4 lg:mb-0 mr-auto mt-2">
                                        <div class="flex text-gray-600 text-xs">
                                            <div class="mr-auto">Vehicle Readiness Coefficient</div>
                                            <div> 100%</div>
                                        </div>
                                        <div class="w-full h-1 mt-2 bg-gray-400 dark:bg-dark-1 rounded-full">
                                            <div style="width:100%" class="w-1/2 h-full bg-theme-1 dark:bg-theme-10 rounded-full"></div>
                                        </div>
                                    </div>
                                </td>
                                <td style="vertical-align:top;"> 
                                    <div class="flex" style="position:relative;">
                                        Operator 1: Elon Mask
                                        <a href="{{ route('equipment.technic_list.edit',$temp->id)}}" style="position:absolute; right:0px" class="text-theme-1" href="javascript:;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        </a>
                                    </div> 
                                    <div class="flex mt-2" style="position:relative;">
                                        Operator 2: Bill Gates
                                        <a href="{{ route('equipment.technic_list.edit',$temp->id)}}" style="position:absolute; right:0px" class="text-theme-1" href="javascript:;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        </a>                                    </div> 
                                    <div class="text-gray-600 text-xs whitespace-nowrap mt-2">
                                        Customer: {{$temp->customer->customer_name}}
                                    </div> 
                                    <div class="text-gray-600 text-xs whitespace-nowrap mt-2">
                                        Id Card №: {{$temp->id_card_num}}
                                    </div> 
                                    <div class="flex mt-2" style="position:relative;">
                                        Location: bla bla
                                        <a href="{{ route('equipment.technic_list.edit',$temp->id)}}" style="position:absolute; right:0px" class="text-theme-1" href="javascript:;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin mx-auto"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                        </a> 
                                    </div> 
                                </td>
                                <td>            
                                    <div class="mini-report-chart box p-1 zoom-in">
                                        <div class="flex">
                                            <div class="text-lg font-medium truncate mr-3">motor hour</div>
                                            <div class="py-1 px-2 rounded-full text-xs bg-gray-200 dark:bg-dark-5 text-gray-600 dark:text-gray-300 cursor-pointer ml-auto truncate">job done</div>
                                        </div>
                                        <div class="mt-0">
                                            <div class="chartjs-size-monitor">
                                                <div class="chartjs-size-monitor-expand">
                                                    <div class=""></div>
                                                </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                                </div>
                                            </div>
                                            <canvas class="simple-line-chart-1 -ml-1 chartjs-render-monitor" height="106" width="531" style="display: block; width: 300px; height: 100px;"></canvas>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <a href="{{ route('equipment.technic_list.edit',$temp->id)}}" class="flex items-center text-theme-1 mr-3" href="javascript:;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        </a>
                                        <a href="{{ route('equipment.technic_list.destroy',$temp->id)}}" class="flex items-center text-theme-6 mr-3" onclick="return confirm();" href="javascript:;"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mx-auto"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        function delete_check(e){
            var delete_item = document.getElementsByClassName("delete_item");
            var i = 0;
            if(e.checked==true){
                for(i=0;i<delete_item.length;i++){
                    delete_item[i].checked =true;
                }
            }else{
                for(i=0;i<delete_item.length;i++){
                    delete_item[i].checked =false;
                }                
            }
           
        }
        
    </script>
@endsection