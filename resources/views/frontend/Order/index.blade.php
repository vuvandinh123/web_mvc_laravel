@extends('layout.site')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/oder.css') }}">
@endsection
@section('content')
    <div class="color-oder mt-5">
        <div class="container ">
            <div class="row">
                <div class="col-md-9">
                    <div class="breadcrumb">
                        <ul class="d-flex">
                            <li class="">
                                <a class="me-md-3 me-1" href="#">Trang chủ</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li class="">
                                <a class="me-md-3 me-1" href="#">Gio hàng</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li class="">Thanh toán</li>
                        </ul>
                    </div>
                    <h3 class="fs-1 fw-bold color-red  text-center">Đặt hàng</h3>
                    <form action="" method="post">
                        <div class="row">
                            <div class="">
                                <h3 class="color-red my-3 mt-5 text-uppercase">Thông tin nhận hàng</h3>
                                <div>
                                    <div class="row">
                                        <div class="col-6 my-3">

                                            <div class=" wave-group">
                                                <label for="" class="form-label">Họ Và tên</label>
                                                <input required="" type="text" class="py-3 form-control">
                                                
                                                
                                            </div>
                                        </div>
                                        <div class="col-6 my-3">

                                            <div class="">
                                                <label for="" class="form-label">Email</label>
                                                <input required="" type="email" class="py-3 form-control">
                                                 
                                            </div>
                                        </div>
                                        <div class="my-3">
                                            <div class="wave-group">
                                                <label for="">Số điện thoại</label>
                                                <input required="" type="text" class="form-control py-3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <div class="wave-group">
                                            <label for="" class="form-label">Địa chỉ nhà, tên
                                                đường</label>
                                            <input required="" type="text" class="form-control py-3">
                                            
                                        </div>
                                    </div>
                                    <div class="my-5">
                                        <div class="">
                                            <label for="" class="form-label mb-3">Ghi chú</label>
                                            <textarea required="" type="text" style="min-height: 200px" class="form-control"></textarea>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <h3 class="color-red my-5">Vận chuyển</h3>
                            <div>
                                <div class="  border rounded p-3 d-flex justify-content-between">
                                    <div>
                                        <input required="" id="vanchuyen" name="vanchuyen" type="radio" checked
                                            class="input me-3">
                                        <label for="vanchuyen" class="">
                                            <span class="label-char fs-4" style=""></span>
                                        </label>
                                    </div>

                                    <span class=" fs-4">40.000đ</span>
                                </div>
                                <h3 class="color-red my-5 ">Thanh toán</h3>

                                <div class="wave-group2  border rounded p-3 d-flex justify-content-between">
                                    <div>
                                        <input required="" id="giaohang" name="thanhtoan" type="radio" checked
                                            class="input me-3"></input>
                                        <label for="giaohang" class="">
                                            <span class="label-char fs-4" style="--index: 0">Thanh toán khi nhận
                                                hàng</span>
                                        </label>
                                    </div>

                                    <span class=" fs-4"><i class="fa-regular fa-money-bill-1"></i></span>
                                </div>
                                <div class="wave-group2  border rounded p-3 my-3 d-flex justify-content-between">
                                    <div>
                                        <input required="" id="momo" name="thanhtoan" type="radio" checked
                                            class="input me-3"></input>
                                        <label for="momo" class="">
                                            <span class="label-char fs-4" style="--index: 0">Thanh toán bằng MoMo</span>
                                        </label>
                                    </div>

                                    <span class=" fs-4"><i class="fa-regular fa-money-bill-1"></i></span>
                                </div>
                                <div class="wave-group2  border rounded p-3 my-2 d-flex justify-content-between">
                                    <div>
                                        <input required="" id="bank" name="thanhtoan" type="radio" checked
                                            class="input me-3"></input>
                                        <label for="bank" class="">
                                            <span class="label-char fs-4" style="--index: 0">Chuyển khoản</span>
                                        </label>
                                    </div>

                                    <span class=" fs-4"><i class="fa-regular fa-money-bill-1"></i></span>
                                </div>
                            </div> --}}
                            <div class="button-hover my-5 ">
                                <button class="w-100 fs-4">Đặt hàng</button>
                            </div>
                        </div>
                </div>
                <div class="col-md-3 border bg-fafa">
                    <div class="py-3 border-bottom">
                        <h3 class="">Đơn hàng (1 sản phẩm)</h3>
                    </div>
                    <div class="list-cart-oder  " style="max-height: 300px; overflow-y: scroll; overflow-x: hidden;">
                        <div class="cart-oder mt-3">
                            <div class="row">
                                <div class="col-2  rounded-2">
                                    <div class="overflow-hidden" style="height: 50px; width: 50px; border-radius: 5px;">
                                        <img class="w-100 h-100"
                                            src="https://bizweb.dktcdn.net/thumb/large/100/415/502/products/1.jpg?v=1614679115547"
                                            alt="">
                                    </div>

                                </div>
                                <div class="col-7 ms-1">
                                    <h5><a class="link-hover" href=""> Giày thể thao kiểu dáng Ultra boots</a></h5>
                                </div>
                                <div class="col-md fs-4"><span class="color-secondary">120.000đ</span></div>

                            </div>
                        </div>
                        <div class="cart-oder mt-3">
                            <div class="row">
                                <div class="col-2  rounded-2">
                                    <div class="overflow-hidden" style="height: 50px; width: 50px; border-radius: 5px;">
                                        <img class="w-100 h-100"
                                            src="https://bizweb.dktcdn.net/thumb/large/100/415/502/products/1.jpg?v=1614679115547"
                                            alt="">
                                    </div>

                                </div>
                                <div class="col-7 ms-1">
                                    <h5><a class="link-hover" href=""> Giày thể thao kiểu dáng Ultra boots</a></h5>
                                </div>
                                <div class="col-md fs-4"><span class="color-secondary">120.000đ</span></div>

                            </div>
                        </div>
                        <div class="cart-oder mt-3">
                            <div class="row">
                                <div class="col-2  rounded-2">
                                    <div class="overflow-hidden" style="height: 50px; width: 50px; border-radius: 5px;">
                                        <img class="w-100 h-100"
                                            src="https://bizweb.dktcdn.net/thumb/large/100/415/502/products/1.jpg?v=1614679115547"
                                            alt="">
                                    </div>

                                </div>
                                <div class="col-7 ms-1">
                                    <h5><a class="link-hover" href=""> Giày thể thao kiểu dáng Ultra boots</a></h5>
                                </div>
                                <div class="col-md fs-4"><span class="color-secondary">120.000đ</span></div>

                            </div>
                        </div>
                        <div class="cart-oder mt-3">
                            <div class="row">
                                <div class="col-2  rounded-2">
                                    <div class="overflow-hidden" style="height: 50px; width: 50px; border-radius: 5px;">
                                        <img class="w-100 h-100"
                                            src="https://bizweb.dktcdn.net/thumb/large/100/415/502/products/1.jpg?v=1614679115547"
                                            alt="">
                                    </div>

                                </div>
                                <div class="col-7 ms-1">
                                    <h5><a class="link-hover" href=""> Giày thể thao kiểu dáng Ultra boots</a></h5>
                                </div>
                                <div class="col-md fs-4"><span class="color-secondary">120.000đ</span></div>

                            </div>
                        </div>

                    </div>
                    <div class="d-flex mt-5 border-bottom border-top py-5">
                        <input style="height: 40px;" type="text" class="border fs-4 p-2 rounded-2 w-75"
                            placeholder="MÃ GIẢM GIÁ">
                        <button class="btn bg-info ms-3 text-white">Áp dụng</button>
                    </div>
                    <div class="d-flex justify-content-between my-4">
                        <div class="fs-4 fw-bold">Tạm tính:</div>
                        <span class="fs-4 color-red fw-semibold">123.000đ</span>
                    </div>
                    <div class="d-flex justify-content-between my-5">
                        <div class="fs-4 fw-bold">Phí vận chuyển:</div>
                        <span class="fs-4 color-red fw-semibold">40.000đ</span>
                    </div>
                    <div class="border-bottom"></div>
                    <div>
                    </div>
                    <div class="d-flex justify-content-between my-3">
                        <div class="fs-2 fw-bold">Tổng cộng:</div>
                        <span class="fs-3 color-red fw-bold">163.000đ</span>
                    </div>
                </div>
            </div>
        </div>

        </form>

    </div>
@endsection
