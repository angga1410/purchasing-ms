@extends('layouts.admin')

@section('content')
<style>
	.filter {

		display: none;
	}
</style>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
				<i class="large material-icons">menu</i></a>
			<div class="mr-auto">
				<h3 class="m-subheader__title ">Request For Quotation</h3>
			</div>
		</div>
	</div>
	<?php
	$dataid = '0';
	?>
	<form action="{{ route('save_rfq') }}" method="post">
		<div class="tab-content padding40px shadowDiv">

			{!! csrf_field() !!}
			<div class="row" id="m_user_profile_tab_1">
				<div class="col-md-6">

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Supplier</label>
						<div class="col-md-7">
							<select required="" onchange="supplierChange(this.value)" name="supplier_id" class="form-control">
								@foreach( $suppliers as $supplier )
								<option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
								@endforeach
							</select>
						</div>
					</div>

				

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Request For Inquiry</label>
						<div class="col-md-7">
							<select onchange="inquiryCustomer(this.value)" name="inquiry_customer" class="form-control inquiry-customer" required>
								<option> Select </option>

								@foreach( $rfi as $get )
								<option value="{{ $get->id }}">{{ $get->customer_id }}</option>
								<?php
								$dataid = $get->id;

								?>
								@endforeach
							</select>
						</div>
					</div>

				


				</div>

				<div class="col-md-6">
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Order Date</label>
						<div class="col-md-7">
							<input type="date" name="order_date" class="form-control" required>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">RFQ #</label>
						<div class="col-md-7">
							<input name="rfq_number" type="text" class="form-control datepicker valid_to" placeholder="Valid To" data-date-start-date="d" value="RFQ/{{date('Y/m/d/', strtotime('0 day'))}}" readonly="true">
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Filter By</label>
						<div class="col-md-7">
							<select onchange="filterBy( this.value )" class="filter-by form-control" required>
								<option value="1">No Filter</option>
								<option value="2">Manufacturer</option>
								<option value="3">Part Name</option>
								<option value="4">Manufacturere and Part name</option>
							</select>
						</div>
					</div>

					<div class="filter manufacturer">
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Manufacturer</label>
							<div class="col-md-7">
								<input type="text" placeholder="Type to filter" class="form-control" id="mfr">
							</div>
						</div>
					</div>

					<div class="filter partName">
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Part Name</label>
							<div class="col-md-7">
								<input type="text" placeholder="Type to filter" class="form-control" id="part-name">
							</div>
						</div>
					</div>


					<div class="filter buttonFilter">
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label"></label>
							<div class="col-md-7">
								<input type="button" value="Filter" class="filter-items">
							</div>
						</div>
					</div>

				</div>


			</div>

		</div>

		<!-- RFQ Detail -->

		<div class="m-subheader ">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<!--<h3 class="m-subheader__title "> Detail</h3>-->
				</div>
			</div>
		</div>


		<div class="tab-content padding40px shadowDiv itemDiv">

			<span class="product-tab">Products</span>

			<div class="row" id="m_user_profile_tab_1">

				<!-- Item Module -->
				<a id="additem" style="display:none" class="btn btn-accent m-btn m-btn--air m-btn--custom" data-toggle="modal" data-target="#modalLoginForm">Add Item</a>&nbsp;&nbsp;
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

				<div class="col-12 m-portlet__foot m-portlet__foot--fit margin50px">
					<div class="col-md-6 form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Term & Condition</label>
						<div class="col-md-7">
							<textarea rows="4" name="termcondition" placeholder="Term&Condition" class="form-control" required></textarea>
						</div>
					</div>
					<div class="m-form__actions">
						<div class="row justify-content-end">
							<div class="">
								<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Create</button>&nbsp;&nbsp;
								<a href="{{ route('rfq_list') }}">
									<div class="btn btn-cancel-custom m-btn m-btn--air m-btn--custom">Cancel</div>
								</a>
								<!--<a href="{{ route('create_item') }}" class="btn btn-secondary m-btn m-btn--air m-btn--custom"><i class="fa fa-plus"></i>&nbsp&nbspAdd Item</a>-->
							</div>
						</div>
					</div>
				</div>


			</div>

		</div>

		<!-- /RFQ Detail -->

	</form>
</div>

<form action="{{ route('save_additem') }}" method="post">
	<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				{!! csrf_field() !!}
				<div class="form-group m-form__group row">
					<label for="example-text-input" class="col-md-3 col-form-label">Quantity</label>
					<div class="col-md-7">
						<input required type="text" name="qty_rfi" placeholder="Quantity" class="form-control">
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label for="example-text-input" class="col-md-3 col-form-label">UM</label>
					<div class="col-md-7">
						<input required type="text" name="um_rfi" placeholder="UM" class="form-control">
					</div>
				</div>
				<div class="modal-header text-center">
					<h4 class="modal-title w-100 font-weight-bold">Add Item</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

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
	function myFunction() {
		var x = document.getElementById("additem");
		if (x.style.display === "none") {
			x.style.display = "block";
		}
	}

	//
	function getItemTable(productIds, rfiId) {
		console.log(productIds)
		console.log(rfiId)
		$(function() {
			var table = $('#table').DataTable({
				processing: true,
				serverSide: true,
				ajax: "{{ URL::to('items/table') }}/" + productIds + "/" + rfiId,
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

	function getItemTable2(productIds, id) {
		console.log(productIds)
		console.log(id)
		$(function() {
			var table = $('#table').DataTable({
				processing: true,
				serverSide: true,
				ajax: "{{ URL::to('items/table2') }}/" + productIds + "/" + id,
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
	$('.filter-items').click(function() {

		var table = $('table').DataTable();

		var mfr = $('#mfr').val();
		var partName = $('#part-name').val();

		table
			.columns(0)
			.search(mfr)
			.draw();


		table
			.columns(1)
			.search(partName)
			.draw();
	})

	//
	supplierChange('{{ $suppliers[0]->id }}');

	//
	function supplierChange(value) {
		$.ajax({
				url: "{{ URL::to('supplier/contact/get') }}/" + value
			})
			.done(function(data) {
				$('.supplier-contact').html('');
				$('.supplier-contact').html(data);
			});
	}

	//
	function inquiryCustomer(value) {
		if (value != '0') {
			$.ajax({
					url: "{{ URL::to('items/inquirycustomer/get') }}/" + value
				})
				.done(function(data) {
					var table = $('#table').DataTable();
					table.destroy();
					getItemTable(data.productIds, data.rfiId);
				});


			var x = document.getElementById("additem");
			x.style.display = "none";
		} else {
			$.ajax({
					url: "{{ URL::to('items/inquirycustomer2/get') }}"
				})
				.done(function(data) {
					var table = $('#table').DataTable();
					table.destroy();
					getItemTable2(data.productIds, data.id);
					console.log(data.productIds);
					console.log(data.id);
				});
		}

	}

	//
	function filterBy(value) {
		if (value == 1) {
			$('.filter').hide();
		}
		if (value == 2) {
			$('.buttonFilter').show();
			$('.manufacturer').show();
			$('.partName').hide();
		}
		if (value == 3) {
			$('.buttonFilter').show();
			$('.manufacturer').hide();
			$('.partName').show();
		}

		if (value == 4) {
			$('.buttonFilter').show();
			$('.manufacturer').show();
			$('.partName').show();
		}
	}

	//
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