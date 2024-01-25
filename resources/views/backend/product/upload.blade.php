@extends('layout.admin')
@section('title', 'Admin | Thêm ảnh')

@section('crumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Thêm hình</li>
        </ol>
    </nav>
@endsection
<style>
    
    #upload-file[value=""] + button{
    pointer-events: none;
    opacity: 0.5;
}
    input#upload-file:valid + button{
        pointer-events: auto;
        cursor: pointer;
        opacity: 1;
    }
</style>
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <a href="{{ route('product.index') }}" class="text-capitalize">quay lại</a>
                        <h5>Thêm Hình</h5>
                        <a class="btn " href="{{ route('product.create') }}">x</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form method="POST"
                            action="
                        {{ route('product.upload', ['id' => request()->route('id')]) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group p-4">
                                <label class="form-label fs-6" for="photos">Chọn hình ảnh:</label>
                                <input id="upload-file" value="" class="form-control" type="file" name="images[]" multiple required>
                                <button class="mt-4 btn btn-primary" type="submit">Thêm hình ảnh</button>

                            </div>
                        </form>
                        <style>
                            .content-image{
                                max-height: 310px;
                                overflow-y: scroll;
                            }
                            .content-image input{
                                display: none;
                            }
                            .content-image input:checked + img{
                                border: 4px solid red;
                                padding: 5px;
                            }
                            
                        </style>
                        <div class="container-store px-4">
                            <h6>Hình ảnh của sản phẩm</h6>
                            @if (!$images->isEmpty())
                            <form action="{{ route('product.deleteImage', ['id' => request()->route('id')]) }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="content-image">
                                    @foreach ($images as $image)
                                        <label for="image{{ $image->id }}">
                                            <input type="checkbox" id="image{{ $image->id }}" name="image_check[]"
                                                value="{{ $image->id }}" id="">
                                            <img id="image" data-id="{{ $image->id }}" class="images-product"
                                                width="150px" height="150px"
                                                src="{{ asset('images/products/' . $image->name) }}" alt="">
                                        </label>
                                    @endforeach
                                </div>

                                <button type="submit" class="btn btn-danger ms-3">Xóa</button>
                            </form>
                            @else
                                <p class="text-center">Hình ảnh trống</p>
                            @endif
                            
                           
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
