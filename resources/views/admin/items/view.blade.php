	@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
		<a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
            <i class="large material-icons">menu</i></a>
			<div class="mr-auto">
				<h3 class="m-subheader__title ">Update/View Item ( Product )</h3>
			</div>
		</div>
	</div>
	<form action="{{ route('update_item') }}" method="post" enctype="multipart/form-data">
	<div class="tab-content padding40px shadowDiv">

			{!! csrf_field() !!}
			<div class="row" id="m_user_profile_tab_1">
					<div class="col-md-6">

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">MFR</label>
							<div class="col-md-7">
								<input required="" name="mfr" value="{{ $data->mfr }}" class="form-control m-input" type="text">
								<input required="" name="id" value="{{ $data->id }}" class="form-control m-input" type="hidden">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Category Part Number</label>
							<div class="col-md-7">
								<select required="" name="category_part_num" class="form-control">
									<option <?php echo ( $data->category_part_num == 1 ? "selected=''" : '' ); ?> value=1>Internal</option>
									<option <?php echo ( $data->category_part_num == 2 ? "selected=''" : '' ); ?> value=2>Customer</option>
									<option <?php echo ( $data->category_part_num == 3 ? "selected=''" : '' ); ?> value=3>Supplier</option>
								</select>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Part Number</label>
							<div class="col-md-7">
								<input required="" name="part_num" value="{{ $data->part_num }}" class="form-control m-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Part Name</label>
							<div class="col-md-7">
								<input required="" name="part_name" value="{{ $data->part_name }}" class="form-control m-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Part Description</label>
							<div class="col-md-7">
								<input required="" name="part_desc" value="{{ $data->part_desc }}" class="form-control m-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Defautl UM</label>
							<div class="col-md-7">
								<input required="" name="default_um" value="{{ $data->default_um }}" class="form-control m-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Default Curr</label>
							<div class="col-md-7">
								<input required="" name="default_curr" value="{{ $data->default_curr }}" class="form-control m-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Unit Cost</label>
							<div class="col-md-7">
								<input required="" name="unit_cost" value="{{ $data->unit_cost }}" class="form-control m-input" type="text">
							</div>
						</div>



					</div>

					<div class="col-md-6">

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Sell Price</label>
							<div class="col-md-7">
								<input required="" name="sell_price" value="{{ $data->sell_price }}" class="form-control m-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Break Down Price</label>
							<div class="col-md-7">
								<div id="file1" class="btn-group radio-style">
								    <label class="btn-">
								        <input required="" type="radio" <?php echo ( $data->break_down_price == 1 ? "checked=''" : '' ); ?> value=1 class="bdprice" name="break_down_price" /> Yes
								    </label>
								    <label class="btn-">
								        <input required="" type="radio" <?php echo ( $data->break_down_price == 0 ? "checked=''" : '' ); ?> value=0 class="bdprice" name="break_down_price" /> No
								    </label>
								</div>
							</div>
						</div>

						<!-- <div style="display:none;" class="form-group m-form__group row itemPrice">
							<label for="example-text-input" class="col-md-3 col-form-label">Item Price</label>
							<div class="col-md-7">
								<input required="" type="text" value="{{ $data->item_price }}" class="form-control m-input" name="item_price">
							</div>
						</div> -->

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Price Date</label>
							<div class="col-md-7">
								<input required="" name="price_date" value="{{ $data->price_date }}" class="form-control m-input" type="date">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Lead Time</label>
							<div class="col-md-7">
								<input required="" name="lead_time" value="{{ $data->lead_time }}" class="form-control m-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Price Valid Until</label>
							<div class="col-md-7">
								<input required="" name="price_valid_until" value="{{ $data->price_valid_until }}" class="form-control m-input" type="date">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Item Need QC</label>
							<div class="col-md-7">
								<div id="file1" class="btn-group radio-style">
								    <label class="btn-">
								        <input required="" type="radio" <?php echo ( $data->item_need_qc == 1 ? "checked=''" : '' ); ?>  value=1 name="item_need_qc" /> Yes
								    </label>
								    <label class="btn-">
								        <input required="" type="radio" <?php echo ( $data->item_need_qc == 0 ? "checked=''" : '' ); ?>  value=0 name="item_need_qc" /> No
								    </label>
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Status</label>
							<div class="col-md-7">
								<input required="" name="status" value="{{ $data->status }}" class="form-control m-input" type="text">
							</div>
						</div>

					</div>

					<div class="col-md-6"></div>
					<div class="col-md-6 margin50px ">
						<div class="row ">
							<div class="col-md-3"></div>
							<div class=" col-md-7 align-self-end">
								<div class="row justify-content-end" style="padding-right: 18px">
								<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Update</button>&nbsp;&nbsp;
									<a href="{{ route('items_list') }}">
										<div class="btn btn-cancel-custom m-btn m-btn--air m-btn--custom ">Cancel</div>
									</a>
								</div>
							</div>

						</div>
					</div>

					<!-- <div class="m-portlet__foot m-portlet__foot--fit margin50px">
						<div class="m-form__actions">
							<div class="row">
								<div class="col-12">
									<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Update</button>&nbsp;&nbsp;
									<a href="{{ route('items_list') }}"><div class="btn btn-accent m-btn m-btn--air m-btn--custom">Cancel</div></a>
									
								</div>
							</div>
						</div>
					</div> -->


			</div>

	</div>
	</form>
</div>

@endsection
