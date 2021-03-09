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
    <h5 class="text-2xl font-medium leading-none">Location</h5>
</div>
<div class="w-full sm:w-auto flex mt-4 sm:mt-0 ">
    <a href="{{route('transportation.location.create')}}">
        <button type="submit" id="add_new" class="button text-white bg-theme-1 shadow-md">Add Location</button>
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
                                <th>Title</th>
                                <th>Length</th>
                                <th>company&project</th>
                                <th>additional info</th>
                                <th>address</th>
                                <th>state&district</th>
                                <th>{{trans('employee.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0 @endphp
                            @foreach($location as $temp)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{$i}}</td>
                                    <td> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            {{$temp->title}}
                                        </div> 
                                    </td>
                                    <td> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Latitude: {{$temp->latitude}}
                                        </div> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            longitude: {{$temp->longitude}}
                                        </div> 
                                    </td>
                                    <td> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            {{$temp->company->title}}
                                        </div>
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            {{$temp->project->title}}
                                        </div>  
                                    </td>
                                    <td> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            state: {{$temp->state->title}}
                                        </div> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            district: {{$temp->district->title}}
                                        </div> 
                                    </td>
                                    <td> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            {{$temp->address}}
                                        </div> 
                                    </td>
                                    <td> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            {{$temp->additional_point_info}}
                                        </div> 
                                    </td>
                                    <td> 
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center text-theme-1 mr-3" href="{{route('transportation.location.edit', $temp->id)}}"> 
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                            </a>    
                                            <a class="flex items-center text-theme-6" href="{{ route('transportation.location.destroy', $temp->id)}}" onclick="return confirm('Really');">
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