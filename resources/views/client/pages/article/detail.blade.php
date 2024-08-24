@extends('client.layouts.layout')
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('client_assets/styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{ asset('client_assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('client_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('client_assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('client_assets/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('client_assets/plugins/jquery.mb.YTPlayer-3.1.12/jquery.mb.YTPlayer.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('client_assets/styles/post.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('client_assets/styles/post_responsive.css') }}">
@endpush

@section('content')

<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src=""
       ><img class='kv-1' src="{{ $post->thumbnail }}" alt=""></div>
    <div class="home_content">
        <div class="post_category trans_200"><a href="{{ route('cate_article',$post->categories->first()->slug) }}.html" class="trans_200">{{ $post->categories->first()->name }}</a></div>
        <div class="post_title">{{$post->name}}
        </div>
        <div class="post_info"><p><i class="bi bi-eye-fill text-light"> {{$post->views}} </i></p></div>
    </div>
</div>

<!-- Page Content -->

<div class="page_content">
    <div class="container">
        <div class="row row-lg-eq-height">

            <!-- Post Content -->

            <div class="col-lg-9">
                <div class="post_content">

                    <!-- Top Panel -->
                    <div class="post_panel post_panel_top d-flex flex-row align-items-center justify-content-start">
                        <div class="author_image">
                            <div><img src="https://ui-avatars.com/api/?name={{$post->user->name}}&background=random" alt=""></div>
                        </div>
                        <div class="post_meta"><a href="#">{{$post->user->name}}</a><span>{{$post->created_at->format('M j, Y \a\t g:i a') ?? ''}}</span></div>
                        <div class="post_share ml-sm-auto">
                            <span>share</span>
                            <ul class="post_share_list">
                                <li class="post_share_item"><a href="#"><i class="fa fa-facebook"
                                            aria-hidden="true"></i></a></li>
                                <li class="post_share_item"><a href="#"><i class="fa fa-twitter"
                                            aria-hidden="true"></i></a></li>
                                <li class="post_share_item"><a href="#"><i class="fa fa-google"
                                            aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Post Body -->

                    <div class="post_body">
                        <p class="post_p">
                            {!! $post->content !!}
                        </p>
                        <div class="post_tags">
                            <ul>
                                @foreach($metaKeywordsArray as $keyword)
                                    <li class="post_tag"><a href="#">{{ $keyword['value'] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Bottom Panel -->
                    <div class="post_panel bottom_panel d-flex flex-row align-items-center justify-content-start">
                        <div class="author_image">
                            <div><img src="https://ui-avatars.com/api/?name={{$post->user->name}}&background=random" alt=""></div>
                        </div>
                        <div class="post_meta"><a href="#">{{$post->user->name}}</a><span>{{$post->created_at->format('M j, Y \a\t g:i a') ?? ''}}</span></div>
                        <div class="post_share ml-sm-auto">
                            <span>share</span>
                            <ul class="post_share_list">
                                <li class="post_share_item"><a href="#"><i class="fa fa-facebook"
                                            aria-hidden="true"></i></a></li>
                                <li class="post_share_item"><a href="#"><i class="fa fa-twitter"
                                            aria-hidden="true"></i></a></li>
                                <li class="post_share_item"><a href="#"><i class="fa fa-google"
                                            aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Similar Posts -->
                    <div class="similar_posts">
                        <div class="grid clearfix">

                            <!-- Small Card With Image -->
                            @foreach ($post_related->posts as $item )
                            @continue ($item->status !== 'accept')
                            <div class="card card_small_with_image grid-item kv-2">
                                <a href="{{ route('article_detail',$item->slug)}}.html">
                                    <img  
                                    class="card-img-top"
                                    src="{{$item->thumbnail ?? ''}}"
                                    alt=""
                                  /></a>
                                <div class="card-body">
                                    <div class="card-title card-title-small">
                                        <a href="{{ route('article_detail', $item->slug) }}.html">{{ $item->name ?? '' }}</a>
                                    </div>
                                    <small class="post_meta"><a
                                        href="#">{{ $item->user->name }}</a><span>{{ $item->created_at->format('M j, Y') ?? '' }}</span>
                                        <p class="float-right text-muted"><i class="bi bi-eye-fill"> {{$item->views}} </i></p>
                                    </small>
                                </div>
                            </div>
                            @endforeach
                          

                        </div>

                        <!-- Đăng bình luận -->
                      @auth
                        <div class="post_comment">
                            <div class="post_comment_title">Đăng bình luận</div>
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="post_comment_form_container">
                                        <form action="{{ route('comment') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ Auth()->user()->id}}">
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <textarea name="content" class="comment_text" placeholder="Nhập bình luận">{{ old('content') }}</textarea>
                                                @if ($errors->has('content'))
                                                    <div class="alert alert-danger">
                                                        {{ $errors->first('content') }}
                                                    </div>
                                                @endif
                                            <button type="submit" class="comment_button">Đăng bình luận</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                      @endauth
                        <!-- Comments -->
                        <div class="comments">
                            <div class="comments_title">Bình luận <span>
                                {{ count($post->comments) }}</span></div>
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="comments_container">
                                        <ul class="comment_list">
                                            <li class="comment">
                                                @foreach ($post->comments->where('parent_id', null) as $comment)
                                                @include('client.pages.article.components.comment')
                                                @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->

           
            <div class="col-lg-3">
                <div class="sidebar">
                    <div class="sidebar_background"></div>

                    <!-- Top Stories -->

                    <div class="sidebar_section">
                        <div class="sidebar_title_container">
                            <div class="sidebar_title">
                                HOT
                            </div>
                        </div>
                        <div class="sidebar_section_content">
                            <!-- Top Stories Slider -->
                            <div class="sidebar_slider_container">
                                <div class="owl-carousel owl-theme sidebar_slider_top">
                                    <!-- Top Stories Slider Item -->
                                    <div class="owl-item">
                                        <!-- Sidebar Post -->
                                        @foreach ($tin_hot as $item)
                                        <div class="side_post">
                                            <a href="{{ route('article_detail', $item->slug) }}.html">
                                                <div
                                                    class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
                                                    <div class="side_post_image">
                                                        <div>
                                                            <img src="{{ $item->thumbnail ?? '' }}"
                                                                alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="side_post_content">
                                                        <div class="side_post_title">
                                                           {{ $item->name }}
                                                        </div>
                                                        <small class="post_meta">{{ $item->user->name }}<span>{{ $item->created_at->format('M j, Y') ?? ''}}</span></small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        @endforeach
                                       
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Advertising -->

                    <div class="sidebar_section">
                        <div class="advertising">
                            <div class="advertising_background"
                                style="
                                            background-image: url({{$tinrandom->first()->thumbnail}});
                                        ">
                            </div>
                            <div class="advertising_content d-flex flex-column align-items-start justify-content-end">
                                <div class="advertising_perc">
                                    {{$tinrandom->first()->user->name}}
                                </div>
                                <div class="advertising_link">
                                    <a href="{{ route('article_detail', $tinrandom->first()->slug) }}.html"> {{$tinrandom->first()->name}}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Newest Videos -->

                    <div class="sidebar_section newest_videos">
                        <div class="sidebar_title_container">
                            <div class="sidebar_title">
                                Danh mục
                            </div>
                            <div class="sidebar_slider_nav">
                                <div class="custom_nav_container sidebar_slider_nav_container">
                                    <div class="custom_prev custom_prev_vid">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="7px"
                                            height="12px" viewBox="0 0 7 12" enable-background="new 0 0 7 12"
                                            xml:space="preserve">
                                            <polyline fill="#bebebe"
                                                points="0,5.61 5.609,0 7,0 7,1.438 2.438,6 7,10.563 7,12 5.609,12 -0.002,6.39 " />
                                        </svg>
                                    </div>
                                    <ul id="custom_dots" class="custom_dots custom_dots_vid">
                                        <li class="custom_dot custom_dot_vid active">
                                            <span></span>
                                        </li>
                                        <li class="custom_dot custom_dot_vid">
                                            <span></span>
                                        </li>
                                        <li class="custom_dot custom_dot_vid">
                                            <span></span>
                                        </li>
                                    </ul>
                                    <div class="custom_next custom_next_vid">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="7px"
                                            height="12px" viewBox="0 0 7 12" enable-background="new 0 0 7 12"
                                            xml:space="preserve">
                                            <polyline fill="#bebebe"
                                                points="6.998,6.39 1.389,12 -0.002,12 -0.002,10.562 4.561,6 -0.002,1.438 -0.002,0 1.389,0 7,5.61 " />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar_section_content">
                            <!-- Sidebar Slider -->
                            <div class="sidebar_slider_container">
                                <div class="owl-carousel owl-theme sidebar_slider_vid">
                                    <!-- Newest Videos Slider Item -->
                                    @foreach ($categoriesPerPage as $categories)
                                        <div class="owl-item">
                                            @foreach ($categories as $category)
                                                <div class="side_post">
                                                    <a href="{{ route('cate_article', $category->slug) }}.html">
                                                        <div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
                                                            <div class="side_post_content">
                                                                <div class="side_post_title">
                                                                    {{ $category->name }}
                                                                    <small class="post_meta">{{$category->created_at}}</small>                                                                        </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Advertising 2 -->

                    <div class="sidebar_section">
                        <div class="advertising_2">
                            <div class="advertising_background"
                                style="
                                            background-image: url(client_assets/images/post_18.jpg);
                                        ">
                            </div>
                            <div
                                class="advertising_2_content d-flex flex-column align-items-center justify-content-center">
                                <div class="advertising_2_link">
                                    <a href="">Quay lại đầu trang
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Future Events -->

                    <div class="sidebar_section future_events">
                        <div class="sidebar_title_container">
                            <div class="sidebar_title">
                                Tin cho bạn
                            </div>
                        </div>
                        <div class="sidebar_section_content">
                            <!-- Sidebar Slider -->
                            <div class="sidebar_slider_container">
                                <div class="owl-carousel owl-theme sidebar_slider_events">
                                    <!-- Future Events Slider Item -->
                                    <div class="owl-item">
                                        <!-- Future Events Post -->
                                        @foreach ($tinchoban as $item )
                                        <div class="side_post">                                                
                                            <a href="{{ route('article_detail', $item->slug) }}.html">
                                                <div
                                                    class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
                                                    <div
                                                        class="event_date d-flex flex-column align-items-center justify-content-center">
                                                        <div class="event_day">
                                                            {{$item->created_at->format('d')}}
                                                        </div>
                                                        <div class="event_month">
                                                            {{$item->created_at->format('m')}}
                                                        </div>
                                                    </div>
                                                    <div class="side_post_content">
                                                        <div class="side_post_title">
                                                           {{$item->name}}
                                                        </div>
                                                        <small class="post_meta">{{ $item->user->name }}</small>
                                                    </div>
                                                </div>
                                            </a>                                                
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('client_assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('client_assets/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('client_assets/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('client_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('client_assets/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('client_assets/plugins/masonry/masonry.js') }}"></script>
<script src="{{ asset('client_assets/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('client_assets/js/post.js') }}"></script>
@endpush