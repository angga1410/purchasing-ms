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
				<h3 class="m-subheader__title ">Request For Inquiry</h3>
			</div>
		</div>
	</div>
	<?php
	$dataid = '0';
	?>
	<form action="{{ route('save_inquiry') }}" method="post">
		<div class="tab-content padding40px shadowDiv">

			{!! csrf_field() !!}
			<div class="row" id="m_user_profile_tab_1">
				<div class="col-md-6">



					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Department</label>
						<div class="col-md-7">
							<input type="text" placeholder="Department" class="form-control" value="{{ $rfi->rfi_dept_id }}" name="rfi_dept_id" required>
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Requester</label>
						<div class="col-md-7">
							<input type="text" placeholder=" Requester" value="{{ $rfi->rfi_requester_id }}" name="rfi_requester_id" class="form-control" id="" required>
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Customer</label>
						<div class="col-md-7">
							<input type="text" placeholder="Customer" value="{{ $rfi->customer_id }}" name="customer_id" class="form-control" id="" required>
						</div>
					</div>

					

					<div class="m-portlet__foot m-portlet__foot--fit margin50px">
						<div class="m-form__actions">
							<div class="row">
								<div class="col-md-3"></div>
								<div class="col-md-7">
								<div class="row justify-content-end" style="padding-right: 18px">

									<a href="{{ route('list_inquiry') }}">
										<div class="btn btn-cancel-custom m-btn m-btn--air m-btn--custom">Cancel</div>
									</a>
								</div>
									<!--<a href="{{ route('create_item') }}" class="btn btn-secondary m-btn m-btn--air m-btn--custom"><i class="fa fa-plus"></i>&nbsp&nbspAdd Item</a>-->
								</div>
							</div>
						</div>
					</div>




				</div>

			</div>

		</div>

		<!-- RFQ Detail -->






</div>

<!-- /RFQ Detail -->

</form>
</div>

<!-- <form action="{{ route('save_additem') }}" method="post">
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true">
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

			<table class="table table-bordered" id="new_raw_qc">
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
</form> -->

<link href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href='{{ asset("/css/jquery-ui.min.css") }}' />
<!-- <style>.dataTables_length{display: none;} .dataTables_filter{display: none;}</style> -->
<script type="text/javascript" src='{{ asset("/js/jquery-ui.min.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/jquery.dataTables.min.js") }}'></script>

<script type="text/javascript" src='{{ asset("/js/dataTables.bootstrap4.min.js") }}'></script>
<script type="text/javascript">
	// $(function() {
	//                var table2 =$('#table2').DataTable({
	//                processing: true,
	//                serverSide: true,
	//                ajax: "{{ route('itemdata') }}",
	//                columns: [
	//                         { data: 'mfr', name: 'mfr' },
	//                         { data: 'part_num', name: 'part_num' },
	//                         { data: 'part_name', name: 'part_name' },
	//                         { data: 'part_desc', name: 'part_desc', searchable: 'false' },
	//                         { data: 'unit_cost', name: 'unit_cost', searchable: 'false' },
	//                         { data: 'sell_price', name: 'sell_price', searchable: 'false' },
	//                         { data: 'add', name: 'add', searchable: 'false' },

	//                      ]
	//             });
	//          });
</script>

<script type="text/javascript">
	// function myFunction() {
	//   var x = document.getElementById("additem");
	//   if (x.style.display === "none") {
	//     x.style.display = "block";
	//   }
	// }
	// //
	// function getItemTable(productIds, qsId)
	// {
	// 	$(function() {
	//        var table = $('#table').DataTable({
	//        processing: true,
	//        serverSide: true,
	//        ajax: "{{ URL::to('items/tableqs2') }}/"+productIds+"/"+qsId,
	//        columns: [
	//                 { data: 'mfr', name: 'mfr' },
	//                 { data: 'part_name', name: 'part_name' },
	//                 { data: 'part_num', name: 'part_num' },
	//                 { data: 'part_desc', name: 'part_desc' },
	//                 { data: 'qty', name: 'qty' },
	//                 { data: 'um', name: 'um' },
	//                 { data: 'delete', name: 'delete' },

	//              ]
	//     });

	// 		console.log(table);
	//  	});
	// }

	// function getItemTable2(productIds, id)
	// {
	// 	console.log(productIds)
	// 	console.log(id)
	// 	$(function() {
	//        var table = $('#table').DataTable({
	//        processing: true,
	//        serverSide: true,
	//        ajax: "{{ URL::to('items/tableqs') }}/"+productIds+"/"+id,
	//        columns: [
	//                 { data: 'mfr', name: 'mfr' },
	//                 { data: 'part_name', name: 'part_name' },
	//                 { data: 'part_num', name: 'part_num' },
	//                 { data: 'part_desc', name: 'part_desc' },
	// 								// { data: 'sequence_number', name: 'sequence_number' },
	// 								// { data: 'type_product_id', name: 'type_product_id' },
	//                 { data: 'qty', name: 'qty' },
	//                 { data: 'um', name: 'um' },
	//                 { data: 'delete', name: 'delete' },

	//              ]
	//     });


	//  	});
	// }


	// //
	// function qsnumber(value)
	// {
	// 	console.log(value)
	// 	if (value != '0'){
	// 	$.ajax(
	// 	{
	// 	  url: "{{ URL::to('items/qsnumber2/get') }}/"+value
	// 	})
	// 	.done(function(data)
	// 	{
	// 		var table = $('#table').DataTable();
	// 		table.destroy();
	// 		getItemTable( data.productIds, data.qsId );
	// 		// console.log(data.productIds)
	// 		// console.log(data.qsId)
	// 	});
	// 	var x = document.getElementById("additem");
	// 	x.style.display = "none";
	// }else{
	// 	$.ajax(
	// 	{
	// 		url: "{{ URL::to('items/qsnumber3/get') }}"
	// 	})
	// 	.done(function(data)
	// 	{
	// 		var table = $('#table').DataTable();
	// 		table.destroy();
	// 		getItemTable2( data.productIds, data.id );
	// 		console.log(data.productIds)
	// 		console.log(data.id)
	// 	});
	// }
	// }

	// var dataid = "<?php echo $dataid ?>";
	// // console.log(dataid)
	// window.onload=qsnumber(dataid);

	// //
	// function deleteItemTemp( uIds )
	// {
	// 	var table = $('#table').DataTable();
	// 	var inqId = $('.inquiry-customer').val();
	// 	table.destroy();
	// 	getItemTable(uIds, inqId);
	// }










	$(function() {
		var engine = new Bloodhound({
			remote: {


				url: "{{ URL::to('/Procurement/products-data?term=%QUERY%') }}",

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
			displayKey: 'part_num',
			limit: 50,
			templates: {
				empty: [
					'<div class="empty-message">unable to find any</div>'
				],
				suggestion: function(data) {
					return '<li id="suggestion">' + data.part_num + ' - ' + data.part_name + '</li>'
				}

			}

		});
		$('#searchProduct').on('typeahead:selected', function(e, datum) {
			$("#btn_qc").show();
			$("#new_raw_qc").append('<tr>' +
				// '<td><input type="text" class="form-control m-input" name="product_id[]" value="1" readonly="true" style="width:75px;border:none;"></td>'+
				'<td><input type="text" class="form-control m-input" name="product_id[]" value="' + datum.id + '" readonly="true" style="width:50px;border:none;"></td>' +
				'<td><input type="text" class="form-control m-input" name="mfr[]" value="' + datum.mfr + '" readonly="true" style="width:90px;border:none;"></td>' +
				'<td><input type="text" class="form-control m-input" name="part_num[]" value="' + datum.part_num + '" readonly="true" style="width:75px;border:none;"></td>' +
				'<td><input type="text" class="form-control m-input" name="part_name[]" value="' + datum.part_name + '" readonly="true" style="width:90px;border:none;"></td>' +
				'<td><input type="text" class="form-control m-input" name="part_desc[]" value="' + datum.part_desc + '" readonly="true" style="width:75px;border:none;"></td>' +
				'<td><input type="text" class="form-control m-input" name="qty_rfi[]" required style="width:75px;"></td>' +
				'<td><input type="text" class="form-control m-input" name="um_rfi[]" value="' + datum.default_um + '" readonly="true" style="width:75px;border:none;"></td>' +
				'<td><a class="deleteItem btn btn-outline-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air btn-sm"><i class="la la-close"></i></a></td>' +
				'</tr>');

		});

	});


	$('#new_raw_qc').on('click', '.deleteItem', function() {
		$(this).closest('tr').remove();
	});
</script>

@endsection