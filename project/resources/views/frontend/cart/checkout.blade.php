@extends('frontend.template')
@section('content')
<form action="{{ route('checkout')}}" method="POST">
    @csrf
    <div class="checkout-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="checkbox-form">
                        @include('frontend.messages.messages')
                        <h3>Hoá đơn chi tiết</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Tên <span class="required">*</span></label>
                                    <input placeholder="Tên..." value="{{ old('name','')}}" name="name" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Số điện thoại <span class="required">*</span></label>
                                    <input placeholder="Số điện thoại..." value="{{ old('phone','')}}" name="phone" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email <span class="required">*</span></label>
                                    <input placeholder="Email của bạn..." value="{{ old('email','')}}" name="email" type="email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Địa chỉ <span class="required">*</span></label>
                                    <input placeholder="Địa chỉ chính xác..." value="{{ old('address','')}}" name="address" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="country-select clearfix">
                                    <label>Tỉnh/Thành phố <span class="required">*</span></label>
                                    <select class="province custom-select" name="province">
                                        <option data-display="Tỉnh / thành phố">Tỉnh / thành phố</option>
                                        @foreach($records as $province)
                                        <option value="{{ $province->id }}" data-id="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="country-select clearfix">
                                    <label>Quận/Huyện <span class="required">*</span></label>
                                    <select class="district custom-select" name="district">
                                        <option data-display="Quận / huyện">Quận / huyện</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="country-select clearfix">
                                    <label>Xã/Phường <span class="required">*</span></label>
                                    <select class="ward custom-select" name="ward">
                                        <option data-display="Xã/Phường">Xã / Phường</option>
                                    </select>
                                </div>
                            </div>
                        </div>                        
                        <div class="order-notes">
                            <div class="checkout-form-list checkout-form-list-2">
                                <label>Ghi chú</label>
                                <textarea name="note" id="checkout-mess" cols="30" rows="10" placeholder="Lưu ý cho đơn hàng."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="your-order">
                        <h3>Giỏ hàng</h3>
                        <div class="your-order-table table-responsive">
                            @if( count(Cart::getContent()) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-product-name">Sản phẩm</th>
                                        <th class="cart-product-total">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( Cart::getContent() as $item )
                                    <tr class="cart_item">
                                        <td class="cart-product-name"> {{ $item->name }}<strong class="product-quantity">
                                        × {{ $item->quantity }}</strong></td>
                                        <td class="cart-product-total"><span class="amount">{{ number_format($item->price * $item->quantity) }}₫</span></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Phí vận chuyển</th>
                                        <td><span class="amount">{{  number_format(27000) }}₫</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Tổng tiền đơn hàng</th>
                                        <td><strong><span class="amount">{{  number_format(Cart::gettotal() + 27000) }}₫</span></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                            @endif
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div class="order-button-payment">
                                    <input value="Thanh toán" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection