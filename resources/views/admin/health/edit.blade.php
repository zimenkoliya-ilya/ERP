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
    <form action="{{route('health.update', $health->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 box px-4 py-8 mt-3">
            <div class="col-span-6 sm:col-span-12 xl:col-span-12 flex flex-col justify-end">
                <h5>GENERAL INFORMARION</h5>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Date</p>
                <input value="{{$health->date}}" name="date" class="datepicker input w-56 border block mx-auto" data-single-mode="true" style="width:100%;">
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end">
                <p>Company</p>
                <select data-search="true" class="tail-select w-full"  name="company" style="width:100%;">
                    @foreach($company as $temp)
                        @if($health->company == $temp->title)
                        <option value="{{$temp->title}}" selected>{{$temp->title}}</option>
                        @else
                        <option value="{{$temp->title}}">{{$temp->title}}</option>
                        @endif
                    @endforeach
                </select> 
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end">
                <p>Project</p>
                <select data-search="true" class="tail-select w-full"  name="project" style="width:100%;">
                    @foreach($project as $temp)
                        @if($health->project == $temp->title)
                        <option value="{{$temp->title}}" selected>{{$temp->title}}</option>
                        @else
                        <option value="{{$temp->title}}">{{$temp->title}}</option>
                        @endif
                    @endforeach
                </select> 
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Temp day</p>
                <input type="number" name="temp_day" value="{{ $health->temp_day}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Temp Night</p>
                <input type="number" name="temp_night" value="{{ $health->temp_night}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Wind Day</p>
                <input type="number" name="wind_day" value="{{ $health->wind_day}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Wind Night</p>
                <input type="number" name="wind_night" value="{{ $health->wind_night}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Project Hour</p>
                <input type="number" name="project_hour" value="{{ $health->project_hour}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Day Hour</p>
                <input type="number" name="day_hour" value="{{ $health->day_hour}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Free Day</p>
                <input type="number" name="free_day" value="{{ $health->free_day}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end">
                <p>Weather</p>
                <select data-search="true" class="tail-select w-full"  name="weather" style="width:100%;">
                    @foreach($weather as $temp)
                        @if($health->weather == $temp->title)
                        <option value="{{$temp->title}}" selected>{{$temp->title}}</option>
                        @else
                        <option value="{{$temp->title}}">{{$temp->title}}</option>
                        @endif
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
                <input type="number" name="lti" value="{{ $health->lti}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>MTI</p>
                <input type="number" name="mti" value="{{ $health->mti}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Near Miss</p>
                <input type="number" name="near_miss" value="{{ $health->near_miss}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Spill</p>
                <input type="number" name="spill" value="{{ $health->spill}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Accident</p>
                <input type="number" name="accident" value="{{ $health->accident}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Inconsistency</p>
                <input type="number" name="inconsistency" value="{{ $health->inconsistency}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Inconsistenct Response</p>
                <input type="number" name="inconsistency_reponse" value="{{ $health->inconsistency_reponse}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Asset</p>
                <input type="number" name="asset" value="{{ $health->asset}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Fai</p>
                <input type="number" name="fai" value="{{ $health->fai}}" class="input w-full border mt-2" >
            </div>
        </div>
        <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 box px-4 py-8 mt-3">
            <div class="col-span-6 sm:col-span-12 xl:col-span-12 flex flex-col justify-end">
                <h5>WORK ENVIRONMENT CHECK</h5>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Mining</p>
                <input type="number" name="mining" value="{{ $health->mining}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Manufacturing</p>
                <input type="number" name="manufacturing" value="{{ $health->manufacturing}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Fuel</p>
                <input type="number" name="fuel" value="{{ $health->fuel}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Exploration</p>
                <input type="number" name="exploration" value="{{ $health->exploration}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Repair</p>
                <input type="number" name="repair" value="{{ $health->repair}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Camp</p>
                <input type="number" name="camp" value="{{ $health->camp}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>HSE Point</p>
                <input type="number" name="hse_point" value="{{ $health->hse_point}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Signs</p>
                <input type="number" name="signs" value="{{ $health->signs}}" class="input w-full border mt-2" >
            </div>
        </div>
        <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 box px-4 py-8 mt-3">
            <div class="col-span-6 sm:col-span-12 xl:col-span-12 flex flex-col justify-end">
                <h5>OTHER</h5>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Danger</p>
                <input type="number" name="danger" value="{{ $health->danger}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Danger Analysis</p>
                <input type="number" name="danger_analysis" value="{{ $health->danger_analysis}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>New EMP</p>
                <input type="number" name="new_emp" value="{{ $health->new_emp}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Rules</p>
                <input type="number" name="rules" value="{{ $health->rules}}" class="input w-full border mt-2" >
            </div>
        </div>
        <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 box px-4 py-8 mt-3">
            <div class="col-span-6 sm:col-span-12 xl:col-span-12 flex flex-col justify-end">
                <h5>MEMBER OF PEOPLE ON MINING SITE</h5>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Main</p>
                <input type="number" name="main" value="{{ $health->main}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Security</p>
                <input type="number" name="security" value="{{ $health->security}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Temporary</p>
                <input type="number" name="temporary" value="{{ $health->temporary}}" class="input w-full border mt-2" >
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Total</p>
                <input type="number" name="total" value="{{ $health->total}}" class="input w-full border mt-2" >
            </div>
        </div>
        <div class="col-span-12 sm:col-span-12 xl:col-span-12 items-center mt-3">
            <button type="submit" class="button w-24 mr-1 mb-2 bg-theme-9 text-white" style="float:right;">{{ trans('employee.submit')}}</button>
        </div>
    </form>
    </div>
</div>
@endsection