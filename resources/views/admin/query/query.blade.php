@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
        <a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
            <i class="large material-icons">menu</i></a>
            <div class="mr-auto">
                <h3 class="m-subheader__title ">Query Report</h3>

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
            counter-reset: row-num 0;
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
                    <a class="nav-link active" href="#posup" role="tab" aria-controls="description" aria-selected="true">PO Supplier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#prsup" role="tab" aria-controls="history" name="refreshpr" id="refreshpr"aria-selected="false">PR Supplier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#dosup" role="tab" aria-controls="deals" aria-selected="false">DO Supplier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#quosup" role="tab" aria-controls="deals" aria-selected="false">Quo Supplier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#invsup" role="tab" aria-controls="deals" aria-selected="false">Inv Supplier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#quocus" role="tab" aria-controls="deals" aria-selected="false">Quo Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pocus" role="tab" aria-controls="deals" aria-selected="false">PO Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#docus" role="tab" aria-controls="deals" aria-selected="false">DO Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#invcus" role="tab" aria-controls="deals" aria-selected="false">Inv Customer</a>
                </li>

            </ul>
        </div>
        <div class="">

            <div class="tab-content ">
                <div class="tab-pane active" id="posup" role="tabpanel">
                    <div class=" padding40px shadowDiv">
                        <h5 class="">PO Supplier</h5>
                        <div class="row input-daterange m--margin-bottom-15">
                            <div class="col-md-4">
                                <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date" />
                            </div>
                            <div class="col-md-4">
                                <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date" />
                            </div>
                            <div class="col-md-4">
                                <button type="button" name="filter" id="filter" class="btn btn-primary m--margin-right-15">Filter</button>
                                <button type="button" name="refresh" id="refresh" class="btn btn-success ">Refresh</button>
                            </div>
                        </div>
                        <table class="table table-bordered" id="posuptbl" width="100%">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th>Purchase Order#</th>
                                    <th>Supplier</th>
                                    <th>MFR</th>
                                    <th>Part Number</th>
                                    <th>Part Name</th>
                                    <th>Description</th>
                                    <th>Qty</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                    <th>Date</th>


                                </tr>
                            </thead>
                        </table>

                    </div>
                </div>

                <div class="tab-pane" id="prsup" role="tabpanel" aria-labelledby="history-tab">
                <div class=" padding40px shadowDiv">
                        <h5 class="card-title">PR Supplier</h5>
                        <div class="row input-daterange m--margin-bottom-15">
                            <div class="col-md-4">
                                <input type="date" name="from_datepr" id="from_datepr" class="form-control" placeholder="From Date" />
                            </div>
                            <div class="col-md-4">
                                <input type="date" name="to_datepr" id="to_datepr" class="form-control" placeholder="To Date" />
                            </div>
                            <div class="col-md-4">
                                <button type="button" name="filterpr" id="filterpr" class="btn btn-primary m--margin-right-15">Filter</button>
                                <button type="button" name="refreshpr" id="refreshpr" class="btn btn-success">Refresh</button>
                            </div>
                        </div>
                        <table class="table table-bordered" id="prsuptbl" width="100%">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th>Purchase Order#</th>
                                  
                                    <th>MFR</th>
                                    <th>Part Number</th>
                                    <th>Part Name</th>
                                    <th>Description</th>
                                    <th>Qty</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                    <th>Date</th>


                                </tr>
                            </thead>
                        </table>

                    </div>
                </div>

                <div class="tab-pane" id="dosup" role="tabpanel" aria-labelledby="deals-tab">
                    <div class=" padding40px shadowDiv">
                        <h5 class="">DO Supplier</h5>

                        <table class="table table-bordered">
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
                <div class="tab-pane" id="quosup" role="tabpanel" aria-labelledby="deals-tab">
                    <div class="shadowDiv padding40px">
                        <h5 class="">Quote Supplier</h5>

                        <table class="table table-bordered">
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
                <div class="tab-pane" id="invsup" role="tabpanel" aria-labelledby="deals-tab">
                    <div class="shadowDiv padding40px">
                        <h5 class="">Inventory Supplier</h5>

                        <table class="table table-bordered">
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
                <div class="tab-pane" id="quocus" role="tabpanel" aria-labelledby="deals-tab">
                    <div class="padding40px shadowDiv">
                        <h5 class="">Quote Customer</h5>

                        <table class="table table-bordered">
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
                <div class="tab-pane" id="pocus" role="tabpanel" aria-labelledby="deals-tab">
                    <div class="shadowDiv padding40px">
                        <h5 class="">PO Customer</h5>

                        <table class="table table-bordered">
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
                <div class="tab-pane" id="docus" role="tabpanel" aria-labelledby="deals-tab">
                    <div class=" padding40px shadowDiv">
                        <h5 class="">DO Customer</h5>

                        <table class="table table-bordered">
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
                <div class="tab-pane" id="invcus" role="tabpanel" aria-labelledby="deals-tab">
                    <div class=" padding40px shadowDiv">
                        <h5 class="">Inventory Customer</h5>

                        <table class="table table-bordered">
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
    load_data_pr();
    

    $('#bologna-list a').on('click', function(e) {
        e.preventDefault()
        $(this).tab('show')
    })

    function load_data(from_date = '', to_date = '') {
        $('#posuptbl').DataTable({
            processing: true,
            serverSide: true,
            scrollY: 500,
            dom: 'Bfrtip',
            paging: false,
            buttons: [
                'csv', {
                    extend: 'excel',
                    text: 'Excel',
                    title: 'POVend(' + from_date + ' - ' + to_date + ')',
                },     {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'A4'
            }, {
                    extend: 'print',
                    text: 'Print',
                    title: 'QueryPOVend(' + from_date + ' - ' + to_date + ')',
                    customize: function(win) {
                        var last = null;
                        var current = null;
                        var bod = [];

                        var css = '@page { size: landscape; }',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');

                        style.type = 'text/css';
                        style.media = 'print';

                        if (style.styleSheet) {
                            style.styleSheet.cssText = css;
                        } else {
                            style.appendChild(win.document.createTextNode(css));
                        }

                        head.appendChild(style);
                    }
                }
            ],
            ajax: {
                url: "{{ route('po_query_data') }}",
                data: {
                    from_date: from_date,
                    to_date: to_date
                }
            },
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
                    data: 'mfr',
                    name: 'mfr'
                },
                {
                    data: 'part_num',
                    name: 'part_num'
                },
                {
                    data: 'part_name',
                    name: 'part_name'
                },
                {
                    data: 'part_desc',
                    name: 'part_desc'
                },
                {
                    data: 'qty',
                    name: 'qty'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'curr',
                    name: 'curr',
                    render: function(data, type, row) {
                        return row.curr + ' ' + row.price
                    }
                },
                {
                    data: 'date',
                    name: 'date'
                },


            ]
        });
    }


    function load_data_pr(from_datepr = '', to_datepr = '') {
        $('#prsuptbl').DataTable({
            processing: true,
            serverSide: true,
            scrollY: 500,
            dom: 'Bfrtip',
            paging: false,
            buttons: [
                'csv', {
                    extend: 'excel',
                    text: 'Excel',
                    title: 'PRVend(' + from_datepr + ' - ' + to_datepr + ')',
                }, {
                    extend: 'print',
                    text: 'Print',
                    title: 'QueryPRVend(' + from_datepr + ' - ' + to_datepr + ')',
                    customize: function(win) {
                        var last = null;
                        var current = null;
                        var bod = [];

                        var css = '@page { size: landscape; }',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');

                        style.type = 'text/css';
                        style.media = 'print';

                        if (style.styleSheet) {
                            style.styleSheet.cssText = css;
                        } else {
                            style.appendChild(win.document.createTextNode(css));
                        }

                        head.appendChild(style);
                    }
                },
                {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'A4'
            }
                
            ],
            ajax: {
                url: "{{ route('pr_query_data') }}",
                data: {
                    from_datepr: from_datepr,
                    to_datepr: to_datepr
                }
            },
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
                    data: 'mfr',
                    name: 'mfr'
                },
                {
                    data: 'part_num',
                    name: 'part_num'
                },
                {
                    data: 'part_name',
                    name: 'part_name'
                },
                {
                    data: 'part_desc',
                    name: 'part_desc'
                },
                {
                    data: 'qty',
                    name: 'qty'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'curr',
                    name: 'curr',
                    render: function(data, type, row) {
                        return row.curr + ' ' + row.price
                    }
                },
                {
                    data: 'date',
                    name: 'date'
                },


            ]
        });
    }



    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if (from_date != '' && to_date != '') {
            $('#posuptbl').DataTable().clear().destroy();
            load_data(from_date, to_date);
        } else {
            alert('Both Date is required');
        }
    });

    $('#refresh').click(function() {
        $('#from_date').val('');
        $('#to_date').val('');
        $('#posuptbl').DataTable().clear().destroy();
        load_data();
    });

    
    $('#filterpr').click(function() {
        var from_datepr = $('#from_datepr').val();
        var to_datepr = $('#to_datepr').val();
        if (from_datepr != '' && to_datepr != '') {
            $('#prsuptbl').DataTable().clear().destroy();
            load_data_pr(from_datepr, to_datepr);
        } else {
            alert('Both Date is required');
        }
    });

    $('#refreshpr').click(function() {
        $('#from_datepr').val('');
        $('#to_datepr').val('');
        $('#prsuptbl').DataTable().clear().destroy();
        load_data_pr();
    });
</script>
@endsection