@extends('template.master')

@section('content')

<style>



    .star-rating {
        direction: rtl;
        display: inline-block;
        padding: 5px
    }

    .star-rating input[type=radio] {
        display: none
    }

    .star-rating label {
        color: #bbb;
        font-size: 18px;
        padding: 0;
        cursor: pointer;
        -webkit-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out
    }

    .star-rating label:hover,
    .star-rating label:hover ~ label,
    .star-rating input[type=radio]:checked ~ label {
        color: #ff5501
    }
    /* ========================================= */
    </style>
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
        <div class="ht__bradcaump__area bg-image--4" style="background-image: url({{url('template')}}/images/bg/apple.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Shop Single</h2>
                                <nav class="bradcaump-content">
                                  <a class="breadcrumb_item" href="index.html">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb_item active">Shop Single</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Bradcaump area -->
            <!-- Start main Content -->
            <div class="maincontent bg--white pt--80 pb--55">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-12">
                            <div class="wn__single__product">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="wn__fotorama__wrapper">
                                            <div class="fotorama wn__fotorama__action" data-nav="thumbs">
                                                  <a href="1.jpg"><img src="{{url($single_wiew->product_image)}}" alt=""></a>
                                                  <a href="2.jpg"><img src="{{url($single_wiew->product_image)}}" alt=""></a>
                                                  <a href="3.jpg"><img src="{{url($single_wiew->product_image)}}" alt=""></a>
                                                  <a href="4.jpg"><img src="{{url($single_wiew->product_image)}}" alt=""></a>
                                                  <a href="5.jpg"><img src="{{url($single_wiew->product_image)}}" alt=""></a>
                                                  <a href="6.jpg"><img src="{{url($single_wiew->product_image)}}" alt=""></a>
                                                  <a href="7.jpg"><img src="{{url($single_wiew->product_image)}}" alt=""></a>
                                                  <a href="8.jpg"><img src="{{url($single_wiew->product_image)}}" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="product__info__main">
                                            <h1>{{$single_wiew->product_name}}</h1>
                                            <div class="product-reviews-summary d-flex">
                                                    <ul class="rating d-flex">
                                                        <li class="{{$all_review >= 1 ?'on': ''}}"><i class="fa fa-star-o"></i></li>
                                                        <li class="{{$all_review >= 2 ?'on': ''}}"><i class="fa fa-star-o"></i></li>
                                                        <li class="{{$all_review >= 3 ?'on': ''}}"><i class="fa fa-star-o"></i></li>
                                                        <li class="{{$all_review >= 4 ?'on': ''}}"><i class="fa fa-star-o"></i></li>
                                                        <li class="{{$all_review >= 5 ?'on': ''}}"><i class="fa fa-star-o"></i></li>
                                                    </ul>
                                            </div>
                                            <div class="price-box">
                                                <span>${{$single_wiew->product_price}}</span>
                                            </div>
                                            <div class="product__overview">
                                                <p>{{Str::limit($single_wiew->product_summary, 200)}}</p>
                                            </div>
                                            <div class="box-tocart d-flex">
                                                <span>Qty</span>
                                            <input id="qty" class="input-text qty" name="qty" min="1" value="1" title="Qty" type="number">
                                                <div class="addtocart__actions">
                                                    <a href="{{url('cart')}}/{{$single_wiew->id}}">

                                                        <button class="tocart" type="submit" title="Add to Cart">Add to Cart</button>
                                                    </a>
                                                </div>
                                                <div class="product-addto-links clearfix">
                                                <a class="wishlist" style="background:url({{ url('template')}}/images/icons/product-info.png)" href="#"></a>

                                                </div>
                                            </div>
                                            <div class="product_meta">
                                                <span class="posted_in">Categories:
                                                    <a href="#">{{$single_wiew->get_category->category_name}}</a>
                                                    {{-- <a href="#">Kids' Music</a> --}}
                                                </span>
                                            </div>
                                            <div class="product-share">
                                                <ul>
                                                    <li class="categories-title">Share :</li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="icon-social-twitter icons"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="icon-social-tumblr icons"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="icon-social-facebook icons"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="icon-social-linkedin icons"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product__info__detailed">
                                <div class="pro_details_nav nav justify-content-start" role="tablist">
                                    <a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab">Details</a>
                                    <a class="nav-item nav-link" data-toggle="tab" href="#nav-review" role="tab">Reviews ({{$review_count}})</a>
                                </div>
                                <div class="tab__container">
                                    <!-- Start Single Tab Content -->
                                    <div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
                                        <div class="description__attribute">
                                            <p>{!! nl2br($single_wiew->product_description) !!} </p>
                                        </div>
                                    </div>
                                    <!-- End Single Tab Content -->
                                    <!-- Start Single Tab Content -->
                                    <div class="pro__tab_label tab-pane fade" id="nav-review" role="tabpanel">

                                        <div class="review__attribute">
                                            <h1>Customer Reviews</h1>
                                            <h2>Hastech</h2>
                                            <div class="review__ratings__type d-flex">
                                                <div class="review-ratings">
                                                    <div class="rating-summary d-flex">
                                                        <span>Quality</span>
                                                        <ul class="rating d-flex">
                                                            <li class="{{$quatiry_review >= 1 ? "" : "off"}}"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="{{$quatiry_review >= 2 ? "" : "off"}}"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="{{$quatiry_review >= 3 ? "" : "off"}}"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="{{$quatiry_review >= 4 ? "" : "off"}}"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="{{$quatiry_review >= 5 ? "" : "off"}}"><i class="zmdi zmdi-star"></i></li>
                                                        </ul>
                                                    </div>

                                                    <div class="rating-summary d-flex">
                                                        <span>Price</span>
                                                        <ul class="rating d-flex">
                                                            <li class="{{$price_review >= 1 ? "" : "off"}}"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="{{$price_review >= 2 ? "" : "off"}}"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="{{$price_review >= 3 ? "" : "off"}}"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="{{$price_review >= 4 ? "" : "off"}}"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="{{$price_review >= 5 ? "" : "off"}}"><i class="zmdi zmdi-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="rating-summary d-flex">
                                                        <span>value</span>
                                                        <ul class="rating d-flex">
                                                            <li class="{{$value_review >= 1 ? "" : "off"}}"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="{{$value_review >= 2 ? "" : "off"}}"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="{{$value_review >= 3 ? "" : "off"}}"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="{{$value_review >= 4 ? "" : "off"}}"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="{{$value_review >= 5 ? "" : "off"}}"><i class="zmdi zmdi-star"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        @guest
                                        @else
                                        @if($review_user_id >= 1)
                                        @if( $use_rev == 0 )

                                    <form action="{{url('add/review')}}" method="post">
                                        @csrf
                                    <input type="hidden" name="product_id" value="{{$single_wiew->id}}">
                                        <div class="review-fieldset">

                                            <h2>Post Your Reviews</h2>
                                            <h3></h3>
                                            @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                       <div class="review-field-ratings">
                                                <div class="product-review-table">
                                                    <div class="review-field-rating d-flex">
                                                        <span>Quality</span>
                                                        <div class="star-rating">
                                                            <input id="quality_star-5" type="radio" name="quality" value="5">
                                                            <label for="quality_star-5" title="5 stars">
                                                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                            <input id="quality_star-4" type="radio" name="quality" value="4">
                                                            <label for="quality_star-4" title="4 stars">
                                                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                            <input id="quality_star-3" type="radio" name="quality" value="3">
                                                            <label for="quality_star-3" title="3 stars">
                                                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                            <input id="quality_star-2" type="radio" name="quality" value="2">
                                                            <label for="quality_star-2" title="2 stars">
                                                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                            <input id="quality_star-1" type="radio" name="quality" value="1">
                                                            <label for="quality_star-1" title="1 star">
                                                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="review-field-rating d-flex">
                                                        <span>Price</span>
                                                        <div class="star-rating" style="padding: 5px">
                                                            <input id="price_star-5" type="radio" name="price" value="5">
                                                            <label for="price_star-5" title="5 stars">
                                                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                            <input id="price_star-4" type="radio" name="price" value="4">
                                                            <label for="price_star-4" title="4 stars">
                                                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                            <input id="price_star-3" type="radio" name="price" value="3">
                                                            <label for="price_star-3" title="3 stars">
                                                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                            <input id="price_star-2" type="radio" name="price" value="2">
                                                            <label for="price_star-2" title="2 stars">
                                                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                            <input id="price_star-1" type="radio" name="price" value="1">
                                                            <label for="price_star-1" title="1 star">
                                                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="review-field-rating d-flex">
                                                        <span>Value</span>
                                                        <div class="star-rating">
                                                            <input id="value_star-5" type="radio" name="value" value="5">
                                                            <label for="value_star-5" title="5 stars">
                                                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                            <input id="value_star-4" type="radio" name="value" value="4">
                                                            <label for="value_star-4" title="4 stars">
                                                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                            <input id="value_star-3" type="radio" name="value" value="3">
                                                            <label for="value_star-3" title="3 stars">
                                                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                            <input id="value_star-2" type="radio" name="value" value="2">
                                                            <label for="value_star-2" title="2 stars">
                                                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                            <input id="value_star-1" type="radio" name="value" value="1">
                                                            <label for="value_star-1" title="1 star">
                                                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review_form_field">
                                                <div class="input__box">
                                                    <span>Review</span>
                                                    <textarea name="review"></textarea>
                                                </div>

                                                <div class="review-form-actions">
                                                    <button type="submit">Submit Review</button>
                                                </div>


                                            </div>
                                        </div>
                                        @endif
                                        @endif
                                        @endguest
                                    </form>
                                    </div>
                                    <!-- End Single Tab Content -->
                                </div>
                            </div>
                            <div class="wn__related__product pt--80 pb--50">
                                <div class="section__title text-center">
                                    <h2 class="title__be--2">Related Products</h2>
                                </div>
                                <div class="row mt--60">
                                    <div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
                                        <!-- Start Single Product -->
                                        @foreach ($relatedProduct as $item)
                                        @php
                                            $rev = App\Review::where('product_id', $item->id)->get();
                                            $review_count = App\Review::where('product_id', $item->id)->count();
                                            $quatiry = 0;
                                            $price = 0;
                                            $value = 0;

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
                                            // dd($all_review);
                                        @endphp

                                        <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="product__thumb">
                                                <a class="first__img" href="{{url('single/product')}}/{{$item->slug}}"><img src="{{ url($item->product_image) }}" alt="product image"></a>
                                                <a class="second__img animation1" href="{{url('single/product')}}/{{$item->slug}}"><img src="{{ url($item->product_image) }}" alt="product image"></a>
                                                <div class="hot__box">
                                                    <span class="hot-label">BEST SALLER</span>
                                                </div>
                                            </div>
                                            <div class="product__content content--center">
                                                <h4><a href="{{url('single/product')}}/{{$item->slug}}">{{ $item->product_name }}</a></h4>
                                                <ul class="prize d-flex">
                                                    <li>{{ $item->product_price }}</li>
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
                                        <!-- Start Single Product -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                            <div class="shop__sidebar">
                                <aside class="wedget__categories poroduct--cat">
                                    <h3 class="wedget__title">Product Categories</h3>
                                    <ul>
                                        @foreach ($allcategory as $item)

                                        <li><a href="#">{{ $item->category_name}} <span>( {{ App\Product::where('category_id',$item->id)->count()}} )</span></a></li>
                                        @endforeach
                                    </ul>
                                </aside>

                                <aside class="wedget__categories sidebar--banner">
                                    <img src="{{asset('template/')}}/images/others/banner_left.jpg" alt="banner images">
                                    <div class="text">
                                        <h2>new products</h2>
                                        <h6>save up to <br> <strong>40%</strong>off</h6>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End main Content -->
            <!-- Start Search Popup -->
            <div class="box-search-content search_active block-bg close__top">
                <form id="search_mini_form--2" class="minisearch" action="#">
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
@endsection
