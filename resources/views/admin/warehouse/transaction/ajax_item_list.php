<select name="item_id" id="ItemSelect" class="js-example-basic-single w-full" required="required">
	<option value="" selected="selected">Select</option>
	<?php foreach($items as $item) : ?>
	<option value="<?php echo $item['id']; ?>"><?php echo $item['barcode'].' '.$item['title']; ?></option>
	<?php endforeach; ?>
</select>
<script>
applySelect2();
itemChange();
</script>