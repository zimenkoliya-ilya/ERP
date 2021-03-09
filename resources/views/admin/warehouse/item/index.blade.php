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
        <h5 class="text-2xl font-medium leading-none">Item Lists</h5>
    </div>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0 ">
        <a href="{{route('warehouse.item.create')}}" class="ml-auto mr-2">
            <button type="button" class="button text-white bg-theme-1 shadow-md mr-2 ml-auto">
            Add New
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
                                <th style="width:10%;">image</th>
                                <th>BarCode</th>
                                <th>title</th>
                                <th>item Type</th>
                                <th>measurment</th>
                                <th>user</th>
                                <th>company</th>
                                <th>{{trans('employee.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($item as $temp)
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="">
                                            <img alt="avatar" class="img-fluid rounded-circle" src="{{ asset(($temp->image)?$temp->image:'dist/images/profile-10.jpg')}}" style="width:80px; height:80px;">
                                        </div>
                                    </div>
                                </td>
                                <td> 
                                    <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                        {{$temp->barcode}}
                                    </div> 
                                </td>
                                <td>            
                                    <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                        {{$temp->title}}
                                    </div> 
                                </td>
                                <td>            
                                    <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                        {{$temp->item_type->title}}
                                    </div> 
                                </td>  
                                <td>            
                                    <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                        {{$temp->measurement->title}}
                                    </div> 
                                </td>
                                <td>            
                                    <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                        {{$temp->user->username}}
                                    </div> 
                                </td>
                                <td>            
                                    <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                        {{$temp->company->title}}
                                    </div> 
                                </td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <a href="{{ route('warehouse.item.edit',$temp->id)}}" class="flex items-center text-theme-1 mr-3" href="javascript:;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        </a> 
                                        <a href="{{ route('warehouse.item.destroy',$temp->id)}}" onclick="return confirm('Really?');" class="flex items-center text-theme-6 mr-3" href="javascript:;">
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
        function bed_active(id, value){
            var set_start = value;
            $.ajax({
                type:'POST',
                url:'/camp/bedlist/active',
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                data: { "user_id" : id , "value": set_start},
                success: function(data){
                    if(data == 1){
                        location.reload();
                    }
                }
            });
        }
    </script>
@endsection