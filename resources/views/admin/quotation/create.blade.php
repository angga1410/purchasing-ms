	@extends('layouts.admin')

	@section('content')
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<div class="m-subheader ">
			<div class="d-flex align-items-center">
				<a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
					<i class="large material-icons">menu</i></a>
				<div class="mr-auto">
					<h3 class="m-subheader__title ">Add Quotation</h3>
				</div>
			</div>
		</div>
		<?php
		$dataid = '0';
		?>
		<form action="{{ route('save_quotation') }}" method="post" enctype="multipart/form-data">
			<div class="tab-content padding40px shadowDiv">

				{!! csrf_field() !!}
				<div class="row" id="m_user_profile_tab_1">
					<div class="col-md-6">
					<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Select Inquiry</label>
							<div class="col-md-7">
								<select  name="qs_num" class="form-control m-input select2 document_no" >
									<option></option>
									@foreach($rfi as $get)
									<option data="{{$get->id}}">{{$get->rfi_num}}{{$get->rfi_num_seq}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Quotation Supplier Number</label>
							<div class="col-md-7">
								<input required="" name="qs_num" data-date-start-date="d" value="QUO/{{date('Y/m/d', strtotime('0 day'))}}/" readonly class="form-control m-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Quotation Supplier Date</label>
							<div class="col-md-7">
								<input required="" name="qs_date" class="form-control m-input" type="date">
							</div>
						</div>

					
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Supplier</label>
							<div class="col-md-7">
								<input required="" id='suppname' class="form-control m-input supplier" type="text">
								<input required="" id='suppid' name="supplier_id" class="form-control m-input supplier_id" type="text" hidden>
								<!-- <select required="" name="supplier_id" class="form-control">
									@foreach( $suppliers as $get )
										<option value="{{ $get->id }}">{{ $get->supplier_name }}</option>
									@endforeach
								</select> -->
							</div>
						</div>




					</div>

					<div class="col-md-6">
			

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Supplier Contact</label>
							<div class="col-md-7">
								<input required="" id='suppconname' class="form-control m-input contact" type="text">
								<input required="" id='suppconid' name="supplier_contact_id" class="form-control m-input supplier_contact_id" type="text" hidden>
								<input required=""  name="rfi_id" class="form-control m-input rfi_id" type="text" hidden>
								<!-- <select required="" name="supplier_contact_id" class="form-control">
									@foreach( $supplierContacts as $get )
										<option value="{{ $get->id }}">{{ $get->contact_name }}</option>
									@endforeach
								</select> -->
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
							<label for="example-text-input" class="col-md-3 col-form-label">Remark</label>
							<div class="col-md-7">
								<textarea required="" name="remark" class="form-control m-input" ></textarea>
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
								<th>Price</th>
								<th>Curr</th>
								<th>Lead Time</th>
								<!-- <th>Total</th> -->
								<!-- <th>Action</th> -->
							</tr>
						</thead>

					</table>

					<!-- /Item Module -->

					<div class="col-12 m-portlet__foot m-portlet__foot--fit margin50px">
						<div class="col-md-6 form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Term & Condition</label>
							<div class="col-md-7">
								<textarea rows="4" cols="80" name="termcondition" placeholder="Term&Condition" class="form-control" required></textarea>
							</div>
						</div>
						<div class="m-form__actions">
							<div class="row justify-content-end">
								<div class="">
									<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Create</button>&nbsp;&nbsp;
									<a href="{{ route('quotation_list') }}">
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
	<script type="text/javascript" src='{{ asset("/js/jquery-ui.min.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/jquery.dataTables.min.js") }}'></script>
<link href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href='{{ asset("/css/jquery-ui.min.css") }}' />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript" src='{{ asset("/js/dataTables.bootstrap4.min.js") }}'></script>
	<script type="text/javascript">
		//
		$(function() {
    //Initialize Select2 Elements
    $('.select2').select2({

    })
  })

  $(function(){	
	  $(".document_no").on("change",function(){
		var referenceId = $(this).find('option:selected').attr('data');
		gettable(referenceId)

		$.ajax({
        type: "get",
        url: "{{ URL::to('inquiry/rfi-get') }}/" + referenceId,
        success: function(data) {
          console.log(data);
          if (data != null) {

            $(".supplier").val(data.supplier.supplier_name);
			$(".contact").val(data.contact.contact_name);
			$(".supplier_contact_id").val(data.supplier_contact_id);
			$(".supplier_id").val(data.supplier_id);
			$(".rfi_id").val(data.id);
           
        

          }
        
        }
      });
	
});

  });
	

  function gettable(dataid) {

$(function() {
	$('#table').DataTable().clear().destroy();
	var table = $('#table').DataTable({
		paging: false,
		info: false,
		searching: false,
		processing: true,
		serverSide: true,
		ajax: "{{ URL::to('inquiry/get-data') }}/" + dataid,
		columns: [
			{
				data: 'product_id',
				name: 'product_id'
			},
			{
				data: 'part_num',
				name: 'part_num'
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
				data: 'part_desc',
				name: 'part_desc'
			},

		  

			{
				data: 'qty',
				name: 'qty'
			},
		  
			{
				data: 'um',
				name: 'um'
			},

			{
				data: 'price',
				name: 'price'
			},
			{
				data: 'curr',
				name: 'curr'
			},
			{
				data: 'lead_time',
				name: 'lead_time'
			},
		]
	});


});

}

	</script>


	@endsection