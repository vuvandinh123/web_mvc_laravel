<!DOCTYPE html>
<html lang="en">
@vite('resources/js/app.js')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/inheritance.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hearder.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    @yield('css')
</head>

<body>
    {{-- header --}}
    <div class="hearder">
        <div class="topbar d-md-block d-none">
            <a href="index.php?option=product&category=giay-the-thao"><img class="w-100"
                    src="{{ asset('images/topbar.webp') }}" alt="anh"></a>

        </div>
        <div class="container">
            <div class="d-flex header-search justify-content-between align-items-center">
                <div class="btn-mb cusom ms-4">
                    <span><img
                            src="https://bizweb.dktcdn.net/100/342/645/themes/701397/assets/i_menubar.png?1677377108874"
                            alt=""></span>
                </div>
                <div class=" img-logo"><a href="index.php"><img class="" src="{{ asset('images/logo.png') }}"
                            alt="logo.webp"></a>
                </div>
                <div class=" ">
                    <form class="" action="{{ route('site.search') }}" id="search" method="get">
                        <div class="input-group search-md mx-auto mb-3 ">
                            <input type="text" name="s" class="form-control border-end-0 search"
                                placeholder="Tim kiem" aria-label="Recipient's username"
                                aria-describedby="basic-addon2">
                            <button type="submit"
                                class="input-group-text bg-white text-danger border-start-0 search-button"
                                id="basic-addon2"><i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>

                </div>

                <div class="">
                    <div class="row">
                        <div class="d-flex justify-content-end  align-items-center">
                            <div class="search-mb text-white ">
                                <i class="fa-solid fa-search fs-3 "></i>
                                <div class="form-search-mb">
                                    <form action="" method="post">
                                        <input class="border" name="value" type="text" placeholder="Tim kiem">
                                        <button class="border-0" name="search" type='submit'><i
                                                class="fa-solid fa-search fs-3 "></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="support1  rounded-pill border border-danger"
                                onclick="location.href='tel:0333583800'">
                                <p class="m-0 ps-5  ">Tư vấn bán hàng</p>
                                <span class="ps-4 fw-bold  fs-4">Gọi ngay 19006750</span>
                            </div>
                            <div class=" account ms-4">
                                <div class="account-icon text-white">
                                    <span class="fs-2 ms-4"><i class="fa-solid fa-user pt-3 "></i></span>
                                </div>
                                <div class="icon-hover">
                                    @if (!Cookie::has('login_data'))
                                        <a class="btn-hover dn mt-3 text-center fs-4 fw-bold"
                                            href="{{ route('site.login') }}">Đăng nhập</a>
                                        <a class="btn-hover dk mt-3 text-center fs-4 fw-bold"
                                            href="?option=customer&f=logup">Đăng ký</a>
                                    @else
                                        <a class="btn-hover dn mt-3 text-center fs-4 fw-bold"
                                            href="{{ route('site.logout') }}">Đăng xuất</a>
                                    @endif
                                </div>
                            </div>


                            <div class=" ms-5">
                                <div class="account-icon cart  text-white position-relative cart-hide" data-count='1'>
                                    <a class="text-white" href="{{ route('site.cart') }}"><span class="fs-2 ms-3"> <i
                                                class="fa-solid fa-cart-shopping mt-3"></i> </span></a>
                                    <div class="cart-sidebar cart-container position-absolute">
                                        <div id="cart-top" class=" cart-top">
                                        </div>
                                        <div
                                            class="cart-bottom border-top d-flex justify-content-between text-dark p-3">
                                            <div class='fs-2 '>Tổng tiền</div>
                                            <div class='fs-2 text-danger total_price_cart fw-bold'>
                                                đ
                                            </div>

                                        </div>
                                        <div class='text-dark thanh-toan my-5'><a class="btn-link-cart"
                                                href='?option=oder'>Tiến hành thanh toán</a></div>
                                    </div>
                                    <div class="cart-sidebar cart-none d-none position-absolute">
                                        <div class="text-success p-4 fs-3">chưa có sản phẩm trong giỏ hàng</div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <style>
            .drop_down-item {
                display: flex;
                justify-content: space-between;
            }
        </style>
        <div class="nav ">
            <div class=" pss">
                <div class="row nav-1 ">
                    <x-main-menu />
                </div>
            </div>
        </div>
    </div>

    @yield('content')
    {{-- footer --}}
    <div class="container aa">

        <div class="my-3 container">
            <hr>
            <div class="row">
                <div class="col py-4 animationTop ">
                    <div class="row">
                        <div class="col-md-3 pb-3 text-center">
                            <img src="https://bizweb.dktcdn.net/100/342/645/themes/701397/assets/srv_1.png?1677377108874"
                                alt="">
                        </div>
                        <div class="col">
                            <p class="p-0 m-0  fw-bold fs-3">Miễn phí vận chuyển</p>
                            <span class="fs-5 text-secondary">Miễn phí vận chuyển nội thành</span>
                        </div>
                    </div>
                </div>
                <div class="col py-4 animationTop ">
                    <div class="row">
                        <div class="col-md-3 pb-3 text-center">
                            <img src="https://bizweb.dktcdn.net/100/342/645/themes/701397/assets/srv_2.png?1677377108874"
                                alt="">
                        </div>
                        <div class="col">
                            <p class="p-0 m-0  fw-bold fs-3">Đổi trả hàng</p>
                            <span class="fs-5 text-secondary">Đổi trả lên tới 30 ngày</span>
                        </div>
                    </div>
                </div>
                <div class="col py-4 animationTop ">
                    <div class="row">
                        <div class="col-md-3 pb-3 text-center">
                            <img src="https://bizweb.dktcdn.net/100/342/645/themes/701397/assets/srv_3.png?1677377108874"
                                alt="">
                        </div>
                        <div class="col">
                            <p class="p-0 m-0  fw-bold fs-3">Tiết kiệm thời gian</p>
                            <span class="fs-5 text-secondary">Mua sắm dễ hơn khi online</span>
                        </div>
                    </div>
                </div>
                <div class="col py-4 animationTop ">
                    <div class="row">
                        <div class="col-md-3 pb-3 text-center">
                            <img src="https://bizweb.dktcdn.net/100/342/645/themes/701397/assets/srv_4.png?1677377108874"
                                alt="">
                        </div>
                        <div class="col">
                            <p class="p-0 m-0  fw-bold fs-3">Tư vấn trực tiếp</p>
                            <span class="fs-5 text-secondary">Đội ngũ tư vấn nhiệt tình</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <footer>
        <div class="footer-top">
            <div class="container">
                <h6 class="fs-1 text-center">
                    NHẬP MAIL
                </h6>
                <p class="text-center">Để nhận tin tức khuyến mãi từ cửa hàng của chúng tôi</p>
                <form action="">
                    <div class="input-group mb-3 input-footer">
                        <input type="text" class="form-control " placeholder="Nhập email của bạn"
                            aria-label="Nhập email của bạn" aria-describedby="basic-addon2">
                        <button class="btn btn-outline-secondary bg-danger text-white" type="button"
                            id="button-addon2">GỬI
                            NGAY</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container p-5">
            <div class="row">
                <div class="col-md col-12 text-center">
                    <h6 class="fs-2 fw-bold mb-3">Hệ thống của hàng</h6>
                    <p class=" fs-4 fw-bold">Sea Shoes Hồ Chí Minh</p>
                    <p class=" fs-4 text-secondary">Địa chỉ: 366 Đội Cấn Ba Đình Hồ Chí Minh</p>
                    <p class=" fs-4 text-secondary">Hotline: 0333583800</p>
                    <p class=" fs-4 fw-bold">Sea Shoes Hồ Chí Minh</p>
                    <p class=" fs-4 text-secondary">Địa chỉ: 366 Đội Cấn Ba Đình Hồ Chí Minh</p>
                    <p class=" fs-4 text-secondary">Hotline: 0333583800</p>
                </div>
                <div class="col-md col-6 text-center my-3">
                    <ul>
                        <h6 class="fs-3  mb-4 text-uppercase">giới thiệu</h6>

                        <li class='mb-4 text-secondary fs-4'><a class="a-hover link-hover"href="/chinh-sach-mua-hang">
                            chính sách đổi trả</a></li>
                        <li class='mb-4 text-secondary fs-4'><a class="a-hover link-hover"href="/chinh-sach-bao-hanh">chính sách bảo hành</a></li>
                        <li class='mb-4 text-secondary fs-4'><a class="a-hover link-hover"href="/chinh-sach-van-chuyen">chính sách vận chuyển</a></li>


                    </ul>
                </div>
                <div class="col-md col-6 my-3 text-center">

                    <ul>
                        <h6 class="fs-3  mb-4 text-uppercase">Liên hệ</h6>

                        <li class='mb-4 text-secondary fs-4'><a class="a-hover link-hover"href="/lien-he">Liên hệ</a></li>
                        

                    </ul>
                </div>
                <div class="col-md col-12 text-center">
                    <h6 class="fs-3 ms-4 mb-4">Đăng ký</h6>
                    <div class="icon-img-footer">
                        <img src="https://bizweb.dktcdn.net/100/369/492/themes/799053/assets/bocongthuong.png?1664335617141"
                            alt="">
                    </div>
                    <h6 class="fs-3 ms-4 my-4 ">Thanh toán</h6>

                    <div class="icon-img-footer ms-4">
                        <img src="https://bizweb.dktcdn.net/100/369/492/themes/799053/assets/payment.png?1664335617141"
                            alt="">
                    </div>


                </div>
            </div>
        </div>
        <div class="footer-bot bg-dark">
            <h4 class="text-white text-center py-3">
                © Bản quyền thuộc về <span class="text-danger"> Định</span> | Cung cấp bởi Định
            </h4>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('js/ajax.js') }}"></script>
    <script src="{{ asset('js/site/index.js') }}"></script>

    <script>
        $(".details-image-items").slick({
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            lazyLoad: 'ondemand',
            slidesToScroll: 4,
            centerPadding: '60px',
        });
        $('.image-brand').slick({
            // dots: true,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            variableWidth: true
        });
    </script>
    @yield('js')
</body>

</html>
