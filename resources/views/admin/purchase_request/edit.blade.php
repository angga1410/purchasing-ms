@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
		<a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
            <i class="large material-icons">menu</i></a>
			<div class="mr-auto">
				<h3 class="m-subheader__title ">Update Items Purchase Request</h3>
			</div>
		</div>
	</div>
    <form action="{{ route('update_purchase_request') }}" method="post">
	<div class="tab-content padding40px shadowDiv">

			{!! csrf_field() !!}
			<div class="row" id="m_user_profile_tab_1">
					<div class="col-md-6">

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Purchase Request Number</label>
							<div class="col-md-7">
							<input name = "pr_number" type="text" class = "form-control datepicker valid_to" placeholder = "{{$data->pr_number}}" readonly>
							<input name = "pr_id" type="hidden" class = "form-control datepicker valid_to" value="{{$data->id}}" readonly>
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

			<div class="form-group m-form__group">
					<label for="exampleInputEmail1">Add Items</label>
					<div class="m-typeahead">
						<input class="form-control m-input" id="searchProduct" type="text" dir="ltr" placeholder="Search Product">
					</div>
				</div>
				
				<table class="table table-bordered" id="table">
					<thead>
		              <tr>
					  <th>ID</th>
		                 <th>MFR</th>
		                 <th>Part Name</th>
		                 <th>Part Number</th>
		                 <th>Part Description</th>
						 <th>UM</th>
		                 <th>Quantity</th>
						 <th>Balance QTY</th>
		                 <th>Unit Cost</th>
						 <th>Action</th>
		              
		              </tr>
		           </thead>

				</table>

				<!-- /Item Module -->	

				<div class="col-12 m-portlet__foot m-portlet__foot--fit margin50px">
					<div class="m-form__actions">
						<div class="row justify-content-end">
							<div class="">
								<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Update</button>&nbsp;&nbsp;
								<a href="{{ route('purchase_request_list') }}"><div class="btn btn-cancel-custom m-btn m-btn--air m-btn--custom">Cancel</div></a>
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
function getItemTable(productIds, poId)
{

	$(function() {
       var table = $('#table').DataTable({
       processing: true,
       serverSide: true,
	   paging: false,
       ajax: "{{ URL::to('items/tableprEdit') }}/"+poId,
       columns: [
	
		{data: 'id', name: 'id' },
                { data: 'mfr', name: 'mfr' },
                { data: 'part_name', name: 'part_name' },
                { data: 'part_num', name: 'part_num' },
                { data: 'part_desc', name: 'part_desc' },
				{ data: 'um', name: 'um' },
                { data: 'qty', name: 'qty' },
				{ data: 'balance_qty', name: 'balance_qty' },
                { data: 'unit_cost', name: 'unit_cost' },
				{data: 'product_id', name: 'product_id' },

             ]
    });


 	});
	console.log(productIds)
	console.log(poId)
}


//
function ponumber(value)
{
	// console.log(value)
	$.ajax(
	{
	  url: "{{ URL::to('items/ponumber/get') }}/"+value
	})
	.done(function(data)
	{
		var table = $('#table').DataTable();
		table.destroy();
		getItemTable( data.productIds, data.poId );
	});

}

var dataid = "<?php echo $dataid ?>";
// console.log(dataid)
window.onload=ponumber(dataid);

function deleteItemTemp( uIds )
{
	var table = $('#table').DataTable();
	var inqId = $('.inquiry-customer').val();
	table.destroy();
	getItemTable(uIds, inqId);
}


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
			limit: 10,
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
			$("#table").append('<tr>' +
				// '<td><input type="text" class="form-control m-input" name="product_id[]" value="1" readonly="true" style="width:75px;border:none;"></td>'+
				'<input type="hidden" class="form-control m-input" name="product_id[]" value="' + datum.id + '" readonly="true" style="width:50px;border:none;">' +
				'<td><input type="hidden" class="form-control m-input" name="id[]" value="0" readonly="true" style="width:90px;border:none;"></td>' +
				'<td><input type="text" class="form-control m-input" name="mfr[]" value="' + datum.mfr + '" readonly="true" style="width:90px;border:none;"></td>' +
				'<td><input type="text" class="form-control m-input" name="part_name[]" value="' + datum.part_name + '" readonly="true" style="width:150px;border:none;"></td>' +
				'<td><input type="text" class="form-control m-input" name="part_num[]" value="' + datum.part_num + '" readonly="true" style="width:120px;border:none;"></td>' +
				'<td><input type="text" class="form-control m-input" name="part_desc[]" value="' + datum.part_desc + '" readonly="true" style="width:275px;border:none;"></td>' +
				'<td><input type="text" class="form-control m-input" name="um_pr[]" value="' + datum.default_um + '" readonly="true" style="width:75px;border:none;"></td>' +
				'<td><input type="text" class="form-control m-input" name="qty_pr[]"   style="width:75px;"></td>' +
				'<td><input type="text" class="form-control m-input" name="unit_cost[]" value="' + datum.unit_cost + '" readonly="true" style="width:75px;border:none;"></td>' +
			
			
				
			
				'<td><a class="deleteItem btn btn-outline-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air btn-sm"><i class="la la-close"></i></a></td>' +
				'</tr>');

		});

	});

	$('#table').on('click', '.deleteItem', function() {
		$(this).closest('tr').remove();
	});
 </script>
@endsection
