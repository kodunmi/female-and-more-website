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
        <li class="active">Add Story</li>
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
                    <h3 class="box-title">Create New Story</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('story.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Choose Level</label>
                            <select class="form-control select2" style="width: 100%;" name="level">
                                @foreach ($levels as $level)
                                <option value="{{$level->level_number}}">{{$level->level_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Story Number</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="number" class="form-control" name="story_number" value="{{ old('story_number') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Story Week Number</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="number" class="form-control" name="week_no" value="{{ old('week_no') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Icon Name</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Icon Career Path</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" name="career" value="{{ old('career') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Icon Quote</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="quote">{{ old('quote') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Icon Profile</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="profile">{{ old('profile') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Icon Experience</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="experience">{{ old('experience') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Icon Steps To Glory</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="glory">{{ old('glory') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Icon Image:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input type="file" class="form-control" name="image" value="{{ old('image') }}">
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
