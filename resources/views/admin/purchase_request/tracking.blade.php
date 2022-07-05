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
				<h3 class="m-subheader__title ">Purchase Request Tracking</h3>
			</div>
		</div>
	</div>
	<?php
	$dataid = '0';
	?>

		<div class="tab-content padding40px shadowDiv">
        <div class="form-group m-form__group">
					<b><label for="exampleInputEmail1" >Search Purchase Request </label></b>
					<div class="m-typeahead">
						<input class="form-control m-input" id="searchProduct" type="text" dir="ltr" placeholder="Search Product">
					</div>
                  
				</div>
                <button onClick="window.location.href=window.location.href" class="btn btn-secondary">RESET</button>
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

		

			<div class="row" id="m_user_profile_tab_1">
			
				<!-- Item Module -->

				<div class="form-group m-form__group table-responsive">
					<table class="table m-table m-table--head-bg-metal new_raw_qc m--margin-top-20" id="new_raw_qc">
						<thead>
							<tr>
								<th>PO Number</th>
								<th>Mfr.</th>
								<th>Part Number</th>
								<th>Part Name</th>
								<th>Description</th>
								<th>Qty</th>
								<th>U/M</th>
							</tr>
						</thead>
						<tbody>
						
						</tbody>
					</table>
				</div>

				<!-- /Item Module -->



			


			</div>

		</div>

		<!-- /RFQ Detail -->




</div>



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



				url: "{{ URL::to('/Procurement/pr-data-tracking?term=%QUERY%') }}",
				wildcard: '%QUERY%'
			},

			datumTokenizer: Bloodhound.tokenizers.whitespace('term'),
			queryTokenizer: Bloodhound.tokenizers.whitespace
		});

		engine.initialize();

		$("#searchProduct").typeahead({
			hint: true,
			highlight: true,
			minLength: 3
		}, {
			source: engine.ttAdapter(),
			displayKey: 'pr_number',
			limit: 20,
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
            $("#new_raw_qc > tr").empty();
			console.log(datum.status)
			$.ajax({
				type: "get",
				url: "/purchase_request/po-data/" + datum.pr_id,
				success: function(data) {

					$.each(data, function(index, datum) {
						$("#new_raw_qc").append('<tr>' +
						
							'<td><input type="text" class="form-control m-input"  value="' + datum.po.po_number + datum.po.po_number_seq + '" readonly="true" style="width:190px;border:none;"></td>' +
							'<td><input type="text" class="form-control m-input" name="product_id[]" value="' + datum.item.mfr + '" readonly="true" style="width:190px;border:none;"></td>' +
							'<td><input type="text" class="form-control m-input" name="mfr[]" value="' + datum.item.part_num + '" readonly="true" style="width:190px;border:none;"></td>' +
					
                            '<td><textarea type="text" class="form-control m-input" name="part_name[]"  readonly="true" >' + datum.item.part_name  + '</textarea></td>' +
							'<td><textarea type="text" class="form-control m-input" name="part_name[]"  readonly="true" >' + datum.item.part_desc + '</textarea></td>' +
                            '<td><input type="text" class="form-control m-input" name="part_num[]" value="' + datum.qty_pos + '" readonly="true" style="width:190px;border:none;"></td>' +
						
							'<td><input type="text" class="form-control m-input" name="curr[]" value="' + datum.item.default_um + '" readonly="true" style="width:75px;border:none;"></td>' +
							
						
							'</tr>');

					});
				}
			});



			console.log(datum)
			$("#btn_qc").show();

		});

	});


	$('#new_raw_qc').on('click', '.deleteItem', function() {
		$(this).closest('tr').remove();
	});
</script>

@endsection