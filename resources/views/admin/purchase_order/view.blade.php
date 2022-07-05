@extends('layouts.admin')

@section('content')

<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="container">
        <div class=" row justify-content-end m--padding-15 ">
            <a href="" class="btn btn-accent m-btn m-btn--air m-btn--custom" onclick="printDiv('printableArea')">PRINT</a>
        </div>
    </div>
    <div id="printableArea">
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
                                    <p class="mb-1"><span class="text-muted">PT. GRAHA SUMBER PRIMA ELEKTRONIK </span></p>
                                    <p class="mb-1"><span class="text-muted">INTERCON PLAZA BLOK D11 </span></p>
                                    <p class="mb-1"><span class="text-muted">JL. MERUYA ILIR, SRENGSENG-KEMBANGAN</p>
                                    <p class="mb-1"><span class="text-muted">Phone (62-21)7587-9949/51 </span></p>
                                    <p class="mb-1"><span class="text-muted"> NPWP : 01.789.513.038.000 </span></p>
                                </div>

                                <div class="col-md-6 text-right">
                                    @foreach( $dataa as $data )
                                    <p class="font-weight-bold mb-1" value="{{ $data->po_number }}" onchange="location = this.value;"></p>

                                    <p class="text-muted">{{ date("Y-m-d H:i:s")}}</p>
                                    <p class="font-weight-bold mb-1"> PURCHASE ORDER </p>
                                    <p class="font-weight-bold mb-1"> PO No. {{ $data->po_number }}{{ $data->po_number_seq }} </p>
                                    <p class="font-weight-bold mb-1"> PO Date. {{ $data->created_at }} </p>
                                    <p class="text-muted"> Term {{ $data->shipment_term }} </p>

                                </div>
                            </div>

                            <hr class="my-5">

                            <div class="row pb-5 p-5">
                                <div class="col-md-6">
                                    <p class="font-weight-bold mb-4">VENDOR NAME</p>
                                    @foreach( $suppliers as $get )
                                    @if( $get->id == $data->supplier_id )
                                    <p class="mb-1">{{ $get->supplier_name }}</p>
                                    @endif
                                    @endforeach

                                    @foreach( $address as $get )
                                    @if( $get->supplier_id == $data->supplier_id )
                                    <p class="mb-1">{{ $get->address_line_1 }} {{ $get->address_line_2 }}</p>
                                    <p class="mb-1">{{ $get->address_line_3 }} </p>
                                    @endif
                                    @endforeach
                                    @foreach( $supplierContacts as $get )
                                    @if( $get->id == $data->supplier_contact_id )
                                    <p class="mb-1">{{ $get->contact_name }} ( {{ $get->contact_hand_phone }} )</p>
                                    @endif
                                    @endforeach

                                    @foreach( $supplierContacts as $get )
                                    @if( $get->id == $data->supplier_contact_id )
                                    <p class="mb-1">{{ $get->contact_email }}</p>
                                    @endif
                                    @endforeach

                                    {{$data->supplier->name}}
                                </div>
                                @endforeach
                                <div class="col-md-6 text-right">
                                    <p class="font-weight-bold mb-4">SHIP TO</p>
                                    <p class="mb-1"><span class="text-muted">PT. GRAHA SUMBER PRIMA ELEKTRONIK </span></p>
                                    <p class="mb-1"><span class="text-muted">KAWASAN INDUSTRI TAMAN TEKNO KAV. C11-12 </span></p>
                                    <p class="mb-1"><span class="text-muted">BSD, TANGERANG SELATAN 15314</span></p>
                                    <p class="mb-1"><span class="text-muted">Phone (62-21)7587-9952 </span></p>

                                </div>
                            </div>

                            <div class="row p-5">
                                <div class="col-md-12">
                                    <div class="row" id="m_user_profile_tab_1">



                                        <table id="table">
                                            <thead>
                                                <tr>
                                                    <th>MFR</th>
                                                    <th>Part Name</th>
                                                    <th>Part Number</th>
                                                    <th>Part Description</th>
                                                    <th>Quantity</th>
                                                    <th>UM</th>
                                                    <th>Currency</th>
                                                    <th>Price</th>
                                                    <th>PR#</th>
                                                </tr>
                                            </thead>

                                        </table>

                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                                <div class="py-3 px-5 text-right">
                                    <div class="mb-2">Total Net Value Excl. Tax</div>
@if($dataa[0]->disc_type == 0)
@elseif($dataa[0]->disc_type == 1)
<div class="mb-2">Incl. Discount {{$dataa[0]->disc_value}}%</div>
@elseif($dataa[0]->disc_type == 2)
<div class="mb-2">Incl. Discount {{$curr->curr}}{{number_format($dataa[0]->disc_value, 2, ',', '.')}}</div>
@endif
                                    <div class="h2 font-weight-light">{{$curr->curr}} {{ number_format($total, 2, ',', '.') }}</div>
                                </div>


                            </div>
                            <div class="col-md-6">
                                <p class="mb-1"><span class="text-muted">Note :</span></p>
                                <p class="mb-1"><span class="text-muted">{{$data->remark}}</span></p>
                                <p class="mb-1"><span class="text-muted"> </span></p>
                                <p class="mb-1"><span class="text-muted"> </span></p>

                            </div>
                            <br>

                            <div class="row">
                                <div class="col-sm">
                                    <p class="text-center"> PREPARED BY :
                                </div>
                                <div class="col-sm">
                                    <p class="text-center"> APPROVED BY :
                                </div>
                                <div class="col-sm">

                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>


    <!-- <script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script> -->
</div>

<?php
$dataid = $data->id;

?>

<link href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href='{{ asset("/css/jquery-ui.min.css") }}' />
<!-- <style>.dataTables_length{display: none;} .dataTables_filter{display: none;}</style> -->
<script type="text/javascript" src='{{ asset("/js/jquery-ui.min.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/jquery.dataTables.min.js") }}'></script>

<script type="text/javascript" src='{{ asset("/js/dataTables.bootstrap4.min.js") }}'></script>
<script type="text/javascript">
    //
    function getItemTable(productIds, poId) {

        $(function() {
            var table = $('#table').DataTable({
                paging: false,
                info: false,
                searching: false,
                processing: true,
                serverSide: true,
                ajax: "{{ URL::to('items/tablepo3') }}/" + productIds + "/" + poId,
                columns: [

                    {
                        data: 'mfr',
                        name: 'mfr'
                    },
                    {
                        data: 'part_name',
                        name: 'part_name'
                    },
                    {
                        data: 'part_num',
                        name: 'part_num'
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
                        data: 'um',
                        name: 'um'
                    },
                    {
                        data: 'curr',
                        name: 'curr'
                    },
                    {
                        data: 'unit_cost',
                        name: 'unit_cost'
                    },
                    {
                        data: 'pr',
                        name: 'pr',
                        render: function(data, type, row) {
                            return row.pr + row.pr_seq
                        }
                    },

                ]
            });


        });
        console.log(productIds)
        console.log(poId)
    }


    //
    function ponumber(value) {
        // console.log(value)
        $.ajax({
                url: "{{ URL::to('items/ponumber/get') }}/" + value
            })
            .done(function(data) {
                var table = $('#table').DataTable();
                table.destroy();
                getItemTable(data.productIds, data.poId);
            });

    }

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

    var dataid = "<?php echo $dataid ?>";
    // console.log(dataid)
    window.onload = ponumber(dataid);

    function deleteItemTemp(uIds) {
        var table = $('#table').DataTable();
        var inqId = $('.inquiry-customer').val();
        table.destroy();
        getItemTable(uIds, inqId);
    }
</script>
@endsection