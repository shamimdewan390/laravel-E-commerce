@extends('template.master')

@section('content')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


		<!-- Start Search Popup -->
		<div class="brown--color box-search-content search_active block-bg close__top">
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
        <!-- Start Slider area -->
        <div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
        	<!-- Start Single Slide -->
        <div style="background-image: url({{url('template')}}/images/bg/sa.jpg);" class="slide animation__style10 bg-image--1 fullscreen align__center--left">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-lg-12">
	            			<div class="slider__content">
		            			<div class="contentbox">
		            				<h2>Buy <span>your </span></h2>
		            				<h2>favourite <span>Products </span></h2>
		            				<h2>from <span>Here </span></h2>
				                   	<a class="shopbtn" href="#">shop now</a>
		            			</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div>
        <div style="background-image: url({{url('template')}}/images/bg/as.jpg);" class="slide animation__style10 bg-image--1 fullscreen align__center--left">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-lg-12">
	            			<div class="slider__content">
		            			<div class="contentbox">
		            				<h2>Buy <span>your </span></h2>
		            				<h2>favourite <span>Products </span></h2>
		            				<h2>from <span>Here </span></h2>
				                   	<a class="shopbtn" href="#">shop now</a>
		            			</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div>
            <!-- End Single Slide -->
        </div>
        <!-- End Slider area -->
		<!-- Start BEst Seller Area -->
		<section class="wn__product__area brown--color pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">New <span class="color--theme">Products</span></h2>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
						</div>
					</div>
				</div>
				<!-- Start Single Tab Content -->
				<div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
                    <!-- Start Single Product -->
                    @foreach ($new_product as $item)

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

					<div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">
								<a class="first__img" href="{{url('/single/product')}}/{{ $item->slug }}"><img src="{{ url($item->product_image) }}" alt="product image"></a>
								<a class="second__img animation1" href="{{url('/single/product')}}/{{ $item->slug }}"><img src="{{ url($item->product_image) }}" alt="product image"></a>
								<div class="hot__box">
									<span class="hot-label">BEST SALLER</span>
								</div>
							</div>
							<div class="product__content content--center">
                            <h4><a href="single-product.html">{{ $item->product_name }}</a></h4>
								<ul class="prize d-flex">
									<li>${{ $item->product_price }}</li>
									{{-- <li class="old_prize">$</li> --}}
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
					</div>

                    @endforeach
				</div>
				<!-- End Single Tab Content -->
			</div>
		</section>
		<!-- Start BEst Seller Area -->
		<!-- Start NEwsletter Area -->
		<section style="background-image: url({{url('template')}}/images/bg/a1.jpg);" class="wn__newsletter__area bg-image--2">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 offset-lg-5 col-md-12 col-12 ptb--150">
						<div class="section__title text-center">
							<h2 style="color: #e59285;">Stay With Us</h2>
						</div>
						<div class="newsletter__block text-center">
							<p style="color: #e59285;">Subscribe to our newsletters now and stay up-to-date with new collections, the latest lookbooks and exclusive offers.</p>
							<form action="#">
								<div class="newsletter__box">
									<input style="color: #e59285;" type="email" placeholder="Enter your e-mail">
									<button style="color: #e59285;">Subscribe</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End NEwsletter Area -->
		<!-- Start Best Seller Area -->
		<section class="wn__bestseller__area bg--white pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">All <span class="color--theme">Products</span></h2>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
						</div>
					</div>
                </div>
				<div class="row mt--50">
					<div class="col-md-12 col-lg-12 col-sm-12">
						<div class="product__nav nav justify-content-center" role="tablist">

                        <a class="nav-item nav-link {{session('active') == '' ? 'active' : ''}}" href="{{URL::to('/')}}">ALL</a>
                            @foreach ($all_category as $item)

                            <a class="nav-item nav-link {{session('active') == $item->id ? 'active' : ''}} " href="{{url('/mix')}}/{{$item->id}}">{{$item->category_name}}</a>
                            @endforeach
                        </div>
					</div>
				</div>
				<div class="tab__container mt--60">
					<!-- Start Single Tab Content -->
					<div class="row single__tab tab-pane fade show active" id="nav-all" role="tabpanel">
						<div class="product__indicator--4 arrows_style owl-carousel owl-theme">
                            <!-- Start Single Product -->

                            @foreach ($all_product as $k => $product)
                            @php
                                $rev = App\Review::where('product_id', $product->id)->get();
                                $review_count = App\Review::where('product_id', $product->id)->count();
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
                            @if ($k % 2 == 0)
                                <div class="single__product">
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="product product__style--3">
                                                <div class="product__thumb">
                                                    <a class="first__img" href="{{url('/single/product')}}/{{ $product->slug }}"><img src="/{{$product->product_image}}" alt="product image"></a>
                                                    <a class="second__img animation1" href="{{url('/single/product')}}/{{ $product->slug }}"><img src="{{$product->product_image}}" alt="product image"></a>
                                                    <div class="hot__box">
                                                        <span class="hot-label">BEST SALER</span>
                                                    </div>
                                                </div>
                                                <div class="product__content content--center content--center">
                                                    <h4><a href="single-product.html">{{$product->product_name}}</a></h4>
                                                    <ul class="prize d-flex">
                                                        <li>${{$product->product_price}}</li>
                                                        {{-- <li class="old_prize">$35.00</li> --}}
                                                    </ul>
                                                    <div class="action">
                                                        <div class="actions_inner">
                                                            <ul class="add_to_links">
                                                                <li><a class="cart" href="{{url('cart')}}/{{$product->id}}"><i class="bi bi-shopping-bag4"></i></a></li>
                                                                <li><a class="wishlist" href="{{url('/single/product')}}/{{ $product->slug }}"><i class="bi bi-shopping-cart-full"></i></a></li>
                                                                <li><a class="compare" href="{{url('/single/product')}}/{{ $product->slug }}"><i class="bi bi-heart-beat"></i></a></li>

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
                                        </div>

                                    @else
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                            <div class="product product__style--3">
                                                <div class="product__thumb">
                                                    <a class="first__img" href="{{url('/single/product')}}/{{ $product->slug }}"><img src="/{{$product->product_image}}" alt="product image"></a>
                                                    <a class="second__img animation1" href="{{url('/single/product')}}/{{ $product->slug }}"><img src="{{url($product->product_image)}}" alt="product image"></a>
                                                    <div class="hot__box">
                                                        <span class="hot-label">BEST SALER</span>
                                                    </div>
                                                </div>
                                                <div class="product__content content--center content--center">
                                                    <h4><a href="single-product.html">{{$product->product_name}}</a></h4>
                                                    <ul class="prize d-flex">
                                                        <li>${{$product->product_price}}</li>
                                                        {{-- <li class="old_prize">$35.00</li> --}}
                                                    </ul>
                                                    <div class="action">
                                                        <div class="actions_inner">
                                                            <ul class="add_to_links">
                                                                <li><a class="cart" href="{{url('cart')}}/{{$product->id}}"><i class="bi bi-shopping-bag4"></i></a></li>
                                                                <li><a class="wishlist" href="{{url('/single/product')}}/{{ $product->slug }}"><i class="bi bi-shopping-cart-full"></i></a></li>
                                                                <li><a class="compare" href="{{url('/single/product')}}/{{ $product->slug }}"><i class="bi bi-heart-beat"></i></a></li>

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
                                        </div>
                                    </div>
                                    @endif
                                @endforeach

								<!-- Start Single Product -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Start BEst Seller Area -->
		<!-- Start Recent Post Area -->
		<section class="wn__recent__post bg--gray ptb--80">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">Our <span class="color--theme">Blog</span></h2>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
						</div>
					</div>
				</div>
				<div class="row mt--50">
					<div class="col-md-6 col-lg-4 col-sm-12">
						<div class="post__itam">
							<div class="content">
								<h3><a href="blog-details.html">International activities of the Frankfurt Book </a></h3>
								<p>We are proud to announce the very first the edition of the frankfurt news.We are proud to announce the very first of  edition of the fault frankfurt news for us.</p>
								<div class="post__time">
									<span class="day">Dec 06, 18</span>
									<div class="post-meta">
										<ul>
											<li><a href="#"><i class="bi bi-love"></i>72</a></li>
											<li><a href="#"><i class="bi bi-chat-bubble"></i>27</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 col-sm-12">
						<div class="post__itam">
							<div class="content">
								<h3><a href="blog-details.html">Reading has a signficant info  number of benefits</a></h3>
								<p>Find all the information you need to ensure your experience.Find all the information you need to ensure your experience . Find all the information you of.</p>
								<div class="post__time">
									<span class="day">Mar 08, 18</span>
									<div class="post-meta">
										<ul>
											<li><a href="#"><i class="bi bi-love"></i>72</a></li>
											<li><a href="#"><i class="bi bi-chat-bubble"></i>27</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 col-sm-12">
						<div class="post__itam">
							<div class="content">
								<h3><a href="blog-details.html">The London Book Fair is to be packed with exciting </a></h3>
								<p>The London Book Fair is the global area inon marketplace for rights negotiation.The year  London Book Fair is the global area inon forg marketplace for rights.</p>
								<div class="post__time">
									<span class="day">Nov 11, 18</span>
									<div class="post-meta">
										<ul>
											<li><a href="#"><i class="bi bi-love"></i>72</a></li>
											<li><a href="#"><i class="bi bi-chat-bubble"></i>27</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Recent Post Area -->
		<!-- Best Sale Area -->
		<section class="best-seel-area pt--80 pb--60">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center pb--50">
							<h2 class="title__be--2">Best <span class="color--theme">Seller </span></h2>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
						</div>
					</div>
				</div>
			</div>
			<div class="slider center">
                <!-- Single product start -->
                @foreach ($new_product as $item)

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

				<div class="product product__style--3">
					<div class="product__thumb">
                    <a class="first__img" href="{{url('/single/product')}}/{{ $item->slug }}"><img src="{{$item->product_image}}" alt="product image"></a>
					</div>
					<div class="product__content content--center">
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
				<!-- Single product end -->


			</div>
		</section>
		<!-- Best Sale Area Area -->
@endsection
