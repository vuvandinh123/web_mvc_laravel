<div class="col ">
    <div class="card h-100 border border-0">
        <span class="sale">12%</span>
        <a class='position-relative' href="{{ route('product_detail',['slug'=>$item->slug]) }}">
            <div class="{{ count($images) >= 2 ? 'card-hover' : '' }}" title="">
                @if (count($images) >= 2)
                    <img src="{{ asset('images/products/' . $images[0]->name) }}" class="card-img-top card-item"
                        alt="">
                    <img src="{{ asset('images/products/' . $images[1]->name) }}" class="card-img-top card-item"
                        alt="">
                @else
                    <img src="{{ asset('images/products/' . $item->image) }}" class="card-img-top card-item"
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

        <a class='list_product' href="?option=cart&id=" data-product=""><span class="bag"
                title="Thêm vào giỏ hàng"><i class="fa-solid fa-bag-shopping"></i></span></a>
        <div class="card-body">
            <h5 class="card-title"><a href="#">{{ $item->name }} </a> </h5>
            <p>{{ $item->brand_name }}</p>
            <div class="row">
                <div class="col-md-5">
                    <h5 class="price  text-danger ">
                        {{ number_format($item->price) }} đ</h5>
                </div>
                <div class="col-md-6">
                    <h5 class="text-decoration-line-through text-black-50">
                        {{ number_format($item->price_sale) }} đ</h5>
                </div>

            </div>
            <div class="shoer-list">
                <div class="shoer-list-item"><label for="img1-{{ $item->id }}"><img
                            src="{{ asset('images/products/AdidasNEOMenWhite.webp') }}" alt=""></label>
                </div>

                <div class="shoer-list-item"><label for="img2-{{ $item->id }}"><img
                            src="{{ asset('images/products/AdidasNEOMenWhite.webp') }}" alt=""></label>
                </div>
            </div>
        </div>

    </div>
</div>
