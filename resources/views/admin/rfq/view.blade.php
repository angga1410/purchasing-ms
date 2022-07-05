	@extends('layouts.admin')

	@section('content')
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<div class="m-subheader ">
			<div class="d-flex align-items-center">
				<a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
					<i class="large material-icons">menu</i></a>
				<div class="mr-auto">
					<h3 class="m-subheader__title ">Update RFQ</h3>
				</div>
			</div>
		</div>

		<div class="tab-content padding40px shadowDiv">

			{!! csrf_field() !!}
			<div class="row" id="m_user_profile_tab_1">
				<div class="col-md-6">
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Supplier</label>
						<div class="col-md-7">
							@foreach( $suppliers as $supplier )

							@if( $supplier->id == $data->supplier_id )
							<input readonly required="" class="form-control" value="{{ $supplier->supplier_name }}" name="supplier_name">
							@endif

							@endforeach
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Supplier Contact</label>
						<div class="col-md-7">
							@foreach( $supplierContacts as $supplierContact )

							@if( $supplierContact->id == $data->supplier_contact_id )
							<input readonly required="" class="form-control" value="{{ $supplierContact->contact_name }}" name="contact_name">
							@endif

							@endforeach
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Inquiry Customer</label>
						<div class="col-md-7">
							@foreach( $rfi as $rfidata )

							@if( $rfidata->id == $data->inquiry_customer )
							<input readonly required="" class="form-control" value="{{ $rfidata->customer_id }}" name="inquiry_customer">
							@endif

							@endforeach
						</div>
					</div>



				</div>

				<div class="col-md-6">
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Vendor Reference</label>
						<div class="col-md-7">
							<input readonly required="" class="form-control" class="form-control" value="{{ $data->vendor_reference }}" name="vendor_reference">
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Order Date</label>
						<div class="col-md-7">
							<input readonly required="" class="form-control" class="form-control" value="{{ $data->order_date }}" name="order_date">
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">RFQ #</label>
						<div class="col-md-7">
							<select required="" name="rfq_number" class="form-control" onchange="location = this.value;">
								@foreach( $dataall as $get )
								@if( $get->rfq_number == $data->rfq_number)
								<option value="{{ $data->rfq_number }}" selected=""> {{ $data->rfq_number }}</option>
								@else
								<option value="{{ $get->id }}"> {{ $get->rfq_number }}</option>
								@endif
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group m-form__group row">
						<!-- <label for="example-text-input" class="col-md-3 col-form-label">Status</label> -->
						<div class="col-md-7">
							<input hidden required="" class="form-control" class="form-control" value="1" name="rfq_status">
						</div>
					</div>

				</div>

			</div>

		</div>

		<!-- RFQ Detail -->

		<div class="m-subheader ">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<!-- <h3 class="m-subheader__title ">Request For Quotation Detail</h3> -->
				</div>
			</div>
		</div>
		<div class="tab-content padding40px shadowDiv itemDiv">

			<span class="product-tab">RFQ Detail</span>

			<form action="{{ route('update_rfq') }}" method="post">
				<input required="" type="hidden" value="{{ $data->id }}" name="id">
				{!! csrf_field() !!}
				<div class="row" id="m_user_profile_tab_1">
					<!-- Item Module -->
					<?php if ($data->inquiry_customer == '0') {
						echo '<a id="additem" class="btn btn-accent m-btn m-btn--air m-btn--custom" data-toggle="modal" data-target="#modalLoginForm">Add Item</a>&nbsp;&nbsp;';
					}
					?>

					<table class="table table-bordered" id="table">
						<thead>
							<tr>
								<th>MFR</th>
								<th>Part Name</th>
								<th>Part Number</th>
								<th>Part Description</th>
								<!-- <th>Sequence Number</th>
										 <th>Type Product Id</th> -->
								<th>Quantity</th>
								<th>UM</th>
								<th>Action</th>

							</tr>
						</thead>

					</table>

					<!-- /Item Module -->
					<div class="col-12 m-portlet__foot m-portlet__foot--fit margin50px">
						<div class="col-md-6 form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Term & Condition</label>
							<div class="col-md-7">
								<textarea rows="4" readonly cols="80" name="termcondition" value="{{ $data->termcondition }}" class="form-control" required><?php echo $data->termcondition; ?></textarea>
							</div>
						</div>


						<div class="m-form__actions">
							<div class="row justify-content-end">
								<div class="">
									<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Update</button>&nbsp;&nbsp;
									<a href="{{ route('rfq_list') }}">
										<div class="btn btn-cancel-custom m-btn m-btn--air m-btn--custom">Cancel</div>
									</a>
								</div>
							</div>
						</div>
					</div>


				</div>

		</div>

		<!-- /RFQ Detail -->

		</form>
	</div>
	<?php
	$dataid = $data->id;

	?>

	<form action="{{ route('save_additem_update') }}" method="post">
		<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					{!! csrf_field() !!}
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Quantity</label>
						<div class="col-md-7">
							<input required type="text" name="qty_rfq" placeholder="Quantity" class="form-control">
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">UM</label>
						<div class="col-md-7">
							<input required type="text" name="um_rfq" placeholder="UM" class="form-control">
						</div>
					</div>
					<div class="modal-header text-center">
						<h4 class="modal-title w-100 font-weight-bold">Add Item</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<input required="" type="hidden" value="{{ $data->id }}" name="id">

					<table class="table table-bordered" id="table2">
						<thead>
							<tr>
								<th>MFR</th>
								<th>Part Number</th>
								<th>Part Name</th>
								<th>Part Description</th>
								<th>Unit Cost</th>
								<th>Sell Price</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>


					<div class="modal-footer d-flex justify-content-center">
						<button class="btn btn-default">Add</button>
					</div>
					<br>
				</div>
			</div>
		</div>
	</form>

	<link href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css" rel="stylesheet">
	<link rel="stylesheet" href='{{ asset("/css/jquery-ui.min.css") }}' />
	<!-- <style>.dataTables_length{display: none;} .dataTables_filter{display: none;}</style> -->
	<script type="text/javascript" src='{{ asset("/js/jquery-ui.min.js") }}'></script>
	<script type="text/javascript" src='{{ asset("/js/jquery.dataTables.min.js") }}'></script>

	<script type="text/javascript" src='{{ asset("/js/dataTables.bootstrap4.min.js") }}'></script>
	<script type="text/javascript">
		$(function() {
			var table2 = $('#table2').DataTable({
				processing: true,
				serverSide: true,
				ajax: "{{ route('itemdata') }}",
				columns: [{
						data: 'mfr',
						name: 'mfr'
					},
					{
						data: 'part_num',
						name: 'part_num'
					},
					{
						data: 'part_name',
						name: 'part_name'
					},
					{
						data: 'part_desc',
						name: 'part_desc',
						searchable: 'false'
					},
					{
						data: 'unit_cost',
						name: 'unit_cost',
						searchable: 'false'
					},
					{
						data: 'sell_price',
						name: 'sell_price',
						searchable: 'false'
					},
					{
						data: 'add',
						name: 'add',
						searchable: 'false'
					},

				]
			});
		});
	</script>
	<script type="text/javascript">
		function getItemTable3(productIds, id) {
			console.log(productIds)
			console.log(id)
			$(function() {
				var table = $('#table').DataTable({
					processing: true,
					serverSide: true,
					ajax: "{{ URL::to('items/table3') }}/" + productIds + "/" + id,
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
							data: 'delete',
							name: 'delete'
						},

					]
				});


			});
		}


		//
		function inquiryCustomer(value) {
			console.log(value)
			$.ajax({
					url: "{{ URL::to('items/inquirycustomer3/get') }}/" + value
				})
				.done(function(data) {
					var table = $('#table').DataTable();
					table.destroy();
					getItemTable3(data.productIds, data.id);
					// console.log(data.productIds);
					// console.log(data.id)
				});


			var x = document.getElementById("additem");
			x.style.display = "block";

		}

		var dataid = "<?php echo $dataid ?>";
		// console.log(dataid)
		window.onload = inquiryCustomer(dataid);

		//
		function deleteItemTemp(uIds) {
			var table = $('#table').DataTable();
			var inqId = $('.inquiry-customer').val();
			table.destroy();
			getItemTable(uIds, inqId);
		}
	</script>
	@endsection