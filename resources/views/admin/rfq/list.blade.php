	@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-subheader ">
		<div class="margin22 d-flex align-items-center">
      <a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
            <i class="large material-icons">menu</i></a>
			<div class="mr-auto">
				<h3 class="m-subheader__title ">RFQ List</h3>
        <a href="{{ route('create_rfq') }}" class="btn btn-accent m-btn m-btn--air m-btn--custom">Create</a>
			</div>
		</div>
		<div class="margin22 sub-heading">
			@if(session('success'))
			    {{session('success')}}
			@endif
		</div>
	</div>
   <style type="text/css">
table {
  counter-reset: row-num -1;
}
table tr {
  counter-increment: row-num;
}
table tr td:first-child::before {
    content: counter(row-num);
}
</style>
	<div class="tab-content padding40px">
		<table class="table table-bordered" id="table">
           <thead>
              <tr>
                 <th> No </th>
								 <th>RFQ Number</th>
                 <th>Supplier</th>
                 <th>Supplier Contact</th>
                 <!-- <th>Status</th> -->
                 <th>Date Created</th>
                 <th>Action</th>
              </tr>
           </thead>
        </table>
	</div>
</div>
<link href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href='{{ asset("/css/jquery-ui.min.css") }}' />

<script type="text/javascript" src='{{ asset("/js/jquery-ui.min.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/jquery.dataTables.min.js") }}'></script>

<script type="text/javascript" src='{{ asset("/js/dataTables.bootstrap4.min.js") }}'></script>

<script type="text/javascript">

$(function() {
               $('#table').DataTable({
               processing: true,
               serverSide: true,
               
               ajax: "{{ route('rfq_data') }}",
               columns: [
                  {data :'null', name: 'null'},
								{ data: 'rfq_number', name: 'rfq_number', searchable: 'true' , render: function(data,type, row){
                           return row.rfq_number+row.rfq_number_seq
                        }},
                        { data: 'supplier_id', name: 'supplier_id' , searchable: 'true'},
                        { data: 'supplier_contact_id', name: 'supplier_contact_id',    searchable: 'true' },
                        // { data: 'status', name: 'status' },
                        { data: 'created_at', name: 'created_at' , searchable: 'false'},
                        { data: 'action', name: 'action', searchable: 'false' },

                     ]
            });
         });

 </script>
@endsection
