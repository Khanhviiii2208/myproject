@extends('client.layouts.layout')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('client_assets/styles/bootstrap4/bootstrap.min.css') }}" />
    <link href="{{ asset('client_assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('client_assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client_assets/plugins/OwlCarousel2-2.2.1/animate.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('client_assets/plugins/jquery.mb.YTPlayer-3.1.12/jquery.mb.YTPlayer.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client_assets/styles/main_styles.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client_assets/styles/responsive.css') }}" />
@endpush

@section('content')
    <!-- Home -->

    <div class="home">
        <!-- Home Slider -->

        <div class="home_slider_container">
            <div class="owl-carousel owl-theme home_slider">
                @foreach ($tin_slider as $item )
                <div class="owl-item">
                    <div class="home_slider_background kv-3"
                        style="
                                    background-image: url({{$item->thumbnail}});
                                ">
                    </div>
                    <div class="home_slider_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_slider_content">
                                        <div class="home_slider_item_category trans_200">
                                           
                                            @if ($item->categories->isNotEmpty())
                                                <a href="{{ route('cate_article', $item->categories->first()->slug) }}.html" class="trans_200">{{$item->categories->first()->name}}</a>
                                            @endif
                                            {{-- <a href="" class="trans_200">{{ route('cate_article',$item->categories->first()->name) }}.html</a> --}}
                                        </div>
                                        <div class="home_slider_item_title">
                                            <a href="{{ route('article_detail', $item->slug) }}.html">{{ $item->name ?? '' }}</a>
                                        </div>
                                        <div class="home_slider_item_link">
                                            <a href="{{ route('article_detail', $item->slug) }}.html" class="trans_200">Tiếp tục đọc
                                                <svg version="1.1" id="link_arrow_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    width="19px" height="13px" viewBox="0 0 19 13"
                                                    enable-background="new 0 0 19 13" xml:space="preserve">
                                                    <polygon fill="#FFFFFF"
                                                        points="12.475,0 11.061,0 17.081,6.021 0,6.021 0,7.021 17.038,7.021 11.06,13 12.474,13 18.974,6.5 " />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Similar Posts -->
                    <div class="similar_posts_container">
                        <div class="container">
                            <div class="row d-flex flex-row align-items-end">
                                <!-- Similar Post -->

                                @foreach ($tin_hot as $item)
                                    <div class="col-lg-3 col-md-6 similar_post_col">
                                        <div class="similar_post trans_200">
                                            <a href="{{ route('article_detail', $item->slug) }}.html">{{ $item->name ?? '' }}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="home_slider_next_container">
                            <div class="home_slider_next "                            
                                style="
                                            background-image: url({{$tin_hot->first()->thumbnail}});
                                            background-size: cover;
                                        ">
                                <div class="home_slider_next_background trans_400"></div>
                                <div class="home_slider_next_content trans_400 kv-4">
                                    <div class="home_slider_next_title">
                                        <p>TIN HOT</p>
                                    </div>
                                    <div class="home_slider_next_link">
                                        <a href="{{ route('article_detail', $tin_hot->first()->slug) }}.html"> {{$tin_hot->first()->name}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
                @endforeach
             
            </div>

            <div class="custom_nav_container home_slider_nav_container">
                <div class="custom_prev custom_prev_home_slider">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        x="0px" y="0px" width="7px" height="12px" viewBox="0 0 7 12"
                        enable-background="new 0 0 7 12" xml:space="preserve">
                        <polyline fill="#FFFFFF"
                            points="0,5.61 5.609,0 7,0 7,1.438 2.438,6 7,10.563 7,12 5.609,12 -0.002,6.39 " />
                    </svg>
                </div>
                <ul id="custom_dots" class="custom_dots custom_dots_home_slider">
                    <li class="custom_dot custom_dot_home_slider active">
                        <span></span>
                    </li>
                    <li class="custom_dot custom_dot_home_slider">
                        <span></span>
                    </li>
                    <li class="custom_dot custom_dot_home_slider">
                        <span></span>
                    </li>
                </ul>
                <div class="custom_next custom_next_home_slider">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        x="0px" y="0px" width="7px" height="12px" viewBox="0 0 7 12"
                        enable-background="new 0 0 7 12" xml:space="preserve">
                        <polyline fill="#FFFFFF"
                            points="6.998,6.39 1.389,12 -0.002,12 -0.002,10.562 4.561,6 -0.002,1.438 -0.002,0 1.389,0 7,5.61 " />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->

    <div class="page_content">
        <div class="container">
            <div class="row row-lg-eq-height">
                <!-- Main Content -->

                <div class="col-lg-9">
                    <div class="section_title">
                        Tin mới nhất
                    </div>
                    <div class="section_content">
                        <div class="clearfix">
                            @foreach ($tinmoinhat as $item)
                            <div class="card card_small_with_image grid-item m-2 kv-2">
                                <a href="{{ route('article_detail', $item->slug) }}.html">
                                    <img class="card-img-top" src="{{ $item->thumbnail ?? '' }}" alt="" /></a>
                                <div class="card-body">
                                    <div class="card-title card-title-small">
                                        <a href="{{ route('article_detail', $item->slug) }}.html" data-toggle="tooltip" data-placement="bottom" title="{{$item->name}}">{{ $item->name ?? '' }}</a>
                                    </div>
                                    <small class="post_meta ">
                                        <a href="#">{{ $item->user->name }}</a><span>{{ $item->created_at->format('M j, Y') ?? '' }}</span>
                                        <p class="float-right text-muted"><i class="bi bi-eye-fill"> {{$item->views}} </i></p>
                                    </small>
                                    
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <div class="section_title">
                        Đừng bỏ lỡ
                    </div>
                    <div class="section_content">
                        <div class="clearfix">
                            @foreach ($tinrandom as $item)
                                <div class="card card_small_with_image grid-item m-2 kv-2">
                                    <a href="{{ route('article_detail', $item->slug) }}.html">
                                        <img class="card-img-top" src="{{ $item->thumbnail ?? '' }}" alt="" /></a>
                                    <div class="card-body">
                                        <div class="card-title card-title-small">
                                            <a href="{{ route('article_detail', $item->slug) }}.html" data-toggle="tooltip" data-placement="bottom" title="{{$item->name}}">{{ $item->name ?? '' }}</a>
                                        </div>
                                        <small class="post_meta"><a
                                                href="#">{{ $item->user->name }}</a><span>{{ $item->created_at->format('M j, Y') ?? '' }}</span>
                                                <p class="float-right text-muted"><i class="bi bi-eye-fill"> {{$item->views}} </i></p>
                                            </small>
                                    
                                            </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="section_title">
                        Tin xem nhiều
                    </div>
                    <div class="section_content">
                        <div class="clearfix">
                        @foreach ($tinxemnhieu as $item)
                            <div class="card card_small_with_image grid-item m-2 kv-2">
                                <a href="{{ route('article_detail', $item->slug) }}.html">
                                    <img class="card-img-top" src="{{ $item->thumbnail ?? '' }}" alt="" /></a>
                                <div class="card-body">
                                    <div class="card-title card-title-small">
                                        <a href="{{ route('article_detail', $item->slug) }}.html" data-toggle="tooltip" data-placement="bottom" title="{{$item->name}}">{{ $item->name ?? '' }}</a>
                                    </div>
                                    <small class="post_meta"><a
                                            href="#">{{ $item->user->name }}</a><span>{{ $item->created_at->format('M j, Y') ?? '' }}</span>
                                            <p class="float-right text-muted"><i class="bi bi-eye-fill"> {{$item->views}} </i></p>
                                        </small>
                                </div>
                            </div>
                        @endforeach
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
                        <div class="sidebar_section">
                            <div class="advertising">
                                <div class="advertising_background"
                                    style="background-image: url({{$tinrandom->first()->thumbnail}})">
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
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('client_assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('client_assets/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('client_assets/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('client_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('client_assets/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('client_assets/plugins/masonry/masonry.js') }}"></script>
    <script src="{{ asset('client_assets/plugins/masonry/images_loaded.js') }}"></script>
    <script src="{{ asset('client_assets/plugins/jquery.mb.YTPlayer-3.1.12/jquery.mb.YTPlayer.js') }}"></script>
    <script src="{{ asset('client_assets/js/custom.js') }}"></script>
@endpush
