@extends('layouts.layouts')
@section('content')
<section class="content-header">
    <h1>
        Stories Add
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Stories</li>
        <li class="active">Add</li>
    </ol>
</section>

<section class="content">
    <div class="row">

        <div class="col-md-12">

            <div class="box box-primary">
                <form role="form" action="{{route('stories.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="Title">Title</label>
                            <input type="text" class="form-control" id="Title" name="title" placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label>Date:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker" name="date">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="Desc">Desc</label>
                            <textarea id="editor1" rows="10" cols="80" name="desc"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="Image">Image</label>
                            <input type="file" id="Image" name="file">
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
@endsection
