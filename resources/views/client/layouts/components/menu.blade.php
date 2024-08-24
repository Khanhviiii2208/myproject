<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
    <div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
    <div class="logo menu_mm"><a href="#">vankih</a></div>
    <div class="search">
        <form action="#">
            <input type="search" class="header_search_input menu_mm" required="required" placeholder="Tìm kiếm...">
            <img class="header_search_icon menu_mm" src="client_assets/images/search_2.png" alt="">
        </form>
    </div>
    <nav class="menu_nav">
        <ul class="menu_mm">
            <li class="menu_mm"><a href="{{ route('home')}}">Trang chủ</a></li>
            <li class="menu_mm"><a href="{{ route('category')}}">Danh mục</a></li>
            <li class="menu_mm"><a href="{{route('contact')}}">Liên hệ</a></li>
            <li class="menu_mm"><a href="{{ route('logout')}}">Đăng xuất</a></li>
        </ul>
    </nav>
</div>
