@extends('layout.site')

@section('content')
    <div class="container my-5">
        <h1 class="text-center text-danger my-5">Trang tìm kiếm</h1>
        <p class="fs-4 my-3">Có {{ count($list_product) }} kết quả tìm kiếm phù hợp cho: <span
                class="text-danger">{{ $keyword }}</span></p>
        @if (count($list_product))
            <div class="row row-cols-2 row-cols-md-5 g-4">
                @foreach ($list_product as $product)
                    <x-product :product="$product" />
                @endforeach
            </div>
        @else
        <div class="w-25">
            <form action="{{ route('site.search') }}" class="d-flex" method="get">
                <input  type="text" name="s" class="form-control rounded-0 w-75 p-3 fs-4" placeholder="Tìm Kiếm...">
                <button class="text-white btn btn-danger rounded-0">Tìm kiếm</button>
            </form>
        </div>
           
        @endif

    </div>
@endsection
