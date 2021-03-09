<select name="customer_id" class="js-example-basic-single w-full" required="required">
	<option value="" selected="selected">Select</option>
	<?php foreach($customers as $customer) : ?>
	<option value="<?php echo $customer['id']; ?>"><?php echo $customer['customer_code'].' '.$customer['customer_name']; ?></option>
	<?php endforeach; ?>
</select>
<script>
applySelect2();
</script>