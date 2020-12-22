@extends('frontend.template')
@section('content')
@include('frontend.sale.bestsale')
@if(isset($Categories) && count($Categories) > 0 )
    @foreach($Categories as $item)
        @if( count($item->product) > 0)
            <div class="product-area ">
                <div class="container">
                @include('frontend.messages.messages')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h3>{{ $item->title }}</h3>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="kenne-element-carousel product-slider slider-nav" data-slick-options='{
                            "slidesToShow": 4,
                            "slidesToScroll": 1,
                            "infinite": false,
                            "arrows": true, 
                            "dots": false,
                            "spaceBetween": 30,
                            "appendArrows": ".product-arrow"
                            }' data-slick-responsive='[
                            {"breakpoint":992, "settings": {
                            "slidesToShow": 3
                            }},
                            {"breakpoint":768, "settings": {
                            "slidesToShow": 2
                            }},
                            {"breakpoint":575, "settings": {
                            "slidesToShow": 1
                            }}
                        ]'>     
                            @foreach( $item->product as $value)
                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="{{ route('detailItem', $value->slug) }}">
                                                <img class="primary-img" src="{{ $value->img }}" alt="{{ $value->title }}">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <h3 class="product-name"><a href="{{ route('detailItem', $value->slug) }}">{{ $value->title }}</a></h3>
                                                <div class="price-box">
                                                    @if( $value->price > $value->price_sale && $value->price_sale > 0)
                                                    <span class="new-price">{{ number_format($value->price_sale ) }}₫</span>
                                                    @endif
                                                    <span class="old-price">{{ number_format($value->price_sale)  }}₫</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="ion-ios-star"></i></li>
                                                        <li><i class="ion-ios-star"></i></li>
                                                        <li><i class="ion-ios-star"></i></li>
                                                        <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                        <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endif
<div class="modal fade modal-wrapper" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-inner-area sp-area row">
                    <div class="col-lg-5">
                        <div class="sp-img_area">
                            <div class="kenne-element-carousel sp-img_slider slick-img-slider" data-slick-options='{
                            "slidesToShow": 1,
                            "arrows": false,
                            "fade": true,
                            "draggable": false,
                            "swipe": false,
                            "asNavFor": ".sp-img_slider-nav"
                            }'>
                                <div class="single-slide red">
                                    <img src="/assets/images/product/1-1.jpg" alt="Kenne's Product Image">
                                </div>
                                <div class="single-slide orange">
                                    <img src="/assets/images/product/1-2.jpg" alt="Kenne's Product Image">
                                </div>
                                <div class="single-slide brown">
                                    <img src="/assets/images/product/2-1.jpg" alt="Kenne's Product Image">
                                </div>
                                <div class="single-slide umber">
                                    <img src="/assets/images/product/2-2.jpg" alt="Kenne's Product Image">
                                </div>
                                <div class="single-slide black">
                                    <img src="/assets/images/product/3-1.jpg" alt="Kenne's Product Image">
                                </div>
                                <div class="single-slide golden">
                                    <img src="/assets/images/product/3-2.jpg" alt="Kenne's Product Image">
                                </div>
                            </div>
                            <div class="kenne-element-carousel sp-img_slider-nav arrow-style-2 arrow-style-3" data-slick-options='{
                            "slidesToShow": 4,
                            "asNavFor": ".sp-img_slider",
                            "focusOnSelect": true,
                            "arrows" : true,
                            "spaceBetween": 30
                            }' data-slick-responsive='[
                            {"breakpoint":1501, "settings": {"slidesToShow": 3}},
                            {"breakpoint":1200, "settings": {"slidesToShow": 2}},
                            {"breakpoint":992, "settings": {"slidesToShow": 4}},
                            {"breakpoint":768, "settings": {"slidesToShow": 3}},
                            {"breakpoint":575, "settings": {"slidesToShow": 2}}
                        ]'>
                                <div class="single-slide red">
                                    <img src="/assets/images/product/1-1.jpg" alt="Kenne's Product Thumnail">
                                </div>
                                <div class="single-slide orange">
                                    <img src="/assets/images/product/1-2.jpg" alt="Kenne's Product Thumnail">
                                </div>
                                <div class="single-slide brown">
                                    <img src="/assets/images/product/2-1.jpg" alt="Kenne's Product Thumnail">
                                </div>
                                <div class="single-slide umber">
                                    <img src="/assets/images/product/2-2.jpg" alt="Kenne's Product Thumnail">
                                </div>
                                <div class="single-slide black">
                                    <img src="/assets/images/product/3-1.jpg" alt="Kenne's Product Thumnail">
                                </div>
                                <div class="single-slide golden">
                                    <img src="/assets/images/product/3-2.jpg" alt="Kenne's Product Thumnail">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <div class="sp-content">
                            <div class="sp-heading">
                                <h5><a href="#">Dolorem odio provident ut nihil</a></h5>
                            </div>
                            <div class="rating-box">
                                <ul>
                                    <li><i class="ion-android-star"></i></li>
                                    <li><i class="ion-android-star"></i></li>
                                    <li><i class="ion-android-star"></i></li>
                                    <li class="silver-color"><i class="ion-android-star"></i></li>
                                    <li class="silver-color"><i class="ion-android-star"></i></li>
                                </ul>
                            </div>
                            <div class="price-box">
                                <span class="new-price new-price-2">$194.00</span>
                                <span class="old-price">$241.00</span>
                            </div>
                            <div class="sp-essential_stuff">
                                <ul>
                                    <li>Brands <a href="javascript:void(0)">Buxton</a></li>
                                    <li>Product Code: <a href="javascript:void(0)">Product 16</a></li>
                                    <li>Reward Points: <a href="javascript:void(0)">100</a></li>
                                    <li>Availability: <a href="javascript:void(0)">In Stock</a></li>
                                    <li>EX Tax: <a href="javascript:void(0)"><span>$453.35</span></a></li>
                                    <li>Price in reward points: <a href="javascript:void(0)">400</a></li>
                                </ul>
                            </div>
                            <div class="color-list_area">
                                <div class="color-list_heading">
                                    <h4>Available Options</h4>
                                </div>
                                <span class="sub-title">Color</span>
                                <div class="color-list">
                                    <a href="javascript:void(0)" class="single-color active" data-swatch-color="red">
                                        <span class="bg-red_color"></span>
                                        <span class="color-text">Red (+$150)</span>
                                    </a>
                                    <a href="javascript:void(0)" class="single-color" data-swatch-color="orange">
                                        <span class="burnt-orange_color"></span>
                                        <span class="color-text">Orange (+$170)</span>
                                    </a>
                                    <a href="javascript:void(0)" class="single-color" data-swatch-color="brown">
                                        <span class="brown_color"></span>
                                        <span class="color-text">Brown (+$120)</span>
                                    </a>
                                    <a href="javascript:void(0)" class="single-color" data-swatch-color="umber">
                                        <span class="raw-umber_color"></span>
                                        <span class="color-text">Umber (+$125)</span>
                                    </a>
                                    <a href="javascript:void(0)" class="single-color" data-swatch-color="black">
                                        <span class="black_color"></span>
                                        <span class="color-text">Black (+$125)</span>
                                    </a>
                                    <a href="javascript:void(0)" class="single-color" data-swatch-color="golden">
                                        <span class="golden_color"></span>
                                        <span class="color-text">Golden (+$125)</span>
                                    </a>
                                </div>
                            </div>
                            <div class="quantity">
                                <label>Quantity</label>
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" value="1" type="text">
                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                </div>
                            </div>
                            <div class="kenne-group_btn">
                                <ul>
                                    <li><a href="cart.html" class="add-to_cart">Cart To Cart</a></li>
                                    <li><a href="cart.html"><i class="ion-android-favorite-outline"></i></a></li>
                                    <li><a href="cart.html"><i class="ion-ios-shuffle-strong"></i></a></li>
                                </ul>
                            </div>
                            <div class="kenne-tag-line">
                                <h6>Tags:</h6>
                                <a href="javascript:void(0)">Scraf</a>,
                                <a href="javascript:void(0)">hoodie</a>,
                                <a href="javascript:void(0)">jacket</a>
                            </div>
                            <div class="kenne-social_link">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com" data-toggle="tooltip" target="_blank" title="Facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="https://twitter.com" data-toggle="tooltip" target="_blank" title="Twitter">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a href="https://www.youtube.com" data-toggle="tooltip" target="_blank" title="Youtube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="google-plus">
                                        <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="Google Plus">
                                            <i class="fab fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://rss.com" data-toggle="tooltip" target="_blank" title="Instagram">
                                            <i class="fab fa-instagram"></i>
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
<a class="scroll-to-top" href=""><i class="ion-chevron-up"></i></a>
@endsection