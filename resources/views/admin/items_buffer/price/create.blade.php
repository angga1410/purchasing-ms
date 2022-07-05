	@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
		<a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-left-10-desktop">
            <i class="large material-icons">menu</i></a>
			<div class="mr-auto">
				<h3 class="m-subheader__title ">Create Item(Product) Buffer Price</h3>
			</div>
		</div>
	</div>	
	<form action="{{ route('save_buffer_price') }}" method="post" enctype="multipart/form-data">
	<div class="tab-content padding40px shadowDiv">
		
			{!! csrf_field() !!}
			<div class="row" id="m_user_profile_tab_1">
					<div class="col-md-6">

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Product Buffer</label>
							<div class="col-md-7">
								<select required="" name="product_buffer_id" class="form-control">
									@foreach( $items as $item )
										<option value="{{ $item->id }}">{{ $item->part_name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Sequence Number</label>
							<div class="col-md-7">
								<input required="" name="sequence_number" class="form-control m-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Qty Item</label>
							<div class="col-md-7">
								<input required="" name="qty_item" class="form-control m-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Unit Cost</label>
							<div class="col-md-7">
								<input required="" name="unit_cost" class="form-control m-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Sell Price</label>
							<div class="col-md-7">
								<input required="" name="sell_price" class="form-control m-input" type="text">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Price Date</label>
							<div class="col-md-7">
								<input required="" name="price_date" class="form-control m-input" type="date">
							</div>
						</div>

						

					</div>

					<div class="col-md-6">
						
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Price Valid Until</label>
							<div class="col-md-7">
								<input required="" name="price_valid_until" class="form-control m-input" type="date">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Status</label>
							<div class="col-md-7">
								<input required="" name="status" class="form-control m-input" type="text">
							</div>
						</div>
						
					</div>

					<div class="m-portlet__foot m-portlet__foot--fit margin50px">
						<div class="m-form__actions">
							<div class="row">
								<div class="col-12">
									<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Create</button>&nbsp;&nbsp;
									<a href="{{ route('buffer_price_list') }}"><div class="btn btn-accent m-btn m-btn--air m-btn--custom">Cancel</div></a>

								</div>
							</div>
						</div>
					</div>

					
			</div>
		
	</div>
	</form>
</div>

@endsection