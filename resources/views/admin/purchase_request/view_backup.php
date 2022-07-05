@extends('layouts.admin')

@section('content')

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<a href="{{ route('print_purchase_order', $data->id) }}" class="btn btn-accent m-btn m-btn--air m-btn--custom">PRINT</a>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-md-6">
                            <img src="/admin/images/gspe.png" width="70%">
                            <p class="mb-1"><span class="text-muted">INTERCON PLAZA BLOK D 11  </span></p>
                            <p class="mb-1"><span class="text-muted">JL. MERUYA ILIR, SRENGSENG-KEMBANGAN</span></p>
                            <p class="mb-1"><span class="text-muted">Phone  (62-21)7587-9949/45 </span></p>
                            <p class="mb-1"><span class="text-muted"> NPWP : 01.789.513.038.000  </span></p>
                        </div>

                        <div class="col-md-6 text-right">
                    
                            <p class="font-weight-bold mb-1" value="{{ $data->po_number }}"  onchange="location = this.value;"></p>
                           
                            <p class="text-muted">{{ date("Y-m-d H:i:s")}}</p>
                            <p class="font-weight-bold mb-1"> PURCHASE ORDER </p>
                            <p class="font-weight-bold mb-1"> PO No. {{ $data->po_number }}{{ $data->po_number_seq }}    </p>
                            <p class="font-weight-bold mb-1"> PO Date. {{ $data->created_at }}   </p>
                            <p class="text-muted"> Term {{ $data->shipment_term }} </p>

                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="row pb-5 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">VENDOR NAME</p>
                            @foreach( $supplierContacts as $get )
									@if( $get->id == $data->supplier_contact_id )
										<p class="mb-1">{{ $get->contact_name }}</p>
									@endif
								@endforeach
                                @foreach( $supplierContacts as $get )
									@if( $get->id == $data->supplier_contact_id )
										<p class="mb-1">{{ $get->contact_hand_phone }}</p>
									@endif
								@endforeach
                                @foreach( $supplierContacts as $get )
									@if( $get->id == $data->supplier_contact_id )
										<p class="mb-1">{{ $get->contact_email }}</p>
									@endif
								@endforeach
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-4">SHIP TO</p>
                            <p class="mb-1"><span class="text-muted">INTERCON PLAZA BLOK D 11  </span></p>
                            <p class="mb-1"><span class="text-muted">JL. MERUYA ILIR, SRENGSENG-KEMBANGAN</span></p>
                            <p class="mb-1"><span class="text-muted">Phone  (62-21)7587-9949/45 </span></p>
                   
                        </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
                        <div class="row" id="m_user_profile_tab_1">

<!-- Item Module -->

<table class="table" id="table">
    <thead>
                    <tr>
                         <th>MFR</th>
                         <th>Part Name</th>
                         <th>Part Number</th>
                         <th>Part Description</th>
                         <th>Quantity</th>
                         <th>UM</th>
                         <th>Price</th>
                    </tr>
             </thead>

</table>

</div>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Total Net Value Excl. Tax</div>
                            <div class="h2 font-weight-light">$234,234</div>
                        </div>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-light mt-5 mb-5 text-center small">by : <a class="text-light" target="_blank" href="http://totoprayogo.com">totoprayogo.com</a></div>

</div>



</div>
<link href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href='{{ asset("/css/jquery-ui.min.css") }}' />
<!-- <style>.dataTables_length{display: none;} .dataTables_filter{display: none;}</style> -->
<script type="text/javascript" src='{{ asset("/js/jquery-ui.min.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/jquery.dataTables.min.js") }}'></script>

<script type="text/javascript" src='{{ asset("/js/dataTables.bootstrap4.min.js") }}'></script>
<script type="text/javascript">

$(function() {
               var table2 =$('#table2').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{{ route('itemdata') }}",
               columns: [
                        { data: 'mfr', name: 'mfr' },
                        { data: 'part_num', name: 'part_num' },
                        { data: 'part_name', name: 'part_name' },
                        { data: 'part_desc', name: 'part_desc', searchable: 'false' },
                        { data: 'unit_cost', name: 'unit_cost', searchable: 'false' },
                        { data: 'sell_price', name: 'sell_price', searchable: 'false' },
                        { data: 'add', name: 'add', searchable: 'false' },

                     ]
            });
         });

 </script>
<script type="text/javascript">
//
function getItemTable(productIds, prId)
{
	console.log(productIds)
	console.log(prId)
	$(function() {
       var table = $('#table').DataTable({
       processing: true,
       serverSide: true,
       ajax: "{{ URL::to('items/tablepr') }}/"+productIds+"/"+prId,
       columns: [
                { data: 'mfr', name: 'mfr' },
                { data: 'part_name', name: 'part_name' },
                { data: 'part_num', name: 'part_num' },
                { data: 'part_desc', name: 'part_desc' },
								// { data: 'sequence_number', name: 'sequence_number' },
								// { data: 'type_product_id', name: 'type_product_id' },
                { data: 'qty', name: 'qty' },
                { data: 'um', name: 'um' },
								// { data: 'unit_cost', name: 'unit_cost' },
                // { data: 'total', name: 'total' },
                { data: 'delete', name: 'delete' },

             ]
    });


 	});
}


//
function prnumber(value)
{
	// console.log(value)
	$.ajax(
	{
	  url: "{{ URL::to('items/prnumber/get') }}/"+value
	})
	.done(function(data)
	{
		var table = $('#table').DataTable();
		table.destroy();
		getItemTable( data.productIds, data.prId );

	});

}

var dataid = "<?php echo $dataid ?>";
// console.log(dataid)
window.onload=prnumber(dataid);

function deleteItemTemp( uIds )
{
	var table = $('#table').DataTable();
	var inqId = $('.inquiry-customer').val();
	table.destroy();
	getItemTable(uIds, inqId);
}
 </script>
@endsection
