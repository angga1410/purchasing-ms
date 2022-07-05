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
				<h3 class="m-subheader__title ">Purchase Request From Quotation</h3>
			</div>
		</div>
	</div>
	<?php
	$dataid = '0';
	?>
	<form action="{{ route('save_purchase_request') }}" method="post">
		<div class="tab-content padding40px shadowDiv">

			{!! csrf_field() !!}
			<div class="row" id="m_user_profile_tab_1">
				<div class="col-md-6">

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Purchase Request Number</label>
						<div class="col-md-7">
							<input name="pr_number" type="text" class="form-control datepicker valid_to" placeholder="Valid To" data-date-start-date="d" value="PR/Dept/{{date('Y/m/d', strtotime('0 day'))}}/" readonly>
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">PO Custumer Supplier Number</label>
						<div class="col-md-7">
							<select required="" onchange="qsnumber(this.value)" name="qs_num" class="form-control">

								@foreach( $dataall as $get )
								<option value="{{ $get->id }}"> {{ $get->qs_num }}</option>
								<?php
								$dataid = $get->id;
								?>
								@endforeach
							</select>

						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Request From</label>
						<div class="col-md-7">
							<select required="" name="request_from" class="form-control">
								@foreach( $suppliers as $get )
								<option value="{{ $get->supplier_name}}">{{ $get->supplier_name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<!-- <div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Request From</label>
							<div class="col-md-7">
                	<input type="text" placeholder="Request From" class="form-control" name="request_from" required>
							</div>
						</div> -->

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Purpose</label>
						<div class="col-md-7">
							<input type="text" placeholder="Purpose" class="form-control" name="purpose" required>
						</div>
					</div>



				</div>
				<div class="col-md-6">
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Purpose Remark</label>
						<div class="col-md-7">
							<input type="text" placeholder="Purpose Remark" name="purpose_remark" class="form-control" id="" required>
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Request Mode</label>
						<div class="col-md-7">
							<select name="request_mode" class="filter-by form-control">
								<option value="1">Routine</option>
								<option value="0">Non Routine</option>
							</select>
						</div>
					</div>


					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Purchase Request Date</label>
						<div class="col-md-7">
							<input type="date" name="pr_date" class="form-control" required>
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Purchase Request Target Date</label>
						<div class="col-md-7">
							<input type="date" name="pr_target" class="form-control" required>
						</div>
					</div>
				</div>

			</div>

		</div>

		<!-- RFQ Detail -->

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
							<th>MFR</th>
							<th>Part Name</th>
							<th>Part Number</th>
							<th>Part Description</th>
							<th>Currency</th>
							<th>Unit Cost</th>

							<th>Quantity</th>
							<th>UM</th>


						</tr>
					</thead>

				</table>

				<!-- /Item Module -->

				<div class="col-12 m-portlet__foot m-portlet__foot--fit margin50px">
					<div class="m-form__actions">
						<div class="row justify-content-end">
							<div class="">
								<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Create</button>&nbsp;&nbsp;
								<a href="{{ route('purchase_request_list') }}">
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


<link href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href='{{ asset("/css/jquery-ui.min.css") }}' />
<!-- <style>.dataTables_length{display: none;} .dataTables_filter{display: none;}</style> -->
<script type="text/javascript" src='{{ asset("/js/jquery-ui.min.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/jquery.dataTables.min.js") }}'></script>

<script type="text/javascript" src='{{ asset("/js/dataTables.bootstrap4.min.js") }}'></script>


<script type="text/javascript">
	function myFunction() {
		var x = document.getElementById("additem");
		if (x.style.display === "none") {
			x.style.display = "block";
		}
	}
	//
	function getItemTable(productIds, qsId) {
		$(function() {
			var table = $('#table').DataTable({
				processing: true,
				serverSide: true,
				ajax: "{{ URL::to('items/tableqs2') }}/" + productIds + "/" + qsId,
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
						data: 'default_curr',
						name: 'default_curr'
					},
					{
						data: 'unit_cost',
						name: 'unit_cost'
					},
					{
						data: 'qty',
						name: 'qty'
					},
					{
						data: 'um',
						name: 'um'
					},




				]
			});

			console.log(table);
		});
	}

	function getItemTable2(productIds, id) {
		console.log(productIds)
		console.log(id)
		$(function() {
			var table = $('#table').DataTable({
				processing: true,
				serverSide: true,
				ajax: "{{ URL::to('items/tableqs') }}/" + productIds + "/" + id,
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
						data: 'default_curr',
						name: 'default_curr'
					},
					{
						data: 'unit_cost',
						name: 'unit_cost'
					},

					{
						data: 'qty',
						name: 'qty'
					},
					{
						data: 'um',
						name: 'um'
					},



				]
			});


		});
	}


	//
	function qsnumber(value) {
		console.log(value)
		if (value != '0') {
			$.ajax({
					url: "{{ URL::to('items/qsnumber2/get') }}/" + value
				})
				.done(function(data) {
					var table = $('#table').DataTable();
					table.destroy();
					getItemTable(data.productIds, data.qsId);
					// console.log(data.productIds)
					// console.log(data.qsId)
				});
			var x = document.getElementById("additem");
			x.style.display = "none";
		} else {
			$.ajax({
					url: "{{ URL::to('items/qsnumber3/get') }}"
				})
				.done(function(data) {
					var table = $('#table').DataTable();
					table.destroy();
					getItemTable2(data.productIds, data.id);
					console.log(data.productIds)
					console.log(data.id)
				});
		}
	}

	var dataid = "<?php echo $dataid ?>";
	// console.log(dataid)
	window.onload = qsnumber(dataid);

	//
	function deleteItemTemp(uIds) {
		var table = $('#table').DataTable();
		var inqId = $('.inquiry-customer').val();
		table.destroy();
		getItemTable(uIds, inqId);
	}
</script>

@endsection