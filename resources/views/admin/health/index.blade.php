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

<div class="layout-px-spacing">
    <div class="intro-y flex items-center mt-8">
        <h5 class="text-2xl font-medium leading-none">Health, Safety and environment - Daily Report</h5>
    </div>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0 ">
        <a href="{{route('health.create')}}" class="mr-2"><button type="button" class="button text-white bg-theme-1 shadow-md mr-2">Add New</button></a>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>company</th>
                                <th>project</th>
                                <th>temp day</th>
                                <th>temp night</th>
                                <th>project hour</th>
                                <th>day hour</th>
                                <th>free day</th>
                                <th>wind day</th>
                                <th>wind night</th>
                                <th>weather</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0; @endphp
                            @foreach($health as $temp)
                                @php $i++ @endphp
                                <td>            
                                    <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                        {{$i}}
                                    </div> 
                                </td>
                                <td>
                                    <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                        {{$temp->date}}
                                    </div>
                                </td>
                                <td> 
                                    <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                        {{$temp->company}}
                                    </div> 
                                </td>
                                <td>            
                                    <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                        {{$temp->project}}
                                    </div> 
                                </td>
                                <td>            
                                    <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                        {{$temp->temp_day}}
                                    </div> 
                                </td>
                                <td>            
                                    <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                        {{$temp->temp_night}}
                                    </div> 
                                </td>
                                <td>            
                                    <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                        {{$temp->project_hour}}
                                    </div> 
                                </td>
                                <td>            
                                    <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                        {{$temp->day_hour}}
                                    </div> 
                                </td>
                                <td>            
                                    <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                        {{$temp->free_day}}
                                    </div> 
                                </td>
                                <td>            
                                    <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                        {{$temp->wind_day}}
                                    </div> 
                                </td>
                                <td>            
                                    <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                        {{$temp->wind_night}}
                                    </div> 
                                </td>
                                <td>            
                                    <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                        {{$temp->weather}}
                                    </div> 
                                </td>  
                                <td>
                                    <div class="flex justify-center items-center">
                                        <a href="{{ route('health.view',$temp->id)}}" class="flex items-center text-theme-1 mr-3" href="javascript:;">
                                            <i data-feather="eye" class="w-4 h-4 mr-1"></i>
                                        </a>
                                        <a href="{{ route('health.edit',$temp->id)}}" class="flex items-center text-theme-1 mr-3" href="javascript:;">
                                            <i data-feather="edit" class="w-4 h-4 mr-1"></i>
                                        </a>
                                        <a href="{{ route('health.destroy',$temp->id)}}" class="flex items-center text-theme-6 mr-3" href="javascript:;">
                                            <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                                        </a>
                                    </div>
                                </td>
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
                    console.log(delete_item[i].checked);
                }
            }else{
                for(i=0;i<delete_item.length;i++){
                    delete_item[i].checked =false;
                    console.log(delete_item[i].checked);
                }                
            }
           
        }
    </script>
@endsection