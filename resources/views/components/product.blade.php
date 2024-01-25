<div class="col ">
    <div class="card h-100 border border-0">
        <span class="sale fs-5">{{ $product->sale }}%</span>
        <a class='position-relative' href="{{ route('slug', ['slug' => $product->slug]) }}">
            <div class="{{ count($images) >= 2 ? 'card-hover' : '' }}" title="">
                @if (count($images) >= 2)
                    <img src="{{ asset('images/products/' . $images[0]->name) }}" class="card-img-top card-item"
                        alt="">
                    <img src="{{ asset('images/products/' . $images[1]->name) }}" class="card-img-top card-item"
                        alt="">
                @else
                    <img src="{{ asset('images/products/' . $product->image) }}" class="card-img-top card-item"
                        alt="">
                @endif

            </div>
            <div class="size fs-6">
                <span class="size-item">39</span>
                <span class="size-item">40</span>
                <span class="size-item">41</span>
                <span class="size-item">+2</span>
            </div>
        </a>

        <span id="" class='list_product cursor-pointer addToCart' data-id="{{ $product->id }}" href="" data-product=""><span class="bag"
                title="Thêm vào giỏ hàng"><i class="fa-solid fa-bag-shopping"></i></span></span>
        <div class="card-body">
            <h5 class="card-title"><a href="#">{{ $product->name }} </a> </h5>
            <p>{{ $product->brand_name }}</p>
            <div class="row">
                <div class="col-md-5">
                    <h5 class="price fs-4 text-danger ">

                        {{ $product->price_sale ? number_format($product->price_sale) : number_format($product->price) }}
                        đ</h5>
                </div>
                @if ($product->price_sale)
                    <div class="col-md-6">
                        <h5 class="text-decoration-line-through text-black-50">
                            {{ number_format($product->price) }} đ</h5>
                    </div>
                @endif
            </div>
            <div class="shoer-list">
                <div class="shoer-list-item"><label for="img1-{{ $product->id }}"><img
                            src="{{ asset('images/products/AdidasNEOMenWhite.webp') }}" alt=""></label>
                </div>

                <div class="shoer-list-item"><label for="img2-{{ $product->id }}"><img
                            src="{{ asset('images/products/AdidasNEOMenWhite.webp') }}" alt=""></label>
                </div>
            </div>
        </div>

    </div>
</div>
