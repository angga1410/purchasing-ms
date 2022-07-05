@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
		<a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
            <i class="large material-icons">menu</i></a>
			<div class="mr-auto">
				<h3 class="m-subheader__title ">Create HSCODE ( Product )</h3>
			</div>
		</div>
	</div>
	<form action="{{ route('save_hscode') }}" method="post" enctype="multipart/form-data">
	<div class="tab-content padding40px shadowDiv">

			{!! csrf_field() !!}
			<div class="row" id="m_user_profile_tab_1">
					<div class="col-md-6">
						
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">HSCODE</label>
							<div class="col-md-7">
								<input required="" name="hscode" class="form-control m-input" type="text">
							</div>
						</div>


						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">HSCODE Description</label>
							<div class="col-md-7">
								<textarea required="" name="hscode_desc" class="form-control m-input" type="text"></textarea>
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
									<a href="{{ route('hscode') }}">
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
									<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Create</button>&nbsp;&nbsp;
									<a href="{{ route('hscode') }}"><div class="btn btn-accent m-btn m-btn--air m-btn--custom">Cancel</div></a>

								</div>
							</div>
						</div>
					</div> -->


			</div>

	</div>
	</form>
</div>

@endsection
