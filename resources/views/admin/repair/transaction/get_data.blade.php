<div class="col-span-12 sm:col-span-3"> 
    <label>company</label> 
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
<div class="col-span-12 sm:col-span-3"> 
    <label>Journal</label> 
    <select name="journal_id"  data-search="true" class="js-example-basic-single w-full" required="required">
        <option>Select</option>
        @foreach($journal as $temp)
        <option value="{{$temp->id}}">{{$temp->date}}/{{$temp->customer->customer_name}}</option>
        @endforeach
    </select>
</div> 
<div class="col-span-12 sm:col-span-3"> 
    <label>Repair</label> 
    <select name="repair_id"  data-search="true" class="js-example-basic-single w-full" required="required">
        <option>Select</option>
        @foreach($repair as $temp)
            <option value="{{$temp->id}}">{{$temp->customer->customer_name}}/{{$temp->employee->first_name}}</option>
        @endforeach
    </select>
</div>
<div class="col-span-12 sm:col-span-12 xl:col-span-12">
    <button type="submit" class="button w-24 mr-1 mb-2 bg-theme-9 text-white" style="float:right;">{{ trans('employee.submit')}}</button>
</div>
<script>
    applySelect2();
</script>