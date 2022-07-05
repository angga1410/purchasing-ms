@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
    <a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-left-10-desktop">
            <i class="large material-icons">menu</i></a>
			<div class="mr-auto">
				<h3 class="m-subheader__title ">Approve Quotation</h3>
			</div>
		</div>
		<div class="margin22 sub-heading">
			@if(session('success'))
			    {{session('success')}}
			@endif
		</div>
	</div>

	<div class="tab-content padding40px">
		<table class="table table-bordered" id="table">
           <thead>
              <tr>
                 <th>Quotation Number</th>
                 <th>Action</th>
                 <th>Reason</th>
              </tr>
           </thead>
        </table>
	</div>

  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <form action="{{ route('quotation_approve_status') }}" method="post">
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
<link href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href='{{ asset("/css/jquery-ui.min.css") }}' />

<script type="text/javascript" src='{{ asset("/js/jquery-ui.min.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/jquery.dataTables.min.js") }}'></script>

<script type="text/javascript" src='{{ asset("/js/dataTables.bootstrap4.min.js") }}'></script>

<script type="text/javascript">

$(function() {
               $('#table').DataTable({
               processing: "<img src='{{asset('build/img/jquery.easytree/loading.gif')}}'> Carregando...",
               serverSide: true,
               ajax: "{{ route('quotation_approve_data') }}",
               columns: [
                        { data: 'qs_num', name: 'qs_num' },
                        { data: 'action', name: 'action', searchable: 'false' },
                        { data: 'reason', name: 'reason', searchable: 'false' },

                     ]
            });
         });

function reject(id, status)
{
  $(".modal-body .id").val( id );
  $(".modal-body .status").val( status );
}
/*$(document).on("click", ".reject", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #bookId").val( myBookId );
     // As pointed out in comments,
     // it is superfluous to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});*/

 </script>
@endsection
