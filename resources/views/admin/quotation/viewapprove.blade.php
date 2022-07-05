@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
				<i class="large material-icons">menu</i></a>
			<div class="mr-auto">
				<h3 class="m-subheader__title ">Approve Quotation</h3>
			</div>
		</div>
		<div class="margin22 sub-heading">
			@if(session('success'))
			{{session('success')}}
			@endif
		</div>
	</div>


	<div class="tab-content padding40px shadowDiv" style="margin-bottom:2%">

		<input required="" name="id" value="{{ $data->id }}" class="form-control m-input" type="hidden">
		{!! csrf_field() !!}
		<div class="row" id="m_user_profile_tab_1">
			<div class="col-md-6">

				<div class="form-group m-form__group row">
					<label for="example-text-input" class="col-md-3 col-form-label">Quotation Supplier Number</label>
					<div class="col-md-7">
						<select required="" name="qs_num" class="form-control" onchange="location = this.value;">
							@foreach( $dataall as $get )
							@if( $get->qs_num == $data->qs_num)
							<option value="{{ $data->qs_num }}" selected=""> {{ $data->qs_num }}</option>
							@else
							<option value="{{ $get->id }}"> {{ $get->qs_num }}</option>
							@endif
							@endforeach
						</select>
						<!-- <input required="" name="qs_num" value="{{ $data->qs_num }}" class="form-control m-input" type="text"> -->
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label for="example-text-input" class="col-md-3 col-form-label">Quotation Supplier Date</label>
					<div class="col-md-7">
						<input required="" name="qs_date" value="{{ $data->qs_date }}" class="date form-control m-input" type="text">
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label for="example-text-input" class="col-md-3 col-form-label">Request For Quote</label>
					<div class="col-md-7">
						@foreach( $rfq as $get )
						@if( $data->rfq_id == $get->id )
						<textarea required="" class="form-control" type="text" readonly> {{$get->rfq_number}}{{$get->rfq_number_seq}}</textarea>
						<input required="" name="rfq_id" value="{{ $get->id }}" class="form-control" type="text" hidden>
						@endif
						@endforeach
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label for="example-text-input" class="col-md-3 col-form-label">Supplier</label>
					<div class="col-md-7">
						@foreach( $suppliers as $get )
						@if( $data->supplier_id == $get->id )
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
						@if( $data->supplier_contact_id == $get->id )
						<input required="" value="{{ $get->contact_name }}" class="form-control" type="text" readonly>
						<input required="" name="supplier_contact_id" value="{{ $get->id }}" class="form-control" type="text" hidden>
						@endif
						@endforeach
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label for="example-text-input" class="col-md-3 col-form-label">Shipment Term</label>
					<div class="col-md-7">
						<input required="" name="shipment_term" value="{{ $data->shipment_term }}" class="form-control m-input" type="text" readonly>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label for="example-text-input" class="col-md-3 col-form-label">Payment Term</label>
					<div class="col-md-7">
						<input required="" name="payment_term" value="{{ $data->payment_term }}" class="form-control m-input" type="text" readonly>
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
					<label for="example-text-input" class="col-md-3 col-form-label">Delivery Time</label>
					<div class="col-md-7">
						<input required="" name="delivertime" value="{{ $data->delivertime }}" class="form-control m-input" type="number" readonly>
					</div>
				</div>
			</div>

			<div class="col-md-6">

				<div class="form-group m-form__group row">
					<label for="example-text-input" class="col-md-3 col-form-label">Cost Freight</label>
					<div class="col-md-7">
						<?php
						if ($data->cost_freight == 0) {
							echo '<input required="" name="cost_freight" value="0" class="form-control m-input" type="text" hidden>';
							echo '<input required="" value="Paid" class="form-control m-input" type="text" readonly>';
						} else if ($data->import_via == 1) {
							echo '<input required="" name="cost_freight" value="1" class="form-control m-input" type="text" hidden>';
							echo '<input required="" value="Not Paid" class="form-control m-input" type="text" readonly>';
						}
						?>

					</div>
				</div>

				<div class="form-group m-form__group row">
					<label for="example-text-input" class="col-md-3 col-form-label">Cost Freight Amount</label>
					<div class="col-md-7">
						<input required="" name="cost_freight_amount" value="{{ $data->cost_freight_amount }}" class="form-control m-input" type="text" readonly>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label for="example-text-input" class="col-md-3 col-form-label">Quotation Supplier Rating</label>
					<div class="col-md-7">
						<input required="" name="qs_rating" value="{{ $data->qs_rating }}" class="form-control m-input" type="text" readonly>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label for="example-text-input" class="col-md-3 col-form-label">Remark</label>
					<div class="col-md-7">
						<input required="" name="remark" value="{{ $data->remark }}" class="form-control m-input" type="text" readonly>
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
						<input required="" name="status" value="{{ $data->status }}" class="form-control m-input" type="text" readonly>
					</div>
				</div>
				<div class="form-group m-form__group row">
					<label for="example-text-input" class="col-md-3 col-form-label">Tax (%)</label>
					<div class="col-md-7">
						<input required="" name="tax" value="{{ $data->tax }}" class="form-control m-input" type="number" readonly>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label for="example-text-input" class="col-md-3 col-form-label">Discount (%)</label>
					<div class="col-md-7">
						<input required="" name="discount" value="{{ $data->discount }}" class="form-control m-input" type="number" readonly>
					</div>
				</div>



			</div>

		</div>
	</div>
	<div class="tab-content padding40px shadowDiv">
		<style>
			.dataTables_length {
				display: none;
			}

			.dataTables_filter {
				display: none;
			}
		</style>
		<table class="table table-bordered" id="table">
			<thead>
				<tr>
					<!-- <th>Quotation Number</th> -->
					<th>Action</th>
					<th>Reason</th>
				</tr>
			</thead>
		</table>
	</div>

	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<!-- <h3 class="m-subheader__title ">Quotation Detail</h3> -->
			</div>
		</div>
	</div>
	<div class="tab-content padding40px shadowDiv itemDiv">

		<span class="product-tab">Products</span>

		<div class="row" id="m_user_profile_tab_1">



			<!-- Item Module -->

			<table class="table table-bordered" id="table2">
				<thead>
					<tr>
						<th>MFR</th>
						<th>Part Name</th>
						<th>Part Number</th>
						<th>Part Description</th>
						<th>Quantity</th>
						<th>UM</th>
						<th>Price</th>
						<th>Total</th>
					</tr>
				</thead>

			</table>

		</div>
		<div class="col-12 m-portlet__foot m-portlet__foot--fit margin70px">
			<div class="m-form__actions">
				<div class="row justify-content-end">
					<a href="{{ route('quotation_approve') }}">
						<div class="btn btn-danger m-btn m-btn--air m-btn--custom">Back</div>
					</a>
				</div>
			</div>
		</div>
	</div>

	<?php
	$dataid = $data->id;

	?>


	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<form action="{{ route('quotation_approve_status') }}" method="post">
				<div class="modal-content">

					<div class="modal-body">
						{!! csrf_field() !!}
						<input type="hidden" name="id" class="id" value="">
						<input type="hidden" name="status" class="status" value="">
						<textarea class="form-control" name="reason" placeholder="Enter reason to reject"></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-warning" value="Reject">
					</div>
				</div>
			</form>

		</div>
	</div>

</div>
<link href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href='{{ asset("/css/jquery-ui.min.css") }}' />

<script type="text/javascript" src='{{ asset("/js/jquery-ui.min.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/jquery.dataTables.min.js") }}'></script>

<script type="text/javascript" src='{{ asset("/js/dataTables.bootstrap4.min.js") }}'></script>

<script>
	var dataid = "<?php echo $dataid ?>";
	console.log(dataid)

	$(function() {
		$('#table').DataTable({
			processing: "<img src='{{asset('build/img/jquery.easytree/loading.gif')}}'> Carregando...",
			serverSide: true,
			ajax: "{{ URL::to('quotation/approve/data/') }}/" + dataid,
			columns: [
				// { data: 'qs_num', name: 'qs_num' },
				{
					data: 'action',
					name: 'qs_num',
					searchable: 'false'
				},
				{
					data: 'reason',
					name: 'reason',
					searchable: 'false'
				},

			]
		});
	});
</script>
<script type="text/javascript">
	var dataid = "<?php echo $dataid ?>";

	function reject(id, status) {
		$(".modal-body .id").val(id);
		$(".modal-body .status").val(status);
	}
	/*$(document).on("click", ".reject", function () {
	     var myBookId = $(this).data('id');
	     $(".modal-body #bookId").val( myBookId );
	     // As pointed out in comments,
	     // it is superfluous to have to manually call the modal.
	     // $('#addBookDialog').modal('show');
	});*/

	function getItemTable(productIds, qsId) {
		console.log(productIds)
		console.log(qsId)
		$(function() {
			var table = $('#table2').DataTable({
				processing: true,
				serverSide: true,
				ajax: "{{ URL::to('items/tableqs') }}/" + productIds + "/" + qsId,
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
						data: 'unit_cost',
						name: 'unit_cost'
					},
					// { data: 'total', name: 'total' },
					// { data: 'delete', name: 'delete' },

				]
			});


		});
	}


	//
	function qsnumber(value) {
		// console.log(value)
		$.ajax({
				url: "{{ URL::to('items/qsnumber/get') }}/" + value
			})
			.done(function(data) {
				var table = $('#table').DataTable();
				table.destroy();
				getItemTable(data.productIds, data.qsId);
			});

	}
	// console.log(dataid)
	window.onload = qsnumber(dataid);
</script>
@endsection