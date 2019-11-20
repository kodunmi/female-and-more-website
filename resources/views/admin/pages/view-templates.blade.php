@extends('admin.layout.master')
@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Template</a></li>
        <li class="active">View Templates</li>
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
                    <h3 class="box-title">All Templates</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if (Session::has('message'))
                    <div class="alert alert-{{Session::get('alert-type')}}">{{Session::get('message')}}</div>
                    @endif
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>Template Title</th>
                                    <th>Template Category</th>
                                    <th>Template Description</th>
                                    <th>Template Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($templates as $template)
                                <tr>
                                    <td>{{$template->title}}</td>
                                    <td>{{$template->category->name}}</td>
                                    <td>{!!$template->description!!}</td>
                                    <td> <img src="/admin/images/templates/small/{{$template->image}}" alt=""></td>
                                    <td><i class="fa fa-pencil btn btn-primary" aria-hidden="true" data-toggle="modal"
                                            data-target="#edit{{$template->id}}"></i></td>
                                    <td> <a href="/admin/delete-template/{{$template->id}}"><i
                                                class="fa fa-trash btn btn-danger" aria-hidden="true"></i></a></td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="edit{{$template->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="/admin/edit-template/{{$template->id}}" method="POST">
                                                <div class="modal-body">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Choose Category</label>
                                                        <select class="form-control select2" style="width: 100%;"
                                                            name="category">
                                                            @foreach ($cats as $cat)
                                                            <option
                                                                class="{{$cat->id == $template->category->id ? 'active':''}}"
                                                                value="{{$cat->id}}">{{$cat->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Template title:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text" class="form-control" name="title"
                                                                value="{{ $template->title }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Template Description:</label>
                                                        <div class="input-group">
                                                            <textarea class="editor1" name="description" rows="10"
                                                                cols="80">{!! $template->description !!}</textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Template Title</th>
                                    <th>Template Category</th>
                                    <th>Template Description</th>
                                    <th>Template Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
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