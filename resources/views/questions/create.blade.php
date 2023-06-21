@extends('layouts.layouts')
@section('content')
<section class="content-header">
    <h1>
        Questions Add
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Questions</li>
        <li class="active">Add</li>
    </ol>
</section>

<section class="content">
    <div class="row">

        <div class="col-md-6">

            <div class="box box-primary">
                <form role="form" action="{{route('questions.store')}}" method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="Questions">Questions</label>
                            <input type="text" class="form-control" id="Questions" name="questions" placeholder="Enter Questions">
                        </div>

                        <div class="form-group">
                            <label for="Answer">Answer</label>
                            <input type="text" class="form-control" id="Answer" name="answer" placeholder="Enter Answer">
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
