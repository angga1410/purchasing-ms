@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="modal fade" id="myModal3" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Header -->


                        <div class="modal-header">
                            <button type="button" class="close" onclick="closing()" aria-hidden="true">x</button>

                        </div>

                        <!--  Body -->
                        <form action="{{ route('save_item_notif') }}" method="post" enctype="multipart/form-data" onsubmit="">
                            <div class="modal-body">
                                <h3 class="m-subheader__title ">Offer Purchase Order</h3>


                                <table class="table table-bordered" id="offertbl">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>MFR</th>
                                            <th>Part Number</th>
                                            <th>Part Name</th>
                                            <th>Description</th>
                                            <th>Qty</th>
                                            <th>Curr</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                </table>

                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">Offer With</label>
                                    <div class="m-typeahead">
                                        <input class="form-control m-input" id="searchProduct" type="text" dir="ltr" placeholder="Search Product">
                                    </div>
                                </div>
                                <form id="ajaxform">
                                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                                    <div class="form-group">
                                        <input class="form-control m-input" id="poid" name="poid" type="text" hidden>
                                        <table class="table table-bordered" id="new_raw_qc">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>MFR</th>
                                                    <th>Part Number</th>
                                                    <th>Part Name</th>
                                                    <th>Description</th>
                                                    <th>Qty</th>
                                                    <th>Curr</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                            </div>
                            <!-- Footer -->
                            <div class="modal-footer">
                                <div class="form-group">
                                    <button class="btn btn-accent m-btn m-btn--air m-btn--custom save-data" id="btnupdate" disabled>Update</button>
                                </div>

                            </div>
                        </form>
                        <!-- Footer End -->
                        <!-- <button class="btn btn-success" onclick="closing()">Close</button> -->
                    </div> <!-- Content end -->
                </div> <!-- Dialog end -->
            </div> <!-- Modal end -->

            <a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
                <i class="large material-icons">menu</i></a>
            <div class="mr-auto">
                <h3 class="m-subheader__title ">Offer Purchase Order</h3>
            </div>
        </div>
    </div>
    <form action="{{ route('update_purchase_order') }}" method="post">
        {!! csrf_field() !!}
        <div class="tab-content padding40px shadowDiv">
            <span class="product-tab">Products</span>

            <div class="row" id="m_user_profile_tab_1">

                <!-- Item Module -->

                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th>MFR</th>
                            <th>Part Name</th>
                            <th>Part Number</th>
                            <th>Part Description</th>
                            <th>Quantity</th>
                            <th>UM</th>
                            <th>Curr</th>
                            <th>Price</th>

                            <th>Offer Product</th>
                        </tr>
                    </thead>

                </table>


               
            </div>

        </div>

        <div class="tab-content padding40px shadowDiv ">
            <div class="row" id="m_user_profile_tab_1">
                <div class="col-md-6">
                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-md-3 col-form-label">Purchase Order</label>
                        <div class="col-md-7">
                            <select required="" name="po_number" class="form-control js-example-basic-single" onchange="location = this.value;">
                                @foreach( $dataall as $get )
                                @if( $get->po_number == $data->po_number)
                                <option value="{{ $data->po_number }}" selected=""> {{ $data->po_number }}</option>
                                @else
                                <option value="{{ $get->id }}"> {{ $get->po_number }}{{ $get->po_number_seq }}</option>
                                @endif
                                @endforeach
                            </select>
                            <!-- <input required="" required="" name="pr_id" value="{{ $data->pr_id }}" class="form-control m-input" type="text"> -->
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-md-3 col-form-label">Purchase Request</label>
                        <div class="col-md-7">
                            @if ($data->pr_id == 0)
                            <textarea value="" class="form-control" type="text" readonly>Multiple PR</textarea>
                            <input required="" name="pr_id" value="0" class="form-control" type="text" hidden>
                            @else
                            @foreach( $pr as $get )
                            @if ($data->pr_id == 0)

                            <input required="" name="pr_id" value="0" class="form-control" type="text" hidden>
                            @else
                            @if( $get->id == $data->pr_id)
                            <textarea required="" value="" class="form-control" type="text" readonly>{{ $get->pr_number }}{{ $get->pr_number_seq }}</textarea>
                            <input required="" name="pr_id" value="{{ $get->id }}" class="form-control" type="text" hidden>
                            @endif
                            @endif
                            @endforeach
                            @endif

                            <!-- <input required="" required="" name="pr_id" value="{{ $data->pr_id }}" class="form-control m-input" type="text"> -->
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-md-3 col-form-label">Supplier</label>
                        <div class="col-md-7">
                            @foreach( $suppliers as $get )
                            @if( $get->id == $data->supplier_id )
                            <input required="" value="{{ $get->supplier_name }}" class="form-control" type="text" readonly>
                            <input required="" name="supplier_id" value="{{ $get->id }}" class="form-control" type="text" hidden>
                            @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-md-3 col-form-label">Supplier Contact</label>
                        <div class="col-md-7">
                            @foreach( $supplierContacts as $get )
                            @if( $get->id == $data->supplier_contact_id )
                            <input required="" value="{{ $get->contact_name }}" class="form-control" type="text" readonly>
                            <input required="" name="supplier_contact_id" value="{{ $get->id }}" class="form-control" type="text" hidden>
                            @endif
                            @endforeach

                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-md-3 col-form-label">Shipment Term</label>
                        <div class="col-md-7">
                            <input required="" required="" name="shipment_term" value="{{ $data->shipment_term }}" class="form-control m-input" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-md-3 col-form-label">Payment Term</label>
                        <div class="col-md-7">
                            <input required="" required="" name="payment_term" value="{{ $data->payment_term }}" class="form-control m-input" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-md-3 col-form-label">Import Via</label>
                        <div class="col-md-7">
                            <?php
                            if ($data->import_via == 0) {
                                echo '<input required="" name="import_via" value="0" class="form-control m-input" type="text" hidden>';
                                echo '<input required="" value="Local" class="form-control m-input" type="text" readonly>';
                            } else if ($data->import_via == 1) {
                                echo '<input required="" name="import_via" value="1" class="form-control m-input" type="text" hidden>';
                                echo '<input required="" value="Air" class="form-control m-input" type="text" readonly>';
                            } else if ($data->import_via == 2) {
                                echo '<input required="" name="import_via" value="2" class="form-control m-input" type="text" hidden>';
                                echo '<input required="" value="Sea" class="form-control m-input" type="text" readonly>';
                            }
                            ?>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-md-3 col-form-label">Cost Freight</label>
                        <div class="col-md-7">
                            <?php
                            if ($data->cost_freight == 0) {
                                echo '<input required="" name="cost_freight" value="0" class="form-control m-input" type="text" hidden>';
                                echo '<input required="" value="Paid" class="form-control m-input" type="text" readonly>';
                            } else if ($data->cost_freight == 1) {
                                echo '<input required="" name="cost_freight" value="1" class="form-control m-input" type="text" hidden>';
                                echo '<input required="" value="Not Paid" class="form-control m-input" type="text" readonly>';
                            }
                            ?>

                        </div>
                    </div>



                </div>

                <div class="col-md-6">
                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-md-3 col-form-label">Cost Freight Amount</label>
                        <div class="col-md-7">
                            <input required="" required="" name="cost_freight_amount" value="{{ $data->cost_freight_amount }}" class="form-control m-input" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-md-3 col-form-label">VAT</label>
                        <div class="col-md-7">
                            <input required="" required="" name="vat" value="{{ $data->vat }}" class="form-control m-input" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-md-3 col-form-label">Quotation S Rating</label>
                        <div class="col-md-7">
                            <input required="" required="" name="qs_rating" value="{{ $data->qs_rating }}" class="form-control m-input" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-md-3 col-form-label">Remark</label>
                        <div class="col-md-7">
                            <input required="" required="" name="remark" value="{{ $data->remark }}" class="form-control m-input" type="text" readonly>
                        </div>
                    </div>

                    <!-- <div class="form-group m-form__group row">
							<label for="example-text-input" class="col-md-3 col-form-label">Attached File</label>
							<div class="col-md-7">
								<input name="attached_file" value="{{ $data->attached_file }}" class="form-control m-input file-input" type="file">
							</div>
						</div> -->

                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-md-3 col-form-label">Status</label>
                        <div class="col-md-7">
                            <input required="" required="" name="status" value="{{ $data->status }}" class="form-control m-input" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-md-3 col-form-label">Invoice Status</label>
                        <div class="col-md-7">
                            <?php
                            if ($data->invoice_status == 0) {
                                echo '<input required="" name="invoice_status" value="0" class="form-control m-input" type="text" hidden>';
                                echo '<input required="" value="Not Billed" class="form-control m-input" type="text" readonly>';
                            } else if ($data->invoice_status == 1) {
                                echo '<input required="" name="invoice_status" value="1" class="form-control m-input" type="text" hidden>';
                                echo '<input required="" value="Partially Billed" class="form-control m-input" type="text" readonly>';
                            } else if ($data->invoice_status == 2) {
                                echo '<input required="" name="invoice_status" value="2" class="form-control m-input" type="text" hidden>';
                                echo '<input required="" value="Fully Billed" class="form-control m-input" type="text" readonly>';
                            }
                            ?>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-md-3 col-form-label">PO Supplier Rating</label>
                        <div class="col-md-7">
                            <input required="" required="" name="pos_supplier_rating" value="{{ $data->pos_supplier_rating }}" class="form-control m-input" type="text" readonly>
                        </div>
                    </div>


                    <input required="" type="hidden" value="{{ $data->id }}" name="id">

                </div>

                <div class="col-md-6"></div>
					<div class="col-md-6 margin50px ">
						<div class="row ">
							<div class="col-md-3"></div>
							<div class=" col-md-7 align-self-end">
								<div class="row justify-content-end" style="padding-right: 18px">
									<a href="{{ route('purchase_order_list') }}">
										<div class="btn btn-danger m-btn m-btn--air m-btn--custom ">Back</div>
									</a>
								</div>
							</div>

						</div>
					</div>

           


            </div>
            <div class="m-portlet__foot m-portlet__foot--fit margin50px">
                <div class="m-form__actions">
                    <div class="row">
                        <div class="col-12">

                        </div>
                    </div>
                </div>
            </div>

        </div>

</div>

</form>
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

    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            theme: "classic"
        });
    });

    function getItemTable(productIds, poId) {

        $(function() {
            var table = $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ URL::to('items/tablepoOffer') }}/" + productIds + "/" + poId,
                columns: [{
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
                        data: 'offer',
                        name: 'offer'
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

    var dataid = "<?php echo $dataid ?>";
    // console.log(dataid)
    window.onload = ponumber(dataid);

    function deleteItemTemp(uIds) {
        var table = $('#table').DataTable();
        var inqId = $('.inquiry-customer').val();
        table.destroy();
        getItemTable(uIds, inqId);
    }

    function loaditem(id) {
        console.log(id)

        $(function() {
            var table = $('#offertbl').DataTable({
                processing: true,
                serverSide: true,
                paging: false,
                searching: false,
                info: false,
                data: {
                    id: id
                },
                ajax: "{{ URL::to('items/offer') }}/" + id,

                columns: [{
                        data: 'id',
                        name: 'id'
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
                        data: 'curr',
                        name: 'curr'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },

                ]
            });


        });
    }

    function offer(id) {
        console.log(id);
        loaditem(id);
        document.getElementById("poid").value = id;
        $('#myModal3').modal({
            backdrop: 'static',
            keyboard: false
        })
    }

    function closing() {
        $('#myModal3').modal('hide');
    }




    $(function() {
        var engine = new Bloodhound({
            remote: {



                url: "{{ URL::to('/Procurement/products-data?term=%QUERY%') }}",
                wildcard: '%QUERY%'
            },

            datumTokenizer: Bloodhound.tokenizers.whitespace('term'),
            queryTokenizer: Bloodhound.tokenizers.whitespace
        });

        engine.initialize();

        $("#searchProduct").typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            source: engine.ttAdapter(),
            displayKey: 'part_num',
            limit: 10,
            templates: {
                empty: [
                    '<div class="empty-message">unable to find any</div>'
                ],
                suggestion: function(data) {
                    return '<li id="suggestion">' + data.part_num + ' - ' + data.part_name + '</li>'
                }

            }

        });
        $('#searchProduct').on('typeahead:selected', function(e, datum) {
            document.getElementById("btnupdate").disabled = false;
            $("#new_raw_qc").append('<tr>' +
                // '<td><input type="text" class="form-control m-input" name="product_id[]" value="1" readonly="true" style="width:75px;border:none;"></td>'+
                '<td><input type="text" class="form-control m-input" name="product_id" value="' + datum.id + '" readonly="true" style="width:50px;border:none;"></td>' +
                '<td><input type="text" class="form-control m-input" name="mfr" value="' + datum.mfr + '" readonly="true" style="width:90px;border:none;"></td>' +
                '<td><input type="text" class="form-control m-input" name="part_num" value="' + datum.part_num + '" readonly="true" style="width:100px;border:none;"></td>' +
                '<td><input type="text" class="form-control m-input" name="part_name" value="' + datum.part_name + '" readonly="true" style="width:90px;border:none;"></td>' +
                '<td><textarea class="form-control m-input">' + datum.part_desc + '</textarea></td>' +
                '<td><input type="text" class="form-control m-input" name="qty_pos" required style="width:75px;"></td>' +
                '<td><input type="text" class="form-control m-input" name="curr" value="' + datum.curr + '" readonly="true" style="width:75px;border:none;"></td>' +

                '<td><input type="text" class="form-control m-input" name="unit_price" value="' + datum.unit_cost + '" readonly="true" style="width:75px;border:none;"></td>' +


                '<td><a class="deleteItem btn btn-outline-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air btn-sm"><i class="la la-close"></i></a></td>' +
                '</tr>');
            inputdis();
        });

    });

    $('#new_raw_qc').on('click', '.deleteItem', function() {
        $(this).closest('tr').remove();
        document.getElementById("btnupdate").disabled = true;
        inputen();
    });

    function inputdis() {
        document.getElementById("searchProduct").disabled = true;

    }

    function inputen() {
        document.getElementById("searchProduct").disabled = false;

    }


    $(".save-data").click(function(event) {
        event.preventDefault();

        let product_id = $("input[name=product_id]").val();
        let qty_pos = $("input[name=qty_pos]").val();
        let um_pos = $("input[name=um_pos]").val();
        let curr = $("input[name=curr]").val();
        let unit_price = $("input[name=unit_price]").val();
        let id = $("input[name=id]").val();
        let poid = $("input[name=poid]").val();

        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "/items/update-offer",
            type: "POST",
            data: {
                product_id: product_id,
                qty_pos: qty_pos,
                um_pos: um_pos,
                curr: curr,
                unit_price: unit_price,
                id: id,
                poid: poid,
                _token: _token
            },
            success: function(response) {
                console.log(response);
                if (response) {
                    $('.success').text(response.success);
                    $("#ajaxform")[0].reset();
                }
            },
        });
        closing()
    });
</script>
@endsection