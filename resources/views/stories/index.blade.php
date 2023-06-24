@extends('layouts.layouts')
@section('content')
<section class="content-header">
    <h1>
        Stories
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Stories</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a class="btn btn-success" href="{{ route('stories.create') }}"><i class="fa fa-plus"></i> Qo'shish</a>
                </div>
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Desc</th>
                                <th>Image</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $id = 1
                            @endphp
                            @foreach ($stories as $q)
                            <tr>
                                <td>{{$id}}</td>
                                <td>{{ $q['title'] }}</td>
                                <td>{{ $q['desc'] }}</td>
                                <td>
                                    <img src="{{asset('stories-image/'.$q['image'].'')}}" alt="" width="110">
                                </td>
                                <td>{{$q['data']}}</td>
                                <td>
                                    <div class="btn-group">
                                        <form action="{{ route('stories.destroy',$q->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                            <a class="btn btn-info" href="{{ route('stories.edit',$q->id) }}">
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
