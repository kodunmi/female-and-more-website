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
                                    <th>level Name</th>
                                    <th>level Number</th>
                                    <th>level Description</th>
                                    <th>Start Level</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($levels as $level)
                                <tr>
                                    <td>{{$level->level_name}}</td>
                                    <td>{{$level->level_number}}</td>
                                    <td>{!!$level->level_description!!}</td>
                                    <td> <i class="fa fa-play btn btn-info" aria-hidden="true" data-toggle="modal" data-target="#start{{$level->id}}"></i></td>
                                    <td><i class="fa fa-pencil btn btn-primary" aria-hidden="true" data-toggle="modal" data-target="#edit{{$level->id}}"></i></td>
                                    <td> <a href=""><i class="fa fa-trash btn btn-danger" aria-hidden="true"></i></a></td>
                                </tr>
                                <!--edit Modal -->
                                <div class="modal fade" id="edit{{$level->id}}" tabindex="-1" role="dialog"
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
                                            <form action="{{ route('level.update',['level' => $level->id]) }}" method="POST">
                                                <div class="modal-body">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="form-group">
                                                        <label>level Name:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text" class="form-control" name="level_name"
                                                                value="{{ $level->level_name }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>level Description:</label>
                                                        <div class="input-group">
                                                            <textarea class="editor1" name="level_description" rows="10"
                                                                cols="80">{!! $level->level_description !!}</textarea>
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
                                <!--start Modal -->
                                <div class="modal fade" id="start{{$level->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <form action="{{ route('level.update',['level' => $level->id]) }}">
                                                @csrf
                                                @method('PATCH')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Date To Start</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="date" class="form-control" name="level_name"
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="button" class="btn btn-primary">Save Start</button>
                                        </div>
                                    </form>
                                      </div>
                                </div>
                                </div>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>level name</th>
                                    <th>level number</th>
                                    <th>level Description</th>
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
