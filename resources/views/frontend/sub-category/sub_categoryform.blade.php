@extends('admin.master')

@section('content')
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

    <div class="row">


        <div class="col-md-4">

            <div class="card-box">

                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="post" action="{{ url('add-sub-category') }}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Add Category</label>
                        <select name="category_id" id="" class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">Select One</option>
                            @foreach ($allCategory as $item)

                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>

                            @endforeach
                        </select>
                    @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Add Sub-Category</label>
                    <input type="text" name="sub_category" class="form-control @error('sub_category') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Add Category">
                    @error('sub_category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>



        <div class="col-lg-8">
            <div class="card-box">
                @if (session('delete'))
                <div class="alert alert-danger" role="alert">
                    {{ session('delete') }}
                </div>
            @endif
            <table class="table table-bordered">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">SL</th>
                        <th scope="col">Sub-Category Name</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Post Time</th>
                        <th scope="col">Update Time</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>

                    <tbody>
                        @forelse ($allSubCategory as $key => $item)

                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <th scope="row">{{ $allSubCategory->firstItem() + $key}}</th>
                            <td>{{ $item->subcategory_name }}</td>
                            <td>{{ $item->get_category->category_name }}</td>
                            <td>{{ $item->created_at ? $item->created_at->diffForHumans() : 'N/A' }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                                <a href="{{ url('edit') }}/{{ $item->id }}" class="btn btn-success">Edit</a>
                                
                            </td>
                        </tr>
                        @empty
                        <tr>
                        <td colspan="20" class="text-center">No data available</td>
                        </tr>

                        @endforelse
                    </tbody>
                  </table>
                  {{$allSubCategory->links()}}

        </div>
            </div>

        </div>


    </div>
</div>
@endsection
