@extends('layout.admin')
@section('content')
<div class="container-fluid py-4">
    <div class="bg-white border-radius-2xl p-5">
    <a href="{{ route('product.index') }}" class="fs-6">Quay lại</a>
        <div class="">
            <h4 class="text-center mb-4">Cập nhật sản phẩm</h4>
            
        </div>
        <form action="{{ route('product.update',['product'=>$product->id]) }}" method="post"enctype="multipart/form-data">
            @method('PUT')
            @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="" class="form-label">Tên sản phẩm</label>
                <input name="name" value="{{ $product->name }}" type="text" required class="form-control" placeholder="Tên sản phẩm">
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Thương hiệu</label>
                <select name="brand" required class="form-select" id="">
                    @foreach ($brands as $item)
                    <option
                     {{ $product->brand_id == $item->id ? 'selected' : '' }}
                      class="text-capitalize" value="{{ $item->id }}">{{ $item->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Danh mục</label>
                <select name="category" required class="form-select" id="">
                    @foreach ($categorys as $item)
                    <option
                    {{ $product->category_id == $item->id ? 'selected' : '' }}
                     class="text-capitalize" 
                     value="{{ $item->id }}">{{ $item->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label my-2">Số lượng</label>
                <input type="text" value="{{ $product->qty }} " placeholder="ví dụ: sản phẩm đến từ tương lai" required class="form-control" name="qty" id="" >
            </div>
            
            <div class="col-md-6">
                <label for="" class="form-label my-2">Giá</label>
                <input placeholder="ví dụ: 10000" value="{{ $product->price }} " required class="form-control" name="price" id="" >
            </div>
            <div class="col-md-6">
                <label for="" class="form-label my-2">Từ khóa tìm kiếm</label>
                <input type="text" value="{{ $product->metakey }} " placeholder="ví dụ: sản phẩm đến từ tương lai" required class="form-control" name="metakey" id="" >
            </div>
            <div class="col-md-6">
                <label for="" class="form-label my-2">Phần trăm khuyến mại (nếu có)</label>
                <input type="text" value="{{ $product->price_sale }} " placeholder="ví dụ: 10" required class="form-control" name="pricesale" id="" >
            </div>
            <div class="col-md-6 image-create" >
                <label for="" class="form-label my-2 me-2">Hình:</label>
                <label class="text-danger me-2" for="image">Tải tệp lên</label>
                <label class="text-info" for="url">sử dụng URL</label>
                <input type="radio" name="chon" id="image" checked>
                <input type="file" placeholder="ví dụ: 10" class="form-control" name="image" id="" >
                <input type="radio" name="chon" id="url">
                <input type="text" class="form-control" placeholder="URL" name="urlimage">
            </div>
            <div class="col-md-6">
                <label for="" class="form-label my-2">Mô tả tìm kiếm</label>
                <textarea placeholder="ví dụ: Mua giày online với giá cả hợp lý tại cửa hàng của chúng tôi! Chúng tôi cung cấp những kiểu giày mới nhất, chất lượng tốt nhất và đa dạng về kiểu dáng. Hãy khám phá bộ sưu tập của chúng tôi ngay hôm nay và tìm cho mình đôi giày ưng ý nhất!" style="min-height: 40px" required class="form-control" name="metades" id="" cols="30" rows="5">
                    {{ $product->metadesc }} 
                </textarea>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label my-2">Chi tiết</label>
                <textarea placeholder="ví dụ : Giày của chúng tôi được làm từ chất liệu da tự nhiên chất lượng cao, với đế giày bền chắc và đinh tán cực kỳ chắc chắn. Thiết kế đa dạng và phong phú, từ giày thể thao đến giày lười, giày mọi đến giày boot. Ngoài ra, chúng tôi cũng cung cấp các sản phẩm đặc biệt như giày tăng chiều cao và giày bảo hộ." style="min-height: 40px" required class="form-control" name="detail" id="" cols="30" rows="5">
                    {{ $product->detail }} 
                </textarea>
            </div>
            <div class="col-md-12">
                <button class="btn btn-success px-3 w-100 mt-5" type="submit">Lưu</button>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection