<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Home | Hacksaw Responsive Bootstrap4 Template</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="{{url('template')}}/images/p1.png">
	<link rel="apple-touch-icon" href="{{url('template')}}/images/icon.png">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{url('template')}}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{url('template')}}/css/plugins.css">
	<link rel="stylesheet" href="{{url('template')}}/css/style.css">

	<!-- Cusom css -->
   <link rel="stylesheet" href="{{url('template')}}/css/custom.css">

	<!-- Modernizer js -->
	<script src="{{url('template')}}/js/vendor/modernizr-3.5.0.min.js"></script>
</head>
<body>
	{{-- [if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="//browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif] --}}

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
		<header id="wn__header" class="header__area header__absolute sticky__header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<div class="logo">
							<a href="{{url('/')}} ">
								<img src="{{url('template')}}/images/logo/hack5.png" alt="logo images">
							</a>
						</div>
					</div>
					<div class="col-lg-8 d-none d-lg-block">
						<nav class="mainmenu__nav">
							<ul class="meninmenu d-flex justify-content-start">
								<li class="drop with--one--item"><a href="{{url('/')}}">Home</a></li>
								<li class="drop"><a href="{{url('shop')}}">Shop</a></li>
								<li class="drop"><a href="{{url('blog')}}">Blog</a></li>
								<li><a href="//shamimdewan.xyz/" target="_blank">Contact</a></li>
							</ul>
						</nav>
					</div>
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
							<li class="shop_search"><a class="search__active" style="background: rgba(0, 0, 0, 0) url({{ url('template')}}/images/icons/search.png) no-repeat scroll 0 center;" href="#"></a></li>
                            <li class="wishlist"><a href="#" style="background: rgba(0, 0, 0, 0) url({{ url('template')}}/images/icons/button-wishlist.png) no-repeat scroll 0 center;"></a></li>
                            @php
                                $MAC = exec('getmac');
                                $MAC = strtok($MAC, ' ');

                                $ayesh = App\Cart::where('visitor_ip', request()->ip())->get();
                                $total = 0;
                                foreach ($ayesh as $value) {
                                    $total += ($value->get_product->product_price * $value->quantity);
                                }

                            @endphp
                        <li class="shopcart">
							<a class="cartbox_active" style="background: rgba(0, 0, 0, 0) url({{ url('template')}}/images/icons/cart.png) no-repeat scroll 0 center;" href="#"><span class="product_qun">{{App\Cart::where('visitor_ip', request()->ip())->count()}}</span></a>
								<!-- Start Shopping Cart -->
								<div class="block-minicart minicart__active">
									<div class="minicart-content-wrapper">
										<div class="micart__close">
											<span>close</span>
										</div>
										<div class="items-total d-flex justify-content-between">
                                            <span>{{App\Cart::where('visitor_ip', request()->ip())->count()}}
                                                @if (App\Cart::where('visitor_ip', request()->ip())->count() > 1)
                                                    {{ 'Items Selected' }}
                                                @elseif(App\Cart::where('visitor_ip', request()->ip())->count() == 1)
                                                    {{ 'Item Selected' }}
                                                @else
                                                    {{ 'No Item Selected!!!'}}
                                                @endif
                                            </span>
											<span>Cart Subtotal</span>
										</div>
										<div class="total_amount text-right">
                                        <span>${{ $total }}</span>
										</div>
										<div class="mini_action checkout">
											<a class="checkout__btn" href="{{url('checkout')}} ">Go to Checkout</a>
                                        </div>
                                        <style>
                                            .signle_item_w{
                                                max-height: 20rem!important;
                                                overflow-x: auto!important;
                                                padding-left: 20px;
                                                padding-right: 20px;
                                            }
                                        </style>
                                    <div class="signle_item_w">
                                        @foreach (App\Cart::where('visitor_ip', request()->ip())->get() as $item)
										<div class="single__items">
                                            <div class="miniproduct">
                                                <div class="item01 d-flex">
													<div class="thumb">
														<a href="{{url('single/product')}}/{{$item->get_product->slug}}"><img src="{{url($item->get_product->product_image)}}" alt="product images"></a>
													</div>
													<div class="content">
                                                        <h6><a href="{{url('single/product')}}/{{$item->get_product->slug}}">{{$item->get_product->product_name}} </a></h6>
														<span class="prize">${{$item->get_product->product_price}}</span>
														<div class="product_prize d-flex justify-content-between">
															<span class="qun">Qty: {{$item->quantity}}</span>
															<ul class="d-flex justify-content-end">
																{{-- <li><a href="#"><i class="zmdi zmdi-settings"></i></a></li> --}}
                                                            <li><a href="{{url('delete/cart')}}/{{$item->id}}"><i class="zmdi zmdi-delete"></i></a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
                                        @endforeach
                                    </div>
										<div class="mini_action cart">
											<a class="cart__btn" href="{{url('shopping-cart')}}">View and edit cart</a>
										</div>
									</div>
								</div>
								<!-- End Shopping Cart -->
							</li>
							<li class="setting__bar__icon" ><a style="background: rgba(0, 0, 0, 0) url({{ url('template')}}/images/icons/icon_setting.png) no-repeat scroll 0 center;" class="setting__active" href="#"></a>
								<div class="searchbar__content setting__block">
									<div class="content-inner">

										<div class="switcher-currency">
											<strong class="label switcher-label">
												<span>My Account</span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<div class="setting__menu">
														<span><a href="#">My Account</a></span>
                                                        <span><a href="#">My Wishlist</a></span>
                                                        @guest
                                                        <span><a href="{{url('register') }}">Sign In</a></span>
                                                        @else
                                                       <span>
                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                    </a>
                                                        </span>


                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                        @endguest
														<span><a href="#">Create An Account</a></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!-- Start Mobile Menu -->
				<div class="row d-none">
					<div class="col-lg-12 d-none">
						<nav class="mobilemenu__nav">
							<ul class="meninmenu">
								<li><a href="index.html">Home</a></li>
								<li><a href="shop.html">Shop</a></li>
								<li><a href="blog.html">Blog</a></li>
								<li><a href="contact.html">Contact</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- End Mobile Menu -->
	            <div class="mobile-menu d-block d-lg-none">
	            </div>
	            <!-- Mobile Menu -->
			</div>
		</header>
        <!-- //Header -->

        @yield('content')

        @component('includes.footer')

        @endcomponent

	</div>
	<!-- //Main wrapper -->

	<!-- JS Files -->
	<script src="{{url('template')}}/js/vendor/jquery-3.2.1.min.js"></script>
	<script src="{{url('template')}}/js/popper.min.js"></script>
	<script src="{{url('template')}}/js/bootstrap.min.js"></script>
	<script src="{{url('template')}}/js/plugins.js"></script>
    <script src="{{url('template')}}/js/active.js"></script>
    @yield('footer_js')

</body>
</html>
