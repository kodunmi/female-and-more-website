@extends('admin.layout.master')
@section('content-header')
     <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add Category
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Admin</a></li>
      <li><a href="#">Dashboard</a></li>
      <li class="active">Add Category</li>
    </ol>
  </section>
@endsection
@section('content')
<div class="content">
    <div class="col-md-6 col-md-offset-3">
        @include('admin.layout.error')
        @if (Session::has('message'))
            <div class="alert alert-{{Session::get('alert-type')}}">{{Session::get('message')}}</div>
        @endif
        <form action="{{url('/admin/add-category')}}" method="POST">
            @csrf
            <div class="input-group input-group-lg">
                <input type="text" class="form-control" name="category_name">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-info btn-flat">Add Category!</button>
                </span>
            </div>
        </form>
    </div>    
</div>

@endsection