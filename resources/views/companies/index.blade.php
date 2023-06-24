@extends('layouts.layouts')
@section('content')
<section class="content-header">
    <h1>
        Companies
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">companies</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a class="btn btn-success" href="{{ route('companies.create') }}"><i class="fa fa-plus"></i> Qo'shish</a>
                </div>
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Rate</th>
                                <th>Desc</th>
                                <th>Date</th>
                                <th>Logo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $id = 1
                            @endphp
                            @foreach ($companies as $q)
                            <tr>
                                <td>{{$id}}</td>
                                <td>{{ $q['name'] }}</td>
                                <td>{{ $q['rate'] }}</td>
                                <td>{{ $q['desc'] }}</td>
                                <td>{{ $q['date'] }}</td>
                                <td>
                                    <img src="{{asset('companies-image/'.$q['logo'])}}" alt="Yuklashdagi hatolik" width="170px">
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <form action="{{ route('companies.destroy',$q->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                            <a class="btn btn-info" href="{{ route('companies.edit',$q->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </form>
                                        
                                    </div>
                                </td>
                            </tr>

                            @php
                            $id ++;
                            @endphp
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>

</section>
@endsection
