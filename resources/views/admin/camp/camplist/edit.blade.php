@extends('standard.layout')

@section('title', 'new employee')

@section('content')  
                <div class="intro-y flex items-center mt-8">
                    <h1 class="text-2xl text-theme-9 font-medium leading-none">Edit Camp</h1>
                </div>
                <form action="{{route('camp.camplist.update',$ct_camp->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 box px-5 py-8 mt-5">
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                        <label>Title</label>
                        <input type="text" name="title" value="{{$ct_camp->title}}" class="input w-full border mt-2" placeholder="title">
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                        <label>Project</label>
                        <select data-search="true" class="tail-select w-full" name="project_id" style="width:100%;">
                            @foreach($zg_project as $temp)
                                @if($ct_camp->project_id == $temp->id)
                                <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                @else
                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endif
                            @endforeach
                        </select> 
                    </div>
                    <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end items-center">
                        <label>Campany</label>
                        <select data-search="true" class="tail-select w-full"  name="company_id" style="width:100%;">
                            @foreach($zg_company as $temp)
                                @if($ct_camp->company_id == $temp->id)
                                <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                @else
                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endif
                            @endforeach
                        </select> 
                    </div>
                    <div class="col-span-12 sm:col-span-12 xl:col-span-12">
                        <button type="submit" class="button w-24 mr-1 mb-2 bg-theme-9 text-white" style="float:right;">{{ trans('employee.submit')}}</button>
                    </div>
                </div>
                </form>
            </div>
            <!-- END: Content -->
        </div>
@endsection