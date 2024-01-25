@extends('layout.admin')
@section('title', 'Admin | CHi tiết Liên hệ')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <a href="{{ route('contact.index') }}">Quay lại</a>
                        <h4 class="text-center">Chi tiết liên hệ</h4>
                        <a class="btn " href="{{ route('contact.edit',['contact'=>request()->route('contact')]) }}">Sửa</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="p-0">
                            <div class="text-center"><img height="200px" src="https://qs-smart.vn/wp-content/uploads/2020/11/coming-soon-banner-design-vector-27517197.jpg" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
