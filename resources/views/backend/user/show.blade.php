@extends('layout.admin')
@section('title', 'Admin | Chi tiết khách hàng')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <a href="{{ route('user.index') }}">Quay lại</a>
                        <h4 class="text-center">Chi tiết khách hàng</h4>
                        <a class="btn " href="{{ route('user.edit',['user'=>request()->route('user')]) }}">Sửa</a>
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
