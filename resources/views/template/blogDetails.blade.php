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
<div class="ht__bradcaump__area bg-image--6" style="background-image: url({{url('template')}}/images/bg/blog.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bradcaump__inner text-center">
                    <h2 class="bradcaump-title">Blog Details</h2>
                    <nav class="bradcaump-content">
                        <a class="breadcrumb_item" href="index.html">Home</a>
                        <span class="brd-separetor">/</span>
                        <span class="breadcrumb_item active">Blog-Details</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .blog-details .comment_respond .comment__form .submite__btn .asdf {
        background: #e59285 none repeat scroll 0 0;
        color: #fff;
        display: inline-block;
        font-size: 12px;
        font-weight: 700;
        padding: 12px 30px 8px;
        text-shadow: none;
        text-transform: uppercase;
        transition: all 0.4s ease 0s;
        border: none;
    }
    .blog-details .comment_respond .comment__form .submite__btn a:hover {
            background: #000 none repeat scroll 0 0;
            color: #fff;
        }
        .reply{
            background: #e59285 none repeat scroll 0 0;
        color: #fff;
        display: inline-block;
        font-size: 12px;
        font-weight: 700;
        padding: 12px 30px 8px;
        text-shadow: none;
        text-transform: uppercase;
        transition: all 0.4s ease 0s;
        border: none;
        }
        .reply:hover{
            background: #000 none repeat scroll 0 0;
            color: #fff;
        }
    </style>
<!-- End Bradcaump area -->
<div class="page-blog-details section-padding--lg bg--white">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="blog-details content">
                        <article class="blog-post-details">
                            <div class="post-thumbnail">
                                <img src="{{url($single_wiew->blog_image)}}" alt="blog images">
                            </div>
                            <div class="post_wrapper">
                                <div class="post_header">
                                    <h2>{{$single_wiew->blog_title}}</h2>
                                    <div class="blog-date-categori">
                                        <ul>
                                            <li>{{$single_wiew->created_at->format('M-d-Y')}}</li>
                                            <li><a href="" title="Posts by boighor" rel="author">Shamim Dewan</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post_content">
                                    <p>{!! $single_wiew->blog_details !!}</p>



                                </div>
                            </div>
                        </article>
                        <div class="comments_area">
                            <h3 class="comment__title">{{$post_count}} comment</h3>
                            <ul class="comment__list">
                                @foreach ($post_get as $item)
                                @php
                                    $reply_get = App\Reply::where('comment_id',$item->id)->get();
                                @endphp

                                <li>

                                    <div class="card">
                                        <h5 class="card-header">
                                            {{-- {{$item->user->name}} --}}
                                            <span class="ml-3" style="font-size:12px;">{{ $item->created_at ? $item->created_at->diffForHumans() : 'N/A' }}</span>
                                        </h5>
                                        <div class="card-body">
                                            <p>{{$item->comment}}</p>


                                            @foreach ($reply_get as $value)

                                            <div class="card ml-5 mt-3">
                                                <div class="card-header">
                                                    {{-- {{$value->user->name}} --}}
                                                    <span class="ml-3" style="font-size:12px;">{{ $value->created_at ? $value->created_at->diffForHumans() : 'N/A' }}</span>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">{{$value->reply}}</p>
                                                </div>
                                            </div>

                                            @endforeach


                                            <button id="reply_button" class="btn btn-outline-success btn-sm mt-3" >Reply</button>

                                            <div class="form-group mt-3" id="form_fild">
                                                <form class="form-group" action="{{url('add/reply')}}" method="POST">
                                                    @csrf
                                                <input type="hidden" name="comment_id" value="{{$item->id}}">
                                                <input type="hidden" name="post_id" value="{{$single_wiew->id}}">
                                                    <div class="input__box">
                                                        <textarea name="reply" class="form-control" placeholder="Your comment here"></textarea>
                                                    </div>
                                                    <div class="submite__btn mt-1">
                                                        <button  type="submit" class="reply">Post Reply</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                      </div>


                                </li>
                                @endforeach

                            </ul>
                        </div>

                        <div class="comment_respond">
                            <h3 class="reply_title">Leave a Reply <small><a href="#">Cancel reply</a></small></h3>



                            <form class="comment__form" action="{{url('add/comment')}}" method="POST">
                                @csrf


                            <input type="hidden" name="post_id" value="{{$single_wiew->id}}">
                                <p>Your email address will not be published.Required fields are marked </p>
                                <div class="input__box">
                                    <textarea name="comment" placeholder="Your comment here"></textarea>
                                </div>
                                <div class="submite__btn">
                                    <button type="submit" class="asdf">Post Comment</button>
                                </div>
                            </form>
                        </div>
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
                            </div>
                        </aside>
                        <!-- End Single Widget -->
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



@endsection
@section('footer_js')
<script>



    $(function() {
                $('#form_fild').hide();
                $('#reply_button').click(function(){
                    if($('#reply_button')) {
                        $('#form_fild').hide();
                        $('#form_fild').slideDown();
                    } else {
                        $('#form_fild').hide();
                    }
                });
            });

</script>
@endsection
