
<div class="intro-y col-span-3">
    <span>Company</span>
    <div class="mt-2">
        <select onchange="company_change(this)" name="company_id"  data-search="true" class="js-example-basic-single w-full" required="required">
            @foreach($company as $temp)
                @if($first_company->id == $temp->id)
                <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                @else
                <option value="{{$temp->id}}">{{$temp->title}}</option>
                @endif
            @endforeach
        </select>
    </div> 
</div>
<div class="intro-y col-span-3">
    <span>Customer</span>
    <div class="mt-2">
        <select data-search="true" name="customer_id" data-search="true" class="js-example-basic-single w-full" required="required">
            <option>Select</option>
            @foreach($customer as $temp)
            <option value="{{$temp->id}}">{{$temp->customer->customer_name}}</option>
            @endforeach
        </select>
    </div> 
</div>
<div class="intro-y col-span-3">
    <span>Projct</span>
    <div class="mt-2">
        <select name="project_id"  data-search="true" class="js-example-basic-single w-full" required="required">
            <option>Select</option>
            @foreach($project as $temp)
            <option value="{{$temp->id}}">{{$temp->title}}</option>
            @endforeach
        </select>
    </div> 
</div>
<div class="intro-y col-span-3">
    <span>Employee</span>
    <div class="mt-2">
        <select name="employee_id"  data-search="true" class="js-example-basic-single w-full" required="required">
            <option>Select</option>
            @foreach($employee as $temp)
            <option value="{{$temp->id}}">{{$temp->first_name}}/{{$temp->registration_num}}</option>
            @endforeach
        </select>
    </div> 
</div>
<div class="intro-y col-span-3">
    <span>Start Date</span>
    <input style="border-color:lightgray !important;" name="start_datetime" type="datetime-local" value="{{old('start_datetime')}}" id="DateInput" class="input w-full border mt-2 block" autocomplete="off" required="required">                        
</div>
<div class="intro-y col-span-3">
    <span>End Date</span>
    <input style="border-color:lightgray !important;" name="end_datetime" type="datetime-local" value="{{old('end_datetime')}}" id="DateInput" class="input w-full border mt-2 block" autocomplete="off" required="required">                        
</div>
<div class="intro-y col-span-3">
    <span>Repair Duration</span>
    <input style="border-color:lightgray !important;" type="text" name="repair_duration" value="{{ old('repair_duration')}}" class="input w-full border mt-2">
</div>
<div class="intro-y col-span-3">
    <span>Time Type</span>
    <div class="mt-2">
        <select name="time_type_id"  data-search="true" class="js-example-basic-single w-full" required="required">
            <option>Select</option>
            @foreach($time_type as $temp)
            <option value="{{$temp->id}}">{{$temp->title}}</option>
            @endforeach
        </select>
    </div> 
</div>
<div class="intro-y col-span-3">
    <span>repair_reason</span>
    <input style="border-color:lightgray !important;" type="text" name="repair_reason" value="{{ old('repair_reason')}}" class="input w-full border mt-2">
</div>
<div class="intro-y col-span-3">
    <span>Description</span>
    <input style="border-color:lightgray !important;" type="text" name="repair_description" value="{{ old('repair_description')}}" class="input w-full border mt-2">
</div>
<div class="intro-y col-span-3">
    <span>Shift</span>
    <input style="border-color:lightgray !important;" type="text" name="shift_id" value="{{ old('shift_id')}}" class="input w-full border mt-2">
</div>
<div class="intro-y col-span-3">
    <span>In Moto Hour</span>
    <input style="border-color:lightgray !important;" type="text" name="in_moto_hour" value="{{ old('in_moto_hour')}}" class="input w-full border mt-2">
</div>
<div class="intro-y col-span-3">
    <span>Out Moto Hour</span>
    <input style="border-color:lightgray !important;" type="text" name="out_moto_hour" value="{{ old('out_moto_hour')}}" class="input w-full border mt-2">
</div>
<div class="intro-y col-span-3">
    <span>In Speedometer</span>
    <input style="border-color:lightgray !important;" type="text" name="in_speedometer" value="{{ old('in_speedometer')}}" class="input w-full border mt-2">
</div>
<div class="intro-y col-span-3">
    <span>On Speedometer</span>
    <input style="border-color:lightgray !important;" type="text" name="on_speedometer" value="{{ old('on_speedometer')}}" class="input w-full border mt-2">
</div>
<div class="intro-y col-span-3">
    <span>Category</span>
    <div class="mt-2">
        <select name="category_id"  data-search="true" class="js-example-basic-single w-full" required="required">
            <option>Select</option>
            @foreach($category as $temp)
            <option value="{{$temp->id}}">{{$temp->title}}</option>
            @endforeach
        </select>
    </div> 
</div>
<div class="intro-y col-span-3">
    <span>Repair Type</span>
    <div class="mt-2">
        <select name="repair_type_id"  data-search="true" class="js-example-basic-single w-full" required="required">
            <option>Select</option>
            @foreach($type as $temp)
            <option value="{{$temp->id}}">{{$temp->title}}</option>
            @endforeach
        </select>
    </div> 
</div>
<div class="col-span-12 sm:col-span-12 xl:col-span-12">
    <button type="submit" class="button w-24 mr-1 mb-2 bg-theme-9 text-white" style="float:right;">{{ trans('employee.submit')}}</button>
</div>
<script>
    applySelect2();
</script>