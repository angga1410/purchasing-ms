@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
				<i class="large material-icons">menu</i></a>
			<div class="mr-auto">
				<h3 class="m-subheader__title ">Create Purchase Order</h3>
			</div>
		</div>
	</div>
	<div class="tab-content  ">

		<div class=" shadowDiv-customhead " >
			<ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" href="#description" role="tab" aria-controls="description" aria-selected="true">Normal PO</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#history" role="tab" aria-controls="history" aria-selected="false">Multiple PR</a>
				</li>

			</ul>
		</div>

		<!-- <h4 class="card-title">Create Purchase Order</h4> -->
		<!-- <h6 class="card-subtitle mb-2">Emilia-Romagna Region, Italy</h6> -->
		<div class="tab-pane active" id="description" role="tabpanel">
			<?php
			$dataid = '0';
			?>
			<form action="{{ route('save_purchase_order') }}" method="post" enctype="multipart/form-data">
				<div class=" padding40px shadowDiv">

					{!! csrf_field() !!}
					<div class="row" id="m_user_profile_tab_1">
						<div class="col-md-6">
							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Purchase Order</label>
								<div class="col-md-7">
									<input name="po_number" type="text" class="form-control datepicker valid_to" placeholder="Valid To" data-date-start-date="d" value="PO/{{date('Y/m/d', strtotime('0 day'))}}/" readonly>
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Purchase Request</label>
								<div class="col-md-7">

									<select required="" onchange="prnumber(this.value)" name="pr_id" class="form-control select2">
										<option></option>
										@foreach( $pr as $get )
										<option value="{{ $get->id }}">{{ $get->pr_number }}{{$get->pr_number_seq}}</option>
										<?php
										$dataid = $get->id;
										?>
										@endforeach
									</select>
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Supplier</label>
								<div class="col-md-7">
									<select required="" name="supplier_id" class="form-control">
										@foreach( $suppliers as $get )
										<option value="{{ $get->id }}">{{ $get->supplier_name }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Supplier Contact</label>
								<div class="col-md-7">
									<select required="" name="supplier_contact_id" class="form-control">
										@foreach( $supplierContacts as $get )
										<option value="{{ $get->id }}">{{ $get->contact_name }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Shipment Term</label>
								<div class="col-md-7">
									<input required="" required="" name="shipment_term" class="form-control m-input" type="text">
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Payment Term</label>
								<div class="col-md-7">
									<input required="" required="" name="payment_term" class="form-control m-input" type="text">
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Shipping Via</label>
								<div class="col-md-7">
									<select required="" name="import_via" class="form-control">
										<option value="0">Local</option>
										<option value="1">Air</option>
										<option value="2">Sea</option>
									</select>
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Cost Freight</label>
								<div class="col-md-7">
									<select required="" name="cost_freight" class="form-control">
										<option value="0">Paid</option>
										<option value="1">Not Paid</option>
									</select>
								</div>
							</div>



						</div>

						<div class="col-md-6">
							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Cost Freight Currency</label>
								<div class="col-md-7">
									<select required="" name="currency" class="form-control">
										<option value="">-Select Currency-</option>
										<option value="idr">IDR</option>
										<option value="usd">USD</option>
										<option value="cny">CNY</option>
										<option value="sgd">SGD</option>
									</select>

								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Cost Freight Amount</label>
								<div class="col-md-7">
									<input required="" required="" name="cost_freight_amount" class="form-control m-input" type="text">
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">VAT (%)</label>
								<div class="col-md-7">
									<input required="" required="" name="vat" class="form-control m-input" type="text">
								</div>
							</div>



							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Remark</label>
								<div class="col-md-7">
									<input required="" required="" name="remark" class="form-control m-input" type="text">
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Attached File</label>
								<div class="col-md-7">
									<input name="attached_file" class="m-input file-input" type="file">
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Invoice Status</label>
								<div class="col-md-7">
									<select required="" name="invoice_status" class="form-control">
										<option value="0">Not Billed</option>
										<option value="1">Partially Billed</option>
										<option value="2">Fully Billed</option>
									</select>
								</div>
							</div>



							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Target Date</label>
								<div class="col-md-7">
									<input required="" name="po_date" class="form-control m-input" type="date">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Discount Type</label>
								<div class="col-md-7">
									<select required="" name="disc_type" class="form-control">
										<option value="0">No Discount</option>
										<option value="1">Percent</option>
										<option value="2">Amount</option>
									</select>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Discount Value</label>
								<div class="col-md-7">
									<input required="" name="disc_value" class="form-control m-input" type="number" value="0">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<!-- <label for="example-text-input" class="col-md-3 col-form-label">Approved</label> -->
								<div class="col-md-7">
									<input name="approved" class="custom-checkbox m-input" value="0" hidden>
								</div>
							</div>

							<div class="form-group m-form__group row">
								<!-- <label for="example-text-input" class="col-md-3 col-form-label">Approved By</label> -->
								<div class="col-md-7">
									<input required="" value=" " name="approved_by" class="form-control m-input" type="text" hidden>
								</div>
							</div>

						</div>




					</div>

				</div>

				<div class="m-subheader ">
					<div class="d-flex align-items-center">
						<div class="mr-auto">
							<!--<h3 class="m-subheader__title ">Request For Quotation Detail</h3>-->
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
									<th>ID</th>
									<th>MFR</th>
									<th>Part Name</th>
									<th>Part Number</th>
									<th>Part Description</th>
									<th>Quantity</th>

									<th>UM</th>
									<th>Currency</th>
									<th>Price</th>
									<th>Target Date</th>
									<th>Action</th>
									<!-- <th> HSCODE </th> -->


								</tr>
							</thead>

						</table>

						<!-- /Item Module -->

						<div class="col-12 m-portlet__foot m-portlet__foot--fit margin50px">
							<div class="m-form__actions">
								<div class="row justify-content-end">
									<div class>
										<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Create</button>&nbsp;&nbsp;
										<a href="{{ route('purchase_order_list') }}">
											<div class="btn btn-cancel-custom m-btn m-btn--air m-btn--custom">Cancel</div>
										</a>
										<!--<a href="{{ route('create_item') }}" class="btn btn-secondary m-btn m-btn--air m-btn--custom"><i class="fa fa-plus"></i>&nbsp&nbspAdd Item</a>-->
									</div>
								</div>
							</div>
						</div>


					</div>

				</div>
			</form>
		</div>

		<div class="tab-pane" id="history" role="tabpanel" aria-labelledby="history-tab">
			<?php
			$dataid = '0';
			?>
			<form action="{{ route('save_purchase_order2') }}" method="post" enctype="multipart/form-data">
				<div class="tab-content padding40px shadowDiv">

					{!! csrf_field() !!}
					<div class="row" id="m_user_profile_tab_1">
						<div class="col-md-6">
							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Purchase Order</label>
								<div class="col-md-7">
									<input name="po_number" type="text" class="form-control datepicker valid_to" placeholder="Valid To" data-date-start-date="d" value="PO/{{date('Y/m/d', strtotime('0 day'))}}/" readonly>
								</div>
							</div>

							<!-- <div class="form-group m-form__group row">
											<label for="example-text-input" class="col-md-3 col-form-label">Purchase Request</label>
											<div class="col-md-7">

												<select required="" onchange="prnumber(this.value)" name="pr_id" class="form-control">
													<option>-Select PR Num-</option>
													@foreach( $pr as $get )
													<option value="{{ $get->id }}">{{ $get->pr_number }}{{$get->pr_number_seq}}</option>
													<?php
													$dataid = $get->id;
													?>
													@endforeach
												</select>
											</div>
										</div> -->

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Supplier</label>
								<div class="col-md-7">
									<select required="" name="supplier_id" class="form-control">
										@foreach( $suppliers as $get )
										<option value="{{ $get->id }}">{{ $get->supplier_name }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Supplier Contact</label>
								<div class="col-md-7">
									<select required="" name="supplier_contact_id" class="form-control">
										@foreach( $supplierContacts as $get )
										<option value="{{ $get->id }}">{{ $get->contact_name }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Shipment Term</label>
								<div class="col-md-7">
									<input required="" required="" name="shipment_term" class="form-control m-input" type="text">
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Payment Term</label>
								<div class="col-md-7">
									<input required="" required="" name="payment_term" class="form-control m-input" type="text">
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Shipping Via</label>
								<div class="col-md-7">
									<select required="" name="import_via" class="form-control">
										<option value="0">Local</option>
										<option value="1">Air</option>
										<option value="2">Sea</option>
									</select>
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Cost Freight</label>
								<div class="col-md-7">
									<select required="" name="cost_freight" class="form-control">
										<option value="0">Paid</option>
										<option value="1">Not Paid</option>
									</select>
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Cost Freight Currency</label>
								<div class="col-md-7">
									<select required="" name="currency" class="form-control">
										<option value="">-Select Currency-</option>
										<option value="idr">IDR</option>
										<option value="usd">USD</option>
										<option value="cny">CNY</option>
										<option value="sgd">SGD</option>
									</select>

								</div>
							</div>



						</div>

						<div class="col-md-6">
							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Cost Freight Amount</label>
								<div class="col-md-7">
									<input required="" required="" name="cost_freight_amount" class="form-control m-input" type="text">
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">VAT (%)</label>
								<div class="col-md-7">
									<input required="" required="" name="vat" class="form-control m-input" type="text">
								</div>
							</div>



							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Remark</label>
								<div class="col-md-7">
									<input required="" required="" name="remark" class="form-control m-input" type="text">
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Attached File</label>
								<div class="col-md-7">
									<input name="attached_file" class=" m-input file-input" type="file">
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Invoice Status</label>
								<div class="col-md-7">
									<select required="" name="invoice_status" class="form-control">
										<option value="0">Not Billed</option>
										<option value="1">Partially Billed</option>
										<option value="2">Fully Billed</option>
									</select>
								</div>
							</div>



							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Target Date</label>
								<div class="col-md-7">
									<input required="" name="po_date" class="form-control m-input" type="date">
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Discount Type</label>
								<div class="col-md-7">
									<select required="" name="disc_type" class="form-control">
										<option value="0">No Discount</option>
										<option value="1">Percent</option>
										<option value="2">Amount</option>
									</select>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Discount Value</label>
								<div class="col-md-7">
									<input required="" name="disc_value" class="form-control m-input" type="number" value="0">
								</div>
							</div>

							<div class="form-group m-form__group row">
								<!-- <label for="example-text-input" class="col-md-3 col-form-label">Approved</label> -->
								<div class="col-md-7">
									<input name="approved" class="custom-checkbox m-input" value="0" hidden>
								</div>
							</div>

							<div class="form-group m-form__group row">
								<!-- <label for="example-text-input" class="col-md-3 col-form-label">Approved By</label> -->
								<div class="col-md-7">
									<input required="" value=" " name="approved_by" class="form-control m-input" type="text" hidden>
								</div>
							</div>

						</div>




					</div>

				</div>

				<div class="m-subheader ">
					<div class="d-flex align-items-center">
						<div class="mr-auto">
							<!--<h3 class="m-subheader__title ">Request For Quotation Detail</h3>-->
						</div>
					</div>
				</div>
				<div class="tab-content padding40px shadowDiv itemDiv">

					<span class="product-tab">Products</span>

					<div class="row" id="m_user_profile_tab_1">
						<div class="form-group m-form__group  d-flex align-items-center">
							<label class="m--margin-right-5" for="exampleInputEmail1">Search PR#</label>
							<div class="m-typeahead ">
								<input class="form-control m-input" id="searchProduct" type="text" dir="ltr" placeholder="Search PR#">
							</div>

						</div>
						<!-- Item Module -->

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

						<!-- /Item Module -->

						<div class="col-12 m-portlet__foot m-portlet__foot--fit margin50px">
							<div class="m-form__actions">
								<div class="row justify-content-end">
									<div class="">

										<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Create</button>&nbsp;&nbsp;
										<a href="{{ route('purchase_order_list') }}">
											<div class="btn btn-cancel-custom m-btn m-btn--air m-btn--custom">Cancel</div>
										</a>
										<!--<a href="{{ route('create_item') }}" class="btn btn-secondary m-btn m-btn--air m-btn--custom"><i class="fa fa-plus"></i>&nbsp&nbspAdd Item</a>-->
									</div>
								</div>
							</div>
						</div>


					</div>

				</div>
			</form>
		</div>

		<!-- <div class="tab-pane" id="deals" role="tabpanel" aria-labelledby="deals-tab">
			<p class="card-text">Immerse yourself in the colours, aromas and traditions of Emilia-Romagna with a holiday in Bologna, and discover the city's rich artistic heritage.</p>
			<a href="#" class="btn btn-danger btn-sm">Get Deals</a>
		</div> -->



	</div>
</div>

<div class="row">



</div>

<link href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href='{{ asset("/css/jquery-ui.min.css") }}' />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<style>


	.dataTables_length {
		display: none;
	}

	.dataTables_filter {
		display: none;
	}
</style>
<script type="text/javascript" src='{{ asset("/js/jquery-ui.min.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/jquery.dataTables.min.js") }}'></script>

<script type="text/javascript" src='{{ asset("/js/dataTables.bootstrap4.min.js") }}'></script>
<script type="text/javascript">
      $(function() {
    //Initialize Select2 Elements
    $('.select2').select2({

    })
  })
	$("#checkAll").click(function() {
		$('input:checkbox').not(this).prop('checked', this.checked);
	});
	var pr = 0;
	var prid = 0;
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
			limit: 10,
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













	$('#bologna-list a').on('click', function(e) {
		e.preventDefault()
		$(this).tab('show')
	})
	//
	function getItemTable(productIds, prId) {
		console.log(productIds)
		console.log(prId)
		$(function() {
			var table = $('#table').DataTable({
				processing: true,
				serverSide: true,
				paging: false,
				ajax: "{{ URL::to('items/tablepo') }}/" + productIds + "/" + prId,
				columns: [{
						data: 'id',
						name: 'id'
					},
					{
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
					// { data: 'sequence_number', name: 'sequence_number' },
					// { data: 'type_product_id', name: 'type_product_id' },
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
						data: 'target_date',
						name: 'target_date'
					},
					{
						data: 'delete',
						name: 'delete'
					},
					// { data: 'hscode', name: 'hscode' },

					// { data: 'total', name: 'total' },
					// { data: 'delete', name: 'delete' },

				]
			});


		});
	}

	//
	function prnumber(value) {
		console.log(value)
		$.ajax({
				url: "{{ URL::to('items/prnumber/get') }}/" + value
			})
			.done(function(data) {
				var table = $('#table').DataTable();
				table.destroy();
				getItemTable(data.productIds, data.prId);
				// document.getElementById("suppname").value = data.suppname;
				// document.getElementById("suppid").value = data.rfqsuppid;
				// document.getElementById("suppconname").value = data.consuppname;
				// document.getElementById("suppconid").value = data.rfqconsuppid;

				// console.log(data.rfqsuppid);
				// console.log(data.suppname);
				// console.log(data.rfqconsuppid);	
				// console.log(data.consuppname);
			})
			.row.add();

	}
	//
	var dataid = "<?php echo $dataid ?>";
	// console.log(dataid)
	window.onload = prnumber(dataid);


	function deleteItemTemp(row_index) {
		var i = row_index.parentNode.parentNode.rowIndex;
		document.getElementById("table").deleteRow(i);
	}
</script>
@endsection