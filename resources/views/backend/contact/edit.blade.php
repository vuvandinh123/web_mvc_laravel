@extends('layout.admin')
@section('title', 'Admin | Sửa liên hệ')

@section('content')
<div class="container-fluid py-4">
    <div class="bg-white border-radius-2xl p-5">
    <a href="{{ route('contact.index') }}" class="fs-6">Quay lại</a>
        <div class="">
            <h4 class="text-center mb-4">Cập nhật liên hệ</h4>
            
        </div>
        <div class="text-center"><img height="200px" src="https://qs-smart.vn/wp-content/uploads/2020/11/coming-soon-banner-design-vector-27517197.jpg" alt=""></div>
    </div>
</div>
@endsection