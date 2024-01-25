@extends('layout.site')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/news.css') }}">
@endsection
@section('content')
    <div class="container mt-5">
        <div class="breadcrumb">
            <ul class="d-flex">
                <li class="">
                    <a class="me-md-3 me-1" href="#">Trang chủ</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li class="">Tin tức</li>
            </ul>
        </div>
        <h1 class="text-center color-red fw-bold">Tin tức</h1>
        <section>
            <div class="row">
                <div class="col-md-3 ">
                    <aside>
                        <h5 class="text-uppercase fs-3 my-5">danh mục tin tức</h5>
                        <div class="category-wrap-left border px-2">
                            <ul>
                                <li class="mt-3 d-flex "><a class="link-hover fs-4 link d-block fw-4" href="">Trang
                                        chủ </a></li>
                                <li class="mt-3 d-flex">
                                    <a class="link-hover link fs-4 d-block fw-4" href="">Sản phẩm</a>
                                    <i class="click-icon p-3 fa-solid fa-chevron-down"></i>
                                </li>

                                <ul class="category-dropdow display-none">
                                    <li class="d-flex my-3"><a class="link-hover link d-block fs-4 fw-4 fw-4"
                                            href="#">Giay nam</a>
                                        <i class="click-icon p-3 fa-solid fa-chevron-down"></i>
                                    </li>
                                    <ul class="category-dropdow display-none">
                                        <li class="mt-2 d-flex "><a class="link-hover fs-4 fw-4" href="">Giày lười,
                                                giày mọi</a></li>
                                        <li class="mt-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Giày
                                                casual</a></li>
                                        <li class="mt-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Giày bốt
                                                nam</a></li>
                                        <li class="mt-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Sneaker
                                                nam</a></li>
                                        <li class="mt-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Giày tăng
                                                chiều cao</a></li>
                                        <li class="mt-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Xăng đan,
                                                dép kẹp</a></li>
                                    </ul>
                                    <li class="my-3 d-flex"><a class="link-hover link d-block fs-4 fw-4" href="#">Giày
                                            nữ</a>
                                        <i class="click-icon p-3 fa-solid fa-chevron-down"></i>
                                    </li>
                                    <ul class="category-dropdow display-none">
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Giày lười,
                                                giày mọi</a></li>
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Giày
                                                casual</a></li>
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Giày bốt
                                                nữ</a></li>
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Sneaker
                                                nữ</a></li>
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Giày tăng
                                                chiều cao</a></li>
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Xăng đan,
                                                dép kẹp</a></li>
                                    </ul>
                                    <li class="my-3 d-flex"><a class="link-hover link d-block fs-4 fw-4" href="#">Giày
                                            bé trai</a>
                                        <i class="click-icon p-3 fa-solid fa-chevron-down"></i>
                                    </li>
                                    <ul class="category-dropdow display-none">
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Giày lười,
                                                giày mọi</a></li>
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Giày
                                                casual</a></li>
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Giày bốt
                                                nữ</a></li>
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Sneaker
                                                nữ</a></li>
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Giày tăng
                                                chiều cao</a></li>
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Xăng đan,
                                                dép kẹp</a></li>
                                    </ul>
                                    <li class="my-3 d-flex"><a class="link-hover link d-block fs-4 fw-4" href="#">Giày
                                            bé gái</a>
                                        <i class="click-icon p-3 fa-solid fa-chevron-down"></i>

                                    </li>
                                    <ul class="category-dropdow display-none">
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Giày lười,
                                                giày mọi</a></li>
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Giày
                                                casual</a></li>
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Giày bốt
                                                nữ</a></li>
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Sneaker
                                                nữ</a></li>
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Giày tăng
                                                chiều cao</a></li>
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Xăng đan,
                                                dép kẹp</a></li>
                                    </ul>
                                    <li class="my-3 d-flex"><a class="link-hover link d-block fs-4 fw-4"
                                            href="#">Giày tây</a>
                                        <i class="click-icon p-3 fa-solid fa-chevron-down"></i>
                                    </li>
                                    <ul class="category-dropdow display-none">
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Giày
                                                lười, giày mọi</a></li>
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Giày
                                                casual</a></li>
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Giày bốt
                                                nữ</a></li>
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Sneaker
                                                nữ</a></li>
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Giày tăng
                                                chiều cao</a></li>
                                        <li class="my-3 d-flex "><a class="link-hover fs-4 fw-4" href="">Xăng đan,
                                                dép kẹp</a></li>
                                    </ul>
                                </ul>
                                <li class="my-3 d-flex "><a class="link-hover link d-block fs-4 fw-4" href="">Giay
                                        thể thao</a></li>
                                <li class="my-3 d-flex "><a class="link-hover link d-block fs-4 fw-4" href="">Liên
                                        hệ</a></li>
                                <li class="my-3 d-flex "><a class="link-hover link d-block fs-4 fw-4" href="">Giới
                                        thiệu</a></li>
                                <li class="my-3 d-flex "><a class="link-hover link d-block fs-4 fw-4" href="">Tin
                                        tức</a></li>

                            </ul>
                        </div>
                    </aside>
                    <div class="wrap-hot mt-5  ">
                        <h3 class="fs-3 text-uppercase my-4 link-hover">Bộ sưu tập hot</h3>
                        <div class="list-product-mini">
                            <div class="product-mini-item mb-3 border p-2 animationTop">
                                <div class="row">
                                    <div class="col-4"><img
                                            src="https://bizweb.dktcdn.net/thumb/medium/100/342/645/products/men-s-original-canvas-casual-skate-shoes.png?v=1545564063607"
                                            alt=""></div>
                                    <div class="col">
                                        <div class="product-content-mini">
                                            <h4 class="  my-2"><a class="link-hover" href="#">Giày thể thao nữ cổ
                                                    thấp
                                                    mẫu mới nhất</a></h4>
                                            <span class="color-red fw-bold fs-3">268.000đ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-mini-item my-3 border p-2 animationTop delay-01">
                                <div class="row">
                                    <div class="col-4"><img
                                            src="https://bizweb.dktcdn.net/thumb/medium/100/342/645/products/men-s-original-canvas-casual-skate-shoes.png?v=1545564063607"
                                            alt=""></div>
                                    <div class="col">
                                        <div class="product-content-mini">
                                            <h4 class="  my-2"><a class="link-hover" href="#">Giày thể thao nữ cổ
                                                    thấp
                                                    mẫu mới nhất</a></h4>
                                            <span class="color-red fw-bold fs-3">268.000đ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-mini-item my-3 border p-2 animationTop delay-02">
                                <div class="row">
                                    <div class="col-4"><img
                                            src="https://bizweb.dktcdn.net/thumb/medium/100/342/645/products/men-s-original-canvas-casual-skate-shoes.png?v=1545564063607"
                                            alt=""></div>
                                    <div class="col">
                                        <div class="product-content-mini">
                                            <h4 class="  my-2"><a class="link-hover" href="#">Giày thể thao nữ cổ
                                                    thấp
                                                    mẫu mới nhất</a></h4>
                                            <span class="color-red fw-bold fs-3">268.000đ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-mini-item my-3 border p-2 animationTop delay-03">
                                <div class="row">
                                    <div class="col-4"><img
                                            src="https://bizweb.dktcdn.net/thumb/medium/100/342/645/products/men-s-original-canvas-casual-skate-shoes.png?v=1545564063607"
                                            alt=""></div>
                                    <div class="col">
                                        <div class="product-content-mini">
                                            <h4 class="  my-2"><a class="link-hover" href="#">Giày thể thao nữ cổ
                                                    thấp
                                                    mẫu mới nhất</a></h4>
                                            <span class="color-red fw-bold fs-3">268.000đ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-mini-item border p-2 animationTop delay-04">
                                <div class="row">
                                    <div class="col-4"><img
                                            src="https://bizweb.dktcdn.net/thumb/medium/100/342/645/products/men-s-original-canvas-casual-skate-shoes.png?v=1545564063607"
                                            alt=""></div>
                                    <div class="col">
                                        <div class="product-content-mini">
                                            <h4 class="  my-2"><a class="link-hover" href="#">Giày thể thao nữ cổ
                                                    thấp
                                                    mẫu mới nhất</a></h4>
                                            <span class="color-red fw-bold fs-3">268.000đ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 my-5">
                    <div class="row">
                        @php
                            $d = 0;
                        @endphp
                        @foreach ($posts as $item)
                            @if ($d == 0)
                                <div class="col-md-12">
                                    <div class="row animationLeft">
                                        <div class="col-4">
                                            <div class="img-block-left">
                                                <a href="{{ route('slug',['slug'=>$item->slug]) }}"><img class=""
                                                        src="{{ asset('images/posts/'.$item->image) }}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h5 class="fs-4"><a class="link-hover fs-3" href="{{ route('slug',['slug'=>$item->slug]) }}">{{ $item->title }}</a></h5>
                                            <p class="wrap-text color-secondary fs-4">{!! $item->detail !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-6 my-md-1 my-2 animationLeft delay-01">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="img-block-left">
                                                <a href="{{ route('slug',['slug'=>$item->slug]) }}"><img class=""
                                                        src="{{ asset('images/posts/'.$item->image) }}"
                                                        alt=""></a>

                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h5 class="fs-4"><a class="link-hover fs-3" href="{{ route('slug',['slug'=>$item->slug]) }}">{{ $item->title }}</a></h5>
                                            <p class="wrap-text color-secondary fs-4">{{ $item->detail }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @php $d++;@endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/site/detail-product.js') }}"></script>
@endsection
