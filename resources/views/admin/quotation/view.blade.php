@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
				<i class="large material-icons">menu</i></a>
			<div class="mr-auto">
				<h3 class="m-subheader__title ">Update Quotation</h3>
			</div>
		</div>
	</div>
	
	<form action="{{ route('update_quotation') }}" method="post" enctype="multipart/form-data">
		<div class="tab-content padding40px shadowDiv">

			{!! csrf_field() !!}
			<div class="row" id="m_user_profile_tab_1">
				<div class="col-md-6">
				<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label"> Quotation Number</label>
						<div class="col-md-7">
							<select disabled name="qs_num" class="form-control m-input document_no" >
								<option></option>
								@foreach($quo as $get)
								@if ($get->id == $data->id)
								<option selected data="{{$get->id}}" value="{{$get->id}}">{{$get->qs_num}}{{$get->qs_num_seq}}</option>
								@else
								<option data="{{$get->id}}">{{$get->qs_num}}{{$get->qs_num_seq}}</option>
								@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Inquiry Number</label>
						<div class="col-md-7">
							<input required="" name="qs_num" value="{{$data->inq->rfi_num}}{{$data->inq->rfi_num_seq}}" readonly class="form-control m-input" type="text">
						</div>
					</div>

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Quotation Supplier Date</label>
						<div class="col-md-7">
							<input required="" name="qs_date" value="{{$data->qs_date}}" class="form-control m-input" type="date">
						</div>
					</div>

				
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Supplier</label>
						<div class="col-md-7">
							<input required="" id='suppname' class="form-control m-input supplier" value="{{$data->contact->contact_name}}" type="text">
						
						
						</div>
					</div>


					<input hidden  value="{{$data->id}}" name="id" type="text">

				</div>

				<div class="col-md-6">
		

					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Supplier Contact</label>
						<div class="col-md-7">
							<input required="" id='suppconname' class="form-control m-input contact" value="{{$data->supplier->supplier_name}}" type="text">
							
						
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
									@if ($data->disc_type == 0)
									<option selected value="0">No Discount</option>
									<option  value="1">Percent</option>
									<option  value="2">Amount</option>
									@elseif($data->disc_type == 1)
									<option  value="0">No Discount</option>
									<option selected value="1">Percent</option>
									<option  value="2">Amount</option>
									@else
									<option value="0">No Discount</option>
									<option  value="1">Percent</option>
									<option selected value="2">Amount</option>
									@endif
								</select>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Discount Value</label>
							<div class="col-md-7">
								<input required="" name="disc_value" value="{{$data->disc_value}}" class="form-control m-input" type="number">
							</div>
						</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Remark</label>
						<div class="col-md-7">
							<textarea required="" name="remark" class="form-control m-input" >{{$data->remark}}</textarea>
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
							<textarea rows="4" cols="80" name="termcondition" placeholder="Term&Condition" class="form-control" required>{{$data->termcondition}}</textarea>
						</div>
					</div>
					<div class="m-form__actions">
						<div class="row justify-content-end">
							<div class="">
								<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Update</button>&nbsp;&nbsp;
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
<?php
	$dataid = $data->id;
	?>
<script type="text/javascript" src='{{ asset("/js/jquery-ui.min.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/jquery.dataTables.min.js") }}'></script>
<link href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href='{{ asset("/css/jquery-ui.min.css") }}' />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript" src='{{ asset("/js/dataTables.bootstrap4.min.js") }}'></script>
<script type="text/javascript">

	var dataid = "<?php echo $dataid ?>";
	// console.log(dataid)
	

gettable(dataid)
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
	url: "{{ URL::to('quotation/get') }}/" + referenceId,
	success: function(data) {
	  console.log(data);
	  if (data != null) {

		$(".supplier").val(data.supplier.supplier_name);
		$(".contact").val(data.contact.contact_name);
		$(".supplier_contact_id").val(data.supplier_contact_id);
		$(".supplier_id").val(data.supplier_id);
		$(".id_q").val(data.id);
	
		
	   
	

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
	ajax: "{{ URL::to('quotation/get') }}/" + dataid,
	columns: [
		
		{
			data: 'id',
			name: 'id'
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