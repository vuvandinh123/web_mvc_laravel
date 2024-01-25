@extends('layout.admin')
@section('title', 'Admin | Thêm slider')

@section('content')
<div class="container-fluid py-4">
    <div class="bg-white border-radius-2xl p-5">
    <a href="{{ route('slider.index') }}" class="fs-6">Quay lại</a>
        <div class="">
            <h4 class="text-center mb-4">Thêm slider</h4>
            
        </div>
        <form action="{{ route('slider.store') }}" id="create" method="post"enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">Tên Slider <span class="text-danger">*</span></label>
                    <input name="name" id="name" type="text" class="form-control" placeholder="Tên slider ">
                    <span class="text-danger alert" style="font-size: 12px"></span>
                </div>
                <div class="col-md-6">
                    <label for="sort_order" class="form-label">Sắp xếp</label>
                    <select name="sort_order" class="form-select" id="sort_order">
                        <option selected value="0">Đầu tiên</option>
                        <?=$html;?>
                    </select>
                    <span class="text-danger alert" style="font-size: 12px"></span>
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Liên kết <span class="text-danger">*</span></label>
                    <input name="link" id="link" type="text" class="form-control" placeholder="URL...">
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
@section('script')
<script>
    $(document).ready(function() {
            validateInput(['#name','#link'], 'Vui lòng nhập trường này');
            validationName('slider','#name');
            $('#create').submit(function(e) {
                let fieldIds = ['name','link', 'image']
                handleSubmit(e, fieldIds, 'vui lòng nhập trường này','#name')
            });
        });
</script>
@endsection