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
<form action="{{ route('employee_delete')}}" method="post">     
    @csrf
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0 ">
        <button type="submit" class="button text-white bg-theme-6 shadow-md mr-2">{{ trans('employee.delete_employee')}}</button>
        <a href="{{route('new_employee_createview')}}" class="ml-auto mr-2"><button type="button" class="button text-white bg-theme-1 shadow-md mr-2 ml-auto">{{trans('employee.addnewemployee')}}</button></a>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="checkbox-column sorting_asc" rowspan="1" colspan="1" aria-label=" Record Id " style="width: 63px;">
                                    <label class="new-control new-checkbox checkbox-outline-danger m-auto">
                                    <input onclick="delete_check(this)" type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">
                                    <span class="new-control-indicator"></span><span style="visibility:hidden">c</span>
                                    </label>
                                </th>   
                                <th></th>
                                <th>{{trans('employee.employee_name')}}</th>
                                <th></th>
                                <th>Approve</th>
                                <th style="width:10%;">{{trans('employee.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employee as $temp)
                                <tr>
                                    <td class="checkbox-column sorting_1">
                                        <label class="new-control new-checkbox checkbox-outline-danger  m-auto">
                                        <input type="checkbox" value="{{$temp->id}}" name="employee_delete_item[]" class="new-control-input child-chk select-customers-info delete_item" id="customer-all-info">
                                        <span class="new-control-indicator"></span><span style="visibility:hidden">c</span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="">
                                                <img alt="avatar" class="img-fluid rounded-circle" src="{{ asset($temp->image)}}" style="width:80px; height:80px;">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            <i data-feather="user" class="w-3 h-3 mr-2" style="float: left;"></i> 
                                            <a href="{{ route('employee_list_view',$temp->id)}}" class="flex items-center text-theme-1 mr-3">
                                                <b>{{$temp->first_name}}{{$temp->middle_name}}{{$temp->last_name}}</b>
                                            </a>
                                        </div> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            {{$temp->product_department($temp->interested_position_id)}}
                                        </div> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            {{$temp->interested_position->title}}
                                        </div> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            {{$temp->bank->account_number}}
                                        </div> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            <i data-feather="phone" class="w-3 h-3 mr-2" style="float: left;"></i> 
                                            {{$temp->phone}}
                                        </div>
                                    </td>
                                    <td>            
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Expected Salary: {{$temp->expected_salary}}₮
                                        </div> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Address: {{$temp->address}}
                                        </div> 
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            <i data-feather="at-sign" class="w-3 h-3 mr-2" style="float: left;"></i> 
                                            {{$temp->email}}
                                        </div>
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-1">
                                            Filled: {{$temp->updated_at}}
                                        </div>                   
                                    </td>
                                    <td>
                                        <div class="flex justify-center items-center">
                                            <a href="#" class="flex items-center text-theme-9 mr-3"> 
                                                <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                                                    <input {{($temp->hired_status==1)?'checked':''}} data-target="#radio" class="show-code input input--switch border" type="checkbox" onclick="hire_employee({{$temp->id}}, {{$temp->hired_status}})">
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex justify-center items-center">
                                            
                                            <a href="{{ route('employee_list_edit',$temp->id)}}" class="flex items-center text-theme-1 mr-3" href="javascript:;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
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
</form>
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
        function hire_employee(id, value){
            var set_start = value;
            $.ajax({
                type:'POST',
                url:'/hire_employee',
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