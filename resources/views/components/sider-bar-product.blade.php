<div class="col-md-3">
    <h3>Danh mục</h3>
    <div class="border p-4">
        <ul class="m-0 p-0">
            <li class="my-3"><a href="#">Trang chủ</a></li>
            <li class="my-3 d-flex justify-content-between">
                <a href="#">Trang chủ</a>
                <i class="fa-solid fa-angle-right"></i>
            </li>
            <ul>
                <li><a href="">cap 2</a></li>
                <li><a href="">cap 2</a></li>
                <li><a href="">cap 2</a></li>
                <li><a href="">cap 2</a></li>
            </ul>
            <li class="my-3"><a href="#">Trang chủ</a></li>
            <li class="my-3"><a href="#">Trang chủ</a></li>
            <li class="my-3"><a href="#">Trang chủ</a></li>
        </ul>
    </div>
    <h3 class="my-3">Thương hiệu</h3>
    <div class="border p-4">
        <ul class="m-0 p-0">
            @foreach ($brands as $item)
                <li class="my-3 d-flex align-items-center text-capitalize">
                    <input class="filter" type="checkbox" name="brand" value="{{ $item->id }}"
                        id="brand{{ $item->id }}" class="me-3">
                    <label class="fs-5" for="brand{{ $item->id }}">{{ $item->name }}</label>
                </li>
            @endforeach
        </ul>
    </div>
    <h3 class="my-3">Danh mục</h3>
    <div class="border p-4">
        <ul class="m-0 p-0">
            @foreach ($categorys as $item)
                <li class="my-3 d-flex align-items-center text-capitalize ">
                    <input class="filter" type="checkbox" value="{{ $item->id }}"
                        name="category" id="category{{ $item->id }}" class="me-3">
                    <label class="fs-5" for="category{{ $item->id }}">{{ $item->name }}</label>
                </li>
            @endforeach
        </ul>
    </div>
    <h3 class="my-3">Giá</h3>
    <div class="border p-4">
        <ul class="m-0 p-0">
            <li class="my-3 d-flex align-items-center text-capitalize">
                <input value="1"  class="filter" type="checkbox" name="price" id="price1" class="me-3">
                <label class="fs-5" for="price1">Dưới 100.000</label>
            </li>
            <li class="my-3 d-flex align-items-center text-capitalize">
                <input value="1-3"  class="filter" type="checkbox" name="price" id="price2" class="me-3">
                <label class="fs-5" for="price2">100.000đ - 300.000đ</label>
            </li>
            <li class="my-3 d-flex align-items-center text-capitalize">
                <input value="3-5"  class="filter" type="checkbox" name="price" id="price3" class="me-3">
                <label class="fs-5" for="price3">300.000đ - 500.000đ</label>
            </li>
            <li class="my-3 d-flex align-items-center text-capitalize">
                <input value="5-10"  class="filter" type="checkbox" name="price" id="price4" class="me-3">
                <label class="fs-5" for="price4">500.000đ - 1.000.000đ</label>
            </li>
            <li class="my-3 d-flex align-items-center text-capitalize">
                <input value=">10" class="filter" type="checkbox" name="price" id="price5" class="me-3">
                <label class="fs-5" for="price5">Trên 1.000.000đ</label>
            </li>
        </ul>
    </div>
</div>