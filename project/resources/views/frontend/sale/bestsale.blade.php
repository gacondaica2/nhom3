@if(count( \Helper::BestSale()))
<div class="list-product_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3>Sản phẩm bán chạy</span></h3>
                    <div class="list-product_arrow"></div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="kenne-element-carousel list-product_slider slider-nav" data-slick-options='{
                "slidesToShow": 3,
                "slidesToScroll": 1,
                "infinite": false,
                "arrows": true,
                "dots": false,
                "spaceBetween": 30,
                "appendArrows": ".list-product_arrow"
                }' data-slick-responsive='[
                {"breakpoint":1200, "settings": {
                "slidesToShow": 2
                }},
                {"breakpoint":768, "settings": {
                "slidesToShow": 1
                }},
                {"breakpoint":575, "settings": {
                "slidesToShow": 1
                }}
            ]'>
            @foreach( \Helper::BestSale() as $item)
                    <div class="product-item">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="{{ route('detailItem',$item->slug) }}">
                                    <img width="150px" height="150px" class="primary-img" src="{{ $item->img }}" alt="{{ $item->title }}">
                                </a>
                                @if( $item->price_sale > 0 && $item->price_sale < $item->price)
                                <span class="sticker-2">- {{ round( ($item->price - $item->price_sale) / $item->price * 100 )}}%</span>
                                @endif
                            </div>
                            <div class="product-content">
                                <div class="product-desc_info">
                                    <h3 class="product-name"><a href="{{ route('detailItem',$item->slug) }}">{{ $item->title }}</a>
                                    </h3>
                                    <div class="price-box">
                                    @if( $item->price_sale > 0 && $item->price_sale < $item->price )
                                        <span class="new-price">{{ number_format($item->price_sale) }}₫</span>
                                        <span class="old-price">{{ number_format($item->price) }}₫</span>
                                    @else 
                                    <span class="new-price">{{ number_format($item->price) }}₫</span>
                                    @endif
                                    </div>
                                </div>
                                <div class="add-actions">
                                    <ul>
                                        <li><a href="{{ route('add_wishlist', $item->id) }}" data-toggle="tooltip" data-placement="top" title="Thêm vào danh sách yêu thích"><i class="ion-ios-heart-outline"></i></a>
                                        </li>
                                        <li class="btn add-to-cart" data-id="{{ $item->id }}">Thêm giỏ hàng</li>
                                    </ul>
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