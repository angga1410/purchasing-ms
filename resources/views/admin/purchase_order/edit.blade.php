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
	<form action="{{ route('update_purchase_order') }}" method="post">
	<div class="tab-content padding40px shadowDiv">

			{!! csrf_field() !!}
			<div class="row" id="m_user_profile_tab_1">
					<div class="col-md-6">
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Purchase Order</label>
							<div class="col-md-7">
								<select required="" name="po_number" class="form-control js-example-basic-single" disabled onchange="location = this.value;">
									@foreach( $dataall as $get )
										@if( $get->po_number == $data->po_number)
											<option value="{{ $data->po_number }}" selected=""> {{ $data->po_number }}</option>
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

								
									@if ($data->pr_id == 0)
									<input required="" name="pr_id" value="0" class="form-control" type="hidden" >
									<input required="" name="" value="Multiple PR" class="form-control" type="text" readonly>
									@else
									
										<textarea required="" value="" class="form-control" type="text" readonly>{{ $get->pr_number }}{{ $get->pr_number_seq }}</textarea>
										<input required="" name="pr_id" value="{{ $get->id }}" class="form-control" type="text" hidden>
										@endif
									
								
								<!-- <input required="" required="" name="pr_id" value="{{ $data->pr_id }}" class="form-control m-input" type="text"> -->
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Supplier</label>
							<div class="col-md-7">
								
									
									<select required="" name="supplier_id" class="form-control js-example-basic-single">
									@foreach( $suppliers as $sup )
									@if( $sup->id == $data->supplier_id )
											<option value="{{ $sup->id }}" selected=""> {{ $sup->supplier_name }}</option>
										@else
											<option value="{{ $sup->id }}"> {{ $sup->supplier_name }}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Supplier Contact</label>
							<div class="col-md-7">
							

								<select required="" name="supplier_contact_id" class="form-control js-example-basic-single">
									@foreach( $supplierContacts as $sup )
									@if( $sup->id == $data->supplier_contact_id )
											<option value="{{ $sup->id }}" selected=""> {{ $sup->contact_name }}</option>
										@else
											<option value="{{ $sup->id }}"> {{ $sup->contact_name }}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Shipment Term</label>
							<div class="col-md-7">
								<input required="" required="" name="shipment_term" value="{{ $data->shipment_term }}" class="form-control m-input" type="text" >
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Payment Term</label>
							<div class="col-md-7">
								<input required="" required="" name="payment_term" value="{{ $data->payment_term }}" class="form-control m-input" type="text" >
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Shipping Via</label>
							<div class="col-md-7">

							<select required="" name="import_via" class="form-control js-example-basic-single">
								
									@if( $data->import_via == 0 )
											<option value="0" selected=""> Local</option>
											<option value="1">Air</option>
											<option value="2">Sea</option>
										@elseif( $data->import_via == 1 )
										<option value="0"> Local</option>
											<option value="1"  selected="">Air</option>
											<option value="2">Sea</option>
											@elseif( $data->import_via == 2 )
											<option value="0"> Local</option>
											<option value="1" >Air</option>
											<option value="2"  selected="">Sea</option>
										@endif
								
								</select>

							
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Cost Freight</label>
							<div class="col-md-7">
							

								 	<select required="" name="cost_freight" class="form-control js-example-basic-single">
								
									@if( $data->cost_freight == 0 )
											<option value="0" selected=""> Paid</option>
											<option value="1">Not Paid</option>
										
										@elseif( $data->cost_freight == 1 )
										<option value="0" > Paid</option>
											<option value="1" selected="">Not Paid</option>
										
										@endif
								
								</select>

							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Cost Freight Amount</label>
							<div class="col-md-7">
								<input required="" required="" name="cost_freight_amount" value="{{ $data->cost_freight_amount }}" class="form-control m-input" type="text" >
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">VAT</label>
							<div class="col-md-7">
								<input required="" required="" name="vat" value="{{ $data->vat }}" class="form-control m-input" type="text" >
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Taget Date</label>
							<div class="col-md-7">
								<input required="" type="date" required="" name="target_date" value="{{ $data->po_date }}" class="form-control m-input" >
							</div>
						</div>


						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Remark</label>
							<div class="col-md-7">
								<input required="" required="" name="remark" value="{{ $data->remark }}" class="form-control m-input" type="text" >
							</div>
						</div>

					</div>

					<div class="col-md-6">

						<!-- <div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Attached File</label>
							<div class="col-md-7">
								<input name="attached_file" value="{{ $data->attached_file }}" class="form-control m-input file-input" type="file">
							</div>
						</div> -->


						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Invoice Status</label>
							<div class="col-md-7">
						

								 
								 	<select required="" name="invoice_status" class="form-control js-example-basic-single">
								
									@if( $data->invoice_status == 0 )
											<option value="0" selected=""> Not Billed</option>
											<option value="1">Partially Billed</option>
											<option value="2">Fully Billed</option>
										
										@elseif( $data->invoice_status == 1 )
										<option value="0" > Not Billed</option>
											<option value="1" selected="">Partially Billed</option>
											<option value="2">Fully Billed</option>
											@elseif( $data->invoice_status == 2 )
										<option value="0" > Not Billed</option>
											<option value="1" >Partially Billed</option>
											<option value="2" selected="">Fully Billed</option>
										@endif
								
								</select>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Discount Type</label>
							<div class="col-md-7">
						

								 
								 	<select required="" name="disc_type" class="form-control js-example-basic-single">
								
									@if( $data->disc_type == 0 )
									<option selected value="0">No Discount</option>
										<option value="1">Percent</option>
										<option value="2">Amount</option>
										
										@elseif( $data->disc_type == 1 )
										<option value="0">No Discount</option>
										<option selected value="1">Percent</option>
										<option value="2">Amount</option>
											@elseif( $data->disc_type == 2 )
											<option value="0">No Discount</option>
										<option value="1">Percent</option>
										<option selected value="2">Amount</option>
										@endif
								
								</select>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Discount Value</label>
							<div class="col-md-7">
								<input required="" required="" name="disc_value" value="{{ $data->disc_value }}" class="form-control m-input" type="text" >
							</div>
						</div>

						
						<input required="" type="hidden" value="{{ $data->id }}" name="id">

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
									<th>ProductID</th>
										 <th>MFR</th>
										 <th>Part Name</th>
										 <th>Part Number</th>
										 <th>Part Description</th>
										 <th>Quantity</th>
										 <th>UM</th>
										 <th>Curr</th>
										 <th>Price</th>
										
										 <th>Delete Product</th>
									</tr>
							 </thead>

				</table>
			
			</div>

		<div class="m-portlet__foot m-portlet__foot--fit margin50px">
			<div class="m-form__actions">
				<div class="row">
				
				</div>
			</div>
		</div>

	</div>
	<div class="tab-content padding40px shadowDiv itemDiv">

<span class="product-tab">Add New Products from PR</span>

<div class="row" id="m_user_profile_tab_1">

	<div class="form-group m-form__group  d-flex align-items-center">
				<label class="m--margin-right-5" for="exampleInputEmail1">Search PR#</label>
				<div class="m-typeahead ">
					<input class="form-control m-input" id="searchProduct" type="text" dir="ltr" placeholder="Search PR#">
				</div>

			</div>

	<table class="table table-bordered" id="pr_multi">
				<thead>
					<tr>
						<th><input type="checkbox" id="checkAll"> </th>
						<th>PR#</th>
						<th>Product Id</th>
						<th>Mfr.</th>
						<th>Product Number</th>
						<th>Part Name</th>
						<th>Description</th>
						<th>Currency</th>
						<th>Unit Cost</th>
						<th>Qty Qc</th>
						<th>U/M</th>
						<th>Target Date</th>
					</tr>
				</thead>
				<tfoot>
					<tr>

						<td>
							<div class="btn  m-btn--air m-btn--custom" onclick="deleteRow();">Remove</div>
						</td>

					</tr>
				</tfoot>
			</table>

</div>

<div class="m-portlet__foot m-portlet__foot--fit margin50px">
<div class="m-form__actions">
	<div class="row">
		<div class="col-12">
			<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Update</button>&nbsp;&nbsp;
			<a href="{{ route('purchase_order_list') }}"><div class="btn btn-accent m-btn m-btn--air m-btn--custom">Cancel</div></a>
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
	$(document).ready(function() {
		$('.js-example-basic-single').select2({
			theme: "classic"
		});
	});

	function getItemTable(productIds, poId) {

		$(function() {
			var table = $('#table').DataTable({
				processing: true,
				serverSide: true,
				info: false,
				paging: false,
				ajax: "{{ URL::to('items/tablepo2') }}/"  + poId,
				columns: [{
						data: 'id',
						name: 'id'
					},{
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
						data: 'curr',
						name: 'curr'
					},
					{
						data: 'unit_cost',
						name: 'unit_cost'
					},
					{
						data: 'delete',
						name: 'delete'
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


	$(function() {
		var engine = new Bloodhound({
			remote: {



				url: "{{ URL::to('/Procurement/pr-data?term=%QUERY%') }}",
				wildcard: '%QUERY%'
			},

			datumTokenizer: Bloodhound.tokenizers.whitespace('term'),
			queryTokenizer: Bloodhound.tokenizers.whitespace
		});

		engine.initialize();

		$("#searchProduct").typeahead({
			hint: true,
			highlight: true,
			minLength: 1
		}, {
			source: engine.ttAdapter(),
			displayKey: 'pr_number',
			limit: 5,
			templates: {
				empty: [
					'<div class="empty-message">unable to find any</div>'
				],
				suggestion: function(data) {
					return '<li id="suggestion">' + data.pr_number + '' + data.pr_number_seq + '</li>'
				}

			}

		});
		//  var pr = pr_number;
		//  console.log(pr)
		$('#searchProduct').on('typeahead:selected', function(e, datum) {
			pr = datum.pr_number + datum.pr_number_seq

			console.log(datum.status)
			$.ajax({
				type: "get",
				url: "/Procurement/pr-get/" + datum.pr_id,
				success: function(data) {

					$.each(data, function(index, datum) {
						$("#pr_multi").append('<tr>' +
							// '<td><input type="text" class="form-control m-input" name="product_id[]" value="1" readonly="true" style="width:75px;border:none;"></td>'+
							'<td><input type="checkbox" class="form-control m-input select" style="width:30px;border:none;"></td>' +
							'<input type="hidden" name="pr_id[]" class="form-control m-input" value="' + datum.pr_id + '" readonly="true">' +
							'<input type="hidden" name="pr_id_detail[]" class="form-control m-input" value="' + datum.id + '" readonly="true">' +
							'<td><input type="text" class="form-control m-input"  value="' + pr + '" readonly="true" style="width:140px;border:none;"></td>' +
							'<td><input type="text" class="form-control m-input" name="product_id[]" value="' + datum.product_id + '" readonly="true" style="width:70px;border:none;"></td>' +
							'<td><input type="text" class="form-control m-input" name="mfr[]" value="' + datum.mfr + '" readonly="true" style="width:100px;border:none;"></td>' +
							'<td><input type="text" class="form-control m-input" name="part_num[]" value="' + datum.part_num + '" readonly="true" style="width:100px;border:none;"></td>' +
							'<td><textarea type="text" class="form-control m-input" name="part_name[]"  readonly="true" >' + datum.part_name + '</textarea></td>' +
							'<td><textarea type="text" class="form-control m-input" name="part_desc[]"  readonly="true">' + datum.part_desc + '</textarea></td>' +
							'<td><input type="text" class="form-control m-input" name="curr[]" value="' + datum.curr + '" readonly="true" style="width:75px;border:none;"></td>' +
							'<td><input type="text" class="form-control m-input" name="unit_cost[]" value="' + datum.unit_cost + '" readonly="true" style="width:50px;border:none;"></td>' +
							'<td><input type="text" class="form-control m-input" name="qty_pr[]" value="' + datum.balance_qty + '" required style="width:75px;"></td>' +
							'<td><input type="text" class="form-control m-input" name="um_pr[]" value="' + datum.um_pr + '" readonly="true" style="width:75px;border:none;"></td>' +
							'<td><input type="date" class="form-control m-input" name="target_date[]" style="width:150px;border:none;"></td>' +
							'</tr>');

					});
				}
			});



			console.log(datum)
			$("#btn_qc").show();

		});

	});

	function deleteRow() {
		document.querySelectorAll('#pr_multi .select:checked').forEach(e => {
			e.parentNode.parentNode.remove()
		});
	}
</script>
@endsection