
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col">
                <div
                    class="header_content d-flex flex-row align-items-center justify-content-start"
                >
                    <div class="logo"><a href="{{ route('home')}}">vankih</a></div>
                    <nav class="main_nav">
                        <ul>
                            <li class="active">
                                <a href="{{ route('home')}}">Trang chủ</a>
                            </li>
                            <li><a href="{{ route('category')}}">Danh mục</a></li>
                            <li>
                                <a href="{{route('contact')}}">Liên hệ</a>
                            </li>
                            <li><a href="">Xin chào, {{Auth::user()->name}}</a></li>
                            <li><a href="{{ route('logout')}}">Đăng xuất</a></li>
                        </ul>
                    </nav>
                    <div class="search_container ml-auto">
                        <div class="weather">
                            <div class="temperature">+10°</div>
                            <img
                                class="weather_icon"
                                src="client_assets/images/cloud.png"
                                alt=""
                            />
                        </div>
                        <form action="{{ route('search_article') }}" method="get">
                            <input
                                type="search"
                                name="search"
                                class="header_search_input"
                                required="required"
                                placeholder="Tìm kiếm..."
                            />
                            <img
                                class="header_search_icon"
                                src="client_assets/images/search.png"
                                alt=""
                            />
                        </form>
                    </div>
                    <div class="hamburger ml-auto menu_mm">
                        <i
                            class="fa fa-bars trans_200 menu_mm"
                            aria-hidden="true"
                        ></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>