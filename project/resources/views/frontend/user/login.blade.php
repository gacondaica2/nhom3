@extends('frontend.template')
@section('content')

<div class="kenne-login-register_area">
    <div class="container">
        @include('frontend.messages.messages')
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
                <!-- Login Form s-->
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">Đăng Nhập</h4>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <label>Địa Chỉ Email*</label>
                                <input type="email" name="email" placeholder="Email Address">
                            </div>
                            <div class="col-12 mb--20">
                                <label>Mật Khẩu</label>
                                <input type="password" name="password" placeholder="Password">
                            </div>
                            <div class="col-md-8">
                                <div class="check-box">
                                    <input type="checkbox" id="remember_me">
                                    <label for="remember_me">Nhớ</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="kenne-login_btn">Đăng nhập</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form action="{{  route('register') }}" method="POST">
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">Đăng Ký</h4>
                        <div class="row">
                            <div class="col-md-6 col-12 mb--20">
                                <label>Tên </label>
                                <input type="text" name="firstname" value="{{ old('firstname','')}}" placeholder="First Name">
                            </div>
                            <div class="col-md-6 col-12 mb--20">
                                <label>Họ</label>
                                <input type="text" name="lastname" value="{{ old('lastname','')}}" placeholder="Last Name">
                            </div>
                            <div class="col-md-12">
                                <label>Địa chỉ Email*</label>
                                <input type="email" name="email" value="{{ old('email','')}}" placeholder="Email Address">
                            </div>
                            <div class="col-md-6">
                                <label>Mật khẩu*</label>
                                <input type="password" name="password" placeholder="Password">
                            </div>
                            <div class="col-md-6">
                                <label>Nhập lại mật khẩu*</label>
                                <input type="password" name="repassword" placeholder="Confirm Password">
                            </div>
                            <div class="col-12">
                                <button class="kenne-register_btn" type="submit">Đăng ký</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
                <!-- Login Form s-->
                <form action="{{ route('forgot_password') }}" method="POST">
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">Quên mật khẩu</h4>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <label>Địa Chỉ Email*</label>
                                <input type="email" name="email" placeholder="Email Address">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="kenne-login_btn">Lấy lại mật khẩu</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection