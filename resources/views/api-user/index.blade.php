@extends('layouts.layouts')

@section('content')
<section class="content-header">
    <h1>
        Api
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Api</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="card-title">Api boshqaruvi</h3>
                    <a href="{{ route('api-userAdd') }}" class="btn btn-success btn-sm float-right"><span class="fa fa-plus-circle"></span> Qo'shish </a>
                </div>
                <!-- /.card-header -->
                <div class="box-body">
                    <!-- Data table -->
                    <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg" user="grid" aria-describedby="dataTable_info">
                        <thead>
                        <tr class="text-center">
                            <th>Username</th>
                            <th>Password</th>
                            <th>Valid period</th>
                            <th>Created by</th>
                            <th>Tokens</th>
                            <th>Activate</th>
                            <th style="width: 10px">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="text-center">
                                <td>
                                    <i class="fa fa-eye" onmousedown="showPassword({{ $user->id }})" onmouseup="hidePassword({{ $user->id }})"></i>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    <span style="display: block" id="hidden_{{ $user->id }}">*****</span>
                                    <span style="display: none" id="password_{{ $user->id }}">{{ $user->password }}</span>
                                </td>
                                <td>{{ $user->token_valid_period }}</td>
                                <td>{{ $user->creator->name ?? '-' }}</td>
                                <td>{{ $user->tokens->count() ?? 0 }}</td>
                                <td class="text-center">
                                    <i style="cursor: pointer" id="api_user_{{ $user->id }}" class="fa {{ $user->is_active ? "fa-check-circle text-success":"fa-times-circle text-danger" }}"
                                         onclick="toggle_api_user({{ $user->id }})"  ></i>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('api-userDestroy',$user->id) }}" method="post">
                                        @csrf
                                        <div class="btn-group">
                                           
                                                <a href="{{ route('api-userShow',$user->id) }}" type="button" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                            
                                            <a href="{{ route('api-userEdit',$user->id) }}" type="button" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('Вы уверены?')) { this.form.submit() } "><i class="fa fa-trash"></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection
@section('scripts')
    <script>
        function showPassword(id){
            $("#hidden_"+id).hide();
            $("#password_"+id).show();
        }

        function hidePassword(id){
            $("#hidden_"+id).show();
            $("#password_"+id).hide();
        }
        function toggle_api_user(id){
            $.ajax({
                url: "/api/api-user/toggle-status/"+id,
                type: "POST",
                data:{
                    _token: '{!! auth()->user()->password !!}'
                },
                success: function(result){
                    if (result.is_active == 1){
                        $("#api_user_"+id).attr('class',"fas fa-check-circle text-success");
                    }
                    else
                    {
                        $("#api_user_"+id).attr('class',"fas fa-times-circle text-danger");
                    }
                },
                error: function (errorMessage){
                    console.log(errorMessage)
                }
            });
        }
    </script>
@endsection