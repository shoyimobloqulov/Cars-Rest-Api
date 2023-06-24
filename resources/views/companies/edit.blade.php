@extends('layouts.layouts')
@section('content')
<section class="content-header">
    <h1>
        Companies Edit
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>companies</li>
        <li class="active">Edit</li>
    </ol>
</section>

<section class="content">
    <div class="row">

        <div class="col-md-6">

            <div class="box box-primary">
                <form role="form" action="{{route('companies.update',$companies->id)}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" class="form-control" id="Name" name="name" placeholder="Enter Name" value="{{$companies->name}}">
                        </div>

                        <div class="form-group">
                            <label for="Rate">Rate</label>
                            <input type="number" class="form-control" id="Rate" name="rate" placeholder="Enter Rate" value="{{$companies->rate}}">
                        </div>

                        <div class="form-group">
                            <label>Desc</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="desc">{{$companies->desc}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Date:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker" name="date" value="{{$companies->date}}">
                            </div>

                        </div>



                        <div class="form-group">
                            <label for="Company Logo">Company Logo</label>
                            <input type="file" id="Company Logo" name="logo">
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
