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
                  <p class="mb-1"><span class="text-muted">KAWASAN INDUSTRI TAMAN TEKNO KAV. C11-12</span></p>
                  <p class="mb-1"><span class="text-muted">BSD, TANGERANG SELATAN 15314</p>
                  <p class="mb-1"><span class="text-muted">Phone (62-21)7587-9952 </span></p>
                  <p class="mb-1"><span class="text-muted"> NPWP : 01.789.513.038.000 </span></p>
                </div>

                <div class="col-md-6 text-right">

                  <p class="font-weight-bold mb-1" value="{{ $data->pr_number }}" onchange="location = this.value;"></p>

                  <p class="text-muted">{{ date("Y-m-d H:i:s")}}</p>
                  <p class="font-weight-bold mb-1"> Purchase Request </p>
                  <p class="font-weight-bold mb-1"> No Dokumen. {{ $data->pr_number }}{{ $data->pr_number_seq }} </p>
                  <p class="font-weight-bold mb-1"> Tanggal Efektif. {{ $data->created_at }} </p>
                  @if ( $data->status == 1)
                  <p class="font-weight-bold mb-1"> Status. Outstanding </p>
                  @elseif ( $data->status == 2)
                  <p class="font-weight-bold mb-1"> Status. PO Created </p>
                  @endif
                </div>
              </div>

              <hr class="my-5">

              <div class="row pb-5 p-5">
                <div class="col-md-6">
                  <p class="font-weight-bold mb-4">DETAILS</p>
                  @foreach( $supplierContacts as $get )
                  @if( $get->id == $data->supplier_contact_id )
                  <p class="mb-1">Source :{{ $get->contact_name }}</p>
                  @endif
                  @endforeach
                  <?php
                  if ($data->request_mode == 0) {
                    echo '<input required="" name="request_mode" value="0" hidden class="form-control m-input" type="text" readonly>';
                    echo '<p class="mb-1">Request Mode : Not Routine </p>';
                  } else if ($data->request_mode == 1) {
                    echo '<input required="" name="request_mode" value="0" hidden class="form-control m-input" type="text" readonly>';
                    echo '<p class="mb-1">Request Mode : Routine </p>';
                  }

                  ?>

                  <p class="mb-1">Purpose : {{ $data->purpose }}</p>

                </div>

                <div class="col-md-6 text-right">
                  <p class="mb-1"><span class="text-muted">PR No. {{ $data->pr_number }} </span></p>
                  <p class="mb-1"><span class="text-muted">PR Date {{ $data->pr_date }}</span></p>
                  <p class="mb-1"><span class="text-muted">Request By {{ $data->request_from }}</span></p>

                </div>
              </div>

              <div class="row p-5">
                <div class="col-md-12">
                  <div class="row" id="m_user_profile_tab_1">

                    <!-- Item Module -->

                    <table class="cell-border" id="table">
                      <thead>
                        <tr>
                          <th>MFR</th>
                          <th>Part Number</th>
                          <th>Part Name</th>
                          <th>Part Description</th>
                          <th>Unit Cost</th>
                          <th>Sell Price</th>
                          <!-- <th></th> -->
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                        </tr>
                      </tfoot>
                    </table>

                  </div>
                </div>
              </div>

              <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                <div class="py-3 px-5 text-right">

                </div>


              </div>
            </div>
          </div>
        </div>
      </div>


    </div>



  </div>
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
  $(function() {
    var table2 = $('#table2').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('itemdata') }}",
      columns: [{
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
          name: 'part_desc',
          searchable: 'false'
        },
        {
          data: 'unit_cost',
          name: 'unit_cost',
          searchable: 'false'
        },
        {
          data: 'sell_price',
          name: 'sell_price',
          searchable: 'false'
        },
        {
          data: 'add',
          name: 'add',
          searchable: 'false'
        },

      ]
    });
  });
</script>
<script type="text/javascript">
  //
  function getItemTable(productIds, prId) {
    console.log(productIds)
    console.log(prId)
    $(function() {
      var table = $('#table').DataTable({
        paging: false,
        info: false,
        searching: false,
        processing: true,
        serverSide: true,
        ajax: "{{ URL::to('items/tablepr2') }}/" + prId,
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
          // { data: 'sequence_number', name: 'sequence_number' },
          // { data: 'type_product_id', name: 'type_product_id' },
          {
            data: 'unit_cost',
            name: 'unit_cost'
          },
          {
            data: 'sell_price',
            name: 'sell_price'
          },
          // { data: 'unit_cost', name: 'unit_cost' },
          // { data: 'total', name: 'total' },
          // {
          //   data: 'delete',
          //   name: 'delete'
          // },

        ]
      });


    });
  }


  //
  function prnumber(value) {
    // console.log(value)
    $.ajax({
        url: "{{ URL::to('items/prnumber/get') }}/" + value
      })
      .done(function(data) {
        var table = $('#table').DataTable();
        table.destroy();
        getItemTable(data.productIds, data.prId);

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
  window.onload = prnumber(dataid);

  function deleteItemTemp(uIds) {
    var table = $('#table').DataTable();
    var inqId = $('.inquiry-customer').val();
    table.destroy();
    getItemTable(uIds, inqId);
  }
</script>
@endsection