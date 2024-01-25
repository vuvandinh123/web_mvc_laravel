@extends('layout.admin')
@section('title', 'Admin | Cập nhật slider')

@section('content')
<div class="container-fluid py-4">
    <div class="bg-white border-radius-2xl p-5">
    <a href="{{ route('slider.index') }}" class="fs-6">Quay lại</a>
        <div class="">
            <h4 class="text-center mb-4">Cập nhật slider</h4>
            
        </div>
        <form action="{{ route('slider.update',['slider'=>$slider->id]) }}" id="create" method="post"enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">Tên Slider <span class="text-danger">*</span></label>
                    <input name="name" value="{{ $slider->name }}" id="name" type="text" class="form-control" placeholder="Tên slider ">
                    <span class="text-danger alert" style="font-size: 12px"></span>
                </div>
                <div class="col-md-6">
                    <label for="sort_order" class="form-label">Sắp xếp</label>
                    <select name="sort_order" class="form-select" id="sort_order">
                        <option selected value="0">Đầu tiên</option>
                        @foreach ($sliders as $item)
                                <option {{ $slider->sort_order-1 == $item->id ? 'selected' : '' }} class="text-capitalize"
                                    value="{{ $item->id+1 }}">Sau: {{ $item->name }}
                                </option>
                        @endforeach
                    </select>
                    <span class="text-danger alert" style="font-size: 12px"></span>
                </div>
                <div class="col-md-6">
                    <label for=""  class="form-label">Liên kết <span class="text-danger">*</span></label>
                    <input name="link" value="{{ $slider->link }}" id="link" type="text" class="form-control" placeholder="URL...">
                    <span class="text-danger alert" style="font-size: 12px"></span>
                </div>
                
                <div class="col-md-6">
                    <label for="position" class="form-label">Vị trí<span class="text-danger"></span></label>
                    <select name="position" class="form-select" id="position">
                        <option selected  value="Header">Header</option>
                        <option value="Footer">Footer</option>
                        
                    </select>
                    <span class="text-danger alert" style="font-size: 12px"></span>
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label my-2 me-2">Hình:<span class="text-danger">*</span></label>
                    <input type="file" id="image" placeholder="ví dụ: 10" class="form-control" name="image" id="">
                    <span class="text-danger alert" style="font-size: 12px"></span>
                </div>
                <div class="col-md-6">
                    <label for="status" class="form-label">Trạng thái <span class="text-danger"></span></label>
                    <select name="status" class="form-select" id="status">
                        <option value="2">Hiện</option>
                        <option value="1">Ẩn</option>
                    </select>
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