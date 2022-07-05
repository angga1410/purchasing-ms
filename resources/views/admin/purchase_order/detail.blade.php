@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
		<a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
            <i class="large material-icons">menu</i></a>
			<div class="mr-auto">
				<h3 class="m-subheader__title ">Detail Purchase Order Detail</h3>
			</div>
		</div>
	</div>	
	<form action="{{ route('save_purchase_order_detail') }}" method="post" enctype="multipart/form-data">
	<div class="tab-content padding40px shadowDiv">
		
			{!! csrf_field() !!}
			<div class="row" id="m_user_profile_tab_1">
					<div class="col-md-6">
						<input required="" type="hidden" value="{{ $purchaseOrderId }}" name="purchase_order_id">
						
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Purchase Request ID</label>
							<div class="col-md-7">
								<input required="" type="text" value="{{ $data->pr_detail_id or '' }}" name="pr_detail_id" class="form-control">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Sepuence Number</label>
							<div class="col-md-7">
								<input required="" type="text" value="{{ $data->sequence_number or '' }}" name="sequence_number" class="form-control">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Product ID</label>
							<div class="col-md-7">
								<select required="" name="product_id" class="form-control">
									@foreach( $items as $get )
										@if( @$data->product_id == $get->id )
											<option value="{{ $get->id }}" selected="">{{ $get->part_name }}</option>
										@else
											<option value="{{ $get->id }}">{{ $get->part_name }}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Qty POS</label>
							<div class="col-md-7">
								<input required="" required="" name="qty_pos" value="{{ $data->qty_pos or '' }}" class="form-control m-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">UM POS</label>
							<div class="col-md-7">
								<input required="" required="" name="um_pos" value="{{ $data->um_pos or '' }}" class="form-control m-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Balance Qty</label>
							<div class="col-md-7">
								<input required="" type="text" name="balance_qty" value="{{ $data->balance_qty or '' }}" class="form-control">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Curr</label>
							<div class="col-md-7">
								<input required="" type="text" name="curr" value="{{ $data->curr or '' }}" class="form-control">
							</div>
						</div>
						
					</div>

					<div class="col-md-6">

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Unit Price</label>
							<div class="col-md-7">
								<input required="" required="" name="unit_price" value="{{ $data->unit_price or '' }}" class="form-control m-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Have External Reference?</label>
							<div class="col-md-7">
								<div id="file1" class="btn-group radio-style">
								    <label class="btn-">
								        <input required="" type="radio" <?php echo ( @$data->have_external_reference == 1 ? "checked=''" : '' ); ?> value=1 class="have_external_reference" name="have_external_reference" /> Yes
								    </label>
								    <label class="btn-">
								        <input required="" type="radio" value=0 <?php echo ( @$data->have_external_reference == 0 ? "checked=''" : '' ); ?> class="have_external_reference" name="have_external_reference" /> No
								    </label>
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Target Data Original</label>
							<div class="col-md-7">
								<input required="" required="" name="target_date_original" value="{{ $data->target_date_original or '' }}" class="form-control m-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Target Data New</label>
							<div class="col-md-7">
								<input required="" required="" name="target_date_new" value="{{ $data->target_date_new or '' }}" class="form-control m-input" type="text">
							</div>
						</div>
						
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Last Arrival Date</label>
							<div class="col-md-7">
								<input required="" required="" name="last_arrival_date" value="{{ $data->last_arrival_date or '' }}" class="date form-control m-input file-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Status</label>
							<div class="col-md-7">
								<input required="" required="" name="status" value="{{ $data->status or '' }}" class="form-control m-input" type="text">
							</div>
						</div>


					</div>

					<div class="m-portlet__foot m-portlet__foot--fit margin50px">
						<div class="m-form__actions">
							<div class="row">
								<div class="col-12">
									<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Update</button>&nbsp;&nbsp;
									<a href="{{ route('purchase_order_list') }}"><div class="btn btn-cancel-custom m-btn m-btn--air m-btn--custom">Cancel</div></a>								</div>
							</div>
						</div>
					</div>

					
			</div>
		
	</div>
	</form>

	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title ">Detail Purchase Order Detail Target Datelog</h3>
			</div>
		</div>
	</div>	
	<form action="{{ route('save_purchase_order_detail') }}" method="post" enctype="multipart/form-data">
	<div class="tab-content padding40px shadowDiv">
		
			{!! csrf_field() !!}
			<div class="row" id="m_user_profile_tab_1">
					<div class="col-md-6">
						<input required="" type="hidden" value="{{ $purchaseOrderId }}" name="purchase_order_id">
						
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Purchase Request ID</label>
							<div class="col-md-7">
								<input required="" type="text" value="{{ $data->pr_detail_id or '' }}" name="pr_detail_id" class="form-control">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Sepuence Number</label>
							<div class="col-md-7">
								<input required="" type="text" value="{{ $data->sequence_number or '' }}" name="sequence_number" class="form-control">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Product ID</label>
							<div class="col-md-7">
								<select required="" name="product_id" class="form-control">
									@foreach( $items as $get )
										@if( @$data->product_id == $get->id )
											<option value="{{ $get->id }}" selected="">{{ $get->part_name }}</option>
										@else
											<option value="{{ $get->id }}">{{ $get->part_name }}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Qty POS</label>
							<div class="col-md-7">
								<input required="" required="" name="qty_pos" value="{{ $data->qty_pos or '' }}" class="form-control m-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">UM POS</label>
							<div class="col-md-7">
								<input required="" required="" name="um_pos" value="{{ $data->um_pos or '' }}" class="form-control m-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Balance Qty</label>
							<div class="col-md-7">
								<input required="" type="text" name="balance_qty" value="{{ $data->balance_qty or '' }}" class="form-control">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Curr</label>
							<div class="col-md-7">
								<input required="" type="text" name="curr" value="{{ $data->curr or '' }}" class="form-control">
							</div>
						</div>
						
					</div>

					<div class="col-md-6">

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Unit Price</label>
							<div class="col-md-7">
								<input required="" required="" name="unit_price" value="{{ $data->unit_price or '' }}" class="form-control m-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Have External Reference?</label>
							<div class="col-md-7">
								<div id="file1" class="btn-group radio-style">
								    <label class="btn-">
								        <input required="" type="radio" <?php echo ( @$data->have_external_reference == 1 ? "checked=''" : '' ); ?> value=1 class="have_external_reference" name="have_external_reference" /> Yes
								    </label>
								    <label class="btn-">
								        <input required="" type="radio" value=0 <?php echo ( @$data->have_external_reference == 0 ? "checked=''" : '' ); ?> class="have_external_reference" name="have_external_reference" /> No
								    </label>
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Target Data Original</label>
							<div class="col-md-7">
								<input required="" required="" name="target_date_original" value="{{ $data->target_date_original or '' }}" class="form-control m-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Target Data New</label>
							<div class="col-md-7">
								<input required="" required="" name="target_date_new" value="{{ $data->target_date_new or '' }}" class="form-control m-input" type="text">
							</div>
						</div>
						
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Last Arrival Date</label>
							<div class="col-md-7">
								<input required="" required="" name="last_arrival_date" value="{{ $data->last_arrival_date or '' }}" class="date form-control m-input file-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Status</label>
							<div class="col-md-7">
								<input required="" required="" name="status" value="{{ $data->status or '' }}" class="form-control m-input" type="text">
							</div>
						</div>


					</div>

					<div class="m-portlet__foot m-portlet__foot--fit margin50px">
						<div class="m-form__actions">
							<div class="row">
								<div class="col-12">
									<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Update</button>&nbsp;&nbsp;
									<a href="{{ route('purchase_order_list') }}"><div class="btn btn-accent m-btn m-btn--air m-btn--custom">Cancel</div></a>								</div>
							</div>
						</div>
					</div>

					
			</div>
		
	</div>
	</form>

</div>

@endsection