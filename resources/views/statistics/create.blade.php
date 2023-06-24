@extends('layouts.layouts')
@section('content')
<section class="content-header">
    <h1>
        Statistics Add
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Statistics</li>
        <li class="active">Add</li>
    </ol>
</section>

<section class="content">
    <div class="row">

        <div class="col-md-6">

            <div class="box box-primary">
                <form role="form" action="{{route('statistics.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="Company">Company Name</label>
                            <input type="text" class="form-control" id="Company" name="company_name" placeholder="Enter Company Name">
                        </div>

                        <div class="form-group">
                            <label for="Rate">Rate</label>
                            <input type="number" class="form-control" id="Rate" name="rate" placeholder="Enter Company Name">
                        </div>

                        <div class="form-group">
                            <label for="Review Count">Review Count</label>
                            <input type="number" class="form-control" id="Review Count" name="review_count" placeholder="Enter Company Name">
                        </div>

                        <div class="form-group">
                            <label for="Company Logo">Company Logo</label>
                            <input type="file" id="Company Logo" name="company_logo">
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
