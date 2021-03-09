<label>Storage to transfer <span class="text-theme-6">*</span></label>
<div class="mt-2">
<select name="related_storage_id" class="js-example-basic-single w-full" required="required">
	<option value="" selected="selected">Select</option>
	<?php foreach($storages as $storage) : ?>
	<option value="<?php echo $storage['id']; ?>"><?php echo $storage['title']; ?></option>
	<?php endforeach; ?>
</select>
</div>
<script>
applySelect2();
</script>