@extends('layout.site')
@php
    use App\Models\Image;
@endphp
@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/product.css') }}"> --}}
@endsection

@section('content')
    <h1 class="text-center text-danger my-5">Tất cả sản phẩm</h1>
    <div class="container mt-5">
        <div class="row">
            <x-sider-bar-product />
            <div class="col-md-9">
                <div class="my-4">
                    <ul class="d-flex align-items-center">
                        <li class="d-flex me-5 fs-4"><b>Sắp xếp:</b></li>
                        <li class="me-5 d-flex ">
                            <input value="newdesc" class="me-3 sort newdesc" checked type="checkbox" name="sort"
                                id="">
                            <label class="fs-5" for="">Hàng mới về</label>
                        </li>
                        <li class="me-5 d-flex">
                            <input value="oldasc" class="me-3 sort" type="checkbox" name="sort" id="">
                            <label class="fs-5" for="">Hàng cũ</label>
                        </li>
                        <li class="me-5 d-flex">
                            <input value="priceasc" class="me-3 sort" type="checkbox" name="sort" id="">
                            <label class="fs-5" for="">Gía tăng dần</label>
                        </li>
                        <li class="me-5 d-flex">
                            <input value="pricedesc" class="me-3 sort" type="checkbox" name="sort" id="">
                            <label class="fs-5" for="">Gía gaimr dần</label>
                        </li>
                    </ul>
                </div>
                <div class="content-product">
                    <div id="list_product" class="row row-cols-2 row-cols-md-4 g-4">
                        @foreach ($list_product as $product)
                            <x-product :product="$product" />
                        @endforeach
                    </div>
                    {{ $list_product->onEachSide(5)->links() }}
                </div>

            </div>
        </div>

    </div>
@endsection
@section('js')
    <script src="{{ asset('js/ajax.js') }}"></script>
    <script src="{{ asset('js/site/filter.js') }}"></script>
@endsection
