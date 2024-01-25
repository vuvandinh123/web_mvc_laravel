<div class="row row-cols-2 row-cols-md-4 g-4">
    @foreach ($list_product as $product)
        <x-product :product="$product"/>
    @endforeach
</div>