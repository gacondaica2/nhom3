@extends('frontend.template')
@section('content')
<div class="kenne-cart-area">
    <div class="container">
        <div class="row">
            @include('frontend.messages.messages')
            @if( count( Cart::getContent()) > 0)
            <div class="col-12">
                <form action="{{ route('update_cart') }}" method="POST">
                    @csrf
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="kenne-product-remove">Xoá</th>
                                    <th class="kenne-product-thumbnail">hình ảnh</th>
                                    <th class="cart-product-name">Tên sản phẩm</th>
                                    <th class="kenne-product-price">Giá tiền</th>
                                    <th class="kenne-product-quantity">Số lượng</th>
                                    <th class="kenne-product-subtotal">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( Cart::getContent( ) as $item)
                                <tr>
                                    <td class="kenne-product-remove"><a href="{{ route('delete_item_cart', $item->id) }}"><i class="fa fa-trash"
                                        title="Remove"></i></a></td>
                                    <td class="kenne-product-thumbnail"><a href="javascript:void(0)"><img src="{{ $item->attributes->img }}" alt="{{ $item->attributes->title }}"></a></td>
                                    <td class="kenne-product-name" ><a href="javascript:void(0)">{{ $item->name }}</a></td>
                                    <td class="kenne-product-price"><span class="amount">{{ number_format($item->price) }}₫</span></td>
                                    <td class="quantity">
                                        <label>số lượng</label>
                                        <div class="row">
                                            <div class="col-4"></div>
                                            <div>{{ $item->quantity }}</div>
                                            <div class="col-4"></div>
                                        </div>
                                    </td>
                                    <td class="product-subtotal"><span class="amount">{{ number_format($item->price * $item->quantity) }}₫</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Mã giảm giá" type="text">
                                    <input class="button" name="apply_coupon" value="Áp dụng" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Tổng tiền</h2>
                                <ul>
                                    <li>Tổng tiền <span>{{ number_format(Cart::getTotal()) }}₫</span></li>
                                </ul>
                                <a href="javascript:void(0)">Thanh toán đơn hàng</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @else 
            <h1>Chưa có sản phẩm nào trong giỏ hàng!</h1>
           @endif
        </div>
    </div>
</div>
@endsection