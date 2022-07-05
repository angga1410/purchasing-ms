@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
				<i class="large material-icons">menu</i></a>
			<div class="mr-auto">
				<h3 class="m-subheader__title ">View/Edit Supplier</h3>
			</div>
		</div>
	</div>

	<form action="{{ route('update_supplier') }}" method="post">
		<div class="tab-content padding40px shadowDiv">

			{!! csrf_field() !!}
			<div class="row" id="m_user_profile_tab_1">
				<div class="col-md-6">
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Supplier Name</label>
						<div class="col-md-7">
							<input required="" name="supplier_name" value="{{ old('supplier_name', $data->supplier_name) }}" class="form-control m-input" type="text">
							<input required="" name="id" value="{{ $data->id }}" class="form-control m-input" type="hidden">
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Supplier Type</label>
						<div class="col-md-7">
							<select required="" name="supplier_type" class="form-control">
								<option <?php echo $data->supplier_type == 1 ? "selected" : ""; ?> value="1">Product</option>
								<option <?php echo $data->supplier_type == 2 ? "selected" : ""; ?> value="2">Service</option>
								<option <?php echo $data->supplier_type == 3 ? "selected" : ""; ?> value="3">Product + Service</option>
							</select>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group m-form__group row">
						<!-- <label for="example-text-input" class="col-md-3 col-form-label">Approved</label> -->
						<div class="col-md-7">
							<input name="approved" <?php echo $data->approved ? "checked" : ""; ?> class="custom-checkbox m-input" value="1" type="checkbox" hidden>
						</div>
					</div>
				</div>
			</div>

		</div>

		<!-- Address -->



		<div class="tab-content padding40px shadowDiv">
			<!-- <div class="m-subheader-custom ">
				<div class="d-flex align-items-center">
					<div class="mr-auto">
						<h3 class="m-subheader__title ">Supplier Address</h3>
					</div>
				</div>
			</div> -->

			<div class="row" id="m_user_profile_tab_1">

				<div class="col-md-6">
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Address Type</label>
						<div class="col-md-7">
							<select name="address_type" class="form-control">
								<option <?php echo $address->address_type == 1 ? "selected" : ""; ?> value="1">Biiling Address</option>
								<option <?php echo $address->address_type == 2 ? "selected" : ""; ?> value="2">Shipping Address</option>
								<option <?php echo $address->address_type == 3 ? "selected" : ""; ?> value="3">Other Address</option>
							</select>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Address 1</label>
						<div class="col-md-7">
							<textarea name="address_line_1" class="form-control">{{ $address->address_line_1 }}</textarea>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Address 2</label>
						<div class="col-md-7">
							<textarea name="address_line_2" class="form-control">{{ $address->address_line_2 }}</textarea>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Address 3</label>
						<div class="col-md-7">
							<textareaname="address_line_3" class="form-control">{{ $address->address_line_3 }}</textarea>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">City</label>
						<div class="col-md-7">
							<input name="city" value="{{ $address->city }}" class="form-control m-input" type="text">
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Post Code</label>
						<div class="col-md-7">
							<input name="post_code" value="{{ $address->post_code }}" class="form-control m-input" type="text">
						</div>
					</div>

				</div>

				<div class="col-md-6">
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Province Id</label>
						<div class="col-md-7">
							<input name="province_id" value="{{ $address->province_id }}" class="form-control m-input" type="text">
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Area Id</label>
						<div class="col-md-7">
							<input name="area_id" value="{{ $address->area_id }}" class="form-control m-input" type="text">
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Country Name</label>
						<div class="col-md-7">
							<input name="country_id" value="{{ $address->country_id }}" class="form-control m-input" type="text">
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Phone</label>
						<div class="col-md-7">
							<input name="phone" value="{{ $address->phone }}" class="form-control m-input" type="text">
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Fax</label>
						<div class="col-md-7">
							<input name="fax" value="{{ $address->fax }}" class="form-control m-input" type="text">
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-md-3 col-form-label">Email</label>
						<div class="col-md-7">
							<input name="email" value="{{ $address->email }}" class="form-control m-input" type="text">
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
								<a href="{{ route('supplier_list') }}">
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
									<a href="{{ route('supplier_list') }}"><div class="btn btn-accent m-btn m-btn--air m-btn--custom">Cancel</div></a>
								</div>
							</div>
						</div>
					</div> -->
			</div>
	</form>
</div>
</form>
<!-- /Address -->
</div>

@endsection