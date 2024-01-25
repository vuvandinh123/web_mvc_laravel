@extends('layout.site')

@section('content')
<div class="container my-5">
    <form action="{{ route('site.contactPost') }}" method="post">
        @csrf
        @method('POST')
        <div class="w-50 m-auto">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="" class="form-label fs-4 ">Họ Và Tên</label>
                    <input  type="text" name="name" class="form-control fs-4 p-3 " placeholder="Nhập Họ Và Tên">
                </div>
                <div class="col-12 mb-3">
                    <label for="" class="form-label fs-4">Email</label>
                    <input type="text" name="email" class="form-control fs-4 p-3 " placeholder="Email">
                </div>
                <div class="col-12 mb-3">
                    <label for="" class="form-label fs-4">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control fs-4 p-3 " placeholder="Email">
                </div>
                <div class="col-12 mb-3">
                    <label for="" class="form-label fs-4">Tiêu đề</label>
                    <input type="text" name="title" class="form-control fs-4 p-3 " placeholder="Tiêu Đề">
                </div>
                <div class="col-12 mb-3">
                    <label for="" class="form-label fs-4">Nội dung</label>
                    <textarea class="form-control fs-4" name="content" style="min-height: 200px" placeholder="Nội dung" id="" cols="30" rows="10"></textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-success w-100 mt-3 p-2 fs-3">Gửi</button>
                </div>
            </div>
        </div>
        
    </form>
</div>
@endsection