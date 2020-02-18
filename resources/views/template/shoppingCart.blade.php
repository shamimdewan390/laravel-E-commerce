@extends('template.master')

@section('content')
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Shopping Cart</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.html">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Shopping Cart</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
<div class="cart-main-area section-padding--lg bg--white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 ol-lg-12">
                <form action="{{ route('updateCart')}}" method="POST">
                    @csrf
                    <div class="table-content wnro__table table-responsive">
                        <table>
                            <thead>
                                <tr class="title-top">
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shopping as $item)

                                <tr>
                                    <input type="hidden" name="id[{{$item->id}}]" value="{{$item->id}}">
                                    <td class="product-thumbnail"><a href="{{url('single/product')}}/{{$item->get_product->slug}}"><img src="{{url($item->get_product->product_image)}}" alt="product img"></a></td>

                                    <td class="product-name"><a href="{{url('single/product')}}/{{$item->get_product->slug}}">{{$item->get_product->product_name}}</a></td>

                                    <td class="product-price"><strong style="font-size: 16px;">$</strong><span id="amount{{$item->id}}" class="amount">{{$item->get_product->product_price}}</span></td>

                                    <td class="product-quantity"><input min="1" name="quantity[{{$item->id}}]" id="quantity{{$item->id}}" type="number" value="{{$item->quantity}}"></td>

                                    <td class="product-subtotal" id="subTotal{{$item->id}}">${{$item->get_product->product_price*$item->quantity}}</td>

                                    <td class="product-remove"><a href="{{url('delete/cart')}}/{{$item->id}}">X</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <style>
                        .cartUp {
                            background: #fff none repeat scroll 0 0;
                            border-radius: 5px;
                            display: block;
                            font-family: "Poppins", sans-serif;
                            font-size: 16px;
                            font-weight: 400;
                            height: 50px;
                            line-height: 50px;
                            padding: 0 26px;
                            text-transform: capitalize;
                            transition: all 0.3s ease 0s;
                            border: none;
                        }
                        .cartUp:hover {
                            background: #e59285 none repeat scroll 0 0;
                            color: #fff;
                        }
                    </style>

                    <div class="cartbox__btn">
                        <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">

                            <li><input type="text" id="coupon" name="coupon" value="{{$cart}}" class="form-control"></li>
                            <li><a class="couponbtn" style="cursor:pointer">Apply Code</a></li>
                            <li><button class="cartUp" type="submit">Update Cart</button></li>
                        <li><a href="{{url('checkout')}} ">Check Out  </a></li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-6">
                <div class="cartbox__total__area">
                    <div class="cartbox-total d-flex justify-content-between">
                        <ul class="cart__total__list">
                            <li>Cart total</li>
                            <li>Discount ({{$coupon_price}}%)</li>
                        </ul>
                        <ul class="cart__total__tk">
                            <li>${{$total}}</li>
                            <li>${{$discount}}</li>
                        </ul>
                    </div>
                    <div class="cart__total__amount">
                        <span>Grand Total</span>
                        <span>${{$grand_total}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- footer for js --}}
@section('footer_js')
<script>
    $(document).ready(function(){

        @foreach($shopping as $item)
        $('#quantity{{$item->id}}').change(function(){
            var quantity = $('#quantity{{$item->id}}').val();
            var amount = $('#amount{{$item->id}}').html();
            var subTotal =$('#subTotal{{$item->id}}').html('$'+quantity*amount);
        })
        @endforeach

        $('.couponbtn').click(function(){
            var coupon = $('#coupon').val();

            window.location.href = "{{ url('shopping-cart') }}/"+coupon;
        })
    })

</script>

@endsection
