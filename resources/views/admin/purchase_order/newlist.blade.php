@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
        <a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
            <i class="large material-icons">menu</i></a>
            <div class="mr-auto">
                <h3 class="m-subheader__title ">Purchase Order</h3>

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
    <div class="tab-content">
        <div class="padding40px shadowDiv-customhead">
            <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#posup" role="tab" aria-controls="description" aria-selected="true">PO Ready</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#prsup" role="tab" aria-controls="history" aria-selected="false">PO Delivered</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#dosup" role="tab" aria-controls="deals" aria-selected="false">PO Approve</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#quosup" role="tab" aria-controls="deals" aria-selected="false">PO Verify</a>
                </li>


            </ul>
        </div>
        <div class="">

            <div class="tab-content ">
                <div class="tab-pane active" id="posup" role="tabpanel">
                    <div class="padding40px shadowDiv">
                        <h5 class="card-title">PO Ready</h5>

                        <table class="table table-bordered" id="ready" width="100%">
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

                <div class="tab-pane" id="prsup" role="tabpanel" aria-labelledby="history-tab">
                    <div class="padding40px shadowDiv">
                        <h5 class="card-title">PO Delivered</h5>

                        <table class="table table-bordered" id="delivered" width="100%">
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

                <div class="tab-pane" id="dosup" role="tabpanel" aria-labelledby="deals-tab">
                    <div class="padding40px shadowDiv">
                        <h5 class="card-title">PO Approve</h5>
                        <table class="table table-bordered" id="approve" width="100%">
                        <thead>
              <tr>
              <th>NO</th>
                 <th>Purchase Order Number</th>
                 <th>Status</th>
                 <th>Created By</th>
                 <th>Created Date</th>
                 <th>Action</th>
                 <th>Reason</th>
              </tr>
           </thead>
                        </table>

                    </div>
                </div>
                <div class="tab-pane" id="quosup" role="tabpanel" aria-labelledby="deals-tab">
                    <div class="padding40px shadowDiv">
                        <h5 class="card-title">PO Verify</h5>

                        <table class="table table-bordered" id="table">
           <thead>
              <tr>
              <th> No </th>
                 <th>Purchase Order Number</th>
                 <th>Created By</th>
                 <th>Created At</th>
                 <th>Action</th>
                 <th>Reason</th>
              </tr>
           </thead>
        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">

<link rel="stylesheet" href='{{ asset("/css/jquery-ui.min.css") }}' type="text/css" />
<link rel="stylesheet" href='{{ asset("/css/buttons.dataTables.min.css") }}' type="text/css" />

<script type="text/javascript" src='{{ asset("/js/jquery-ui.min.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/jquery.dataTables.min.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/dataTables.buttons.min.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/buttons.flash.min.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/jszip.min.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/pdfmake.min.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/vfs_fonts.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/buttons.html5.min.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/buttons.print.min.js") }}'></script>

<script type="text/javascript" src='{{ asset("/js/dataTables.bootstrap4.min.js") }}'></script>

<script type="text/javascript">
    load_data();

    $('#bologna-list a').on('click', function(e) {
        e.preventDefault()
        $(this).tab('show')
    })

    function load_data(from_date = '', to_date = '') {
        $('#ready').DataTable({
            processing: true,
            serverSide: true,
            scrollY: 500,
            paging: false,
            ajax: "{{ route('purchase_order_data') }}",
            columns: [{
                    data: 'null',
                    name: 'null'
                },
                {
                    data: 'po_number',
                    name: 'po_number',
                    render: function(data, type, row) {
                        return row.po_number + row.po_number_seq
                    }
                },
                {
                    data: 'supplier_id',
                    name: 'supplier_id'
                },
                {
                    data: 'supplier_contact_id',
                    name: 'supplier_contact_id'
                },
                {
                    data: 'shipment_term',
                    name: 'shipment_term'
                },
                {
                    data: 'payment_term',
                    name: 'payment_term'
                },
                {
                    data: 'import_via',
                    name: 'import_via'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'cost_freight_amount',
                    name: 'cost_freight_amount'
                },

                {
                    data: 'action',
                    name: 'action',
                    searchable: 'false'
                },

            ]
        });
    }



    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if (from_date != '' && to_date != '') {
            $('#ready').DataTable().clear().destroy();
            load_data(from_date, to_date);
        } else {
            alert('Both Date is required');
        }
    });

    $('#refresh').click(function() {
        $('#from_date').val('');
        $('#to_date').val('');
        $('#ready').DataTable().clear().destroy();
        load_data();
    });

    $(function() {
        $('#delivered').DataTable({
            processing: true,
            serverSide: true,

            ajax: "{{ route('purchase_order_data_delivered') }}",
            columns: [{
                    data: 'null',
                    name: 'null'
                },
                {
                    data: 'po_number',
                    name: 'po_number',
                    render: function(data, type, row) {
                        return row.po_number + row.po_number_seq
                    }
                },
                {
                    data: 'supplier_id',
                    name: 'supplier_id'
                },
                {
                    data: 'supplier_contact_id',
                    name: 'supplier_contact_id'
                },
                {
                    data: 'shipment_term',
                    name: 'shipment_term'
                },
                {
                    data: 'payment_term',
                    name: 'payment_term'
                },
                {
                    data: 'import_via',
                    name: 'import_via'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'cost_freight_amount',
                    name: 'cost_freight_amount'
                },

                {
                    data: 'action',
                    name: 'action',
                    searchable: 'false'
                },

            ]
        });
    });

    $(function() {
               $('#approve').DataTable({
               processing: "<img src='{{asset('build/img/jquery.easytree/loading.gif')}}'> Carregando...",
               serverSide: true,
            
               ajax: "{{ route('purchase_order_approve_data2') }}",
               columns: [
                { data: 'null', name: 'null', searchable: 'false' },
                { data: 'po_number', name: 'po_number', render: function(data,type,row){
                                        return row.po_number+row.po_number_seq
                                     } },
                                     { data: 'approved', name: 'approved', searchable: 'true' },
                                     { data: 'approved_by', name: 'approved_by', searchable: 'true' },
                                     { data: 'created_at', name: 'created_at', searchable: 'true' },
                        { data: 'action', name: 'action', searchable: 'false' },
                        { data: 'reason', name: 'reason', searchable: 'false' },

                     ]
            });
         });
         $(function() {
               $('#table').DataTable({
               processing: "<img src='{{asset('build/img/jquery.easytree/loading.gif')}}'> Carregando...",
               serverSide: true,
               ajax: "{{ route('purchase_order_verify_data2') }}",
               columns: [
                { data: 'null', name: 'null', searchable: 'false' },
                { data: 'po_number', name: 'po_number', render: function(data,type,row){
                                        return row.po_number+row.po_number_seq
                                     } },
                                     { data: 'verified_by', name: 'verified_by' },
                                     { data: 'created_at', name: 'created_at'},
                        { data: 'action', name: 'action', searchable: 'false' },
                        { data: 'reason', name: 'reason', searchable: 'false' },

                     ]
            });
         });
</script>
@endsection