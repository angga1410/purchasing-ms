@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-subheader ">
		<div class="margin22 d-flex align-items-center">
      <a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
            <i class="large material-icons">menu</i></a>
			<div class="mr-auto">
				<h3 class="m-subheader__title ">Purchase Order List</h3>
		<a href="{{ route('create_purchase_order') }}" class="btn btn-accent m-btn m-btn--air m-btn--custom">Create</a>
		<!-- <a href="{{ route('report') }}" class="btn btn-accent m-btn m-btn--air m-btn--custom">Print Report</a> -->
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
								 <th>Purchase Order Number</th>
                 <th>Supplier</th>
                 <th>Supplier Contact</th>
                 <th>Shipment Term</th>
                 <th>Payment Term</th>
                 <th>Import Via</th>
                 <th>Status</th>
                 <th>Cost Freight Amount</th>
               
                 <th>Action</th>
              </tr>
           </thead>
        </table>
		
	</div>

	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title ">Delivered Purchase Order</h3>
	
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
		<table class="table table-bordered" id="table2">
           <thead>
              <tr>
                 <th> No </th>
								 <th>Purchase Order Number</th>
                 <th>Supplier</th>
                 <th>Supplier Contact</th>
                 <th>Shipment Term</th>
                 <th>Payment Term</th>
                 <th>Import Via</th>
                 <th>Status</th>
                 <th>Cost Freight Amount</th>
               
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
               ajax: "{{ route('purchase_order_data') }}",
               columns: [   {data :'null', name: 'null'},
								 				{ data: 'po_number', name: 'po_number', render: function(data,type,row){
                                        return row.po_number+row.po_number_seq
                                     } },
                        { data: 'supplier_id', name: 'supplier_id' },
                        { data: 'supplier_contact_id', name: 'supplier_contact_id' },
                        { data: 'shipment_term', name: 'shipment_term' },
                        { data: 'payment_term', name: 'payment_term' },
                        { data: 'import_via', name: 'import_via' },
                        { data: 'status', name: 'status' },
                        { data: 'cost_freight_amount', name: 'cost_freight_amount' },
                       
                        { data: 'action', name: 'action', searchable: 'false' },

                     ]
            });
         });

		 $(function() {
               $('#table2').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{{ route('purchase_order_data_delivered') }}",
               columns: [   {data :'null', name: 'null'},
								 				{ data: 'po_number', name: 'po_number', render: function(data,type,row){
                                        return row.po_number+row.po_number_seq
                                     } },
                        { data: 'supplier_id', name: 'supplier_id' },
                        { data: 'supplier_contact_id', name: 'supplier_contact_id' },
                        { data: 'shipment_term', name: 'shipment_term' },
                        { data: 'payment_term', name: 'payment_term' },
                        { data: 'import_via', name: 'import_via' },
                        { data: 'status', name: 'status' },
                        { data: 'cost_freight_amount', name: 'cost_freight_amount' },
                       
                        { data: 'action', name: 'action', searchable: 'false' },

                     ]
            });
         });


//
$('.filter-items').click(function(){

var table = $('table').DataTable();

var mfr = $('#mfr').val();
var partName = $('#part-name').val();

 table
 .columns( 0 )
 .search( mfr )
 .draw();


table
 .columns( 1 )
 .search( partName )
 .draw();
})

         function filterBy( value )
{
	if( value == 1 )
	{
		$('.filter').hide();
	}
	if( value == 2 )
	{
		$('.buttonFilter').show();
		$('.manufacturer').show();
		$('.partName').hide();
	}
	if( value == 3 )
	{
		$('.buttonFilter').show();
		$('.manufacturer').hide();
		$('.partName').show();
	}

	if( value == 4 )
	{
		$('.buttonFilter').show();
		$('.manufacturer').show();
		$('.partName').show();
	}
}
 </script>
@endsection
