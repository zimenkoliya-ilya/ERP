<select name="storage_id" id="StorageSelect" class="js-example-basic-single w-full" required="required">
	<option value="" selected="selected">Select</option>
	<?php foreach($storages as $storage) : ?>
	<option value="<?php echo $storage['id']; ?>"><?php echo $storage['title']; ?></option>
	<?php endforeach; ?>
</select>
<script>
applySelect2();
storageChange();
</script>