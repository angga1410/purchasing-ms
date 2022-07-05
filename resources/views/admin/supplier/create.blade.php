	@extends('layouts.admin')

	@section('content')
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<div class="m-subheader ">
			<div class="d-flex align-items-center">
				<a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
					<i class="large material-icons">menu</i></a>
				<div class="mr-auto">
					<h3 class="m-subheader__title ">Create Supplier</h3>
				</div>
			</div>
		</div>
		<form action="{{ route('save_supplier') }}" method="post">
			<div class="shadowDiv tab-content padding40px ">

				{!! csrf_field() !!}
				<div class="row" id="m_user_profile_tab_1">
					<div class="col-md-6">
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Supplier Name</label>
							<div class="col-md-7">
								<input required="" name="supplier_name" class="form-control m-input" type="text">
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Supplier Type</label>
							<div class="col-md-7">
								<select required="" name="supplier_type" class="form-control">
									<option value="1">Product</option>
									<option value="2">Service</option>
									<option value="3">Product + Service</option>
								</select>
							</div>
						</div>
						<div class="form-group m-form__group row d-flex align-items-center">
							<label for="example-text-input" class="col-md-3 col-form-label">NPWP Supplier</label>
							<div class="col-md-7">
								<input name="npwp" class=" m-input file-input" type="file">
							</div>
						</div>
					</div>


					<div class="col-md-6">
						<div class="form-group m-form__group row">
							<!-- <label for="example-text-input" class="col-md-3 col-form-label">Approved</label> -->
							<div class="col-md-7">
								<input name="approved" class="custom-checkbox m-input" value="0" hidden>
							</div>
						</div>
					</div>


				</div>

			</div>

			<!-- Address -->

			<!-- <div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title ">Supplier Address</h3>
			</div>
		</div>
	</div> -->

			<div class="tab-content padding40px shadowDiv">


				<div class="row" id="m_user_profile_tab_1">

					<div class="col-md-6">
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Address Type</label>
							<div class="col-md-7">
								<select name="address_type" class="form-control">
									<option value="1">Biiling Address</option>
									<option value="2">Shipping Address</option>
									<option value="3">Other Address</option>
								</select>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Address 1</label>
							<div class="col-md-7">
								<textarea name="address_line_1" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Address 2</label>
							<div class="col-md-7">
								<textarea r name="address_line_2" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Address 3</label>
							<div class="col-md-7">
								<textarea name="address_line_3" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">City</label>
							<div class="col-md-7">
								<input name="city" class="form-control m-input" type="text">
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Post Code</label>
							<div class="col-md-7">
								<input name="post_code" class="form-control m-input" type="text">
							</div>
						</div>

					</div>

					<div class="col-md-6">
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Province Id</label>
							<div class="col-md-7">
								<input name="province_id" class="form-control m-input" type="text">
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Area Id</label>
							<div class="col-md-7">
								<input name="area_id" class="form-control m-input" type="text">
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Country Name</label>
							<div class="col-md-7">
								<input name="country_id" class="form-control m-input" type="text">
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Phone</label>
							<div class="col-md-7">
								<input name="phone" class="form-control m-input" type="text">
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Fax</label>
							<div class="col-md-7">
								<input name="fax" class="form-control m-input" type="text">
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Email</label>
							<div class="col-md-7">
								<input name="email" class="form-control m-input" type="text">
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Website</label>
							<div class="col-md-7">
								<input name="website" class="form-control m-input" type="text">
							</div>
						</div>
					</div>




					<div class="col-md-6"></div>
					<div class="col-md-6 margin50px ">
						<div class="row ">
							<div class="col-md-3"></div>
							<div class=" col-md-7 align-self-end">
								<div class="row justify-content-end" style="padding-right: 18px">
									<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Create</button>&nbsp;&nbsp;
									<a href="{{ route('supplier_list') }}">
										<div class="btn btn-cancel-custom m-btn m-btn--air m-btn--custom ">Cancel</div>
									</a>
								</div>
							</div>

						</div>
					</div>

					<!-- <div class="col-11 m-portlet__foot m-portlet__foot--fit margin50px align-self-end">
						<div class="m-form__actions">
							<div class="row  justify-content-end ">
								<div class=" ">
									<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Create</button>&nbsp;&nbsp;
									<a href="{{ route('supplier_list') }}"><div class="btn btn-cancel-custom m-btn m-btn--air m-btn--custom ">Cancel</div></a>
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