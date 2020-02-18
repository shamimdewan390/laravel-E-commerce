@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Category Show</div>

                <div class="card-body">
                    @if (session('delete'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('delete') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">SL</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Post Time</th>
                            <th scope="col">Update Time</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($deleteCategoray as $key => $item)

                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <th scope="row">{{ $deleteCategoray->firstItem() + $key}}</th>
                                <td>{{ $item->category_name }}</td>
                                <td>{{ $item->created_at ? $item->created_at->diffForHumans() : 'N/A' }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <a href="{{ url('restor_category') }}/{{ $item->id }}" class="btn btn-info">Restor</a>
                                    <a href="{{ url('force_delete_category') }}/{{ $item->id }}" class="btn btn-danger">Force Delete</a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                      </table>
                      {{$deleteCategoray->links()}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
