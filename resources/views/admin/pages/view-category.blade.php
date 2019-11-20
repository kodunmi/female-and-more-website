@extends('admin.layout.master')
@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Tables
        <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Category</a></li>
        <li class="active">View Category</li>
    </ol>
</section>
@endsection
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Categories</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if (Session::has('message'))
                        <div class="alert alert-{{Session::get('alert-type')}}">{{Session::get('message')}}</div>
                    @endif
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cats as $cat)
                            <tr>
                                <td>{{$cat->name}}</td>
                                <td><i class="fa fa-pencil btn btn-primary" aria-hidden="true" data-toggle="modal" data-target="#edit{{$cat->id}}"></i></td>
                                <td> <a href="/admin/delete-category/{{$cat->id}}"><i class="fa fa-trash btn btn-danger" aria-hidden="true"></i></a></td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="edit{{$cat->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin/edit-category/{{$cat->id}}" method="POST">
                                                @csrf
                                                <div class="input-group input-group-lg">
                                                    <input type="text" class="form-control" value="{{$cat->name}}" name="category_name">
                                                    <span class="input-group-btn">
                                                        <button type="submit" class="btn btn-info btn-flat">Save Changes</button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Category Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection