@extends('layouts.layouts')
@section('content')
<section class="content-header">
    <h1>
        Logo Edit
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Logo</li>
        <li class="active">Edit</li>
    </ol>
</section>

<section class="content">
    <div class="row">

        <div class="col-md-6">

            <div class="box box-primary">
                <form role="form" action="{{route('logo.update',$logo->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Avalgi logo</label>
                            <div class="box-profile">
                                <img src="{{asset('logo-image/'.$logo->logo)}}" class="img-responsive" alt="Yuklanishdagi hatolik" width="150px">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Logo">Yangi Logo Yuklang</label>
                            <input type="file" id="Logo" name="logo">
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
