@extends('admin.layout.master')
@section('content-header')
     <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Profile
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Admin</a></li>
      <li><a href="#">Dashboard</a></li>
      <li class="active">Profile</li>
    </ol>
  </section>
@endsection
@section('content')
<!-- Main content -->
<section class="content">
@if (Session::has('message'))
<div class="alert {{Session::get('alert-type')}}  alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  <P>{{Session::get('message')}}</P> 
</div> 
@endif
<div class="container">
  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#timeline" data-toggle="tab">Timeline</a></li>
        <li><a href="#settings" data-toggle="tab">Edit Profile</a></li>
      </ul>
      <div class="tab-content">
        <!-- /.tab-pane -->
        <div class="active tab-pane" id="timeline">
          <div class="container">
              <div class="col-md-6 col-md-offset-3">
                  <img class="profile-user-img img-responsive img-circle" src="/admin/images/profile/{{auth()->user()->image}}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>
                  <p class="text-muted text-center">{{auth()->user()->position}}</p>
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Department</b> <a class="pull-right">{{auth()->user()->department}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <a class="pull-right">{{auth()->user()->email}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Position</b> <a class="pull-right">{{auth()->user()->position}}</a>
                    </li>
                  </ul>
              </div>
          </div>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="settings">
          <form class="form-horizontal" method="POST" action="/admin/profile/update/{{auth()->id()}}">
            @csrf
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Name</label>

              <div class="col-sm-10">
              <input type="text" class="form-control" name="name" id="inputName" value="{{auth()->user()->name}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">Email</label>

              <div class="col-sm-10">
              <input type="email" class="form-control" name="email" id="inputEmail" value="{{auth()->user()->email}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputDep" class="col-sm-2 control-label">Department</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputDep" name="department" value="{{auth()->user()->department}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPosition" class="col-sm-2 control-label">Postion</label>

              <div class="col-sm-10">
                <input class="form-control" id="inputPosition" name="position" value="{{auth()->user()->position}}"/>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Update Profile</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

  
@endsection