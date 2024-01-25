@extends('layout.site')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail-product.css') }}">
    <link rel="stylesheet" href="">
    <style>
        .slick-arrow {
            border: none;
        }
    </style>
@endsection
@section('content')
    <div class="container mt-5">
        <div class="breadcrumb">
            <ul class="d-flex">
                <li class="">
                    <a class="me-3" href="#">Trang chủ</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a class="me-3" href="#">Sản phẩm</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li class="">{{ $product->name }}</li>
            </ul>
        </div>
        <h1 class="text-center color-red fw-bold text-capitalize">{{ $product->category_name }}</h1>
        <section class="product mt-5">
            <div class="row">
                <div class="col-md">
                    <div class="row">
                        <div class="col-md-5 detail-image border animationTop">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                                <div class="carousel-inner">
                                    @php $i=0; @endphp
                                    @if (count($images) > 0)
                                        @foreach ($images as $item)
                                            <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                                <img src="{{ asset('images/products/' . $item->name) }}"
                                                    class="d-block w-100" alt="..." />
                                            </div>
                                            @php $i++ @endphp
                                        @endforeach
                                    @else
                                        <div class="carousel-item active">
                                            <img src="{{ asset('images/products/' . $product->image) }}"
                                                class="d-block w-100" alt="..." />
                                        </div>
                                    @endif



                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-7 detail-content mt-4 ">
                            <div class="d-flex details-image-items animationTop ">
                                @php $i=0; @endphp
                                @if (count($images) > 0)
                                    @foreach ($images as $item)
                                        <div class="me-3">
                                            <div data-id="1" class="detail-item"
                                                data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="{{ $i }}" class="active" aria-current="true"
                                                aria-label="Slide 1">
                                                <img src="{{ asset('images/products/' . $item->name) }}"
                                                    class="d-block w-100" alt="..." />
                                            </div>
                                        </div>
                                        @php $i++ @endphp
                                    @endforeach
                                @else
                                    <div class="me-3">
                                        <div data-id="1" class="detail-item" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                            <img src="{{ asset('images/products/' . $product->image) }}"
                                                class="d-block w-100" alt="..." />
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="content my-4 ">
                                <i class="fa fa-cut color-red fs-4"></i>
                                <div class="ms-5 animationTop ">
                                    <h2 class="title my-3 fs-1 fw-bold ">{{ $product->name }}</h2>
                                    <div class="d-flex group-status my-2  ">
                                        <div class="me-5 my-2"><span class="fs-4 me-2">Thương hiệu: </span><span
                                                class="brand fs-4 color-red fw-bold">{{ $product->brand_name }}</span>
                                        </div>
                                        <div class="my-2"><span class="fs-4 me-2">Kho: </span><span
                                                class="fs-4 color-red fw-bold"> Còn hàng</span></div>
                                    </div>
                                    <div class="product-reviews-size my-2 "><a href="#"><i
                                                class="fa fa-sticky-note"></i> Hướng dẫn chọn size</a></div>
                                    <div class="price d-flex my-4 ">
                                        <h3 class="color-red fw-bold fs-1 me-4">
                                            {{ number_format($product->price) }}đ</h3><del
                                            class="fs-4 fw-bold text-secondary mt-2">
                                            {{ number_format($product->price_sale) }}đ</del>
                                    </div>
                                    <div class="size-product my-4 ">
                                        <span class="fs-4 me-4 mt-1 fw-bold">Kích thước: </span>
                                        <div class="size-item-product">
                                            <input type="radio" name="size" id="size1" checked>
                                            <label for="size1">37</label>
                                            <input type="radio" name="size" id="size2">
                                            <label class="size-active" for="size2">38</label>
                                            <input type="radio" name="size" id="size3">
                                            <label class="size-active" for="size3">39</label>
                                            <input type="radio" name="size" id="size4">
                                            <label class="size-active" for="size4">40</label>
                                        </div>

                                    </div>
                                    <div class="soluong my-4 d-flex ">
                                        <span class="fs-4 me-4 mt-1 fw-bold">Số lượng: </span>
                                        <button class="minus" class=""><i
                                                class="fa fa-minus fw-bold color-secondary"></i></button>
                                        <input type="number" name="soluong" value="1" min="1"
                                            class="quantity">
                                        <button class="plus"><i class="fa fa-plus fw-bold color-secondary"></i></button>
                                    </div>

                                </div>
                                <div class="button-action row px-3 animationTop">
                                    <a class="me btn btn-danger rounded-5 fs-3 col-md-6" href="{{ route('site.cart') }}" >Mua ngay</a>
                                    <div class="support  col-md-3 my-md-0 my-4  rounded-pill border border-danger"
                                        onclick="location.href='tel:0333583800'">
                                        <p class="m-0 ps-5  ">Mua số lượng lớn</p>
                                        <span class="ps-4 fw-bold  fs-4">Gọi ngay 19006750</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="tab mt-5 animationTop">
                        <ul class="d-flex tab-header p-0 m-0">
                            <li class="text-center tab-link active-tab"><span>Mô tả sản phẩm</span></li>
                            <li class="text-center tab-link"><span>Thương hiệu</span></li>
                            <li class="text-center tab-link"><span>Đánh giá</span></li>
                        </ul>
                        <div class="tab-content border p-4">
                            {{ $product->detail }}
                        </div>
                    </div>
                </div>
                @include('frontend.components.sidebar')
            </div>

            <div class="container-md px-4">
                <h1 class="text-center fs-1 mt-5 pt-5">SẢN PHẨM LIÊN QUAN</h1>
                <p class="text-center">SẢN PHẨM LIÊN QUAN</p>
                <div class="row row-cols-2 row-cols-md-5 g-4">
                    @foreach ($list_product as $product)
                        <x-product :product="$product" />
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/site/detail-product.js') }}"></script>
@endsection
