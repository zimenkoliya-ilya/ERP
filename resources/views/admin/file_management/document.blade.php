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
<div id="success_delete" class="alert alert-success alert-dismissible fade show" style="display:none;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    Deleted Successfully
</div>
<div class="layout-px-spacing">
    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 lg:col-span-3 xxl:col-span-2">
            <h2 class="intro-y text-lg font-medium mr-auto mt-2">
                File Manager
            </h2>
            <!-- BEGIN: File Manager Menu -->
            <div class="intro-y box p-3 mt-6">
                <div class="mt-1">
                    <a href="{{ route('file_management.index')}}" class="flex items-center px-3 py-2 mt-2 rounded-md"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image w-4 h-4 mr-2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg> Images </a>
                    <a href="{{ route('file_management.video')}}" class="flex items-center px-3 py-2 mt-2 rounded-md "> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video w-4 h-4 mr-2"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg> Videos </a>
                    <a href="{{ route('file_management.document')}}" class="flex items-center px-3 py-2 mt-2 rounded-md bg-theme-1 text-white font-medium"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file w-4 h-4 mr-2"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> Documents </a>
                    <a href="{{ route('file_management.shared')}}" class="flex items-center px-3 py-2 mt-2 rounded-md"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users w-4 h-4 mr-2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> Shared </a>
                </div>
            </div>
            <!-- END: File Manager Menu -->
        </div>
        <div class="col-span-12 lg:col-span-9 xxl:col-span-10">
            <!-- BEGIN: File Manager Filter -->
            <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
                <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 ml-3 left-0 z-10 text-gray-700 dark:text-gray-300"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> 
                    <input type="text" class="input w-full sm:w-64 box px-10 text-gray-700 dark:text-gray-300 placeholder-theme-13" placeholder="Search files">
                </div>
                <div class="w-full sm:w-auto flex">
                    <a data-toggle="modal" data-target="#new_contract">
                        <button class="button text-white bg-theme-1 shadow-md mr-2" >Upload New Files</button>
                    </a>
                    
                    <div class="modal" id="new_contract">
                        <div class="modal__content">
                            <div class="flex items-center px-5 py-4 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto text-theme-1">Upload Image</h2>
                            </div>
                            <form action="{{ route('file_management.document_upload')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="p-5 grid grid-cols-12 gap-4 gap-y-3">
                                    <div class="col-span-12 sm:col-span-6"> 
                                        <label>Name</label> 
                                        <input type="text" name="file_name" class="input w-full border mt-2" placeholder="File Name"> 
                                    </div> 
                                    <div class="col-span-12 sm:col-span-6"> 
                                        <label>Category</label>
                                        <select data-search="true" class="tail-select w-full"  name="category_id" style="width:100%;">
                                            @foreach($category as $temp)
                                                <option value="{{$temp->id}}">{{$temp->typename}}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                    <div class="col-span-12 sm:col-span-6"> 
                                        <label>File</label> 
                                        <input type="file" name="image" class="input w-56 border block mx-auto"  style="width:100%; margin-top:3px;">
                                    </div>   
                                </div>
                                <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> 
                                    <button type="submit" class="button w-20 bg-theme-1 text-white">Submit</button> 
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropdown-toggle button px-2 box text-gray-700 dark:text-gray-300">
                            <span class="w-5 h-5 flex items-center justify-center"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus w-4 h-4"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> </span>
                        </button>
                        <div class="dropdown-box w-40">
                            <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                                <a href="#" onclick="shared_file()" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file w-4 h-4 mr-2"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> Share Files </a>
                                <a href="#" onclick="delete_file()" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash w-4 h-4 mr-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                    Delete </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: File Manager Filter -->
            <!-- BEGIN: Directory & Files -->
            <form action="" method="post" id="shared_files">
            @csrf
            <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-2">
                @foreach($files as $temp)
                    <div class="dom_remove{{$temp->id}} intro-y col-span-6 sm:col-span-4 md:col-span-3 xxl:col-span-2">
                        <div id="shared{{$temp->id}}" class="{{($temp->shared==1)?'bg-theme-9':''}} file box rounded-md px-1 pt-8 pb-3 px-3 sm:px-5 relative zoom-in">
                            <div class="absolute left-0 top-0 mt-3 ml-3">
                                <input name="file_id[]" value="{{$temp->id}}" class="input border border-gray-500" type="checkbox">
                            </div>
                            <a href="{{$temp->file}}" class="w-3/5 file__icon file__icon--file mx-auto" target="_blank">
                                <div class="file__icon__file-name">{{strtoupper($temp->extension)}}</div>
                            </a>
                            <a href="#" class="block font-medium mt-4 text-center truncate">{{$temp->name}}</a> 
                            <div class="text-gray-600 text-xs text-center mt-0.5">{{number_format($temp->size/1048576,2)}}MB</div>
                            <div class="absolute top-0 right-0 mr-2 mt-2 dropdown ml-auto" style="position:fixed;">
                                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical w-5 h-5 text-gray-600"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg> 
                                </a>
                                <div class="dropdown-box w-40">
                                    <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                                        <a href="#" id="{{$temp->id}}" class="shared flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users w-4 h-4 mr-2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                            Share File 
                                        </a>
                                        <a href="#" id="{{$temp->id}}" class="deleted flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash w-4 h-4 mr-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                            Delete </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            </form>
            <!-- END: Directory & Files -->
            <!-- BEGIN: Pagination -->
            <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-6">
                {!! $files->links() !!}
            </div>
            <!-- END: Pagination -->
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        function shared_file(){
            document.getElementById("shared_files").action = "{{ route('file_management.all_shared')}}";
            document.getElementById("shared_files").submit();
        }
        function delete_file(){
            document.getElementById("shared_files").action = "{{ route('file_management.all_delete')}}";
            document.getElementById("shared_files").submit();
        }
        $(document).ready(function(){
            $(document).on("click", ".shared",function(){
                var id = $(this).attr('id');
                var shared = $("#shared"+id).hasClass("bg-theme-9");
                console.log(shared)
                if(shared == true){
                    $("#shared"+id).removeClass("bg-theme-9");
                }else{
                    $("#shared"+id).addClass("bg-theme-9");
                }
                $.ajax({
                    type:'POST',
                    url:'/file_management/shared_active',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: { "user_id" : id },
                    success: function(data){
                        if(data == 1){
                            $('#success_delete').show();
                        }
                    }
                });
            });

            $(".deleted").click(function(){
                var id = $(this).attr("id");
                $(this).parent().remove();
                $(".dom_remove"+id).remove();
                $.ajax({
                    type:'POST',
                    url:'/file_management/destroy',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data: { "user_id" : id },
                    success: function(data){
                        if(data == 1){
                            $('#success_delete').show();
                        }
                    }
                });
            });
        });
    </script>
@endsection