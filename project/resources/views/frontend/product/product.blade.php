@extends('frontend.template')
@section('content')
@if(isset($record))
<div class="sp-area">
    <div class="container">
    @include('frontend.messages.messages')
        <div class="sp-nav">
            <div class="row">
                <div class="col-lg-6">
                    <div class="sp-img_area">
                        <div class="sp-img_slider slick-img-slider kenne-element-carousel" data-slick-options='{
                        "slidesToShow": 1,
                        "arrows": false,
                        "fade": true,
                        "draggable": false,
                        "swipe": false,
                        "asNavFor": ".sp-img_slider-nav"
                        }'>
                            <div class="single-slide red zoom" width="300px;" height="300px;">
                                <img style="width: 100%; height:100%;" src="{{ $record->media->img }}" alt="{{ $record->media->img }}">
                            </div>
                            @foreach($media as $img)
                            <div class="single-slide green zoom" style="width: 100%; height:100%;">
                                <img  src="{{ $img }}" alt="{{ $img }}">
                            </div>
                            @endforeach
                        </div>
                        <div class="sp-img_slider-nav slick-slider-nav kenne-element-carousel arrow-style-2 arrow-style-3" data-slick-options='{
                        "slidesToShow": 3,
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
                            <div class="single-slide red zoom">
                                <img style="width: 50px; height:50px;" src="{{ $record->media->img }}" alt="{{ $record->media->img }}">
                            </div>
                            @foreach($media as $img)
                            <div class="single-slide green zoom">
                                <img style="width: 50px; height:50px;" src="{{ $img }}" alt="{{ $img }}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="sp-content">
                        <div class="sp-heading">
                            <h5><a href="#">{{ $record->title }}</a></h5>
                        </div>
                        <span class="reference">Tên sản phẩm: {{ $record->title }}</span>
                        <div class="rating-box">
                            <ul>
                                <li><i class="ion-android-star"></i></li>
                                <li><i class="ion-android-star"></i></li>
                                <li><i class="ion-android-star"></i></li>
                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                <li class="silver-color"><i class="ion-android-star"></i></li>
                            </ul>
                        </div>
                        <div class="sp-essential_stuff">
                            <ul>
                                <li>Mã: {{ $record->sku }}</a></li>
                                <li>Kho: {{ $record->qty }}</a></li>
                                <li>Tình trạng: {{ ($record->qty > 0)? "Còn hàng" : "Hết hàng" }}</a></li>
                                <li>Giá: <span>{{ number_format(($record->price_sale > 0)? $record->price_sale : $record->price) }}</span></a></li>
                            </ul>
                        </div>
                        <div class="qty-btn_area">
                            <ul>
                                <li><a class="qty-cart_btn add-to-cart" data-id="{{ $record->id }}">Mua</a></li>
                                <li><a class="qty-wishlist_btn" href="{{ route('add_wishlist', $record->id) }}" data-toggle="tooltip" title="Thêm vào danh sách yêu thíchthích"><i class="ion-android-favorite-outline"></i></a>
                                </li>
                            </ul>
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
<div class="product-tab_area-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="sp-product-tab_nav">
                    <div class="product-tab">
                        <ul class="nav product-menu">
                            <li><a class="active" data-toggle="tab" href="#description"><span>Mô tả</span></a></li>
                            <li><a data-toggle="tab" href="#specification"><span>Chi tiết cầu hình</span></a></li>
                        </ul>
                    </div>
                    <div class="tab-content uren-tab_content">
                        <div id="description" class="tab-pane active show" role="tabpanel">
                            <div class="product-description">
                                <ul>
                                    <li>
                                        {!! $record->content !!}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="specification" class="tab-pane" role="tabpanel">
                            <table class="table table-bordered specification-inner_stuff">
                                <tbody>
                                    <tr>
                                        <td colspan="2"><strong>Cấu hình</strong></td>
                                    </tr>
                                </tbody>
                                @foreach($record->option as $value)
                                <tbody>
                                    <tr>
                                        <td>{{ $value['name'] }}</td>
                                        <td>{{ $value['value'] }}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                        <div id="reviews" class="tab-pane" role="tabpanel">
                            <div class="tab-pane active" id="tab-review">
                                <form class="form-horizontal" id="form-review">
                                    <div id="review">
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 50%;"><strong>Customer</strong></td>
                                                    <td class="text-right">26/10/19</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Good product! Thank you very much</p>
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <h2>Write a review</h2>
                                    <div class="form-group required">
                                        <div class="col-sm-12 p-0">
                                            <label>Your Email <span class="required">*</span></label>
                                            <input class="review-input" type="email" name="con_email" id="con_email" required>
                                        </div>
                                    </div>
                                    <div class="form-group required second-child">
                                        <div class="col-sm-12 p-0">
                                            <label class="control-label">Share your opinion</label>
                                            <textarea class="review-textarea" name="con_message" id="con_message"></textarea>
                                            <div class="help-block"><span class="text-danger">Note:</span> HTML is
                                                not
                                                translated!</div>
                                        </div>
                                    </div>
                                    <div class="form-group last-child required">
                                        <div class="col-sm-12 p-0">
                                            <div class="your-opinion">
                                                <label>Your Rating</label>
                                                <span>
                                                <select class="star-rating">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="kenne-btn-ps_right">
                                            <button class="kenne-btn">Continue</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class=" uren-tab_content">
                        <h3 class="mt-4">Bình Luận</h3>
                        <div class="fb-comments" data-href="http://storemobile.xyz/san-pham/{{ $record->title }}" data-numposts="5" data-width=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('frontend.sale.bestsale')
@endif
@endsection