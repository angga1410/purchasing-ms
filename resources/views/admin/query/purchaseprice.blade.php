@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
                <i class="large material-icons">menu</i></a>
            <div class="mr-auto">
                <h3 class="m-subheader__title ">Purchase Price Report</h3>

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


    <div class="tab-content padding40px shadowDiv">

        <div class="">
            <!-- <h5 class="card-title">PO Supplier</h5> -->
            <div class="row input-daterange m--margin-bottom-15">
                <div class="col-md-4">
                    <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date" />
                </div>
                <div class="col-md-4">
                    <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date" />
                </div>
                <div class="col-md-4">

                    <button type="button" name="filter" id="filter" class="btn btn-primary m--margin-right-10">Filter</button>
                    <button type="button" name="refresh" id="refresh" class="btn btn-success">Refresh</button>


                </div>
            </div>
            <table class="table table-bordered" id="price" width="100%">
                <thead>
                    <tr>
                        <th> No </th>

                        <th>MFR</th>
                        <th>Part Number</th>
                        <th>Part Name</th>
                        <th>Description</th>
                        <th>Total Qty</th>
                        <th>Curr</th>
                        <th>Total Price</th>
                        <th>Price Last Period</th>
                        <th>Price First Period</th>
                        <th>Price Gap(%)</th>


                    </tr>
                </thead>
            </table>

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
        $('#price').DataTable({
            processing: true,
            serverSide: true,
            scrollY: 500,
            dom: 'Bfrtip',
            paging: false,
            buttons: [
               'excel', 'csv', 'pdf', {
                    extend: 'print',
                    text: 'Print',
                    title: 'PriceReport(' + from_date + ' - ' + to_date + ')',
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
                url: "{{ route('pr_price_data') }}",
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
                    data: 'totalqty',
                    name: 'totalqty'
                },
                {
                    data: 'curr',
                    name: 'curr'
                },
                {
                    data: 'totalprice',
                    name: 'totalprice'
                },
                {
                    data: 'lastprice',
                    name: 'lastprice'
                },

                {
                    data: 'firstprice',
                    name: 'firstprice'
                },
                {
                    data: 'gap',
                    name: 'gap'
                },





            ]
        });
    }



    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if (from_date != '' && to_date != '') {
            $('#price').DataTable().clear().destroy();
            load_data(from_date, to_date);
        } else {
            alert('Both Date is required');
        }
    });

    $('#refresh').click(function() {
        $('#from_date').val('');
        $('#to_date').val('');
        $('#price').DataTable().clear().destroy();
        load_data();
    });
</script>
@endsection