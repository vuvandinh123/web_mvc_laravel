@extends('layout.site')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection
@section('content')
    <div class="container mt-5">
        <div class="breadcrumb">
            <ul class="d-flex">
                <li class="">
                    <a class="me-md-3 me-1" href="#">Trang chủ</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li class="">Gio hàng</li>
            </ul>
        </div>
        <h1 class="text-center color-red fw-bold">Gio hang</h1>
        <section class="cart my-5 p-2">
            <h2 class="fw-bold fs-1">
                Gio hàng của bạn
                <span class="text-secondary fs-4">( <span class="qty-product"></span> sản phẩm )</span>
            </h2>
            <div class="wrapper">
                <div class="row border-bottom py-4">
                    <div class="col-md-6 col-5">
                        <strong class="fs-2">Sản phẩm</strong>
                    </div>
                    <div class="col-md-2 col-3 d-md-block d-none">
                        <strong class="fs-2">Giá</strong>
                    </div>
                    <div class="col-md-2 col-3 d-md-block d-none">
                        <strong class="fs-2">Số Lượng</strong>
                    </div>
                    <div class="col-md-2 col-4 d-md-block d-none">
                        <strong class="fs-2">Thanh tiền</strong>
                    </div>
                </div>
                <div id="list-cart-container">

                </div>


            </div>
            <div class="mt-5 d-flex justify-content-end">
                <div class="total pb-4 border-bottom d-flex justify-content-between">
                    <span class="fs-2 me-3 fw-bold">Thành tiền: </span>
                    <span class="fs-2 fw-bold color-red total-cart-price">12.000.000đ</span>
                </div>
            </div>

            <div class="d-flex justify-content-end my-3">
                <a class="total-submit btn-hover" href="{{ route('site.order') }}">Tiến hành thanh toán</a>
            </div>
            <a class="total-item-2 p-3" href="#">Tiếp tục mua hàng</a>
        </section>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/site/cart.js') }}"></script>
@endsection
