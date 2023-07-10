@extends('layouts.layouts')
@section('content')
    <section class="content-header">
        <h1>
            Booking Edit
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>booking</li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">

            <div class="col-md-6">

                <div class="box box-primary">
                    <form role="form" action="{{route('booking.update',$booking->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="Name">Solve</label>
                                <input type="text" class="form-control" id="solve" name="solve" placeholder="Enter Solve" value="{{$booking->solve}}">
                            </div>

                            <div class="form-group">
                                <label>Desc</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..." name="desc">{{$booking->desc}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="Step 1">Step 1</label>
                                <input type="text" class="form-control" id="Step 1" name="step1" placeholder="Enter Step 1" value="{{$booking->step1}}">
                            </div>

                            <div class="form-group">
                                <label for="Step 2">Step 2</label>
                                <input type="text" class="form-control" id="Step 2" name="step2" placeholder="Enter Step 2" value="{{$booking->step2}}">
                            </div>

                            <div class="form-group">
                                <label for="Step 3">Step 3</label>
                                <input type="text" class="form-control" id="Step 3" name="step3" placeholder="Enter Step 3" value="{{$booking->step3}}">
                            </div>

                            <div class="form-group">
                                <label for="Url">Url</label>
                                <input type="text" class="form-control" id="Url" name="url" placeholder="Enter Url" value="{{$booking->url}}">
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
