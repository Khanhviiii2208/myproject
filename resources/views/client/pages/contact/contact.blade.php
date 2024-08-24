@extends('client.layouts.layout')
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('client_assets/styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{ asset('client_assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('client_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('client_assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('client_assets/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('client_assets/plugins/jquery.mb.YTPlayer-3.1.12/jquery.mb.YTPlayer.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('client_assets/styles/contact.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('client_assets/styles/contact_responsive.css') }}">
@endpush

@section('content')
<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="client_assets/images/regular.jpg" data-speed="0.8">
    <img src="client_assets/images/regular.jpg" alt="">
</div>
    <div class="home_content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <!-- Post Comment -->
                    <div class="post_comment">
                        <div class="contact_form_container">
                            <form action="#">
                                <input type="text" class="contact_input contact_input_name" placeholder="Tên của bạn" required="required">
                                <input type="email" class="contact_input contact_input_email" placeholder="Email của bạn" required="required">
                                <textarea class="contact_text" placeholder="Tin nhắn của bạn" required="required"></textarea>
                                <button type="submit" class="contact_button">Gửi</button>
                            </form>
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
<script src="{{ asset('client_assets/js/contact.js') }}"></script>
@endpush