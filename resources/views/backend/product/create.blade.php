@extends('layout.admin')
@section('title', 'Admin | Thêm sản phẩm')

@section('content')
    <div class="container-fluid py-4">
        <div class="bg-white border-radius-2xl p-5">
            <a href="{{ route('product.index') }}" class="fs-6">Quay lại</a>
            <div class="">
                <h4 class="text-center mb-4">Thêm sản phẩm</h4>

            </div>
            <form action="{{ route('product.store') }}" id="create" method="post"enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">Tên sản phẩm <span class="text-danger">*</span></label>
                        <input name="name" id="name" type="text" class="form-control" placeholder="Tên sản phẩm">
                        <span class="text-danger alert" style="font-size: 12px"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Thương hiệu <span class="text-danger">*</span></label>
                        <select name="brand" class="form-select" id="brand">
                            <option selected disabled value="">Chọn thương hiệu</option>
                            @foreach ($brands as $item)
                                <option class="text-capitalize" value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger alert" style="font-size: 12px"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Danh mục <span class="text-danger">*</span></label>
                        <select name="category" class="form-select" id="category">
                            <option selected disabled value="">Chọn danh mục</option>
                            @foreach ($categorys as $item)
                                <option class="text-capitalize" value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger alert" style="font-size: 12px"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label my-2">Số lượng <span class="text-danger">*</span></label>
                        <input type="text" placeholder="ví dụ: sản phẩm đến từ tương lai" class="form-control"
                            name="qty" id="qty">
                        <span class="text-danger alert" style="font-size: 12px"></span>
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label my-2">Giá <span class="text-danger">*</span></label>
                        <input placeholder="ví dụ: 10000" class="form-control"
                            name="price" id="price">
                        <span class="text-danger alert" style="font-size: 12px"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label my-2">Từ khóa tìm kiếm <span
                                class="text-danger">*</span></label>
                        <input type="text" placeholder="ví dụ: sản phẩm đến từ tương lai" class="form-control"
                            name="metakey" id="metakey">
                        <span class="text-danger alert" style="font-size: 12px"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label my-2">Giá khuyến mại (nếu có)</label>
                        <input type="text" placeholder="ví dụ: 10" class="form-control" name="pricesale" id="pricesale">
                    </div>

                    <div class="col-md-6 image-create">
                        <label for="" class="form-label my-2 me-2">Hình:</label>
                        <label class="text-danger me-2" for="image">Tải tệp lên</label>
                        <label class="text-info" for="url">sử dụng URL</label>
                        <input type="radio" name="chon" id="image" checked>
                        <input type="file" placeholder="ví dụ: 10" class="form-control" name="image" id="">
                        <input type="radio" name="chon" id="url">
                        <input type="text" class="form-control" placeholder="URL" name="urlimage">

                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label my-2">Mô tả tìm kiếm <span
                                class="text-danger">*</span></label>
                        <textarea
                            placeholder="ví dụ: Mua giày online với giá cả hợp lý tại cửa hàng của chúng tôi! Chúng tôi cung cấp những kiểu giày mới nhất, chất lượng tốt nhất và đa dạng về kiểu dáng. Hãy khám phá bộ sưu tập của chúng tôi ngay hôm nay và tìm cho mình đôi giày ưng ý nhất!"
                            style="min-height: 40px" class="form-control" name="metades" id="metades" cols="30" rows="5"></textarea>
                        <span class="text-danger alert" style="font-size: 12px"></span>
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label my-2">Mô tả <span
                                class="text-danger">*</span></label>
                        <textarea
                            placeholder="ví dụ: Mua giày online với giá cả hợp lý tại cửa hàng của chúng tôi! Chúng tôi cung cấp những kiểu giày mới nhất, chất lượng tốt nhất và đa dạng về kiểu dáng. Hãy khám phá bộ sưu tập của chúng tôi ngay hôm nay và tìm cho mình đôi giày ưng ý nhất!"
                            style="min-height: 40px" class="form-control" name="detail" id="detail" cols="30" rows="5"></textarea>
                        <span class="text-danger alert" style="font-size: 12px"></span>
                    </div>
                    
                    <div class="col-md-12">
                        <button class="btn btn-success px-3 w-100 mt-5" type="submit">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            validateInput(['#name', '#price', '#qty', '#brand', '#category','#metakey','#metades','#detail'], 'Vui lòng nhập trường này');
            validateNumber(['#price', '#qty','#pricesale']);
            validationName('product','#name');
            $('#create').submit(function(e) {
                let fieldIds = ['name', 'brand', 'category', 'qty', 'price', 'metakey', 'metades', 'detail']
                handleSubmit(e, fieldIds, 'vui lòng nhập trường này','#name')
            });
        });
        
    </script>
@endsection
