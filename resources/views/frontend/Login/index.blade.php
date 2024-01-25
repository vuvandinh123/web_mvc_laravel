@extends('layout.site')

@section('css')
    <style>
        .email_login input,
        .password_login input {
            width: 100%;
            height: 40px;
            padding: 20px;
            border-radius: 5px;
            font-size: 1.4rem;
            font-weight: 400;
            border: 1px solid rgba(69, 67, 67, 0.1);
            outline: none;
        }
    </style>
@endsection
@section('content')
    <div class="container mt-5">
        <div class="breadcrumb">
            <ul class="d-flex">
                <li class="">
                    <a class="me-md-3 me-1" href="#">Trang chủ</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li class="">Đăng nhập tài khoản</li>
            </ul>
        </div>
        <h1 class="text-center color-red fw-bold">Đăng nhập tài khoản</h1>
        <section class="my-5">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="fw-500 text-uppercase">Đăng nhập tài khoản</h3>
                    <p class="my-5 fs-4">Nếu bạn đã có tài khoản đăng nhập ở đây</p>
                    <div class="form-login">
                        <form action="{{ route('site.loginStore') }}" method="post">
                            @csrf
                            @method('post')
                            <div class="email_login">
                                <label class="d-block fs-4 mt-5 mb-3" for="email">Email *</label>
                                <input type="email" name="email" id="email" placeholder="Email" required>
                            </div>
                            <div class="password_login">
                                <label class="d-block fs-4 mt-4 mb-3" for="password">Mật khẩu *</label>
                                <input type="password" name="password" id="password " required placeholder="Mật khẩu">
                            </div>
                            <div class="button-hover mt-5">
                                <button class="fs-4"> Đăng nhập</button>
                                <a class="ms-5 link-hover" href="register.html">Đăng ký</a>
                            </div>
                            <div class="login-other mt-5">
                                <p class="text-center fs-4">Đăng nhập bằng</p>
                                <div class="other-content d-flex justify-content-center">
                                    <div class="other-item-facebook w-25 me-3">
                                        <a href=""><img class="w-100"
                                                src="https://bizweb.dktcdn.net/assets/admin/images/login/fb-btn.svg"
                                                alt=""></a>

                                    </div>
                                    <div class="other-item-google w-25">
                                        <a href=""><img class="w-100"
                                                src="https://bizweb.dktcdn.net/assets/admin/images/login/gp-btn.svg"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 mt-5">
                    <h3 class="fw-500 fs-4 mt-5 fw-semibold">Bạn quyên mật khẩu ?</h3>
                    <p class="mb-md-5 mb-3 fs-5">Nhập địa chỉ email để lấy lại mật khẩu qua email.</p>
                    <div class="form-login-reset">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="email_login">
                                        <label class="d-block fs-4 my-3" for="email">Email *</label>
                                        <input type="email" name="email" required id="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md mt-md-0 mt-4 text-center">
                                    <div class="btn-reset-password button-hover">
                                        <button>Lấy lại mật khẩu</button>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>

    </div>


    </section>
    </div>
@endsection
