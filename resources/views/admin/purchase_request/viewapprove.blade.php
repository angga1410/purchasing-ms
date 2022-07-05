@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
  <div class="m-subheader ">
    <div class="d-flex align-items-center">
      <a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
        <i class="large material-icons">menu</i></a>
      <div class="mr-auto">
        <h3 class="m-subheader__title ">Approve Purchase Request</h3>
      </div>
    </div>
    <div class="margin22 sub-heading">
      @if(session('success'))
      {{session('success')}}
      @endif
    </div>
  </div>
  <div class="tab-content padding40px shadowDiv" style="margin-bottom:2%">

    {!! csrf_field() !!}
    <div class="row" id="m_user_profile_tab_1">
      <div class="col-md-6">
        <div class="form-group m-form__group row">
          <label for="example-text-input" class="col-md-3 col-form-label">PR Number</label>
          <div class="col-md-7">
            <select required="" name="pr_number" class="form-control" onchange="location = this.value;">
              @foreach( $dataall as $get )
              @if( $get->pr_number == $data->pr_number)
              <option value="{{ $data->pr_number }}" selected=""> {{ $data->pr_number }}{{ $get->pr_number_seq }}</option>
              @else
              <option value="{{ $get->id }}"> {{ $get->pr_number }}{{ $get->pr_number_seq }}</option>
              @endif
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group m-form__group row">
          <label for="example-text-input" class="col-md-3 col-form-label">Request From</label>
          <div class="col-md-7">
            <input required="" name="request_from" value="{{ $data->request_from }}" class="form-control m-input" type="text">
          </div>
        </div>
        <div class="form-group m-form__group row">
          <label for="example-text-input" class="col-md-3 col-form-label">Purpose</label>
          <div class="col-md-7">
            <input required="" name="purpose" value="{{ $data->purpose }}" class="form-control m-input" type="text">
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group m-form__group row">
          <label for="example-text-input" class="col-md-3 col-form-label">Purchase Request Date</label>
          <div class="col-md-7">
            <input required="" name="pr_date" value="{{ $data->pr_date }}" class="date form-control m-input" type="text">
          </div>
        </div>

        <div class="form-group m-form__group row">
          <label for="example-text-input" class="col-md-3 col-form-label">Request Mode</label>
          <div class="col-md-7">
            <select required="" name="request_mode" class="form-control">
              <option <?php echo (@$data->request_mode == 0 ? "selected=''" : ''); ?> value="0">Routine</option>
              <option <?php echo (@$data->request_mode == 1 ? "selected=''" : ''); ?> value="1">Not Routine</option>
            </select>
          </div>
        </div>

        <div class="form-group m-form__group row">
          <label for="example-text-input" class="col-md-3 col-form-label">Purpose Remark</label>
          <div class="col-md-7">
            <input required="" name="purpose_remark" value="{{ $data->purpose_remark }}" class="form-control m-input" type="text">
          </div>
        </div>


      </div>

      <input required="" type="hidden" value="{{ $data->id }}" name="id">

    </div>

  </div>

  <div class="tab-content padding40px shadowDiv ">
    <table class="table table-bordered" id="table">
      <thead>
        <tr>
          <!-- <th>Purchase Request Number</th> -->
          <th>Action</th>
          <th>Reason</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="m-subheader ">
    <div class="d-flex align-items-center">
      <div class="mr-auto">
        <!--<h3 class="m-subheader__title ">Request For Quotation Detail</h3>-->
      </div>
    </div>
  </div>
  <div class="tab-content padding40px shadowDiv itemDiv">

    <span class="product-tab">Products</span>

    <div class="row" id="m_user_profile_tab_1">

      <!-- Item Module -->

      <table class="table table-bordered" id="table2">
        <thead>
          <tr>
            <th>MFR</th>
            <th>Part Name</th>
            <th>Part Number</th>
            <th>Part Description</th>
            <th>Quantity</th>
            <th>UM</th>
          </tr>
        </thead>

      </table>

    </div>

    <div class="col-12 m-portlet__foot m-portlet__foot--fit margin70px">
      <div class="m-form__actions">
        <div class="row justify-content-end">

          <a href="{{ route('purchase_request_approve') }}">
            <div class="btn btn-danger m-btn m-btn--air m-btn--custom">Back</div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <form action="{{ route('purchase_request_approve_status') }}" method="post">
        <div class="modal-content">

          <div class="modal-body">
            {!! csrf_field() !!}
            <input type="hidden" name="id" class="id" value="">
            <input type="hidden" name="status" class="status" value="">
            <textarea class="form-control" name="reason" placeholder="Enter reason to reject"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-warning" value="Reject">
          </div>
        </div>
      </form>

    </div>
  </div>

</div>

<?php
$dataid = $data->id;

?>

<link href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href='{{ asset("/css/jquery-ui.min.css") }}' />

<script type="text/javascript" src='{{ asset("/js/jquery-ui.min.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/jquery.dataTables.min.js") }}'></script>

<script type="text/javascript" src='{{ asset("/js/dataTables.bootstrap4.min.js") }}'></script>

<script>
  var dataid = "<?php echo $dataid ?>";
  console.log(dataid)

  $(function() {
    $('#table').DataTable({
      processing: "<img src='{{asset('build/img/jquery.easytree/loading.gif')}}'> Carregando...",
      serverSide: true,
      ajax: "{{ URL::to('purchase_request/approve/data/') }}/" + dataid,
      columns: [
        // { data: 'pr_number', name: 'pr_number' },
        {
          data: 'action',
          name: 'pr_number',
          searchable: 'false'
        },
        {
          data: 'reason',
          name: 'reason',
          searchable: 'false'
        },

      ]
    });
  });
</script>

<script type="text/javascript">
  function reject(id, status) {
    $(".modal-body .id").val(id);
    $(".modal-body .status").val(status);
  }

  function getItemTable(productIds, prId) {
    console.log(productIds)
    console.log(prId)
    $(function() {
      var table = $('#table2').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ URL::to('items/tablepr') }}/" + productIds + "/" + prId,
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
            data: 'qty',
            name: 'qty'
          },
          {
            data: 'um',
            name: 'um'
          },
          // { data: 'unit_cost', name: 'unit_cost' },
          // { data: 'total', name: 'total' },
          // { data: 'delete', name: 'delete' },

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

  window.onload = prnumber(dataid);
  /*$(document).on("click", ".reject", function () {
       var myBookId = $(this).data('id');
       $(".modal-body #bookId").val( myBookId );
       // As pointed out in comments,
       // it is superfluous to have to manually call the modal.
       // $('#addBookDialog').modal('show');
  });*/
</script>
@endsection