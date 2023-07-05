@extends('layouts.layouts')

@section('content')
<section class="content-header">
    <h1>
        Token Add
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>ApiToken</li>
        <li class="active">Add</li>
    </ol>
</section>
    <section class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-sm-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Qo'shish</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="box-body">

                        <form action="{{ route('api-userCreate') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? "is-invalid":"" }}" value="{{ old('name') }}">
                                @if($errors->has('name'))
                                    <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Tokenning amal qilish muddati</label>
                                <input type="number" name="token_valid_period" max="999999" min="1" class="form-control {{ $errors->has('token_valid_period') ? "is-invalid":"" }}" value="{{ old('token_valid_period',30) }}">
                                @if($errors->has('token_valid_period'))
                                    <span class="error invalid-feedback">{{ $errors->first('token_valid_period') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="password-field" class="form-control {{ $errors->has('password') ? "is-invalid":"" }}" required>
                                
                                @if($errors->has('password'))
                                    <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Parolni qayta tering</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                
                                @if($errors->has('password_confirmation'))
                                    <span class="error invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">Saqlash</button>
                                <a href="{{ route('api-userIndex') }}" class="btn btn-default float-left">cancel</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection