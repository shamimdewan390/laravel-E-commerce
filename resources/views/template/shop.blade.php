@extends('template.master')

@section('content')
		<!-- Start Search Popup -->
		<div class="box-search-content search_active block-bg close__top">
			<form id="search_mini_form" class="minisearch" action="#">
				<div class="field__search">
					<input type="text" placeholder="Search entire store here...">
					<div class="action">
						<a href="#"><i class="zmdi zmdi-search"></i></a>
					</div>
				</div>
			</form>
			<div class="close__wrap">
				<span>close</span>
			</div>
		</div>
		<!-- End Search Popup -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--6" style="background-image: url({{url('template')}}/images/bg/apple.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Shop</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.html">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Shop</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
                <!-- Start Shop Page -->
                <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
                                <div class="shop__sidebar">
                                    <aside class="wedget__categories poroduct--cat">
                                        <h3 class="wedget__title">Product Categories</h3>
                                        <ul>
                                                @foreach ($all_category as $item)

                                        <li><a href="{{url('/shop')}}/{{$item->id}}">{{ $item->category_name}} <span>( {{ App\Product::where('category_id',$item->id)->count()}} )</span></a></li>
                                                @endforeach
                                            </ul>
                                    </aside>


                                    <aside class="wedget__categories sidebar--banner">
                                        <img src="{{url($lastPost->product_image)}}" alt="banner images">
                                        <div class="text">
                                            <h2>new products</h2>
                                        </div>
                                    </aside>
                                </div>
                            </div>
                            <div class="col-lg-9 col-12 order-1 order-lg-2">
                                <div class="row">
                                <div class="tab__container">
                                    <div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
                                        <div class="row">
                                                <div class="col-lg-12">
                                                    <div
                                                        class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
                                                        <div class="shop__list nav justify-content-center" role="tablist">
                                                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid"
                                                                role="tab">
                                                                <i class="fa fa-th"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- Start Single Product -->
                                            @foreach ($all_product as $item)

                                            @php
                                            $rev = App\Review::where('product_id', $item->id)->get();
                                            $review_count = App\Review::where('product_id', $item->id)->count();
                                            $quatiry = 0;
                                            $price = 0;
                                            $value = 0;
                                            $quatiry_review = 0;
                                            $price_review = 0;
                                            $value_review = 0;

                                            foreach ($rev as $review) {
                                                $quatiry    += $review->quality;
                                                $price      += $review->price;
                                                $value      += $review->value;
                                            }


                                            if ($value) {
                                                $quatiry_review = $quatiry  / $review_count;
                                                $price_review   = $price    / $review_count;
                                                $value_review   = $value    / $review_count;
                                            }

                                            $all_review = ($quatiry_review + $price_review + $value_review) / 3;
                                        @endphp

                                            <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="product__thumb">
                                                    <a class="first__img" href="{{url('/single/product')}}/{{ $item->slug }}"><img src="{{url($item->product_image)}}" alt="product image"></a>
                                                    <a class="second__img animation1" href="{{url('/single/product')}}/{{ $item->slug }}"><img src="{{url($item->product_image)}}" alt="product image"></a>
                                                    <div class="hot__box">
                                                        <span class="hot-label">BEST SALLER</span>
                                                    </div>
                                                </div>
                                                <div class="product__content content--center">
                                                    <h4><a href="single-product.html">{{Str::words($item->product_name, 10)}}</a></h4>
                                                    <ul class="prize d-flex">
                                                        <li>${{ $item->product_price }}</li>
                                                        {{-- <li class="old_prize">$35.00</li> --}}
                                                    </ul>
                                                    <div class="action">
                                                        <div class="actions_inner">
                                                            <ul class="add_to_links">
                                                                <li><a class="cart" href="{{url('cart')}}/{{$item->id}}"><i class="bi bi-shopping-bag4"></i></a></li>
                                                            <li><a class="wishlist" href="{{url('/single/product')}}/{{ $item->slug }}"><i class="bi bi-shopping-cart-full"></i></a></li>
                                                                <li><a class="compare" href="{{url('/single/product')}}/{{ $item->slug }}"><i class="bi bi-heart-beat"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product__hover--content">
                                                        <ul class="rating d-flex">
                                                            <li class="{{$all_review >= 1 ? 'on' : ''}}"><i class="fa fa-star-o"></i></li>
                                                            <li class="{{$all_review >= 2 ? 'on' : ''}}"><i class="fa fa-star-o"></i></li>
                                                            <li class="{{$all_review >= 3 ? 'on' : ''}}"><i class="fa fa-star-o"></i></li>
                                                            <li class="{{$all_review >= 4 ? 'on' : ''}}"><i class="fa fa-star-o"></i></li>
                                                            <li class="{{$all_review >= 5 ? 'on' : ''}}"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <style>
                                            .page-item.active .page-link {
                                                z-index: 2;
                                                color: #fff;
                                                background-color: #e6a38c;
                                                border-color: #d89c82;
                                            }
                                            </style>
                                            <div class="m-right">

                                                {{ $all_product->links() }}
                                            </div>
                                            <!-- End Single Product -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Shop Page -->

                <!-- QUICKVIEW PRODUCT -->
                <div id="quickview-wrapper">
                    <!-- Modal -->
                    <div class="modal fade" id="productmodal" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal__container" role="document">
                            <div class="modal-content">
                                <div class="modal-header modal__header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-product">
                                        <!-- Start product images -->
                                        <div class="product-images">
                                            <div class="main-image images">
                                                <img alt="big images" src="images/product/big-img/1.jpg">
                                            </div>
                                        </div>
                                        <!-- end product images -->
                                        <div class="product-info">
                                            <h1>Simple Fabric Bags</h1>
                                            <div class="rating__and__review">
                                                <ul class="rating">
                                                    <li><span class="ti-star"></span></li>
                                                    <li><span class="ti-star"></span></li>
                                                    <li><span class="ti-star"></span></li>
                                                    <li><span class="ti-star"></span></li>
                                                    <li><span class="ti-star"></span></li>
                                                </ul>
                                                <div class="review">
                                                    <a href="#">4 customer reviews</a>
                                                </div>
                                            </div>
                                            <div class="price-box-3">
                                                <div class="s-price-box">
                                                    <span class="new-price">$17.20</span>
                                                    <span class="old-price">$45.00</span>
                                                </div>
                                            </div>
                                            <div class="quick-desc">
                                                Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations creates a modern look.
                                            </div>
                                            <div class="select__color">
                                                <h2>Select color</h2>
                                                <ul class="color__list">
                                                    <li class="red"><a title="Red" href="#">Red</a></li>
                                                    <li class="gold"><a title="Gold" href="#">Gold</a></li>
                                                    <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                                    <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                                </ul>
                                            </div>
                                            <div class="select__size">
                                                <h2>Select size</h2>
                                                <ul class="color__list">
                                                    <li class="l__size"><a title="L" href="#">L</a></li>
                                                    <li class="m__size"><a title="M" href="#">M</a></li>
                                                    <li class="s__size"><a title="S" href="#">S</a></li>
                                                    <li class="xl__size"><a title="XL" href="#">XL</a></li>
                                                    <li class="xxl__size"><a title="XXL" href="#">XXL</a></li>
                                                </ul>
                                            </div>
                                            <div class="social-sharing">
                                                <div class="widget widget_socialsharing_widget">
                                                    <h3 class="widget-title-modal">Share this product</h3>
                                                    <ul class="social__net social__net--2 d-flex justify-content-start">
                                                        <li class="facebook"><a href="#" class="rss social-icon"><i class="zmdi zmdi-rss"></i></a></li>
                                                        <li class="linkedin"><a href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
                                                        <li class="pinterest"><a href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
                                                        <li class="tumblr"><a href="#" class="tumblr social-icon"><i class="zmdi zmdi-tumblr"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="addtocart-btn">
                                                <a href="#">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END QUICKVIEW PRODUCT -->
                </div>
                <!-- //Main wrapper -->

@endsection
