@extends('layouts.layouts')
@section('content')
<section class="content-header">
    <h1>
        Hero Add
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Hero</li>
        <li class="active">Add</li>
    </ol>
</section>

<section class="content">
    <div class="row">

        <div class="col-md-6">

            <div class="box box-primary">
                <form role="form" action="{{route('hero.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="Title">Title</label>
                            <input type="text" class="form-control" id="Title" name="title" placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label for="Desc">Desc</label>
                            <input type="text" class="form-control" id="Desc" name="desc" placeholder="Enter Desc">
                        </div>

                        <div class="form-group">
                            <label for="Url">Url</label>
                            <input type="text" class="form-control" id="Url" name="url" placeholder="Enter Url" >
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
