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

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Adminox</a></li>
                        <li class="breadcrumb-item"><a href="#">Forms</a></li>
                        <li class="breadcrumb-item active">Form Layouts</li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-md-8 m-auto">

                <div class="card-box">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="post" action="{{ url('update-category') }}/{{ $all_edit_id->id }}?page={{$page}}">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">Add Category</label>
                            <input type="text" value="{{ $all_edit_id->category_name }}" name="category" class="form-control @error('category') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Add Category">
                                @error('category')
                                    <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>


                </div>
            </div>
            <!-- end col -->

        </div>
        <!-- end row -->




    </div> <!-- container -->

</div>

@endsection

@section('footer_js')

@endsection



