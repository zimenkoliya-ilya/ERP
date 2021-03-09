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
                <p>Date: {{$health->date}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end">
                <p>Company: {{$health->company}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end">
                <p>Project: {{$health->project}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Temp day: {{ $health->temp_day}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Temp Night: {{ $health->temp_night}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Wind Day: {{ $health->wind_day}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Wind Night: {{ $health->wind_night}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Project Hour: {{ $health->project_hour}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Day Hour: {{ $health->day_hour}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Free Day: {{ $health->free_day}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end">
                <p>Weather: {{$health->weather}}</p>
            </div>
        </div>
        <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 box px-4 py-8 mt-3">
            <div class="col-span-6 sm:col-span-12 xl:col-span-12 flex flex-col justify-end">
                <h5>HEALTH, SAFTY and ENVIRONMENT</h5>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>LTI: {{ $health->lti}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>MTI: {{ $health->mti}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Near Miss: {{ $health->near_miss}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Spill: {{ $health->spill}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Accident: {{ $health->accident}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Inconsistency: {{ $health->inconsistency}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Inconsistenct Response: {{ $health->inconsistency_reponse}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Asset: {{ $health->asset}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Fai: {{ $health->fai}}</p>
            </div>
        </div>
        <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 box px-4 py-8 mt-3">
            <div class="col-span-6 sm:col-span-12 xl:col-span-12 flex flex-col justify-end">
                <h5>WORK ENVIRONMENT CHECK</h5>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Mining: {{ $health->mining}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Manufacturing: {{ $health->manufacturing}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Fuel: {{ $health->fuel}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Exploration: {{ $health->exploration}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Repair: {{ $health->repair}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Camp: {{ $health->camp}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>HSE Point: {{ $health->hse_point}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Signs: {{ $health->signs}}</p>
            </div>
        </div>
        <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 box px-4 py-8 mt-3">
            <div class="col-span-6 sm:col-span-12 xl:col-span-12 flex flex-col justify-end">
                <h5>OTHER</h5>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Danger: {{ $health->danger}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Danger Analysis: {{ $health->danger_analysis}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>New EMP: {{ $health->new_emp}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Rules: {{ $health->rules}}</p>
            </div>
        </div>
        <div class="intro-y grid grid-cols-12 sm:gap-6 gap-y-6 box px-4 py-8 mt-3">
            <div class="col-span-6 sm:col-span-12 xl:col-span-12 flex flex-col justify-end">
                <h5>MEMBER OF PEOPLE ON MINING SITE</h5>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Main: {{ $health->main}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Security: {{ $health->security}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Temporary: {{ $health->temporary}}</p>
            </div>
            <div class="col-span-6 sm:col-span-6 xl:col-span-3 flex flex-col justify-end ">
                <p>Total: {{ $health->total}}</p>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection