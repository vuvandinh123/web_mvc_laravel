@extends('layout.admin')
@section('title', 'Admin | Cập nhật danh mục')

@section('content')
    <div class="container-fluid py-4">
        <div class="bg-white border-radius-2xl p-5">
            <a href="{{ route('category.index') }}" class="fs-6">Quay lại</a>
            <div class="">
                <h4 class="text-center mb-4">Cập nhật danh mục</h4>

            </div>
            <form action="{{ route('category.update',['category'=>$category->id]) }}" id="create" method="post"enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">Tên danh mục <span class="text-danger">*</span></label>
                        <input name="name" value="{{ $category->name }}" id="name" type="text"
                            class="form-control" placeholder="Tên danh mục">
                        <span class="text-danger alert" style="font-size: 12px"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Cấp cha <span class="text-danger">*</span></label>
                        <select name="parent_id" class="form-select" id="parent_id">
                            <option selected disabled value="">Chọn cấp cha</option>
                            <option @if ($category->parent_id == 0) selected @endif value="0">Không có cấp cha
                            </option>
                            @foreach ($categorys as $item)
                                <option {{ $category->parent_id == $item->id ? 'selected' : '' }} class="text-capitalize"
                                    value="{{ $item->id }}">{{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        <span class="text-danger alert" style="font-size: 12px"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="sort_order" class="form-label">Vị Trí <span class="text-danger">*</span></label>
                        <select name="sort_order" class="form-select" id="sort_order">
                            <option selected disabled value="">Chọn Vị Trí</option>
                            @foreach ($categorys as $item)
                                <option {{ $category->sort_order-1 == $item->id ? 'selected' : '' }} class="text-capitalize"
                                    value="{{ $item->id+1 }}">Sau: {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        <span class="text-danger alert" style="font-size: 12px"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label my-2">Từ khóa tìm kiếm <span
                                class="text-danger">*</span></label>
                        <input type="text" value="{{ $category->metakey }}" placeholder="ví dụ: sản phẩm đến từ tương lai" class="form-control"
                            name="metakey" id="metakey">
                        <span class="text-danger alert" style="font-size: 12px"></span>
                    </div>
                    <div class="col-md-6 image-create">
                        <label for="" class="form-label my-2 me-2">Hình:</label>
                        <label class="text-danger me-2" for="image">Tải tệp lên</label>
                        <label class="text-info" for="url">sử dụng URL</label>
                        <input type="radio"  name="chon" id="image" checked>
                        <input type="file" value="{{ $category->image }}" placeholder="ví dụ: 10" class="form-control" name="image" id="">
                        <input type="radio" name="chon" id="url">
                        <input type="text" value="{{ $category->image }}" class="form-control" placeholder="URL" name="urlimage">

                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label">Trạng thái <span class="text-danger">*</span></label>
                        <select name="status" class="form-select" id="status">
                            <option @if ($category->status ==2)
                                selected
                            @endif value="2">Hiện</option>
                            <option @if ($category->status ==1)
                                selected
                            @endif value="1">Ẩn</option>
                        </select>
                        <span class="text-danger alert" style="font-size: 12px"></span>
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label my-2">Mô tả tìm kiếm <span
                                class="text-danger">*</span></label>
                        <textarea 
                            placeholder="ví dụ: Mua giày online với giá cả hợp lý tại cửa hàng của chúng tôi! Chúng tôi cung cấp những kiểu giày mới nhất, chất lượng tốt nhất và đa dạng về kiểu dáng. Hãy khám phá bộ sưu tập của chúng tôi ngay hôm nay và tìm cho mình đôi giày ưng ý nhất!"
                            style="min-height: 40px" class="form-control" name="metades" id="metades" cols="30" rows="5">{{ $category->metadesc }}</textarea>
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
            validateInput(['#name', '#sort_order', '#parent_id','#metakey','#metades'], 'Vui lòng nhập trường này');
            $('#create').submit(function(e) {
                let fieldIds = ['name', 'sort_order', 'parent_id', 'metakey', 'metades']
                handleSubmit(e, fieldIds, 'vui lòng nhập trường này')
            });
        });
    </script>
@endsection
