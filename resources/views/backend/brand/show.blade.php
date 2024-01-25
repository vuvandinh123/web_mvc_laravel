@extends('layout.admin')
@section('title', 'Admin | Chi tiết sản phẩm')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <a href="{{ route('brand.index') }}">Quay lại</a>
                        <h4 class="text-center">Chi tiết sản phẩm</h4>
                        <a class="btn " href="{{ route('brand.edit',['brand'=>request()->route('brand')]) }}">Sửa</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="p-0">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th class="col-md-3 border-right">ID:</th>
                                        <td class="col-md-9">{{ $brand->id }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3 border-right">Tên thương hiệu:</th>
                                        <td class="col-md-9">{{ $brand->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Vị trí:</th>
                                        <td class="col-md-9 text-capitalize">{{ $brand->sort_order }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">slug:</th>
                                        <td class="col-md-9">{{ $brand->slug }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Hình:</th>
                                        <td class="col-md-9">{{ $brand->image }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Từ khóa tìm kiếm:</th>
                                        <td class="col-md-9">{{ $brand->metakey }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Mô tả tìm kiếm:</th>
                                        <td style="word-break: break-all;" class="col-md-9">{{ $brand->metadesc }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Ngày tạo:</th>
                                        <td class="col-md-9">{{ $brand->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Người cập nhật:</th>
                                        <td class="col-md-9">{{ $brand->updated_by }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Trạng thái:</th>
                                        <td class="col-md-9">{{ $brand->status == 2 ? 'Hiển thị' : 'Không hiển thị' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
