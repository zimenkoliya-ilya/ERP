<select name="storage_id"  data-search="true" class="js-example-basic-single w-full" required="required">
    <option>Select</option>
    @foreach($storage as $temp)
    <option value="{{$temp->id}}">{{$temp->title}}</option>
    @endforeach
</select>
<script>
    applySelect2()
</script>