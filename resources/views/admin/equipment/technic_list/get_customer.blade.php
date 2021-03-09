<label>Customer</label>
<select name="customer_id"  data-search="true" class="js-example-basic-single w-full" required="required">
    <option>Select</option>
    @foreach($customer as $temp)
    <option value="{{$temp->id}}">{{$temp->customer_name}}</option>
    @endforeach
</select>
<script>
    applySelect2()
</script>