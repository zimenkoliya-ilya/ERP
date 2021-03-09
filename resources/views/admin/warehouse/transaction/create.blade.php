@extends('standard.layout')

@section('title', 'employee list')

@section('content')
<div class="intro-y flex items-center mt-8">
	<h2 class="text-lg font-medium mr-auto">{{ $page_title }}</h2>
</div>
<div class="intro-y box">
	<div class="p-5">
		<form action="{{ route('warehouse.transaction.store')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div  class="grid grid-cols-12 gap-4 gap-y-5">
				<div class="intro-y col-span-3">
					<label>Date <span class="text-theme-6">*</span></label>
					<input name="date" value="{{date('Y-m-d')}}" id="DateInput" class="input w-full border mt-2 block" placeholder="Transaction Date" autocomplete="off" required="required">
				</div>
				<div class="intro-y col-span-3">
					<label>Company <span class="text-theme-6">*</span></label>
					<div class="mt-2">
						<select name="company_id" id="CompanySelect" data-search="true" class="tail-select w-full" required="required">
							<option value="">Select</option>
							<?php foreach($company_list as $company) : ?>
							<option value="<?php echo $company['id']; ?>"><?php echo $company['title']; ?></option>
							<?php endforeach; ?>
                        </select>
                    </div>
				</div>
				<div class="intro-y col-span-3">
					<label>Storage <span class="text-theme-6">*</span></label>
					<div class="mt-2" id="StorageSelectBlock">
						<select name="storage_id" id="StorageSelect" data-search="true" class="tail-select w-full" required="required">
							<option value="">Select</option>
                        </select>
                    </div>
				</div>
				<div class="intro-y col-span-3">
					<label>Transaction type <span class="text-theme-6">*</span></label>
					<div class="mt-2">
						<select name="type_id" id="TypeSelect" data-search="true" class="tail-select w-full" required="required">
							<option value="">Select</option>
							<option value="2">Credit</option>
							<option value="1">Debit</option>
                        </select>
                    </div>
				</div>
				<div class="intro-y col-span-3">
					<label>Category <span class="text-theme-6">*</span></label>
					<div class="mt-2">
						<select name="category_id" data-search="true" class="tail-select w-full" required="required">
							<option value="">Select</option>
							<?php foreach($category_list as $category) : ?>
							<option value="<?php echo $category['id']; ?>"><?php echo $category['title']; ?></option>
							<?php endforeach; ?>
                        </select>
                    </div>
				</div>
				<div class="intro-y col-span-3">
					<label>Customer <span class="text-theme-6">*</span></label>
					<div class="mt-2" id="CustomerSelectBlock">
						<select name="customer_id" data-search="true" class="tail-select w-full" required="required">
							<option value="">Select</option>
                        </select>
                    </div>
				</div>
				<div class="intro-y col-span-3">
					<label>Journal Type <span class="text-theme-6">*</span></label>
					<div class="mt-2" id="JournalTypeSelectBlock">
						<select name="journal_type_id" data-search="true" class="tail-select w-full" required="required">
							<option value="">Select</option>
                        </select>
                    </div>
				</div>
				<div class="intro-y col-span-3" id="StorageToStorageBlock">
				
				</div>
				<div class="intro-y col-span-3">
					<label>Item <span class="text-theme-6">*</span></label>
					<div class="mt-2" id="ItemSelectBlock">
						<select name="item_id" id="ItemSelect" data-search="true" class="tail-select w-full" required="required">
							<option value="">Select</option>
                        </select>
                    </div>
				</div>
				<div class="intro-y col-span-3">
					<label>Quantity <span class="text-theme-6">*</span></label>
					<input type="text" name="quantity" id="QuantityInput" class="input w-full border mt-2" placeholder="Quantity" required="required">
					<div class="quantity-check text-theme-6"></div>
				</div>
				<div class="intro-y col-span-3">
					<label>Unit Price <span class="text-theme-6">*</span></label>
					<input type="text" name="unit_price" id="UnitPriceInput" class="input w-full border mt-2" placeholder="Unit Price" required="required">
				</div>
				<div class="intro-y col-span-3">
					<label>Total Price <span class="text-theme-6">*</span></label>
					<input type="text" name="total_price" id="TotalPriceInput" class="input w-full border mt-2" placeholder="Total Price" required="required">
				</div>
			</div>
			<div class="text-left mt-5">
				<button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
			</div>
		</form>
	</div>
</div>
@endsection
@section('script')
<link rel="stylesheet" href="{{ asset('dist/css/template.css')}}">
<link rel="stylesheet" href="{{ asset('dist/css/select2.min.css')}}" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script>
$(function() {
	$( "#DateInput" ).datepicker({
		dateFormat: "yy-mm-dd"
	});
});

function applySelect2() {
	var lll = $(".js-example-basic-single");
	console.log(lll.length)
	$(".js-example-basic-single").select2();
}

function getUnitPrice() {
	$.ajax({
		url:"{{ route('ajaxUnitPrice') }}",
		type:"POST",
		data: {
			item_id: $("#ItemSelect").val(),
			storage_id: $("#StorageSelect").val(),
			date: $("#DateInput").val(),
			type_id: $("#TypeSelect").val()
		},
		success:function (data) {
			if(data != 'debit') {
				$('#UnitPriceInput').val(data);
			}
			getTotalPrice();
			checkRemainQuantity();
		}
	});
}

function getTotalPrice() {
	if($('#UnitPriceInput').val() && $('#QuantityInput').val() && $.isNumeric($('#UnitPriceInput').val()) && $.isNumeric($('#QuantityInput').val())){
		var total_price = $('#UnitPriceInput').val() * $('#QuantityInput').val();
		$('#TotalPriceInput').val(total_price);
	} else {
		$('#TotalPriceInput').val('');
	}
}

function checkRemainQuantity() {
	$.ajax({
		url:"{{ route('ajaxItemRemain') }}",
		type:"POST",
		data: {
			item_id: $("#ItemSelect").val(),
			storage_id: $("#StorageSelect").val(),
			date: $("#DateInput").val(),
			type_id: $("#TypeSelect").val(),
			quantity: $("#QuantityInput").val()
		},
		success:function (data) {
			if(data == 'negative') {
				$('.quantity-check').html("remaining unit not enough");
				$('#TotalPriceInput').val('');
			} else {
				$('.quantity-check').html("");
			}
		}
	});
}

function journalTypeChange() {
	$('#JournalTypeSelect').on('change',function() {
		$.ajax({
			url:"{{ route('ajaxStorageToStorageList') }}",
			type:"POST",
			data: {
				journal_type_id: $(this).val(),
				company_id: $("#CompanySelect").val()
			},
			success:function (data) {
				$('#StorageToStorageBlock').html(data);
			}
		});
	});
}

function storageChange() {
	$("#StorageSelect").on('change',function() {
		getUnitPrice();
	});
}

function itemChange() {
	$("#ItemSelect").on('change',function() {
		getUnitPrice();
	});
}

$(document).ready(function(){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$('#CompanySelect').on('change',function() {
		$.ajax({
			url:"{{ route('ajaxStorageList') }}",
			type:"POST",
			data: {
				company_id: $(this).val()
			},
			success:function (data) {
				$('#StorageSelectBlock').html(data);
			}
		});
		$.ajax({
			url:"{{ route('ajaxCustomerList') }}",
			type:"POST",
			data: {
				company_id: $(this).val()
			},
			success:function (data) {
				$('#CustomerSelectBlock').html(data);
			}
		});
		$.ajax({
			url:"{{ route('ajaxItemList') }}",
			type:"POST",
			data: {
				company_id: $(this).val()
			},
			success:function (data) {
				$('#ItemSelectBlock').html(data);
			}
		});
		$.ajax({
			url:"{{ route('ajaxStorageToStorageList') }}",
			type:"POST",
			data: {
				journal_type_id: $("#JournalTypeSelect").val(),
				company_id: $(this).val()
			},
			success:function (data) {
				$('#StorageToStorageBlock').html(data);
			}
		});
	});
	
	$('#TypeSelect').on('change',function() {
		$.ajax({
			url:"{{ route('ajaxJournalTypeList') }}",
			type:"POST",
			data: {
				type_id: $(this).val()
			},
			success:function (data) {
				$('#JournalTypeSelectBlock').html(data);
				$("#StorageToStorageBlock").html("");
			}
		});
	});
	
	$("#DateInput").on("change", function(){
		getUnitPrice();
	});
	
	$("#TypeSelect").on("change", function(){
		getUnitPrice();
	});
	
	$("#QuantityInput").on("change", function(){
		getTotalPrice();
		checkRemainQuantity();	
	});
	
	$("#TotalPriceInput").on("change", function(){
		getTotalPrice();
		checkRemainQuantity();
	});
	
	$("#UnitPriceInput").on("change", function(){
		getUnitPrice();
	});
});
</script>
@endsection