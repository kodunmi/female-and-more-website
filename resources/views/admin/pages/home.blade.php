<!-- Default box -->
@extends('admin.layout.master')
@section('content')
@if (Session::has('message'))
<div class="alert alert-info alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  <h4><i class="icon fa fa-info"></i>{{Session::get('message')}}</h4>
  
</div> 
@endif
  <!-- /.box -->    
@endsection
