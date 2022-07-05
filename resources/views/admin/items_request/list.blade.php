@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-subheader ">
		<div class="margin22 d-flex align-items-center">
      <a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
            <i class="large material-icons">menu</i></a>
			<div class="mr-auto">
				<h3 class="m-subheader__title ">Items ( Products ) List Request</h3>
     
			</div>
		</div>
		<div class="margin22 sub-heading">
			@if(session('success'))
			    {{session('success')}}
			@endif
		</div>
	</div>

	<div class="tab-content padding40px">
		<table class="table table-bordered" id="table">
           <thead>
              <tr>
                 <th>MFR</th>
                 <th>Part Number</th>
                 <th>Part Name</th>
                 <th>Part Description</th>
                 <th>Request By</th>
                
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
               ajax: "{{ route('item_data_req') }}",
               columns: [
                        { data: 'mfr', name: 'mfr' },
                        { data: 'part_num', name: 'part_num' },
                        { data: 'part_name', name: 'part_name' },
                        { data: 'part_desc', name: 'part_desc' },
                        { data: 'request_by', name: 'request_by' },
                       
                        { data: 'action', name: 'action', searchable: 'false' },

                     ]
            });
         });

 </script>
@endsection
