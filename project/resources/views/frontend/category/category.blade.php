@extends('frontend.template')
@section('content')
<div class="kenne-content_wrapper row">
    <div class="col-2">
        <div class="search-price pl-4">
            <h3><span>Tìm theo giá</span></h3>
            <ul>
                <li><a href="{{ route('category', ['slug' => $category->slug, 'max_price' => 1000000 ]) }}">Dưới 1 Triệu</a></li>
                <li><a href="{{ route('category', ['slug' => $category->slug,'min_price' => 1000000, 'max_price' => 2000000 ]) }}">Từ 1 đến 2 Triệu</a></li>
                <li><a href="{{ route('category', ['slug' => $category->slug,'min_price' => 2000000, 'max_price' => 5000000 ]) }}">Từ 2 đến 5 Triệu</a></li>
                <li><a href="{{ route('category', ['slug' => $category->slug,'min_price' => 5000000, 'max_price' => 10000000 ]) }}">Từ 5 đến 10 Triệu</a></li>
                <li><a href="{{ route('category', ['slug' => $category->slug,'min_price' => 10000000, 'max_price' => 20000000 ]) }}">Từ 10 đến 20 Triệu</a></li>
                <li><a href="{{ route('category', ['slug' => $category->slug,'min_price' => 2000000]) }}">Trên 20 Triệu</a></li>
            </ul>
        </div>
    </div>
    <div class=" col-9">
        @include('frontend.messages.messages')
        <div class="row">
            <div class="col-lg-12">    
                @if( isset($category))           
                <h3>{{ $category->title }}</h3>
                <input class="title-category" type="hidden" value="{{ $category->slug }}">
                @endif
                <div class="shop-toolbar">
                    <div class="product-view-mode">
                        <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="Grid View"><i class="fa fa-th"></i></a>
                        <a class="list" data-target="listview" data-toggle="tooltip" data-placement="top" title="List View"><i class="fa fa-th-list"></i></a>
                    </div>
                    @if( !isset($search))
                    <div class="product-item-selection_area">
                        <div class="product-short">
                            <label class="select-label">Xắp xếp:</label>
                            <select class="nice-select myniceselect">
                                <option value="1">Mặc định</option>
                                <option value="2">Tên, A đến Z</option>
                                <option value="3">Tên, Z đến A</option>
                                <option value="4">Giá, Thấp đến cao</option>
                                <option value="5">Giá, Cao đến thấp</option>
                            </select>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="shop-product-wrap grid gridview-4 row">
                    @if( isset($records) && count($records) > 0)
                        @foreach($records as $item)
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{ route('detailItem',$item->slug) }}">
                                            <img width="100%" height="300px" class="primary-img" src="{{ $item->img }}" alt="{{ $item->img }}">
                                        </a>
                                        @if( $item->price_sale > 0 && $item->price_sale < $item->price)
                                        <span class="sticker">- {{ round( ($item->price - $item->price_sale) / $item->price * 100 )}}%</span>
                                        @endif
                                        <div class="add-actions">
                                            <ul>
                                                <li><a href="" data-toggle="tooltip" data-placement="right" title="Thêm vào danh sách yêu thích"><i
                                                    class="ion-ios-heart-outline"></i></a>
                                                </li>
                                                <li><p class="btn add-to-cart" data-toggle="tooltip" data-placement="right" title="Thêm giỏ hàng" data-id="{{ $item->id }}" ><i class="ion-bag"></i></p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <h3 class="product-name"><a href="{{ route('detailItem',$item->slug) }}">{{ $item->title }}</a></h3>
                                            <div class="price-box">
                                                @if( $item->price_sale > 0 && $item->price_sale < $item->price )
                                                    <span class="new-price">{{ number_format($item->price_sale) }}₫</span>
                                                    <span class="old-price">{{ number_format($item->price) }}₫</span>
                                                @else
                                                    <span class="new-price">{{ number_format($item->price) }}₫</span>
                                                @endif
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                    <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-product_item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{ route('detailItem',$item->slug) }}">
                                            <img width="300px" height="300px" src="{{ $item->img }}" alt="Kenne's Product Image">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <div class="price-box">
                                            @if( $item->price_sale > 0 && $item->price_sale < $item->price )
                                            <span class="new-price">{{ number_format($item->price_sale) }}₫</span>
                                            @endif
                                            <span class="old-price">{{ number_format($item->price) }}₫</span>
                                            </div>
                                            <h6 class="product-name"><a href="{{ route('detailItem',$item->slug) }}">{{ $item->title }}</a></h6>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                    <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-short_desc">
                                                <p>{!! $item->description !!}</p>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul>
                                                <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-ios-search"></i></a>
                                                </li>
                                                <li><a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                        class="ion-ios-heart-outline"></i></a>
                                                </li>
                                                <li><a href="compare.html" data-toggle="tooltip" data-placement="top" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                                </li>
                                                <li><a href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To cart"><i class="ion-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else 
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <h4>Chưa có sản phẩm</h4>
                    </div>
                    @endif
                </div>     
                @if( !isset($search))     
                <div> {{ $records->links() }}</div>
                @endif
            </div>
        </div>
    </div>
</div>
@include('frontend.sale.bestsale')
@endsection