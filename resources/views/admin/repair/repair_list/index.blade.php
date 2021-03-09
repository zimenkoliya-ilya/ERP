@extends('standard.layout')

@section('title', 'repair list')

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
<div class="w-full sm:w-auto flex mt-4 sm:mt-0 ">
    <a href="{{route('repair.list.create')}}">
        <button type="button" class="button text-white bg-theme-1 shadow-md">Add New </button>
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
                                <th>№</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>{{trans('employee.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0; @endphp
                            @foreach($repair as $temp)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Company: {{$temp->company->title}}
                                        </div>
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Customer: {{$temp->customer->customer_name}}
                                        </div>
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Project: {{$temp->project->title}}
                                        </div>
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Employee: {{$temp->employee->first_name}}
                                        </div>
                                    </td>  
                                    <td>
                                        <div class=" text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Time Type: {{$temp->time_type->title}}
                                        </div>
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            From: {{date("Y-m-d h:i", strtotime($temp->start_datetime))}}
                                        </div>
                                        @if($temp->active==1)
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            To: {{date("Y-m-d h:i", strtotime($temp->end_datetime))}}
                                        </div>
                                        <div class=" text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Date: {{$temp->repair_duration}} days
                                        </div>
                                        @endif
                                    </td>  
                                    <td>
                                        <div class=" text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Repair Type: {{$temp->repair_type->title}}
                                        </div>
                                        <div class=" text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Category: {{$temp->category->title}}
                                        </div>
                                        <div class=" text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Reason:{{$temp->repair_reason}}
                                        </div>
                                        <div class="w-30 text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Description:{{$temp->repair_description}}
                                        </div>
                                    </td>  
                                    <td>
                                        <div class=" text-gray-600 text-xs whitespace-nowrap mt-1">
                                            In Moto Hour: {{$temp->in_moto_hour}}
                                        </div>
                                        <div class=" text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Out Moto Hour: {{$temp->out_moto_hour}}
                                        </div>
                                        <div class=" text-gray-600 text-xs whitespace-nowrap mt-1">
                                            In Speedometer: {{$temp->in_speedometer}}
                                        </div>
                                        <div class=" text-gray-600 text-xs whitespace-nowrap mt-1">
                                            On Speedometer: {{$temp->on_speedometer}}
                                        </div>
                                    </td>  
                                    <td>
                                        <div class=" text-gray-600 text-xs whitespace-nowrap">
                                            @if($temp->active == 1)
                                            <button type="button" class="button text-theme-1 bg-theme-9 shadow-md">
                                                Completed
                                            </button>
                                            @else
                                                <a href="{{route('repair.list.active', $temp->id)}}" onclick="return confirm('Did you finished Repair?');" class="flex items-center text-theme-1 mr-3">
                                                    <button type="button" class="button text-theme-1 bg-theme-6 shadow-md">
                                                        Repairing
                                                    </button>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="flex justify-center items-center  mt-4">
                                            <a href="{{ route('repair.list.edit', $temp->id)}}" class="flex items-center text-theme-1 mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                            </a>
                                            <a href="{{ route('repair.list.destroy', $temp->id)}}" onclick="return confirm('Are You Really?');" class="flex items-center text-theme-6 mr-3">
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

</script>
@endsection