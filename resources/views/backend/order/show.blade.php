@extends('layout.admin')
@section('title', 'Admin | Chi tiết đơn hàng')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <a href="{{ route('order.index') }}">Quay lại</a>
                        <h4 class="text-center">Chi tiết đơn hàng</h4>
                        <a class="btn " href="{{ route('order.edit', ['order' => request()->route('order')]) }}">Sửa</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="p-0">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th class="col-md-3 border-right">ID:</th>
                                        <td class="col-md-9">{{ $order->id }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3 border-right">ID người dùng:</th>
                                        <td class="col-md-9">{{ $order->user_id }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3 border-right">Tên người mua:</th>
                                        <td class="col-md-9">{{ $order->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Số điện thoại:</th>
                                        <td class="col-md-9 text-capitalize">{{ $order->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">email: </th>
                                        <td class="col-md-9 text-capitalize">{{ $order->email }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">addres :</th>
                                        <td class="col-md-9">{{ $order->address }}</td>
                                    </tr>

                                    <tr>
                                        <th class="col-md-3">Ghi chú:</th>
                                        <td class="col-md-9">{{ $order->note }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <th class="col-md-3">Ngày tạo:</th>
                                        <td class="col-md-9">{{ $order->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Người cập nhật:</th>
                                        <td class="col-md-9">{{ $order->updated_by }}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Trạng thái:</th>
                                        <td class="col-md-9">{{ $order->status == 2 ? 'Hiển thị' : 'Không hiển thị' }}
                                        </td>
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
