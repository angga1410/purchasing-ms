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
				<h3 class="m-subheader__title ">Date Analysis Report</h3>
			</div>
		</div>
	</div>
	<?php
	$dataid = '0';
	?>
	
		<div class="tab-content padding40px shadowDiv">

			{!! csrf_field() !!}
			<div class="row" id="m_user_profile_tab_1">
            <div class="form-group m-form__group">
					<label for="exampleInputEmail1">Search Purchase Order Number</label>
					<div class="m-typeahead">
						<input class="form-control m-input" id="searchProduct" type="text" dir="ltr" placeholder="Search Product" style="width: 500px;">
					</div>
				</div>

			</div>

		</div>

		<!-- RFQ Detail -->

		<div class="m-subheader ">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					
				</div>
			</div>
		</div>


		<div class="tab-content padding40px shadowDiv itemDiv">

			<span class="product-tab">Result</span>

			<div class="row" id="m_user_profile_tab_1">
		
				<!-- Item Module -->

				<div class="form-group m-form__group table-responsive">
					<table class="table m-table m-table--head-bg-metal m--margin-top-20" id="new_raw_qc">
						<thead>
							<tr>
                            <th>Part Number</th>
                                <th>MFR</th>
                                <th>Part Name</th>
								<th>Purchase Order Number</th>
								<th>Purchase Request Number</th>
								<th>PR Target Date</th>
								<th>PO Target Date</th>
								<th>Delivered Date</th>
								<!-- <th>Received By</th>
								<th>Action</th> -->
							</tr>
						</thead>
						<tbody>
						
						</tbody>
					</table>
				</div>

				<!-- /Item Module -->



				<div class="col-12 m-portlet__foot m-portlet__foot--fit margin50px">
					<div class="m-form__actions">
						<div class="row justify-content-end">
							<div class="">
								<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom" id="btn_qc">Create</button>&nbsp;&nbsp;
								<a href="{{ route('purchase_request_list') }}">
									<div class="btn btn-cancel-custom m-btn m-btn--air m-btn--custom ">Cancel</div>
								</a>
								<!--<a href="{{ route('create_item') }}" class="btn btn-secondary m-btn m-btn--air m-btn--custom"><i class="fa fa-plus"></i>&nbsp&nbspAdd Item</a>-->
							</div>
						</div>
					</div>
				</div>


			</div>

		</div>


</div>



<link href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href='{{ asset("/css/jquery-ui.min.css") }}' />
<!-- <style>.dataTables_length{display: none;} .dataTables_filter{display: none;}</style> -->
<script type="text/javascript" src='{{ asset("/js/jquery-ui.min.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/jquery.dataTables.min.js") }}'></script>

<script type="text/javascript" src='{{ asset("/js/dataTables.bootstrap4.min.js") }}'></script>


<script type="text/javascript">

	$(function() {
		var engine = new Bloodhound({
			remote: {



				url: "{{ URL::to('/report/po-date?term=%QUERY%') }}",
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
			limit: 30,
			templates: {
				empty: [
					'<div class="empty-message">unable to find any</div>'
				],
				suggestion: function(data) {
					return '<li id="suggestion">' + data.po_number + data.po_number_seq + '</li>'
				}

			}

		});
		$('#searchProduct').on('typeahead:selected', function(e, datum) {
			$('#new_raw_qc').DataTable().clear().destroy();
			var table = $('#new_raw_qc').DataTable({
       processing: true,
       serverSide: true,
	   paging: false,
       ajax: "{{ URL::to('report/tablepodate') }}/"+datum.id,
       columns: [
                { data: 'part_num', name: 'part_num' },
				{ data: 'mfr', name: 'mfr' },
				{ data: 'part_name', name: 'part_name' },
				{ data: 'po_num', name: 'po_num' , render: function(data,type,row){
                        return row.po_num+row.po_num_seq}},
				{ data: 'pr_num', name: 'pr_num' , render: function(data,type,row){
                		return row.pr_num+row.pr_num_seq}},
				{ data: 'pr_date', name: 'pr_date' },
				{ data: 'po_date', name: 'po_date' },
				{ data: 'deliv_date', name: 'deliv_date' },
			

               
				
             ]
    });
		});

	});


	$('#new_raw_qc').on('click', '.deleteItem', function() {
		$(this).closest('tr').remove();
	});
</script>

@endsection