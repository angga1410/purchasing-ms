@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
  <div class="m-subheader ">
    <div class="d-flex align-items-center">
      <a href="#" id="m_aside_left_minimize_toggle" class="m--padding-top-5-desktop m--margin-right-5-desktop">
        <i class="large material-icons">menu</i></a>
      <div class="mr-auto">
        <h3 class="m-subheader__title "> Dashboard</h3>



      </div>
    </div>
    <div class="margin22 sub-heading">
      @if(session('success'))
      {{session('success')}}
      @endif
    </div>
  </div>
</div>




@endsection