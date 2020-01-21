@extends('admin.layout.master')
@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Add Quote
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Admin</a></li>
        <li><a href="#">Dashboard</a></li>
        <li class="active">Add Quote</li>
    </ol>
</section>
@endsection
@section('content')
<div class="content">
    <div class="box-body pad">
        <div class="col-md-6 col-md-offset-3">
            @include('admin.layout.error')
            @if (Session::has('message'))
            <div class="alert alert-{{Session::get('alert-type')}}">{{Session::get('message')}}</div>
            @endif
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Input masks</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('quote.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name of the quoter:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Quoters Image:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input type="file" class="form-control" name="image" value="{{ old('image') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Quote:</label>
                            <div class="input-group">
                                <textarea id="editor1" name="quote" rows="10" cols="75">{{ old('quote') }}</textarea>
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
