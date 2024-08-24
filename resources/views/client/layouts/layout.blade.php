<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.components.head')
    <style>
        .kv-1 {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: blur(5px) brightness(0.8) contrast(1.2);
        }
        .kv-2>a>img{
            width:265px !important;
            height:147px !important; 
            object-fit: cover !important;
        }
        .kv-2 .card-title{
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1; /* Giới hạn số dòng là 2 */
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .kv-3 {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter:brightness(0.8) ;
        }
        .kv-4 a {
            font-size: 20px; 
            color: #f8f9fa; 
            text-decoration: none; 
            transition: background-color 0.3s ease, color 0.3s ease; 
            text-shadow: 0px 4px 8px white;
            font-family: 'Ubuntu', sans-serif;
        }
        .kv-4 a:hover {
            color: #ffffff; 
        }
        .kv-4 p {
            font-size: 25px;
            color: rgb(255, 255, 255);
            text-shadow: 0px 4px 8px white;
            border-radius: 10px;
            font-family: 'Ubuntu', sans-serif;
        }
        .kv-5{
            margin: 30px;
            font-size: 25px;
            color: black;
        }
    </style>
    @stack('styles')
</head>

<body>

    <div class="super_container">

        @include('client.layouts.components.header')

        @include('client.layouts.components.menu')
        
        @yield('content')

        @include('client.layouts.components.footer')
    </div>
        @stack('scripts')

</body>

</html>