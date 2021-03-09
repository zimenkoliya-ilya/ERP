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
        <h5 class="text-2xl font-medium leading-none">Health, Safety and environment - Daily Report</h5>
    </div>
    <form action="{{route('health.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 box px-4 py-8 mt-3">
            <div class="col-span-6 sm:col-span-12 xl:col-span-12 flex flex-col justify-end">
                <h5>GENERAL INFORMARION</h5>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Date</p>
                <input value="{{old('date')}}" name="date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end">
                <p>Company</p>
                <select data-search="true" class="tail-select w-full"  name="company" style="width:100%;">
                    @foreach($company as $temp)
                        <option value="{{$temp->title}}">{{$temp->title}}</option>
                    @endforeach
                </select> 
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end">
                <p>Project</p>
                <select data-search="true" class="tail-select w-full"  name="project" style="width:100%;">
                    @foreach($project as $temp)
                        <option value="{{$temp->title}}">{{$temp->title}}</option>
                    @endforeach
                </select> 
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Temp day</p>
                <input type="number" name="temp_day" value="{{ old('temp_day')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Temp Night</p>
                <input type="number" name="temp_night" value="{{ old('temp_night')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Wind Day</p>
                <input type="number" name="wind_day" value="{{ old('wind_day')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Wind Night</p>
                <input type="number" name="wind_night" value="{{ old('wind_night')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Project Hour</p>
                <input type="number" name="project_hour" value="{{ old('project_hour')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Day Hour</p>
                <input type="number" name="day_hour" value="{{ old('day_hour')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Free Day</p>
                <input type="number" name="free_day" value="{{ old('free_day')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end">
                <p>Weather</p>
                <select data-search="true" class="tail-select w-full"  name="weather" style="width:100%;">
                    @foreach($weather as $temp)
                        <option value="{{$temp->title}}">{{$temp->title}}</option>
                    @endforeach
                </select> 
            </div>
        </div>
        <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 box px-4 py-8 mt-3">
            <div class="col-span-6 sm:col-span-12 xl:col-span-12 flex flex-col justify-end">
                <h5>HEALTH, SAFTY and ENVIRONMENT</h5>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>LTI</p>
                <input type="number" name="lti" value="{{ old('lti')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>MTI</p>
                <input type="number" name="mti" value="{{ old('mti')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Near Miss</p>
                <input type="number" name="near_miss" value="{{ old('near_miss')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Spill</p>
                <input type="number" name="spill" value="{{ old('spill')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Accident</p>
                <input type="number" name="accident" value="{{ old('accident')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Inconsistency</p>
                <input type="number" name="inconsistency" value="{{ old('inconsistency')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Inconsistency Reponse</p>
                <input type="number" name="inconsistency_reponse" value="{{ old('inconsistency_reponse')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Asset</p>
                <input type="number" name="asset" value="{{ old('asset')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Fai</p>
                <input type="number" name="fai" value="{{ old('fai')}}" class="input w-full border mt-2" >
            </div>
        </div>
        <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 box px-4 py-8 mt-3">
            <div class="col-span-6 sm:col-span-12 xl:col-span-12 flex flex-col justify-end">
                <h5>WORK ENVIRONMENT CHECK</h5>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Mining</p>
                <input type="number" name="mining" value="{{ old('mining')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Manufacturing</p>
                <input type="number" name="manufacturing" value="{{ old('manufacturing')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Fuel</p>
                <input type="number" name="fuel" value="{{ old('fuel')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Exploration</p>
                <input type="number" name="exploration" value="{{ old('exploration')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Repair</p>
                <input type="number" name="repair" value="{{ old('repair')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Camp</p>
                <input type="number" name="camp" value="{{ old('camp')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>HSE Point</p>
                <input type="number" name="hse_point" value="{{ old('hse_point')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Signs</p>
                <input type="number" name="signs" value="{{ old('signs')}}" class="input w-full border mt-2" >
            </div>
        </div>
        <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 box px-4 py-8 mt-3">
            <div class="col-span-6 sm:col-span-12 xl:col-span-12 flex flex-col justify-end">
                <h5>OTHER</h5>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Danger</p>
                <input type="number" name="danger" value="{{ old('danger')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Danger Analysis</p>
                <input type="number" name="danger_analysis" value="{{ old('danger_analysis')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>New EMP</p>
                <input type="number" name="new_emp" value="{{ old('new_emp')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Rules</p>
                <input type="number" name="rules" value="{{ old('rules')}}" class="input w-full border mt-2" >
            </div>
        </div>
        <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 box px-4 py-8 mt-3">
            <div class="col-span-6 sm:col-span-12 xl:col-span-12 flex flex-col justify-end">
                <h5>MEMBER OF PEOPLE ON MINING SITE</h5>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Main</p>
                <input type="number" name="main" value="{{ old('main')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Security</p>
                <input type="number" name="security" value="{{ old('security')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Temporary</p>
                <input type="number" name="temporary" value="{{ old('temporary')}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Total</p>
                <input type="number" name="total" value="{{ old('total')}}" class="input w-full border mt-2" >
            </div>
        </div>
        <div class="col-span-12 sm:col-span-12 xl:col-span-12 items-center mt-3">
            <button type="submit" class="button w-24 mr-1 mb-2 bg-theme-9 text-white" style="float:right;">{{ trans('employee.submit')}}</button>
        </div>
    </form>
    </div>
</div>
@endsection