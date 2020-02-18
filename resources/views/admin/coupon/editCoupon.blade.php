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
                    <h4 class="m-t-0 m-b-30 header-title">Update Coupon</h4>

                    <form action="{{url('update-coupon')}}/{{ $allcoupon->id }} " method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupon Code</label>
                            <input type="text" value="{{ $allcoupon->coupon_code }} " name="coupon_code" class="form-control{{($errors->first('coupon_code') ? " form-error" : "")}}" id="exampleInputEmail1" placeholder="Coupon Code">
                        </div>
                        @error('coupon_code')
                                    <span class="invalid-feedback text-danger">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupon Discount</label>
                            <input type="text" value="{{ $allcoupon->coupon_discount }} " name="coupon_discount" class="form-control{{($errors->first('coupon_discount') ? " form-error" : "")}}" id="exampleInputEmail1" placeholder="Coupon Discount">
                        </div>
                        @error('coupon_discount')
                                    <span class="invalid-feedback text-danger">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupon Validity</label>
                            <input type="datetime-local" value="{{ $allcoupon->coupon_validity }} " name="coupon_validity" class="form-control {{($errors->first('coupon_validity') ? " form-error" : "")}}" id="exampleInputEmail1" placeholder="YYYY-MM-DD ">
                        </div>
                        @error('coupon_validity')
                                    <span class="invalid-feedback text-danger">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <button type="submit" class="btn btn-purple waves-effect waves-light">Update Coupon</button>
                    </form>
                </div>
            </div>
                <!-- end row -->
        </div>

        </div>
    </div>
</div>
@endsection
