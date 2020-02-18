@extends('admin.master')

@section('content')
<div class="content">
        <div class="container-fluid">
<div class="row">
        <div class="col-lg-12 m-auto">
            <div class="card-box">
                <h4 class="m-t-0 header-title">All Product</h4>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>SL</th>
                        <th>Product Name</th>
                        <th>Category Name</th>
                        <th>Product Price</th>
                        <th>Product Summary</th>
                        <th>Product Description</th>
                        <th>Product Quantity</th>
                        <th>Alart Quantity</th>
                        <th>Product Image</th>
                        <th>Post Time</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($allProduct as $key => $item)
                        <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <th scope="row">{{ $allProduct->firstItem() + $key}}</th>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->get_category->category_name }}</td>
                            <td>{{ $item->product_price }}</td>
                            <td>{{ $item->product_summary }}</td>
                            <td>{{ $item->product_description }}</td>
                            <td>{{ $item->product_quantity }}</td>
                            <td>{{ $item->alart_quantity }}</td>
                            <td>
                            <img width="100" src="{{ $item->product_image }}" alt="">
                            </td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="javascript:;" class="btn btn-outline-primary">View</a>
                            <a href="{{ url('edit-product') }}/{{ $item->id }}" class="btn btn-outline-info">Edit</a>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="20" class="text-center">No data found</td>
                        </tr>

                        @endforelse
                    </tbody>
                </table>
                {{$allProduct->links()}}
            </div>

        </div>

    </div>
        </div>
</div>
@endsection
