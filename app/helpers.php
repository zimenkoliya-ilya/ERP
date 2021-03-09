<?php
use App\Models\Wh_journal;
use App\Models\Wh_storage;
use App\Models\Wh_item_remain;

function deleteItemRemain($id) {
	$journal = Wh_journal::find($id);
	$previous_item_remain = Wh_item_remain::where('storage_id', '=', $journal['storage_id'])->where('item_id', '=', $journal['item_id'])->whereDate('date', '<=', $journal['date'])->orderBy('date', 'DESC')->first();
	if($previous_item_remain != NULL) {
		if($journal['type_id'] == 1) {
			$remain_quantity = $previous_item_remain['quantity'] - $journal['quantity'];
			$remain_total_price = $previous_item_remain['total_price'] - $journal['total_price'];
			if($remain_quantity > 0) {
				$remain_unit_price = $remain_total_price/$remain_quantity;
			} else {
				$remain_unit_price = 0;
			}
			
		} else {
			$remain_quantity = $previous_item_remain['quantity'] + $journal['quantity'];
			$remain_total_price = $previous_item_remain['total_price'] + $journal['total_price'];
			$remain_unit_price = $remain_total_price/$remain_quantity;
		}
		$remain_info['quantity'] = $remain_quantity;
		$remain_info['unit_price'] = $remain_unit_price;
		$remain_info['total_price'] = $remain_total_price;
		$check_date_journal = Wh_journal::where('storage_id', '=', $journal['storage_id'])->where('item_id', '=', $journal['item_id'])->whereDate('date', '=', $journal['date'])->where('id', '!=', $id)->orderBy('id', 'DESC')->first();
		if($check_date_journal != NULL) {
			$item_remain = updateItemRemain($remain_info, $previous_item_remain['id']);
		} else {
			Wh_item_remain::destroy($previous_item_remain['id']);
		}
	}
}

function deleteJournal($id) {
	$journal = Wh_journal::find($id);
	if($journal['related_journal_id'] != NULL) {
		deleteItemRemain($id);
		deleteItemRemain($journal['related_journal_id']);
		Wh_journal::destroy($id);
		Wh_journal::destroy($journal['related_journal_id']);
	} else {
		deleteItemRemain($id);
		Wh_journal::destroy($id);
	}
}

function syncJournalList($date, $storage_id, $item_id, $id) {
	$previous_journal_entry = Wh_journal::where('storage_id', '=', $storage_id)->where('item_id', '=', $item_id)->where('id', '<', $id)->whereDate('date', '<=', $date)->orderBy('id', 'desc')->first();
	$previous_quantity = $previous_journal_entry['remain_quantity'];
	$previous_unit_price = $previous_journal_entry['remain_unit_price'];
	$previous_total_price = $previous_journal_entry['remain_total_price'];
	$next_entries = Wh_journal::where('storage_id', '=', $storage_id)->where('item_id', '=', $item_id)->whereDate('date', '>=', $date)->orderBy('date', 'ASC')->orderBy('id', 'ASC')->get();
	foreach($next_entries as $entry) :
		if($entry['type_id'] == 1) {
			
		} else {
			$entry['unit_price'] = $previous_unit_price;
			$entry['total_price'] = $previous_unit_price * $entry['quantity'];
			$entry['remain_quantity'] = $previous_quantity - $entry['quantity'];
			$entry['remain_total_price'] = $previous_total_price - $entry['total_price'];
			$entry['remain_unit_price'] = $entry['remain_total_price']/$entry['remain_quantity'];
		}
	endforeach;
}

function saveJournal($request) {
	$journal = new Wh_journal;
	$journal->date = $request['date'];
	$journal->company_id = $request['company_id'];
	$journal->storage_id = $request['storage_id'];
	$journal->type_id = $request['type_id'];
	$journal->category_id = $request['category_id'];
	$journal->customer_id = $request['customer_id'];
	$journal->journal_type_id = $request['journal_type_id'];
	$journal->related_storage_id = $request['related_storage_id'];
	$journal->related_journal_id = $request['related_journal_id'];
	$journal->item_id = $request['item_id'];
	$journal->quantity = $request['quantity'];
	$journal->unit_price = $request['unit_price'];
	$journal->total_price = $request['total_price'];
	$journal->save();
	
	return $journal->id;
	
}

function addItemRemain($request, $remain_info) {
	$item_remain = new Wh_item_remain;
	$item_remain->date = $request['date'];
	$item_remain->storage_id = $request['storage_id'];
	$item_remain->item_id = $request['item_id'];
	$item_remain->quantity = $remain_info['quantity'];
	$item_remain->unit_price = $remain_info['unit_price'];
	$item_remain->total_price = $remain_info['total_price'];
	$item_remain->save();
	return $item_remain->id;
}

function updateItemRemain($remain_info, $id) {
	$item_remain = Wh_item_remain::find($id);
	$item_remain->quantity = $remain_info['quantity'];
	$item_remain->unit_price = $remain_info['unit_price'];
	$item_remain->total_price = $remain_info['total_price'];
	$item_remain->save();
	return $item_remain->id;
}

function saveDebit($request) {
	$previous_item_remain = Wh_item_remain::where('storage_id', '=', $request['storage_id'])->where('item_id', '=', $request['item_id'])->whereDate('date', '<=', $request['date'])->orderBy('date', 'DESC')->first();
	$remain_info = array();
	if($previous_item_remain != NULL) {
		$remain_quantity = $previous_item_remain['quantity'] + $request['quantity'];
		$remain_total_price = $previous_item_remain['total_price'] + $request['total_price'];
		$remain_unit_price = $remain_total_price/$remain_quantity;
		$remain_info['quantity'] = $remain_quantity;
		$remain_info['unit_price'] = $remain_unit_price;
		$remain_info['total_price'] = $remain_total_price;
		if(strtotime($previous_item_remain['date']) == strtotime($request['date'])) {
			$item_remain = updateItemRemain($remain_info, $previous_item_remain['id']);
		} else {
			$item_remain = addItemRemain($request, $remain_info);
		}
	} else {
		$remain_info['quantity'] = $request['quantity'];
		$remain_info['unit_price'] = $request['unit_price'];
		$remain_info['total_price'] = $request['total_price'];
		$item_remain = addItemRemain($request, $remain_info);
	}
	$debit_id = saveJournal($request);
	return $debit_id;
}

function saveCredit($request) {
	$previous_item_remain = Wh_item_remain::where('storage_id', '=', $request['storage_id'])->where('item_id', '=', $request['item_id'])->whereDate('date', '<=', $request['date'])->orderBy('date', 'DESC')->first();
	$remain_info = array();
	if($previous_item_remain != NULL) {
		$remain_quantity = $previous_item_remain['quantity'] - $request['quantity'];
		$remain_total_price = $previous_item_remain['total_price'] - $request['total_price'];
		if($remain_quantity == 0) {
			$remain_unit_price = 0;
		} else {
			$remain_unit_price = $remain_total_price/$remain_quantity;
		}
		$remain_info['quantity'] = $remain_quantity;
		$remain_info['unit_price'] = $remain_unit_price;
		$remain_info['total_price'] = $remain_total_price;
		if(strtotime($previous_item_remain['date']) == strtotime($request['date'])) {
			$item_remain = updateItemRemain($remain_info, $previous_item_remain['id']);
		} else {
			$item_remain = addItemRemain($request, $remain_info);
		}
		$request['unit_price'] = $remain_unit_price;
		$request['total_price'] = $remain_unit_price*$request['quantity'];
		$credit_id = saveJournal($request);
		
		return $credit_id;
	} else {
		return 0;
	}
}

function saveFromStorageDebit($request, $credit_id) {
	$storage_id = $request['related_storage_id'];
	$related_storage_id = $request['storage_id'];
	$request['related_storage_id'] = $related_storage_id;
	$request['storage_id'] = $storage_id;
	$request['journal_type_id'] = 3;
	$request['type_id'] = 1;
	$request['related_journal_id'] = $credit_id;
	$previous_item_remain = Wh_item_remain::where('storage_id', '=', $storage_id)->where('item_id', '=', $request['item_id'])->whereDate('date', '<=', $request['date'])->orderBy('date', 'DESC')->first();
	$remain_info = array();
	if($previous_item_remain != NULL) {
		$remain_quantity = $previous_item_remain['quantity'] + $request['quantity'];
		$remain_total_price = $previous_item_remain['total_price'] + $request['total_price'];
		$remain_unit_price = $remain_total_price/$remain_quantity;
		$remain_info['quantity'] = $remain_quantity;
		$remain_info['unit_price'] = $remain_unit_price;
		$remain_info['total_price'] = $remain_total_price;
		if(strtotime($previous_item_remain['date']) == strtotime($request['date'])) {
			$item_remain = updateItemRemain($remain_info, $previous_item_remain['id']);
		} else {
			$item_remain = addItemRemain($request, $remain_info);
		}
	} else {
		$remain_info['quantity'] = $request['quantity'];
		$remain_info['unit_price'] = $request['unit_price'];
		$remain_info['total_price'] = $request['total_price'];
		$item_remain = addItemRemain($request, $remain_info);
	}
	$debit_id = saveJournal($request);
	return $debit_id;
}

?>