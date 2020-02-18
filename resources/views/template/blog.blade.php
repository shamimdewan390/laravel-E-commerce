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
<div class="ht__bradcaump__area bg-image--4" style="background-image: url({{url('template')}}/images/bg/blog.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Blog Page</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="index.html">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">Blog</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
            <!-- Start Blog Area -->
<div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="blog-page">
                    <div class="page__header">
                        <h2>All Blogs</h2>
                    </div>
                    <!-- Start Single Post -->
                    @foreach ($all_blog as $item)


                    <article class="blog__post d-flex flex-wrap">
                        <div class="thumb">
                            <a href="{{url('blog-details')}}/{{$item->blog_slug}}">
                                <img src="{{$item->blog_image}}" alt="blog images">
                            </a>
                        </div>
                        <div class="content">
                            <h4><a href="{{url('blog-details')}}/{{$item->blog_slug}}">{{$item->blog_title}}</a></h4>
                            <ul class="post__meta">
                                <li>Posts by : <a href="#">road theme</a></li>
                                <li class="post_separator">/</li>
                                <li>{{$item->created_at->format('M-d-Y/ ')}}</li>
                                <li>{{$item->created_at->diffForHumans()}}</li>
                            </ul>
                            <p>{!! $item->blog_details !!}</p>
                            <div class="blog__btn">
                                <a href="{{url('blog-details')}}/{{$item->blog_slug}}">read more</a>
                            </div>
                        </div>
                    </article>
                    @endforeach
                    <style>
                    .page-item.active .page-link {
                        z-index: 2;
                        color: #fff;
                        background-color: #e6a38c;
                        border-color: #d89c82;
                        margin: auto!important;
                    }
                    </style>
                    <div class="m- mt-5">

                        {{ $all_blog->links() }}
                    </div>
                    <!-- End Single Post -->

                </div>
            </div>
            <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                <div class="wn__sidebar">
                    <!-- Start Single Widget -->
                    <aside class="widget search_widget">
                        <h3 class="widget-title">Search</h3>
                        <form action="#">
                            <div class="form-input">
                                <input type="text" placeholder="Search...">
                                <button><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </aside>
                    <!-- End Single Widget -->
                    <!-- Start Single Widget -->
                    <aside class="widget recent_widget">
                        <h3 class="widget-title">Recent</h3>
                        <div class="recent-posts">
                            <ul>
                                @foreach ($lastPost as $item)


                                <li>
                                    <div class="post-wrapper d-flex">
                                        <div class="thumb">
                                            <a href="{{url('blog-details')}}/{{$item->blog_slug}}"><img src="{{$item->blog_image}}" alt="blog images"></a>
                                        </div>
                                        <div class="content">
                                            <h4><a href="{{url('blog-details')}}/{{$item->blog_slug}}">{{Str::words($item->blog_title, 2)}}</a></h4>
                                            <p>	{{$item->created_at->format('M/d/Y')}}</p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                    <!-- End Single Widget -->
                    <!-- Start Single Widget -->
                           <!-- Start Single Widget -->
                        <aside class="widget comment_widget">
                            <h3 class="widget-title">Comments</h3>
                            <ul>
                                @foreach ($lastPost as $item)

                                <li>
                                    <div class="post-wrapper">
                                        <div class="thumb">
                                            <a href="{{url('blog-details')}}/{{$item->blog_slug}}"><img src="{{url($item->blog_image)}}" alt="blog images"></a>
                                        </div>
                                        <div class="content">
                                            <h4><a href="{{url('blog-details')}}/{{$item->blog_slug}}">{{Str::words($item->blog_title, 2)}}</a></h4>
                                            <p>	{{$item->created_at->format('M/d/Y')}}</p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </aside>
                        <!-- End Single Widget -->
                    <!-- End Single Widget -->
                    <!-- Start Single Widget -->
                    <aside class="widget category_widget">
                        <h3 class="widget-title">Categories</h3>
                        <ul>
                            @foreach ($all_category as $item)

                            <li><a target="_blank" href="{{url('/shop')}}/{{$item->id}}">{{ $item->category_name}} <span>( {{ App\Product::where('category_id',$item->id)->count()}} )</span></a></li>
                            @endforeach
                        </ul>
                    </aside>
                    <!-- End Single Widget -->

                </div>
            </div>
        </div>
    </div>
</div>
                <!-- End Blog Area -->


@endsection
