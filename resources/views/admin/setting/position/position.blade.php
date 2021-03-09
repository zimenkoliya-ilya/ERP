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
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                <a href="#" data-toggle="modal" data-target="#new_category">
                    <button class="button text-white bg-theme-1 shadow-md mr-2">Add Position</button>
                </a>
                
                <div class="modal" id="new_category">
                    <div class="modal__content" style="width:50%;">
                        <div class="flex items-center px-5 py-4 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                            <h2 class="font-medium text-base mr-auto text-theme-1">Create New POsition</h2>
                        </div>
                        <form action="{{route('setting.position.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="p-5 grid grid-cols-12 gap-4 gap-y-3">
                                <div class="col-span-12 sm:col-span-6"> 
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{ old('title')}}" class="input w-full border mt-2">
                                </div> 
                                <div class="col-span-12 sm:col-span-6"> 
                                    <label>Department</label>
                                    <select data-search="true" class="tail-select w-full  mt-2"  name="department_id" style="width:100%;">
                                        @foreach($department as $temp)
                                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                                        @endforeach
                                    </select> 
                                </div> 
                                <div class="col-span-12 sm:col-span-6"> 
                                    <label>Company</label>
                                    <select data-search="true" class="tail-select w-full  mt-2"  name="company_id" style="width:100%;">
                                        @foreach($company as $temp)
                                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                                        @endforeach
                                    </select> 
                                </div> 
                                <div class="col-span-12 sm:col-span-6"> 
                                    <label>Available Position</label>
                                    <select data-search="true" class="tail-select w-full  mt-2"  name="available_position" style="width:100%;">
                                        @foreach($avail_position as $temp)
                                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                                        @endforeach
                                    </select> 
                                </div> 
                            </div>
                            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> 
                                <button type="submit" class="button w-20 bg-theme-1 text-white">Submit</button> 
                            </div>
                        </form>
                    </div>
                </div>
                <div class="dropdown">
                    
                </div>
                <div class="w-56 md:block mx-auto text-gray-600" style="margin-right:10px !important">
                    <select id="company_search" data-search="true" class="w-56 tail-select w-full" name="company_id" style="width:140px !important;">
                        <option value="0">Select Company</option>
                        @foreach($company as $temp)
                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                        @endforeach
                    </select> 
                </div>
                <div class="w-full sm:w-auto mt-0 sm:mt-0 sm:ml-auto md:ml-0">
                    <div class="w-56 relative text-gray-700 dark:text-gray-300">
                        <input id="search_box" type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                        <svg id="text_search" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> 
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5" id="search_result">
        @php $i = 0; @endphp
            @foreach($position as $temp)
            @php $i++; @endphp
            <div class="intro-y col-span-12 md:col-span-6">
                <div class="box">
                    <div class="flex flex-col lg:flex-row items-center p-1 border-b border-gray-200 dark:border-dark-5">
                        <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1 pt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users mx-auto"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                        <div class="lg:ml-2 lg:mr-auto lg:text-left mt-3 lg:mt-0">
                            <a href="" class="font-medium">{{$temp->title}}</a> 
                            <div class="text-gray-600 text-xs mt-0.5">Department: {{$temp->department->title}}</div>
                            <div class="text-gray-600 text-xs mt-0.5">Company:  {{$temp->company->title}}</div>
                        </div>
                        <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-2 lg:mt-0 mr-5">
                            <div class="font-medium">Vacancy</div> 
                            <button type="button" style="border-color:gray !important" class="pl-3 pr-3 button button--sm text-gray-700 border border-gray-300 gray:border-gray-5 gray:text-gray-300">
                                {{$temp->employee_number($temp->id)}}/{{$temp->timeoff_employee($temp->id)}}
                            </button>
                        </div>
                    </div>
                    <div class="flex flex-wrap lg:flex-nowrap items-center justify-center p-1">
                        <div class="w-full lg:w-1/2 mb-4 lg:mb-0 mr-auto mt-2">
                            <div class="flex text-gray-600 text-xs">
                                <div class="mr-auto">Vacancy Completion</div>
                                <div> {{$temp->percent($temp->id)}}%</div>
                            </div>
                            <div class="w-full h-1 mt-2 bg-gray-400 dark:bg-dark-1 rounded-full">
                                <div style="width:{{$temp->percent($temp->id)}}%" class="w-1/2 h-full {{($temp->timeoff_employee($temp->id)==0)?'':'bg-theme-1'}} dark:bg-theme-10 rounded-full"></div>
                            </div>
                        </div>
                        <button class="button button--sm text-white bg-theme-1 mr-2">View Workers</button>
                        <a href="#"  data-toggle="modal" data-target="#new_category{{$i}}"><button class="button button--sm text-white bg-theme-1 mr-2">Edit</button></a>
                        <a href="{{ route('setting.position.destroy', $temp->id)}}" onclick="return confirm('Really?');"><button class="button button--sm text-white bg-theme-6 ">Delete</button></a>
                    </div>
                    
                    <div class="modal" id="new_category{{$i}}">
                        <div class="modal__content" style="width:50%;">
                            <div class="flex items-center px-5 py-4 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto text-theme-1">Create New POsition</h2>
                            </div>
                            <form action="{{route('setting.position.update', $temp->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="p-5 grid grid-cols-12 gap-4 gap-y-3">
                                    <div class="col-span-12 sm:col-span-6"> 
                                        <label>Title</label>
                                        <input type="text" name="title" value="{{$temp->title}}" class="input w-full border mt-2">
                                    </div> 
                                    <div class="col-span-12 sm:col-span-6"> 
                                        <label>Department</label>
                                        <select data-search="true" class="tail-select w-full mt-2"  name="department_id" style="width:100%;">
                                            @foreach($department as $tempp)
                                                @if($temp->department_id == $tempp->id)
                                                <option value="{{$tempp->id}}" selected>{{$tempp->title}}</option>
                                                @else
                                                <option value="{{$tempp->id}}">{{$tempp->title}}</option>
                                                @endif
                                            @endforeach
                                        </select> 
                                    </div> 
                                    <div class="col-span-12 sm:col-span-6"> 
                                        <label>Company</label>
                                        <select data-search="true" class="tail-select w-full mt-2"  name="company_id" style="width:100%;">
                                            @foreach($company as $tempp)
                                                @if($temp->company_id == $tempp->id)
                                                <option value="{{$tempp->id}}" selected>{{$tempp->title}}</option>
                                                @else
                                                <option value="{{$tempp->id}}">{{$tempp->title}}</option>
                                                @endif
                                            @endforeach
                                        </select> 
                                    </div> 
                                    <div class="col-span-12 sm:col-span-6"> 
                                        <label>Available Position</label>
                                        <select data-search="true" class="tail-select w-full mt-2"  name="available_position" style="width:100%;">
                                            @foreach($avail_position as $tempp)
                                                @if($temp->available_position == $tempp->id)
                                                <option value="{{$tempp->id}}" selected>{{$tempp->title}}</option>
                                                @else
                                                <option value="{{$tempp->id}}">{{$tempp->title}}</option>
                                                @endif
                                            @endforeach
                                        </select> 
                                    </div> 
                                </div>
                                <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> 
                                    <button type="submit" class="button w-20 bg-theme-1 text-white">Submit</button> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>       
        <div id="paginate" class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center ml-5 mt-6">
            {!! $position->links() !!}
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $("#company_search").change(function(){
                var search = $(this).val();
                $.ajax({
                    type:'POST',
                    url:'/setting/position/company_search',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: { "company_id" : $(this).val()},
                    success: function(data){
                        if(search==0){
                            location.reload(true);
                        }else{
                            $("#paginate").hide();
                            $("#search_result").html("");
                            $("#search_result").append(data);
                        }
                        
                    }
                });
            });
            $("#text_search").click(function(){
                var search = $("#search_box").val();
                $.ajax({
                    type:'POST',
                    url:'/setting/position/text_search',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: { "text" : search},
                    success: function(data){
                        if(search==''){
                            location.reload(true);
                        }else{
                            $("#paginate").hide();
                            $("#search_result").html("");
                            if(data.length==0){
                                $("#search_result").append(`
                                <div class="intro-y col-span-12 md:col-span-12">
                                <h3 style="text-align:center;">No available data</h3>
                                </div>`);
                            }else{
                                $("#search_result").append(data);
                            }  
                        }                      
                        
                    }
                });
            });
        });
        function position_active(id, value){
            var set_start = value;
            $.ajax({
                type:'POST',
                url:'/setting/position/active',
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