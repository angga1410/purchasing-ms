@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
<div class="m-subheader ">
  <div class="margin22 d-flex align-items-center">
  <a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5 m--margin-right-5">
            <i class="large material-icons">menu</i></a>
    <div class="mr-auto">
      <h3 class="m-subheader__title ">Purchase Request List</h3>
      <a href="{{ route('create_purchase_request') }}" class="btn btn-accent m-btn m-btn--air m-btn--custom">Create</a>
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
<div class="row input-daterange m--margin-bottom-15">
                <div class="col-md-4">
                  <select class="form-control" id="status">
                    <option></option>
                    <option value="0">All</option>
                    <option value="3">Done</option>
                    <option value="1">Outstanding</option>
                    <option value="2">PO Created</option>
                  </select>
                </div>
                <div class="col-md-4">
                <button type="button" name="filter" id="filter" class="btn btn-primary m--margin-right-10">Filter</button>
                    <button type="button" name="refresh" id="refresh" class="btn btn-success">Refresh</button>
                </div>
                <div class="col-md-4">

                  


                </div>
            </div>
  <table class="table table-bordered" id="table">
         <thead>
            <tr> <th> No </th>
               <th>Purchase Request Number</th>
               <th>Approved status</th>
               <!-- <th>Approved by</th> -->
               <th>Request From</th>
               <th>Request Mode</th>
               <th>Purpose</th>
               <th>Status</th>
               <th>Purchase Request Date</th>
               <!-- <th>Purchase Request Target Date</th> -->
               <th>Action</th>
            </tr>
         </thead>
      </table>
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
    $('#filter').click(function() {
        var status = $('#status').val();
      
        if (status != '') {
            $('#table').DataTable().clear().destroy();
            load_data(status);
            console.log("OK", status)
        } else {
            alert('Both Date is required');
        }
    });


// $(function() {
//              $('#table').DataTable({
//               processing: true,
//             serverSide: true,
//             scrollY: 500,
//             dom: 'Bfrtip',
//             paging: false,
//             buttons: [
//                 'csv', 'pdf', {
//                     extend: 'print',
//                     text: 'Print',
            
//                     customize: function(win) {
//                         var last = null;
//                         var current = null;
//                         var bod = [];

//                         var css = '@page { size: landscape; }',
//                             head = win.document.head || win.document.getElementsByTagName('head')[0],
//                             style = win.document.createElement('style');

//                         style.type = 'text/css';
//                         style.media = 'print';

//                         if (style.styleSheet) {
//                             style.styleSheet.cssText = css;
//                         } else {
//                             style.appendChild(win.document.createTextNode(css));
//                         }

//                         head.appendChild(style);
//                     }
//                 }
//             ],
//              ajax: "{{ route('purchase_request_data') }}",
//              columns: [
//               {data :'null', name: 'null'},
//                       { data: 'pr_number', name: 'pr_number' , render: function(data,type,row){
//                         return row.pr_number+row.pr_number_seq
//                       }},
//                       { data: 'approved', name: 'approved' },
//                       // { data: 'approved_by', name: 'approved_by' },                      
//                       { data: 'request_from', name: 'request_from' },
//                       { data: 'request_mode', name: 'request_mode' },
//                       { data: 'purpose', name: 'purpose' },
//                       { data: 'status', name: 'status' },
//                       { data: 'pr_date', name: 'pr_date' },
//                       // { data: 'pr_target', name: 'pr_target' },
//                       { data: 'action', name: 'action', searchable: 'false' },

//                    ]
//           });
//        });

       function load_data(status = ''){
         console.log(status)
      $('#table').DataTable({
              processing: true,
            serverSide: true,
            scrollY: 500,
            dom: 'Bfrtip',
            paging: false,
            buttons: [
                'csv', 'pdf', {
                    extend: 'print',
                    text: 'Print',
            
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
                url: "{{ route('purchase_request_data_status') }}",
                data: {
                    status: status,
                 
                }
            },
             columns: [
              {data :'null', name: 'null'},
                      { data: 'pr_number', name: 'pr_number' , render: function(data,type,row){
                        return row.pr_number+row.pr_number_seq
                      }},
                      { data: 'approved', name: 'approved' },
                      // { data: 'approved_by', name: 'approved_by' },                      
                      { data: 'request_from', name: 'request_from' },
                      { data: 'request_mode', name: 'request_mode' },
                      { data: 'purpose', name: 'purpose' },
                      { data: 'status', name: 'status' },
                      { data: 'pr_date', name: 'pr_date' },
                      // { data: 'pr_target', name: 'pr_target' },
                      { data: 'action', name: 'action', searchable: 'false' },

                   ]
          });
    }
</script>
@endsection
