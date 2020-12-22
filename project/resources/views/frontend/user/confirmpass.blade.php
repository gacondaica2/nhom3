@extends('frontend.template')
@section('content')
<div class="kenne-login-register_area">
    <div class="container">
        @include('frontend.messages.messages')
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
                <!-- confirm password-->
                <form action="{{ route('confirm_password_post', $record->email ) }}" method="POST">
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">Tài khoản {{ $record->email }}</h4>
                        <div class="row">
                            <div class="col-12 mb--20">
                                <label>Mật khẩu mới</label>
                                <input type="password" name="password" placeholder="Mật khẩu mới">
                            </div>
                            <div class="col-12 mb--20">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" name="repassword" placeholder="Nhập lại mật khẩu">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="kenne-login_btn">Thay đổi</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection