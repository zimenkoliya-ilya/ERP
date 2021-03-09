@extends('standard.layout')

@section('title', 'employee list')

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
    <h5 class="text-2xl font-medium leading-none">Job List</h5>
</div>
<!-- <div class="grid grid-cols-12 gap-6 mt-1">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <div class="w-56 text-gray-600" >
            <select name="company" data-search="true" class="w-56 tail-select w-full" name="company_id" style="width:140px !important;">
                <option value="">Select Company</option>
                @foreach($company as $temp)
                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                @endforeach
            </select> 
        </div>
        <div class="w-full sm:w-auto mt-0 sm:mt-0 sm:ml-auto md:ml-0 ml-3">
            <div class="w-56 relative text-gray-700 dark:text-gray-300">
                <button type="submit" type="submit" class="button w-20 bg-theme-9 dark:text-gray-300" style="width:100%;">Search</button> 
            </div>
        </div>
    </div>
</div> -->
<div class="w-full sm:w-auto flex mt-4 sm:mt-0 ">
    <a href="{{route('transportation.list.create')}}">
        <button type="submit" id="add_new" class="button text-white bg-theme-1 shadow-md">Add New </button>
    </a>
</div>

<div class="layout-px-spacing">
    
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr> 
                                <th>#</th>
                                <th>Job Date</th>
                                <th>Technic</th>
                                <th>Location</th>
                                <th>TIme</th>
                                <th>{{trans('employee.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0 @endphp
                            @foreach($job_list as $temp)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{$i}}</td>
                                    <td> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            {{$temp->date}}
                                        </div> 
                                    </td>
                                    <td> 
                                        @if($temp->status_id == 1)
                                            <button class="button button--sm mr-1 mb-2 bg-theme-32 text-white" style="width:100%;">Scheduled</button>
                                        @elseif($temp->status_id == 2)
                                            <button class="button button--sm mr-1 mb-2 bg-theme-33 text-white" style="width:100%;">Active on time</button>
                                        @elseif($temp->status_id == 3)
                                            <button class="button button--sm mr-1 mb-2 bg-theme-9 text-white" style="width:100%;">Delivered</button>
                                        @elseif($temp->status_id == 4)
                                            <button class="button button--sm mr-1 mb-2 bg-theme-12 text-white" style="width:100%;">Breakdown</button>
                                        @elseif($temp->status_id == 5)
                                            <button class="button button--sm mr-1 mb-2 bg-theme-6 text-white" style="width:100%;">Cancelled</button>
                                        @endif
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Park №{{$temp->tech->park_num}}
                                        </div> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            {{$temp->make($temp->tech_id)}}{{$temp->model($temp->tech_id)}}/{{$temp->tech->plate_num}}
                                        </div> 
                                        
                                    </td>
                                    <td> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            From: {{$temp->origin->title}}
                                        </div> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            To: {{$temp->destination->title}}
                                        </div> 
                                        @if($temp->status_id == 3)
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Day: {{$temp->duration}} days
                                        </div> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Used Fuel: {{$temp->fuel_used}} Kg
                                        </div> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Total Distance: {{$temp->total_distance}} Km
                                        </div> 
                                        @endif

                                    </td>
                                    <td> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Origin Datetime: <span class="text-theme-1">{{date("Y-m-d h:i",strtotime($temp->origin_datetime))}}</span>
                                        </div>
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Scheduled Datetime: <span class="text-theme-1">{{date("Y-m-d h:i", strtotime($temp->scheduled_datetime))}}</span>
                                        </div> 
                                        @if($temp->destination_datetime !== null)
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Delivered Datetime: <span class="text-theme-1">{{date("Y-m-d h:i", strtotime($temp->destination_datetime))}}</span>
                                        </div> 
                                        @endif
                                    </td>
                                    <td> 
                                        
                                        @if($temp->status_id !== 3)
                                        <div class="justify-center items-center mb-2">
                                            <a href="#" class="flex items-center text-theme-9 mr-3" data-toggle="modal" data-target="#deliver_update{{$i}}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Delivered</a>
                                            <a class="flex items-center text-theme-11 mr-3" href="{{route('transportation.list.breakdown', $temp->id)}}" onclick="return confirm('Really?');"> <i data-feather="triangle" class="w-4 h-4 mr-1"></i> Breakdown</a>
                                            <a class="flex items-center text-theme-6" href="{{route('transportation.list.cancel', $temp->id)}}" onclick="return confirm('Really?');"> <i data-feather="x" class="w-4 h-4 mr-1"></i> Cancel</a>
                                        </div>
                                        <div class="modal" id="deliver_update{{$i}}">
                                            <div class="modal__content" style="width:50%;">
                                                <div class="flex items-center px-5 py-3 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                                    <h2 class="font-medium text-base mr-auto">Destination DateTime</h2>
                                                </div>
                                                <form action="{{route('transportation.list.delivered_update', $temp->id)}}" method="post">
                                                    @csrf
                                                    <div class="p-5 grid grid-cols-12 gap-4 gap-y-3">
                                                        <div class="col-span-12 sm:col-span-6"> 
                                                            <label>Destination DateTime</label> 
                                                            <input  name="destination_time" type="datetime-local" class="input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
                                                        </div>
                                                        <div class="col-span-12 sm:col-span-6"> 
                                                            <label> Used Fuel</label> 
                                                            <input  name="fuel_used" type="number" min="0" step="0.1" class="input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
                                                        </div>
                                                        <div class="col-span-12 sm:col-span-6"> 
                                                            <label>Total Distance</label> 
                                                            <input  name="total_distance" type="number" min="0" step="0.1" class="input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
                                                        </div>
                                                    </div>
                                                    <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> 
                                                        <button type="submit" class="button w-20 bg-theme-1 text-white">Update</button> 
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center text-theme-1 mr-3" href="{{route('transportation.list.edit', $temp->id)}}"> 
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                            </a>    
                                            <a class="flex items-center text-theme-6" href="{{ route('transportation.list.destory', $temp->id)}}" onclick="return confirm('Really');">
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
    $(document).ready(function(){
        $("#add_new").click(function(){
            var company = $("#company").val();
            location.href() = "/transportation/list/create/"+company;
        });
    });
</script>
@endsection