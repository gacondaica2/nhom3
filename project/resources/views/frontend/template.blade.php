<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ \Helper::logo_header() }}">
    <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/vendor/fontawesome-stars.min.css">
    <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/vendor/ion-fonts.css">
    <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/plugins/slick.css">
    <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/plugins/animate.css">
    <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/plugins/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/plugins/timecircles.css">
    <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/style.css">
</head>

<body class="template-color-2">
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0&appId=198034284961999&autoLogAppEvents=1" nonce="F2DX7Jts"></script>
    <div class="main-wrapper">
        <header class="main-header_area-2">
            <div class="header-top_area d-none d-lg-block">
                <div class="container">
                    <div class="header-top_nav">
                        <div class="row">
                            <div class="col-lg-6"></div>
                            <div class="col-lg-6">
                                <div class="header-top_right">
                                    <ul>
                                        @if( Auth::check() )
                                        <li>
                                            <a href="{{ route('my_account') }}">Tài khoản</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('wishlist') }}">Yêu Thích</a>
                                        </li>
                                        @else
                                        <li>
                                            <a href="{{ route('login') }}">Đăng nhập | Đăng ký</a>
                                        </li>
                                        @endif
                                        <li>
                                            <a href="{{ route('checkout') }}">Thanh toán</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle_area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header-middle_nav">
                                <div class="header-logo_area">
                                    <a href="{{ route('home') }}">
                                        <img width="150" height="70" src="{{ \Helper::logo_header() }}" alt="Header Logo">
                                    </a>
                                </div>
                                <div class="header-contact d-none d-md-flex">
                                    <i class="fa fa-headphones-alt"></i>
                                    <div class="contact-content">
                                        <p>
                                            Liên hệ: StoreMobile
                                            <br>
                                        Số điện thoại: (012) 800 456 789
                                    </p>
                                    </div>
                                </div>
                                <div class="header-search_area d-none d-lg-block">
                                    <form class="search-form" action="{{ route('search') }}" method="get">
                                        <input type="text" class="search-item" name="search" placeholder="Tìm kiếm...">
                                        <button class="search-button" type="submit"><i class="ion-ios-search"></i></button>
                                    </form>
                                </div>
                                <div class="header-right_area d-none d-lg-inline-block">
                                    <ul>
                                        <li class="mobile-menu_wrap d-flex d-lg-none">
                                            <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                                <i class="ion-android-menu"></i>
                                            </a>
                                        </li>
                                        <li class="minicart-wrap">
                                            <a href="#miniCart" class="minicart-btn toolbar-btn">
                                                <div class="minicart-count_area">
                                                    <span class="item-count"></span>
                                                    <i class="ion-bag"></i>
                                                </div>
                                                <div class="minicart-front_text">
                                                    <span>Giỏ hàng</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="header-right_area header-right_area-2 d-inline-block d-lg-none">
                                    <ul>
                                        <li class="mobile-menu_wrap d-inline-block d-lg-none">
                                            <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                                <i class="ion-android-menu"></i>
                                            </a>
                                        </li>
                                        <li class="minicart-wrap">
                                            <a href="#miniCart" class="minicart-btn toolbar-btn">
                                                <div class="minicart-count_area">
                                                    <span class="item-count">{{ Cart::getTotalQuantity() }}</span>
                                                    <i class="ion-bag"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#searchBar" class="search-btn toolbar-btn">
                                                <i class="pe-7s-search"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#offcanvasMenu" class="menu-btn toolbar-btn color--white d-none d-lg-block">
                                                <i class="ion-android-menu"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom_area d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-menu_area position-relative">
                                <nav class="main-nav d-flex justify-content-center">
                                    <ul>
                                        <li class="dropdown-holder"><a href="{{ route('home') }}">Trang chủ</a></li>                   
                                        @if( count(\Helper::category()) > 0)
                                        <li class="megamenu-holder position-static">Danh Mục <i
                                                class="ion-chevron-down"></i>
                                            <ul class="kenne-megamenu">
                                                @foreach(\Helper::category() as $key => $item )
                                                    @if($key < 4)
                                                    <li><span class="megamenu-title"><a href="{{ route('category', $item->slug) }}">{{ $item->title }}</a></span>
                                                        @if( count($item->childrent) > 0)                                                         
                                                        <ul>
                                                            @foreach($item->childrent as $key => $value )
                                                            @if( $key < 5)
                                                            <li><a href="{{ route('category', $value->slug) }}">{{ $value->title }}</a></li>
                                                            </li>
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                        @endif
                                                    </li>
                                                    @endif
                                                @endforeach
                                                <li><span class="megamenu-title">Xem Thêm</span>
                                                    <ul>
                                                        @foreach(\Helper::category() as $key => $item )
                                                            @if($key >= 4 )
                                                            <li><a href="{{ route('category', $item->slug) }}">{{ $item->title }}</a></li>
                                                        @endif
                                                        @endforeach
                                                    </ul>
                                                </li>     
                                            </ul>
                                        </li>                                                                        
                                        @endif
                                        <li><a href="{{ route('blogs') }}">Tin Tức</a>
                                        </li>
                                        <li><a href="{{  route('contact') }}">Liên hệ</a></li>
                                        <li><a href="{{  route('about') }}">Thông tin công ty</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-sticky">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sticky-header_nav position-relative">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-lg-2 col-sm-6">
                                        <div class="header-logo_area">
                                            <a href="{{ route('home') }}">
                                                <img src="{{ \Helper::logo_header() }}" alt="Header Logo">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 d-none d-lg-block position-static">
                                        <div class="main-menu_area">
                                            <nav class="main-nav d-flex justify-content-center">
                                                <ul>
                                                    <li class="dropdown-holder"><a href="{{ route('home') }}">Trang Chủ</a>
                                                    </li>
                                                    @if( count(\Helper::category()) > 0)
                                                        <li class="megamenu-holder position-static">Danh Mục <i
                                                                class="ion-chevron-down"></i>
                                                            <ul class="kenne-megamenu">
                                                                    @foreach(\Helper::category() as $key => $item )
                                                                        @if($key < 4)
                                                                        <li><span class="megamenu-title"><a href="{{ route('category', $item->slug) }}">{{ $item->title }}</a></span>
                                                                            @if( count($item->childrent) > 0)                                                         
                                                                            <ul>
                                                                                @foreach($item->childrent as $key => $value )
                                                                                @if( $key < 5)
                                                                                <li><a href="{{ route('category',$value->slug)}}">{{ $value->title }}</a></li>
                                                                                </li>
                                                                                @endif
                                                                                @endforeach
                                                                            </ul>
                                                                            @endif
                                                                        </li>
                                                                        @endif
                                                                    @endforeach
                                                                <li><span class="megamenu-title">Xem Thêm</span>
                                                                    <ul>
                                                                        @foreach(\Helper::category() as $key => $item )
                                                                            @if($key >= 4 )
                                                                            <li><a href="{{ route('category', $item->slug) }}">{{ $item->title }}</a></a></li>
                                                                        @endif
                                                                        @endforeach
                                                                    </ul>
                                                                </li>     
                                                            </ul>
                                                        </li>                                                                        
                                                    @endif
                                                    <li><a href="{{ route('blogs') }}">Tin Tức</a>
                                                    </li>
                                                    <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                                                    <li><a href="{{  route('about') }}">Thông tin công ty</a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="header-right_area header-right_area-2">
                                            <ul>
                                                <li class="mobile-menu_wrap d-inline-block d-lg-none">
                                                    <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                                        <i class="ion-android-menu"></i>
                                                    </a>
                                                </li>
                                                <li class="minicart-wrap">
                                                    <a href="#miniCart" class="minicart-btn toolbar-btn">
                                                        <div class="minicart-count_area">
                                                            <span class="item-count">{{ Cart::getTotalQuantity() }}</span>
                                                            <i class="ion-bag"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-minicart_wrapper" id="miniCart">
                <div class="offcanvas-menu-inner">
                    <div class="minicart-content">
                        <div class="minicart-heading">
                            <h4>Giỏ Hàng</h4>
                        </div>
                        <ul class="minicart-list">
                            @foreach( Cart::getContent() as $item_cart)
                            <li class="minicart-product">
                                <a class="product-item_remove" data-id="{{ $item->id }}"><i
                                    class="ion-android-close"></i></a>
                                <div class="product-item_img">
                                    <img src="{{ url('frontend') }}/assets/images/product/1-1.jpg" alt="Kenne's Product Image">
                                </div>
                                <div class="product-item_content">
                                    <a class="product-item_title" href="shop-left-sidebar.html">{{ $item_cart->name }}</a>
                                    <span class="product-item_quantity">{{ $item_cart->quantity }} x {{ number_format($item_cart->price)}}₫</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="minicart-item_total">
                        <span>Tổng tiền</span>
                        <span class="ammount">{{  number_format(Cart::getSubtotal()) }}₫</span>
                    </div>
                    <div class="minicart-btn_area">
                        <a href="{{ route('detail_cart') }}" class="kenne-btn kenne-btn_fullwidth">Giỏ hàng</a>
                    </div>
                    <div class="minicart-btn_area">
                        <a href="{{ route('checkout')}}" class="kenne-btn kenne-btn_fullwidth">Thanh Toán</a>
                    </div>
                </div>
            </div>
            <div class="mobile-menu_wrapper" id="mobileMenu">
                <div class="offcanvas-menu-inner">
                    <div class="container">
                        <a href="#" class="btn-close white-close_btn"><i class="ion-android-close"></i></a>
                        <div class="offcanvas-inner_logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ \Helper::logo_header() }}" alt="{{ \Helper::logo_header() }}">
                            </a>
                        </div>
                        <nav class="offcanvas-navigation">
                            <ul class="mobile-menu">
                                
                                <div class="header-search_area menu-item-has-children active">
                                    <form class="search-form" action="{{ route('search') }}" method="POST">
                                        @csrf
                                        <input type="text" class="search-item" name="search" placeholder="Tìm kiếm...">
                                        <button class="search-button" type="submit"><i class="ion-ios-search"></i></button>
                                    </form>
                                </div>
                                <li class="menu-item-has-children active"><a href="{{ route('home') }}"><span class="mm-text">Danh Mục</span></a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">
                                        <span class="mm-text">Danh Mục</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            @foreach(\Helper::category() as $key => $item )
                                            <a href="{{ route('category', $item->slug) }}">
                                                <span class="mm-text">{{  $item->title }}</span>
                                            </a>
                                            @if(count( $item->childrent ) > 0)
                                                <ul class="sub-menu">
                                                    @foreach($item->childrent as $childrent)
                                                    <li>
                                                        <a href="{{ route('category', $childrent->slug) }}">
                                                            <span class="mm-text">{{ $childrent->title }}</span>
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            @endforeach 
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">
                                        <span class="mm-text">Blog</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children has-children">
                                            <a href="blog-grid_view.html">
                                                <span class="mm-text">Chưa có</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                <span class="mm-text">Tài khoản</span>
                                    <ul class="sub-menu">
                                        @if( Auth::Check())
                                        <li>
                                            <a href="{{ route('my_account') }}">
                                                <span class="mm-text">Tài khoản</span>
                                            </a>
                                        </li>
                                        @else 
                                        <li>
                                            <a href="{{ route('login') }}">
                                                <span class="mm-text">Đăng nhập | Đăng ký</span>
                                            </a>
                                        </li>
                                        @endif
                                        <li class="menu-item-has-children has-children">
                                            <a href="route('checkout')">
                                                <span class="mm-text">Thanh toán</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="global-overlay"></div>
        </header>
        <div class="slider-area slider-area-2">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach(\Helper::slide() as $key => $img)
                    <div class="carousel-item {{ ($key == 0) ?'active' : ''}}">
                        <img src="{{ url('storage') }}/images/{{ $img->title }}" width="100%" height="300px" class="d-block w-100" alt="...">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        @yield('content')
        <div class="kenne-footer_area bg-smoke_color">
            <div class="footer-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="newsletter-area">
                                <div class="newsletter-logo">
                                    <a href="javascript:void(0)">
                                        <img width="150" height="70" src="{{ \Helper::logo_footer() }}" alt="Logo">
                                    </a>
                                </div>
                                <p class="short-desc">Đại Học Công Nghệ Sài Gòn 2020</p>
                                <div class="newsletter-form_wrap">
                                    <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="newsletters-form validate" target="_blank" novalidate>
                                        <div id="mc_embed_signup_scroll">
                                            <div id="mc-form" class="mc-form subscribe-form">
                                                <input id="mc-email" class="newsletter-input" type="email" autocomplete="off" placeholder="Email" />
                                                <button class="newsletter-btn" id="mc-submit"><i
                                                class="ion-android-mail"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-lg-1">
                            <div class="row footer-widgets_wrap">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="footer-widgets_title">
                                        <h4>Giới Thiệu</h4>
                                    </div>
                                    <div class="footer-widgets">
                                        <ul>
                                            <li><a href="javascript:void(0)">Lịch Sử Công ty</a></li>
                                            <li><a href="javascript:void(0)">Địa Chỉ</a></li>    
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="footer-widgets_title">
                                        <h4>Page</h4>
                                    </div>
                                    <div class="footer-widgets">
                                        <ul>
                                            <li><a href="javascript:void(0)">Giới Thiệu</a></li>
                                            <li><a href="{{ route('blogs') }}">Tin Tức</a></li>
                                            <li><a href="javascript:void(0)">Hỗ Trợ</a></li>
                                            <li><a href="javascript:void(0)">Tin tức</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="footer-widgets_title">
                                        <h4>Danh Mục</h4>
                                    </div>
                                    <div class="footer-widgets">
                                        <ul>
                                            @foreach(\Helper::category() as $item)
                                            <li><a href="javascript:void(0)">{{ $item->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom_area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="copyright">
                                <span>Copyright &copy; 2019 <a href="javascript:void(0)">Kenne.</a> All rights reserved.</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="payment">
                                <img width="70" height="30" src="{{ \Helper::logo_header() }}" alt="{{ \Helper::logo_header() }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('frontend') }}/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ url('frontend') }}/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="{{ url('frontend') }}/assets/js/vendor/popper.min.js"></script>
    <script src="{{ url('frontend') }}/assets/js/vendor/bootstrap.min.js"></script>
    <script src="{{ url('frontend') }}/assets/js/plugins/slick.min.js"></script>
    <script src="{{ url('frontend') }}/assets/js/plugins/jquery.barrating.min.js"></script>
    <script src="{{ url('frontend') }}/assets/js/plugins/jquery.counterup.js"></script>
    <script src="{{ url('frontend') }}/assets/js/plugins/jquery.nice-select.js"></script>
    <script src="{{ url('frontend') }}/assets/js/plugins/jquery.sticky-sidebar.js"></script>
    <script src="{{ url('frontend') }}/assets/js/plugins/jquery-ui.min.js"></script>
    <script src="{{ url('frontend') }}/assets/js/plugins/jquery.ui.touch-punch.min.js"></script>
    <script src="{{ url('frontend') }}/assets/js/plugins/theia-sticky-sidebar.min.js"></script>
    <script src="{{ url('frontend') }}/assets/js/plugins/waypoints.min.js"></script>
    <script src="{{ url('frontend') }}/assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="{{ url('frontend') }}/assets/js/plugins/timecircles.js"></script>
    <script src="{{ url('frontend') }}/assets/js/main.js"></script>
    <script src="{{ url('frontend') }}/assets/js/category/index.js"></script>
    <script src="{{ url('frontend') }}/assets/js/cart/index.js"></script>
</body>
</html>