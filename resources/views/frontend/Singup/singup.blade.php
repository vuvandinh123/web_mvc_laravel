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
                <li class="">Đăng ký</li>
            </ul>
        </div>
        <h1 class="text-center color-red fw-bold">Đăng ký tài khoản</h1>
        <section class="my-5">
            <h3 class="fw-500 text-uppercase">Đăng ký tài khoản</h3>
            <p class="my-3 fs-4">Nếu chưa có tài khoản vui lòng đăng ký tại đây</p>
            <div class="form-register">
                <form action="{{ route('site.singupStore') }}" method="post">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="first_register">
                                <label class="d-block fs-4 mt-5 mb-3" for="first-name">Họ và tên*</label>
                                <input class="border rounded-2 w-100 p-3 fs-4" type="text" name="name" id="first-name"
                                    placeholder="Họ" required>
                            </div>
                            <div class="email_register">
                                <label class="d-block fs-4 mt-4 mb-3" for="email">Email *</label>
                                <input class="border rounded-2 w-100 p-3 fs-4" type="email" name="email" id="email "
                                    required placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="name_register">
                                <label class="d-block fs-4 mt-5 mb-3" for="email">Tên tài khoản *</label>
                                <input class="border rounded-2 w-100 p-3 fs-4" type="text" name="username" id="lastname"
                                    placeholder="Tên tài khoản" required>
                            </div>
                            <div class="password_register">
                                <label class="d-block fs-4 mt-4 mb-3" for="password">Mật khẩu *</label>
                                <input class="border rounded-2 w-100 p-3 fs-4" type="password" name="password"
                                    id="password " required placeholder="Mật khẩu">
                            </div>
                        </div>
                    </div>
                    <style>
                        .register-other img {
                            width: 150px;

                        }
                    </style>
                    <div class="button-hover mt-5 ">
                        <button type="submit" class="fs-4"> Đăng ký</button>
                        <a class="ms-5 link-hover" href="login.html">Đăng nhập</a>
                    </div>
                    <div class="register-other mt-5  w-100 m-auto">
                        <p class="text-center fs-4">Hoặc Đăng nhập bằng</p>
                        <div class="other-content d-flex justify-content-center ">
                            <div class="other-item-facebook me-3">
                                <a href=""><img class=""
                                        src="https://bizweb.dktcdn.net/assets/admin/images/login/fb-btn.svg"
                                        alt=""></a>

                            </div>
                            <div class="other-item-google ">
                                <a href=""><img class=""
                                        src="https://bizweb.dktcdn.net/assets/admin/images/login/gp-btn.svg"
                                        alt=""></a>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-md-6">

                </div>

                </form>
            </div>
    </div>
    </div>

    </div>


    </section>
    </div>
@endsection
