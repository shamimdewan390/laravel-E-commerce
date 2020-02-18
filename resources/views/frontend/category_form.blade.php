

@extends('admin.master')

@section('content')
<style>
.form-error {

border: 2px solid #e74c3c;
}
</style>
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Form Layouts</h4>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-md-4">

                <div class="card-box">

                        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="post" action="{{ url('add-category') }}">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Add Category</label>
                        <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Add Category">
                        @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
            <!-- end col -->
            <div class="col-lg-8">
                <div class="card-box">
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
                        @foreach ($allCategory as $key => $item)

                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <th scope="row">{{ $allCategory->firstItem() + $key}}</th>
                            <td>{{ $item->category_name }}</td>
                            <td>{{ $item->created_at ? $item->created_at->diffForHumans() : 'N/A' }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                            <a href="{{ url('edit') }}/{{ $item->id }}?page={{$allCategory->currentPage()}}" class="btn btn-success">Edit</a>
                                <a href="{{ url('delete') }}/{{ $item->id }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                  </table>
                  {{$allCategory->links()}}

            </div>
                </div>

            </div>

        </div>
        <!-- end row -->




    </div> <!-- container -->

</div>


@endsection






































{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Category Show</div>
            <a href="{{ url('category-trush') }}" class="btn btn-info">Trush</a>

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
                            @foreach ($allCategory as $key => $item)

                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <th scope="row">{{ $allCategory->firstItem() + $key}}</th>
                                <td>{{ $item->category_name }}</td>
                                <td>{{ $item->created_at ? $item->created_at->diffForHumans() : 'N/A' }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <a href="{{ url('view') }}/{{ $item->id }}" class="btn btn-info">View</a>
                                <a href="{{ url('edit') }}/{{ $item->id }}?page={{$allCategory->currentPage()}}" class="btn btn-success">Edit</a>
                                    <a href="{{ url('delete') }}/{{ $item->id }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                      </table>
                      {{$allCategory->links()}}

                      {{ $count }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
