<select name="journal_type_id" id="JournalTypeSelect" class="js-example-basic-single w-full" required="required">
	<?php foreach($journal_type_list as $key => $value) : ?>
	<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
	<?php endforeach; ?>
</select>
<script>
applySelect2();
journalTypeChange();
</script>