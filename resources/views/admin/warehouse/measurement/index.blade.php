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
        <h5 class="text-2xl text-theme-9 font-medium leading-none">Item Measurement</h5>
    </div>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0 ">
        <a href="#" data-toggle="modal" data-target="#new_measurement" class="ml-auto mr-2">
            <button type="button" class="button text-white bg-theme-1 shadow-md mr-2 ml-auto">
                Add New
            </button>
        </a>
        <div class="modal" id="new_measurement">
            <div class="modal__content" style="width:50%;">
                <div class="flex items-center px-5 py-4 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto text-theme-1">New Item Measurement</h2>
                </div>
                <form action="{{route('warehouse.measurement.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="p-5 grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-6"> 
                            <label>Title</label> 
                            <input type="text" name="title" class="input w-full border mt-2"> 
                        </div> 
                    </div>
                    <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> 
                        <button type="submit" class="button w-20 bg-theme-1 text-white">Submit</button> 
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>  
                                <th>#</th>
                                <th>title</th>
                                <th style="width:10%;">{{trans('employee.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0; @endphp
                            @foreach($measurement as $temp)
                            @php $i++; @endphp
                            <tr>
                                <td>{{$i}}</td>
                                <td>
                                    <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                        {{$temp->title}}
                                    </div>
                                </td>  
                                <td>
                                    <div class="flex justify-center items-center">
                                        <a href="#" data-toggle="modal" data-target="#item_edit{{$i}}" class="flex items-center text-theme-1 mr-3" href="javascript:;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye mx-auto"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </a>
                                        <a href="{{ route('warehouse.measurement.destroy', $temp->id)}}" onclick="return confirm('Are You Really?');" class="flex items-center text-theme-6 mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mx-auto"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </a>
                                    </div>
                                    <div class="modal" id="item_edit{{$i}}">
                                        <div class="modal__content" style="width:50%;">
                                            <div class="flex items-center px-5 py-4 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                                <h2 class="font-medium text-base mr-auto text-theme-1">New Item Type</h2>
                                            </div>
                                            <form action="{{route('warehouse.measurement.update', $temp->id)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="p-5 grid grid-cols-12 gap-4 gap-y-3">
                                                    <div class="col-span-12 sm:col-span-6"> 
                                                        <label>Title</label> 
                                                        <input value="{{$temp->title}}" name="title" type="text" name="contract_num" class="input w-full border mt-2"> 
                                                    </div> 
                                                </div>
                                                <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> 
                                                    <button type="submit" class="button w-20 bg-theme-1 text-white">Submit</button> 
                                                </div>
                                            </form>
                                        </div>
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