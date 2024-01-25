@extends('layout.admin')
@section('title', 'Admin | Cập nhật trang đơn')

@section('content')
<div class="container-fluid py-4">
    <div class="bg-white border-radius-2xl p-5">
    <a href="{{ route('page.index') }}" class="fs-6">Quay lại</a>
        <div class="">
            <h4 class="text-center mb-4">Cập nhật trang đơn</h4>
            
        </div>
        <form action="{{ route('page.update',['page'=>$post->id]) }}" id="create" method="post"enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">Tiêu đề bài viết <span class="text-danger">*</span></label>
                    <input value="{{ $post->title }}"  name="title" id="title" type="text" class="form-control "  placeholder="Tên bài viết ">
                    <span class="text-danger alert" style="font-size: 12px"></span>
                </div>
                <div class="col-md-6">
                    <label for="topic_id" class="form-label">Chủ đề<span class="text-danger">*</span></label>
                    <select name="topic_id" class="form-select" id="topic_id">
                        @foreach ($topics as $item)
                                <option {{ $post->topic_id == $item->id ? 'selected' : '' }} class="text-capitalize"
                                    value="{{ $item->id }}">{{ $item->name }}
                                </option>
                            @endforeach
                    </select>
                    <span class="text-danger alert" style="font-size: 12px"></span>
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label my-2">Từ khóa tìm kiếm <span
                            class="text-danger">*</span></label>
                    <input type="text" value="{{ $post->metakey }}" placeholder="ví dụ: sản phẩm đến từ tương lai" class="form-control"
                        name="metakey" id="metakey">
                    <span class="text-danger alert" style="font-size: 12px"></span>
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
                <div class="col-md-6">
                    <label for="status" class="form-label">Trạng thái <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" id="status">
                        <option value="2">Hiện</option>
                        <option value="1">Ẩn</option>
                    </select>
                    <span class="text-danger alert" style="font-size: 12px"></span>
                </div>
                <div class="col-md-6">
                    <label for="status" class="form-label">Loại<span class="text-danger">*</span></label>
                    <input id="type" value="{{ $post->type }}" id="type" name="type" placeholder="ví dụ: Tin tức" class="form-control" type="text">
                    <span class="text-danger alert" style="font-size: 12px"></span>
                </div>
                <div class="col-md-12">
                    <label for="" class="form-label my-2">Mô tả tìm kiếm <span
                            class="text-danger">*</span></label>
                    <textarea
                        placeholder="ví dụ: Mua giày online với giá cả hợp lý tại cửa hàng của chúng tôi! Chúng tôi cung cấp những kiểu giày mới nhất, chất lượng tốt nhất và đa dạng về kiểu dáng. Hãy khám phá bộ sưu tập của chúng tôi ngay hôm nay và tìm cho mình đôi giày ưng ý nhất!"
                        style="min-height: 40px" class="form-control" name="metades" id="metades" cols="30" rows="5">{{ $post->metadesc }}</textarea>
                    <span class="text-danger alert" style="font-size: 12px"></span>
                </div>
                <div class="col-md-12">
                    <label for="" class="form-label my-2">Chi tiết <span
                            class="text-danger">*</span></label>
                    <textarea
                        placeholder="ví dụ: Mua giày online với giá cả hợp lý tại cửa hàng của chúng tôi! Chúng tôi cung cấp những kiểu giày mới nhất, chất lượng tốt nhất và đa dạng về kiểu dáng. Hãy khám phá bộ sưu tập của chúng tôi ngay hôm nay và tìm cho mình đôi giày ưng ý nhất!"
                        style="min-height: 40px" class="form-control" name="detail" id="detail" cols="30" rows="5">{{ $post->detail }}</textarea>
                    <span class="text-danger alert" style="font-size: 12px"></span>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-success px-3 w-100 mt-5" type="submit">Cập nhật</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script>
    // $(document).ready(function() {
    //         validateInput([ '#title', '#metakey','#metades','#detail'], 'Vui lòng nhập trường này');
    //         $('#create').submit(function(e) {
    //             let fieldIds = ['title', 'metakey', 'metades','detail']
    //             handleSubmit(e, fieldIds, 'vui lòng nhập trường này')
    //         });
    //     });
</script>
@endsection