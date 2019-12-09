@extends('admin.layout.master') @section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Template</a></li>
        <li class="active">View Templates</li>
    </ol>
</section>
@endsection @section('content')
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
                                    <th>level id</th>
                                    <th>story number</th>
                                    <th>story week number</th>
                                    <th>icon name</th>
                                    <th>icon career path</th>
                                    <th>icon profile</th>
                                    <th>icon quote</th>
                                    <th>icon experience</th>
                                    <th>icon image</th>
                                    <th>edit</th>
                                    <th>delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stories as $story)
                                <tr>
                                    <td>{{$story->level_id}}</td>
                                    <td>{{$story->story_number}}</td>
                                    <td>{{$story->story_week_number}}</td>
                                    <td>{{$story->icon_name}}</td>
                                    <td>{{$story->icon_career_path}}</td>
                                    <td style="width: 60px;">{{$story->icon_profile}}</td>
                                    <td>{{$story->icon_quote}}</td>
                                    <td>{{$story->icon_experience}}</td>
                                    <td>{{$story->icon_image}}</td>
                                    <td><i class="fa fa-pencil btn btn-primary" aria-hidden="true" data-toggle="modal" data-target="#edit{{$story->id}}"></i></td>
                                    <td> <a href=""><i class="fa fa-trash btn btn-danger" aria-hidden="true"></i></a></td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="edit{{$story->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('story.update',['story' => $story->id]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf @method('PATCH')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Story Number</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="number" class="form-control" name="story_number" value="{{ $story->story_number }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Story Week Number</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="number" class="form-control" name="week_no" value="{{ $story->story_week_number }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Icon Name</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text" class="form-control" name="name" value="{{ $story->icon_name }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Icon Career Path</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text" class="form-control" name="career" value="{{ $story->icon_career_path }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Icon Quote</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="quote">{{ $story->icon_quote }}</textarea>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Icon Profile</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="profile">{{ $story->icon_profile }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Icon Experience</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="experience">{{ $story->icon_experience }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Icon Steps To
                                                            Glory</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="glory">{{ $story->icon_step_to_glory }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Icon Image:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-phone"></i>
                                                            </div>
                                                            <input type="file" class="form-control" name="image">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                    <th>level id</th>
                                    <th>story number</th>
                                    <th>story week number</th>
                                    <th>icon name</th>
                                    <th>icon career path</th>
                                    <th>icon profile</th>
                                    <th>icon quote</th>
                                    <th>icon experience</th>
                                    <th>icon image</th>
                                    <th>edit</th>
                                    <th>delete</th>
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
