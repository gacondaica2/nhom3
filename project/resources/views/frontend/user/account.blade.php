@extends('frontend.template')
@section('content')
<main class="page-content">
    <div class="account-page-area">
        <div class="container">
        @include('frontend.messages.messages')
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="account-dashboard-tab" data-toggle="tab" href="#account-dashboard" role="tab" aria-controls="account-dashboard" aria-selected="true">Tài khoản</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-orders" role="tab" aria-controls="account-orders" aria-selected="false">Đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-details-tab" data-toggle="tab" href="#account-details" role="tab" aria-controls="account-details" aria-selected="false">Chi tiết tài khoản</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-logout-tab" href="{{ route('logout') }}" role="tab" aria-selected="false">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9">
                    <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                        <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel" aria-labelledby="account-dashboard-tab">
                            <div class="myaccount-dashboard">
                                <p>Xin chào  <b><h3> {{ Auth::user()->name }}</h3></b></p>
                                <p>Từ trang tổng quan tài khoản, bạn có thể xem các đơn đặt hàng gần đây, quản lý địa chỉ giao hàng và thanh toán cũng như chỉnh sửa mật khẩu và chi tiết tài khoản của mình.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-orders" role="tabpanel" aria-labelledby="account-orders-tab">
                            <div class="myaccount-orders">
                                <h4 class="small-title">Danh sách đơn hàng</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên người mua</th>
                                                <th>Tình trạng</th>
                                                <th>HÌnh thức thanh toán</th>
                                                <th>Tổng tiền</th>
                                                <th>Xem</th>
                                            </tr>
                                            @if( isset($records) && !empty($records) > 0)
                                                @foreach($records as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ Auth::user()->name }}</td>
                                                    <td>{{ ($item->status) == 0 ? "Chờ xác nhận" : "Đang giao" }}</td>
                                                    <td>{{ ($item->paymod) == 1 ? "Tại cửa hàng" : "ghn" }}</td>
                                                    <td>{{  number_format($item->total) }}₫</td>
                                                    <td><a href="{{ route('detail_order', $item->id)}}">Chi Tiết</a></td>
                                                </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">
                            <div class="myaccount-details">
                                <form action="{{ route('change_info') }}" method="POST" class="kenne-form">
                                    @csrf
                                    <div class="kenne-form-inner">
                                        <div class="single-input single-input-half">
                                            <label for="account-details-firstname">Tên người dùng</label>
                                            <input type="text" name="name" value="{{ Auth::user()->name }}" id="account-details-firstname">
                                        </div>
                                        <div class="single-input">
                                            <label for="account-details-email">Email*</label>
                                            <input type="email" name="email"  value="{{ Auth::user()->email }}" id="account-details-email">
                                        </div>
                                        <div class="single-input">
                                            <label for="account-details-oldpass">Thay đổi mật khẩu</label>
                                            <input type="password" name="password" id="account-details-oldpass">
                                        </div>
                                        <div class="single-input">
                                            <label for="account-details-newpass">Mật khẩu mới</label>
                                            <input type="new_password" name="new_password" id="account-details-newpass">
                                        </div>
                                        <div class="single-input">
                                            <button class="kenne-btn kenne-btn_dark" type="submit"><span>Lưu thay đổi</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kenne's Account Page Area End Here -->
</main>
@endsection