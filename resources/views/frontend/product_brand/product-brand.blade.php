@extends('layout.site')

@section('content')
<div class="container">
    <h1  class="text-center text-danger my-5 text-capitalize fw-bold fs-1">{{ $brandName }}</h1>
    <div class="row row-cols-2 row-cols-md-5 g-4">
        @foreach ($list_product as $product)
            <x-product :product="$product" />
        @endforeach
    </div>
</div>

@endsection
