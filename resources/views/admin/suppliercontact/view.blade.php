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

	<div class="tab-content padding40px shadowDiv">
		<form action="{{ route('update_supplier_contact') }}" method="post">
			{!! csrf_field() !!}
			<div class="row" id="m_user_profile_tab_1">
					<div class="col-md-6">
						<input type="hidden" name="id" value="{{ $data->id }}">
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Supplier</label>
							<div class="col-md-7">
								<select required="" name="supplier_id" class="form-control">
									@foreach( $supplier as $get )
										@if( $data->supplier_id == $get->id )
											<option value="{{ $get->id }}" selected="">{{ $get->supplier_name }}</option>
										@else
											<option value="{{ $get->id }}">{{ $get->supplier_name }}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Contact Name</label>
							<div class="col-md-7">
								<input required="" name="contact_name" value="{{ $data->contact_name }}" class="form-control m-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Contact Position</label>
							<div class="col-md-7">
								<input required="" name="contact_position" value="{{ $data->contact_position }}" class="form-control m-input" type="text">
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Contact Hand Phone</label>
							<div class="col-md-7">
								<input required="" name="contact_hand_phone" value="{{ $data->contact_hand_phone }}" class="form-control m-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Contact Email</label>
							<div class="col-md-7">
								<input required="" name="contact_email" value="{{ $data->contact_email }}" class="form-control m-input" type="text">
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
									<a href="{{ route('supplier_contact_list') }}">
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
									<a href="{{ route('supplier_contact_list') }}"><div class="btn btn-accent m-btn m-btn--air m-btn--custom">Cancel</div></a>
								</div>
							</div>
						</div>
					</div> -->
			</div>
		</form>
	</div>
</div>

@endsection
