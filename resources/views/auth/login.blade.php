@extends('template.master')

@section('content')
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
                    <h2 class="bradcaump-title">User Login</h2>
                    <nav class="bradcaump-content">
                      <a class="breadcrumb_item" href="index.html">Home</a>
                      <span class="brd-separetor">/</span>
                      <span class="breadcrumb_item active">User Login</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .navbar-light .navbar-nav .nav-link {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: 2px solid #333;
        box-shadow: none;
        color: #333;
        display: inline-block;
        font-family: Poppins,Arial,Helvetica,sans-serif;
        font-size: 12px;
        font-weight: 700;
        line-height: 34px;
        padding: 2px 20px 0;
        text-shadow: none;
        text-transform: uppercase;
        transition: all 0.4s ease 0s;
    }
    .navbar-light .navbar-nav .nav-link:hover {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border-color: #e59285;
        color: #e59285;
    }
    </style>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 col-12 ">
            <div class="contact-form-wrap">
                <div id="app">
                    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                        <div class="container">

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">


                                <ul class="navbar-nav ml-auto">
                                    @guest
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else

                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <h2 class="contact__title">User Login</h2>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="single-contact-form space-between">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="User Email*">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="single-contact-form">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="User Password*">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-0" style="margin-left: 20px;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="contact-btn mb-5">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
