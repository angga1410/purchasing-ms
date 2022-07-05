@extends('layouts.admin')

@section('content')
<link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
				<i class="large material-icons">menu</i></a>
			<div class="mr-auto">
				<h3 class="m-subheader__title ">Create Inquiry</h3>
			</div>
		</div>
	</div>




		<!-- <h4 class="card-title">Create Purchase Order</h4> -->
		<!-- <h6 class="card-subtitle mb-2">Emilia-Romagna Region, Italy</h6> -->


			<?php
			$dataid = '0';
			?>
			<form action="{{ route('save_inquiry') }}" method="post" enctype="multipart/form-data">
				<div class="tab-content padding40px shadowDiv">

					{!! csrf_field() !!}
					<div class="row" id="m_user_profile_tab_1">
						<div class="col-md-6">
							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Inquiry Number</label>
								<div class="col-md-7">
									<input name="rfi_num" type="text" class="form-control datepicker valid_to" placeholder="Valid To" data-date-start-date="d" value="RFI/{{date('Y/m/d', strtotime('0 day'))}}/" readonly>
								</div>
							</div>

						

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Supplier</label>
								<div class="col-md-7">
								<select required="" name="supplier_id" class="form-control ">
								<option ></option>
										@foreach( $suppliers as $get )
										<option value="{{ $get->id }}">{{ $get->supplier_name }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Supplier Contact</label>
								<div class="col-md-7">
								<select required="" name="supplier_contact_id" class="form-control ">
								<option></option>
								<option>ALL MFR</option>
										@foreach( $supplierContacts as $get )
										<option value="{{ $get->id }}">{{ $get->contact_name }}</option>
										@endforeach
									</select>
								</div>
							</div>


				


						</div>

						<div class="col-md-6">
						
						<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Request By</label>
								<div class="col-md-7">
									<input required="" name="rfi_requester_id" class="form-control m-input" type="text">
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Inquiry Date</label>
								<div class="col-md-7">
									<input required="" required="" name="inq_date" class="form-control m-input" type="date">
								</div>
							</div>



							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-md-3 col-form-label">Message</label>
								<div class="col-md-7">
									<textarea required="" required="" name="remark" id="example" type="text"></textarea>
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

					<span class="product-tab">Details</span>

					<div class="row" id="m_user_profile_tab_1">
						<div class="form-group m-form__group  d-flex align-items-center">
							
							<div class="m-typeahead ">
								<input class="form-control m-input" id="searchProduct" type="text" dir="ltr" placeholder="Search PR#">
								
							</div>
							<div class="m-typeahead">
			<input class="form-control m-input" id="searchProduct2" type="text" style="width: 400px;" dir="ltr" placeholder="Search Product">
		</div>
						</div>
						<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<div class="form-group m-form__group  d-flex align-items-center">
							<label class="m--margin-right-5" for="exampleInputEmail1">MFR</label>
							<div class="m-typeahead ">
							<select required="" name="supplier_contact_id" class="form-control ">
							<option>ALL MFR</option>
										@foreach( $mfr as $get )
										<option>{{ $get->mfr }}</option>
										@endforeach
									</select>
							</div>

						</div> -->

						
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
								
								
									<th>Qty Request</th>
									<th>U/M</th>
								
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

	
			</form>
	

		<!-- <div class="tab-pane" id="deals" role="tabpanel" aria-labelledby="deals-tab">
			<p class="card-text">Immerse yourself in the colours, aromas and traditions of Emilia-Romagna with a holiday in Bologna, and discover the city's rich artistic heritage.</p>
			<a href="#" class="btn btn-danger btn-sm">Get Deals</a>
		</div> -->




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
var editor = new FroalaEditor('#example');
$(function() {
    //Initialize Select2 Elements
    $('.select2').select2({

    })
  })
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
			limit: 15,
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
							'<td><input type="text" class="form-control m-input"  value="' + pr + '" readonly="true" style="width:140px;border:none;"></td>' +
							'<td><input type="text" class="form-control m-input" name="product_id[]" value="' + datum.product_id + '" readonly="true" style="width:70px;border:none;"></td>' +
							'<td><input type="text" class="form-control m-input"  value="' + datum.mfr + '" readonly="true" style="width:100px;border:none;"></td>' +
							'<td><input type="text" class="form-control m-input"  value="' + datum.part_num + '" readonly="true" style="width:100px;border:none;"></td>' +
							'<td><textarea type="text" class="form-control m-input"   readonly="true" >' + datum.part_name + '</textarea></td>' +
							'<td><textarea type="text" class="form-control m-input"  readonly="true">' + datum.part_desc + '</textarea></td>' +
							
							
							'<td><input type="text" class="form-control m-input" name="qty[]" value="' + datum.balance_qty + '" required style="width:75px;"></td>' +
							'<td><input type="text" class="form-control m-input"  value="' + datum.um_pr + '" readonly="true" style="width:75px;border:none;"></td>' +
						
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



	function deleteItemTemp(row_index) {
		var i = row_index.parentNode.parentNode.rowIndex;
		document.getElementById("table").deleteRow(i);
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

		$("#searchProduct2").typeahead({
			hint: true,
			highlight: true,
			minLength: 1
		}, {
			source: engine.ttAdapter(),
			displayKey: 'part_num',
			limit: 15,
			templates: {
				empty: [
					'<div class="empty-message">unable to find any</div>'
				],
				suggestion: function(data) {
					return '<li id="suggestion">' + data.part_num + ' - ' + data.part_name + ' - ' + data.part_desc + '</li>'
				}

			}

		});
		$('#searchProduct2').on('typeahead:selected', function(e, datum) {
			$("#btn_qc").show();
			$("#pr_multi").append('<tr>' +
				// '<td><input type="text" class="form-control m-input" name="product_id[]" value="1" readonly="true" style="width:75px;border:none;"></td>'+
				'<td><input type="checkbox" class="form-control m-input select" style="width:30px;border:none;"></td>' +
							'<td><input type="text" class="form-control m-input"  value="0" readonly="true" style="width:140px;border:none;"></td>' +
							'<td><input type="text" class="form-control m-input" name="product_id[]" value="' + datum.id + '" readonly="true" style="width:70px;border:none;"></td>' +
							'<td><input type="text" class="form-control m-input"  value="' + datum.mfr + '" readonly="true" style="width:100px;border:none;"></td>' +
							'<td><input type="text" class="form-control m-input"  value="' + datum.part_num + '" readonly="true" style="width:100px;border:none;"></td>' +
							'<td><textarea type="text" class="form-control m-input"   readonly="true" >' + datum.part_name + '</textarea></td>' +
							'<td><textarea type="text" class="form-control m-input"  readonly="true">' + datum.part_desc + '</textarea></td>' +
							
							
							'<td><input type="text" class="form-control m-input" name="qty[]"  required style="width:75px;"></td>' +
							'<td><input type="text" class="form-control m-input"  value="' + datum.default_um + '" readonly="true" style="width:75px;border:none;"></td>' +
				'</tr>');

		});

	});


	$('#pr_multi').on('click', '.deleteItem', function() {
		$(this).closest('tr').remove();
	});
</script>
@endsection