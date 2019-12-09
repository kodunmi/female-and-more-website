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
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>User Level</th>
                                    <th>Total Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->level_number}}</td>
                                    <td>{{ $user->total_score }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>User Name</th>
                                    <th>User Level</th>
                                    <th>Total Score</th>
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
