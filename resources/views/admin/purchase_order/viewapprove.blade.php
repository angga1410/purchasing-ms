@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
				<i class="large material-icons">menu</i></a>
			<div class="mr-auto">
				<h3 class="m-subheader__title ">View/Update Purchase Order</h3>
			</div>
		</div>
	</div>
	<form action="{{ route('update_purchase_order_approve') }}" method="post">
		<div class="tab-content padding40px shadowDiv">

			{!! csrf_field() !!}
			<div class="row" id="m_user_profile_tab_1">
				<div class="col-md-6">
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Purchase Order</label>
						<div class="col-md-7">
							<select required="" name="po_number" class="form-control" onchange="location = this.value;">
								@foreach( $dataall as $get )
								@if( $get->po_number == $data->po_number)
								<option value="{{ $data->po_number }}" selected=""> {{ $data->po_number }}{{ $get->po_number_seq }}</option>
								@else
								<option value="{{ $get->id }}"> {{ $get->po_number }}{{ $get->po_number_seq }}</option>
								@endif
								@endforeach
							</select>
							<!-- <input required="" required="" name="pr_id" value="{{ $data->pr_id }}" class="form-control m-input" type="text"> -->
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Purchase Request</label>
						<div class="col-md-7">

							@foreach( $pr as $get )
							@if( $get->id == $data->pr_id)
							<textarea required="" value="" class="form-control" type="text" readonly>{{ $get->pr_number }}{{ $get->pr_number_seq }}</textarea>
							<input required="" name="pr_id" value="{{ $get->id }}" class="form-control" type="text" hidden>
							@endif
							@endforeach

							<!-- <input required="" required="" name="pr_id" value="{{ $data->pr_id }}" class="form-control m-input" type="text"> -->
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Supplier</label>
						<div class="col-md-7">
							@foreach( $suppliers as $get )
							@if( $get->id == $data->supplier_id )
							<input required="" value="{{ $get->supplier_name }}" class="form-control" type="text" readonly>
							<input required="" name="supplier_id" value="{{ $get->id }}" class="form-control" type="text" hidden>
							@endif
							@endforeach
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Supplier Contact</label>
						<div class="col-md-7">
							@foreach( $supplierContacts as $get )
							@if( $get->id == $data->supplier_contact_id )
							<input required="" value="{{ $get->contact_name }}" class="form-control" type="text" readonly>
							<input required="" name="supplier_contact_id" value="{{ $get->id }}" class="form-control" type="text" hidden>
							@endif
							@endforeach

						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Shipment Term</label>
						<div class="col-md-7">
							<input required="" required="" name="shipment_term" value="{{ $data->shipment_term }}" class="form-control m-input" type="text" readonly>
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Payment Term</label>
						<div class="col-md-7">
							<input required="" required="" name="payment_term" value="{{ $data->payment_term }}" class="form-control m-input" type="text" readonly>
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Import Via</label>
						<div class="col-md-7">
							<?php
							if ($data->import_via == 0) {
								echo '<input required="" name="import_via" value="0" class="form-control m-input" type="text" hidden>';
								echo '<input required="" value="Local" class="form-control m-input" type="text" readonly>';
							} else if ($data->import_via == 1) {
								echo '<input required="" name="import_via" value="1" class="form-control m-input" type="text" hidden>';
								echo '<input required="" value="Air" class="form-control m-input" type="text" readonly>';
							} else if ($data->import_via == 2) {
								echo '<input required="" name="import_via" value="2" class="form-control m-input" type="text" hidden>';
								echo '<input required="" value="Sea" class="form-control m-input" type="text" readonly>';
							}
							?>
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Cost Freight</label>
						<div class="col-md-7">
							<?php
							if ($data->cost_freight == 0) {
								echo '<input required="" name="cost_freight" value="0" class="form-control m-input" type="text" hidden>';
								echo '<input required="" value="Paid" class="form-control m-input" type="text" readonly>';
							} else if ($data->cost_freight == 1) {
								echo '<input required="" name="cost_freight" value="1" class="form-control m-input" type="text" hidden>';
								echo '<input required="" value="Not Paid" class="form-control m-input" type="text" readonly>';
							}
							?>

						</div>
					</div>



				</div>

				<div class="col-md-6">
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Cost Freight Amount</label>
						<div class="col-md-7">
							<input required="" required="" name="cost_freight_amount" value="{{ $data->cost_freight_amount }}" class="form-control m-input" type="text" readonly>
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">VAT</label>
						<div class="col-md-7">
							<input required="" required="" name="vat" value="{{ $data->vat }}" class="form-control m-input" type="text" readonly>
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Quotation S Rating</label>
						<div class="col-md-7">
							<input required="" required="" name="qs_rating" value="{{ $data->qs_rating }}" class="form-control m-input" type="text" readonly>
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Remark</label>
						<div class="col-md-7">
							<input required="" required="" name="remark" value="{{ $data->remark }}" class="form-control m-input" type="text" readonly>
						</div>
					</div>

					<!-- <div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Attached File</label>
							<div class="col-md-7">
								<input name="attached_file" value="{{ $data->attached_file }}" class="form-control m-input file-input" type="file">
							</div>
						</div> -->

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Status</label>
						<div class="col-md-7">
							<select class="form-control m-input m-input--square" name="approved" required="true">
								<option @if($data->approved == 1) selected="selected" @endif value="1">Approve</option>
								<option @if($data->approved == 2) selected="selected" @endif value="2">Rejected</option>
							</select>
						</div>


					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Invoice Status</label>
						<div class="col-md-7">
							<?php
							if ($data->invoice_status == 0) {
								echo '<input required="" name="invoice_status" value="0" class="form-control m-input" type="text" hidden>';
								echo '<input required="" value="Not Billed" class="form-control m-input" type="text" readonly>';
							} else if ($data->invoice_status == 1) {
								echo '<input required="" name="invoice_status" value="1" class="form-control m-input" type="text" hidden>';
								echo '<input required="" value="Partially Billed" class="form-control m-input" type="text" readonly>';
							} else if ($data->invoice_status == 2) {
								echo '<input required="" name="invoice_status" value="2" class="form-control m-input" type="text" hidden>';
								echo '<input required="" value="Fully Billed" class="form-control m-input" type="text" readonly>';
							}
							?>
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">PO Supplier Rating</label>
						<div class="col-md-7">
							<input required="" required="" name="pos_supplier_rating" value="{{ $data->pos_supplier_rating }}" class="form-control m-input" type="text" readonly>
						</div>
					</div>


					<input required="" type="hidden" value="{{ $data->id }}" name="id">

				</div>


			</div>




		</div>
		<div class="m-subheader ">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<!--<h3 class="m-subheader__title "></h3>-->
				</div>
			</div>
		</div>

		<div class="tab-content padding40px shadowDiv itemDiv">

			<span class="product-tab">Products</span>

			<div class="row" id="m_user_profile_tab_1">

				<!-- Item Module -->

				<table class="table table-bordered" id="table">
					<thead>
						<tr>
							<th>MFR</th>
							<th>Part Name</th>
							<th>Part Number</th>
							<th>Part Description</th>
							<th>Quantity</th>
							<th>UM</th>
							<th>Price</th>
						</tr>
					</thead>

				</table>

			</div>

			<div class="col-12 m-portlet__foot m-portlet__foot--fit margin50px">
				<div class="m-form__actions">
					<div class="row justify-content-end">
						<div class="">
							<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Update</button>&nbsp;&nbsp;
							<a href="{{ route('purchase_order_approve') }}">
								<div class="btn btn-cancel-custom m-btn m-btn--air m-btn--custom">Cancel</div>
							</a>
						</div>
					</div>
				</div>
			</div>

		</div>

</div>

</form>
</div>

<?php
$dataid = $data->id;

?>

<link href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href='{{ asset("/css/jquery-ui.min.css") }}' />
<!-- <style>.dataTables_length{display: none;} .dataTables_filter{display: none;}</style> -->
<script type="text/javascript" src='{{ asset("/js/jquery-ui.min.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/jquery.dataTables.min.js") }}'></script>

<script type="text/javascript" src='{{ asset("/js/dataTables.bootstrap4.min.js") }}'></script>
<script type="text/javascript">
	//
	function getItemTable(productIds, poId) {

		$(function() {
			var table = $('#table').DataTable({
				processing: true,
				serverSide: true,
				ajax: "{{ URL::to('items/tablepo2') }}/" + poId,
				columns: [{
						data: 'mfr',
						name: 'mfr'
					},
					{
						data: 'part_name',
						name: 'part_name'
					},
					{
						data: 'part_num',
						name: 'part_num'
					},
					{
						data: 'part_desc',
						name: 'part_desc'
					},
					{
						data: 'qty',
						name: 'qty'
					},
					{
						data: 'um',
						name: 'um'
					},
					{
						data: 'unit_cost',
						name: 'unit_cost'
					},

				]
			});


		});
		console.log(productIds)
		console.log(poId)
	}


	//
	function ponumber(value) {
		// console.log(value)
		$.ajax({
				url: "{{ URL::to('items/ponumber/get') }}/" + value
			})
			.done(function(data) {
				var table = $('#table').DataTable();
				table.destroy();
				getItemTable(data.productIds, data.poId);
			});

	}

	var dataid = "<?php echo $dataid ?>";
	// console.log(dataid)
	window.onload = ponumber(dataid);

	function deleteItemTemp(uIds) {
		var table = $('#table').DataTable();
		var inqId = $('.inquiry-customer').val();
		table.destroy();
		getItemTable(uIds, inqId);
	}
</script>
@endsection