@extends('layouts.layouts')
@section('content')
<section class="content-header">
    <h1>
        Transport
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Transport</li>
    </ol>
</section>

<section class="content">
    <form role="form" action="{{ route('transport.update',$transport->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Bosh qism</h3>
                    </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" value="{{$transport->title}}">
                            </div>

                            <div class="form-group">
                                <label for="Desc">Desc</label>
                                <textarea id="editor1" rows="10" cols="80" name="desc" style="visibility: hidden; display: none;">{{$transport->desc}}</textarea>
                            </div>
                        </div>
                </div>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">2-qism</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title2" value="{{$transport->title2}}">
                        </div>

                        <div class="form-group">
                            <label for="Desc">Desc</label>
                            <textarea id="editor3" rows="10" cols="80" name="desc2" style="visibility: hidden; display: none;">{{$transport->desc2}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="file" id="icon" name="icon2">
                        </div>

                        <div class="form-group">
                            <label>Avalgisi</label>
                            <img src="{{$transport->icon2}}" alt="">
                        </div>
                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">4-qism</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title4" value="{{$transport->title4}}">
                        </div>

                        <div class="form-group">
                            <label for="Desc">Desc</label>
                            <textarea id="editor5" rows="10" cols="80" name="desc4" style="visibility: hidden; display: none;">{{$transport->desc4}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="file" id="icon" name="icon4">
                        </div>

                        <div class="form-group">
                            <label>Avalgisi</label>
                            <img src="{{$transport->icon4}}" alt="">
                        </div>
                    </div>


                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">1-qism</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title1" value="{{$transport->title1}}">
                        </div>

                        <div class="form-group">
                            <label for="Desc">Desc</label>
                            <textarea id="editor2" rows="10" cols="80" name="desc1" style="visibility: hidden; display: none;">{{$transport->desc1}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="file" id="icon" name="icon1">
                        </div>

                        <div class="form-group">
                            <label>Avalgisi</label>
                            <img src="{{$transport->icon1}}" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">3-qism</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title3" value="{{$transport->title3}}">
                        </div>

                        <div class="form-group">
                            <label for="Desc">Desc</label>
                            <textarea id="editor4" rows="10" cols="80" name="desc3" style="visibility: hidden; display: none;">{{$transport->desc3}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="file" id="icon" name="icon3">
                        </div>

                        <div class="form-group">
                            <label>Avalgisi</label>
                            <img src="{{$transport->icon3}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Saqlash</button>
                </div>
            </div>

        </div>
    </form>
</section>
@endsection
