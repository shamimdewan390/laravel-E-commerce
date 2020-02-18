@extends('admin.master')

@section('content')
<style>
        .form-error {

        border: 2px solid red;
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
                    <h4 class="m-t-0 m-b-30 header-title">Add Coupon</h4>

                    <form action="{{url('store-coupon')}} " method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupon Code</label>
                            <input type="text" value="{{ old('coupon_code') }} " name="coupon_code" class="form-control{{($errors->first('coupon_code') ? " form-error" : "")}}" id="exampleInputEmail1" placeholder="Coupon Code">
                        </div>
                        @error('coupon_code')
                                    <span class="invalid-feedback text-danger">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupon Discount</label>
                            <input type="text" value="{{ old('coupon_discount') }} " name="coupon_discount" class="form-control{{($errors->first('coupon_discount') ? " form-error" : "")}}" id="exampleInputEmail1" placeholder="Coupon Discount">
                        </div>
                        @error('coupon_discount')
                                    <span class="invalid-feedback text-danger">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupon Validity ()</label>
                            <input type="datetime-local" value="{{ old('coupon_validity') }} " name="coupon_validity" class="form-control {{($errors->first('coupon_validity') ? " form-error" : "")}}" id="exampleInputEmail1" placeholder="YYYY-MM-DD ">
                        </div>
                        @error('coupon_validity')
                                    <span class="invalid-feedback text-danger">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                    </form>
                </div>
            </div>
                    <div class="col-lg-8">
                        <div class="card-box">
                            <div class="card-header">

                                <h4 class="m-t-0 header-title">All Coupon</h4>
                            </div>
                            <div class="card-body">

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Coupon Code</th>
                                    <th>Coupon Discount</th>
                                    <th>Coupon Validity</th>
                                    <th>Post Time</th>
                                    <th>Update Time</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                    @forelse ($allcoupon as $item)
                                        <tr>
                                            <th scope="row">{{$item->id}} </th>
                                            <td>{{$item->coupon_code}} </th>
                                            <td>{{$item->coupon_discount}} </th>
                                            <td>{{$item->coupon_validity}} </th>
                                            <td>{{$item->created_at}} </th>
                                            <td>{{$item->updated_at ?$item->updated_at : 'N/A'}} </th>
                                            <td>
                                                <a  href="{{ url('edit-coupon') }}/{{$item->id}} " class="btn btn-info">Edit</a>
                                            </th>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="10" class="text-center">
                                                <h4>no data found</h4>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <!-- end row -->
        </div>

        </div>
    </div>
</div>
@endsection
