@extends('admin.layout.master')
@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Add Template
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Admin</a></li>
        <li><a href="#">Dashboard</a></li>
        <li class="active">Add Template</li>
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
                    <form action="{{url('/admin/add-template')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Choose Category</label>
                            <select class="form-control select2" style="width: 100%;" name="category">
                                @foreach ($cats as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Template title:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Template Image:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input type="file" class="form-control" name="template_image" value="{{ old('template_image') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Template Document:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input type="file" class="form-control" name="template" value="{{ old('template') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Template Description:</label>
                            <div class="input-group">
                                <textarea id="editor1" name="description" rows="10" cols="80">{{ old('description') }}</textarea>
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