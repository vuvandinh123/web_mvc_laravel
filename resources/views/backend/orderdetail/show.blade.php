@extends('layout.admin')
@section('title', 'Chi tiết sản phẩm')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <a href="{{ route('product.index') }}">Quay lại</a>
                        <h4 class="text-center">Chi tiết sản phẩm</h4>
                        <a class="btn " href="{{ route('product.create') }}">Sửa</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="p-0">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th class="col-md-3 border-right">ID:</th>
                                        <td class="col-md-9">{{ $product->id }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3 border-right">Tên sản phẩm:</th>
                                        <td class="col-md-9">{{ $product->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Danh mục sản phẩm:</th>
                                        <td class="col-md-9 text-capitalize">{{ $product->category_name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Thương hiệu:</th>
                                        <td class="col-md-9 text-capitalize">{{ $product->brand_name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">slug:</th>
                                        <td class="col-md-9">{{ $product->slug }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Giá:</th>
                                        <td class="col-md-9">{{ $product->price }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Phần trăm khuyễn mại:</th>
                                        <td class="col-md-9">{{ $product->price_sale }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Hình:</th>
                                        <td class="col-md-9">{{ $product->image }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Số lượng còn lại:</th>
                                        <td class="col-md-9">{{ $product->qty }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Chi tiết:</th>
                                        <td style="word-break: break-all; width: 100px" class="col-md-9">{{ $product->detail }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Từ khóa tìm kiếm:</th>
                                        <td class="col-md-9">{{ $product->metakey }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Mô tả tìm kiếm:</th>
                                        <td style="word-break: break-all;" class="col-md-9">{{ $product->metadesc }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Ngày tạo:</th>
                                        <td class="col-md-9">{{ $product->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Người cập nhật:</th>
                                        <td class="col-md-9">{{ $product->updated_by }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Trạng thái:</th>
                                        <td class="col-md-9">{{ $product->status == 2 ? 'Hiển thị' : 'Không hiển thị' }}</td>
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
