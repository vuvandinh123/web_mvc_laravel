<div class="container mt-3 mb-5 bg-shadow">
    <div class="content_snecker row">
        <div class="col-md-5 mb-4">
            <img class="w-100"
                src="https://bizweb.dktcdn.net/100/342/645/themes/701397/assets/banner_product_nangdong.jpg?1664094665337"
                alt="product-banner">
        </div>
        <div class="col-md-7 p-5">
            <h2 class="fs-1 mb-4">SNEAKER NĂNG ĐỘNG
            </h2>
            <p class="fs-3 mb-5">Sneaker đã trở thành một biểu tượng của xã hội, là một sản phẩm của thời đại với những
                thiết kế cổ điển và những điều đó đều nằm trong những đôi giày Sneaker Delta Shoes. Không lỗi thời với
                thời gian, mang dấu ấn cá tính khác biệt và tạo mọi sự lôi cuốn từ chính đôi giày Sneaker. Tự tạo cuộc
                chơi, tự tạo phong cách, đó là Delta Shoes</p>
            <a class="fs-2 link-hover" href="sneaker">XEM TẤT CẢ <i
                    class="fa-solid fa-chevron-right"></i></a>
        </div>
    </div>
    <div class="row row-cols-2 row-cols-md-5 g-4">
        @foreach ($list_product as $product)
           <x-product :product="$product"/>
        @endforeach
    </div>

</div>
