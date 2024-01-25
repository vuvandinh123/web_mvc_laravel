@php
    use App\Models\Image;
@endphp
@extends('layout.site')
@section('title', 'Home')
@section('content')
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <x-main-slider />
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container mt-3 mb-5 bg-shadow">
        <h1 class="text-center fs-1 my-5 pt-5">SẢN PHẨM BÁN CHẠY</h1>
        <x-list-product/>
    </div>
    </div>
    <x-hot-trend-product-home/>
    <div class="container mb-5">
        <h2 class="text-center fs-1 my-5">SALE THÁNG 12</h2>
        <div class="row">
            <div class="col-md-2 d-md-block d-none">
                <img class="w-100 h-100" height="650px"
                    src="https://bizweb.dktcdn.net/100/405/012/themes/793822/assets/collection_2_banner.jpg?1670213852103"
                    alt="">
            </div>
            <div class="col-md-10">
                <x-product-sale-home/>
            </div>
        </div>
    </div>

    <div class="container bg-shadow">
        <img class="w-100" height="250px"
            src="https://bizweb.dktcdn.net/100/366/839/themes/737085/assets/bigbanner.jpg?1664096070518" alt="">
    </div>
    <div class="container mt-5">
        <x-accessory-home/>
        <x-post-home/>
        <div class="image-brand">
            <div class="brand-item">
                <a href="" class="brand-img">
                    <img src="https://bizweb.dktcdn.net/thumb/medium/100/415/502/themes/804563/assets/brand6.png?1664213229376"
                        alt="">
                </a>
            </div>
            <div class="brand-item">
                <a href="" class="brand-img">
                    <img src="https://bizweb.dktcdn.net/thumb/medium/100/415/502/themes/804563/assets/brand7.png?1664213229376"
                        alt="">
                </a>
            </div>
            <div class="brand-item">
                <a href="" class="brand-img">
                    <img src="https://bizweb.dktcdn.net/thumb/medium/100/415/502/themes/804563/assets/brand8.png?1664213229376"
                        alt="">
                </a>
            </div>
            <div class="brand-item">
                <a href="" class="brand-img">
                    <img src="https://bizweb.dktcdn.net/thumb/medium/100/415/502/themes/804563/assets/brand1.png?1664213229376"
                        alt="">
                </a>
            </div>
            <div class="brand-item">
                <a href="" class="brand-img">
                    <img src="https://bizweb.dktcdn.net/thumb/medium/100/415/502/themes/804563/assets/brand2.png?1664213229376"
                        alt="">
                </a>
            </div>
            <div class="brand-item">
                <a href="" class="brand-img">
                    <img src="https://bizweb.dktcdn.net/thumb/medium/100/415/502/themes/804563/assets/brand3.png?1664213229376"
                        alt="">
                </a>
            </div>
            <div class="brand-item">
                <a href="" class="brand-img">
                    <img src="https://bizweb.dktcdn.net/thumb/medium/100/415/502/themes/804563/assets/brand4.png?1664213229376"
                        alt="">
                </a>
            </div>
            <div class="brand-item">
                <a href="" class="brand-img">
                    <img src="https://bizweb.dktcdn.net/thumb/medium/100/415/502/themes/804563/assets/brand5.png?1664213229376"
                        alt="">
                </a>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
