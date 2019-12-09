@extends('admin.layout.master') @section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Add Template
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Admin</a></li>
        <li><a href="#">Dashboard</a></li>
        <li class="active">Add Level</li>
    </ol>
</section>
@endsection @section('content')
<div class="content">
    <div class="box-body pad">
        <div class="col-md-6 col-md-offset-3">
            @include('admin.layout.error') @if (Session::has('message'))
            <div class="alert alert-{{Session::get('alert-type')}}">{{Session::get('message')}}</div>
            @endif
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Create A new Level</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('level.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Level Name:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" name="level_name" value="{{ old('level_name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">level Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="level_description">{{ old('level_description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Level Number:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="number" class="form-control" name="level_number" value="{{ old('level_number') }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection