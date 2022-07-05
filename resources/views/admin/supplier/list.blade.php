@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
   <div class="m-subheader ">
      <div class="margin22 d-flex align-items-center">
         <a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5">
            <i class="large material-icons">menu</i></a>
         <div class="mr-auto">

            <h3 class="m-subheader__title ">Supplier List</h3>
            <a href="{{ route('create_supplier') }}" class="btn btn-accent m-btn m-btn--air m-btn--custom">Create</a>
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
      <table class="table table-bordered" id="table">
         <thead>
            <tr>
               <th>No</th>
               <th>Name</th>
               <th>Type</th>
               <th>Approved Status</th>
               <th>Approved By</th>
               <th>Date Created</th>
               <th>Action</th>
            </tr>
         </thead>
      </table>
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
         ajax: "{{ route('supplier_data') }}",
         columns: [{
               data: 'null',
               name: 'null'
            },
            {
               data: 'supplier_name',
               name: 'supplier_name'
            },
            {
               data: 'supplier_type',
               name: 'supplier_type'
            },
            {
               data: 'approved',
               name: 'approved'
            },
            {
               data: 'approved_by',
               name: 'approved_by'
            },
            {
               data: 'created_at',
               name: 'created_at'
            },
            {
               data: 'action',
               name: 'action',
               searchable: 'false'
            },

         ]
      });
   });
</script>
@endsection