@extends('layout.admin')
@section('title', 'Admin | Chi tiết slider')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <a href="{{ route('slider.index') }}">Quay lại</a>
                        <h4 class="text-center">Chi tiết slider</h4>
                        <a class="btn " href="{{ route('slider.edit',['slider'=>request()->route('slider')]) }}">Sửa</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th class="col-md-3 border-right">ID:</th>
                                    <td class="col-md-9">{{ $slider->id }}</td>
                                </tr>
                               
                                <tr>
                                    <th class="col-md-3 border-right">Tên slider:</th>
                                    <td class="col-md-9">{{ $slider->name }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-3">Link:</th>
                                    <td class="col-md-9 text-capitalize">{{ $slider->link }}</td>
                                </tr>
                                
                                <tr>
                                    <th class="col-md-3">Vị trí:</th>
                                    <td class="col-md-9">{{ $slider->sort_order }}</td>
                                </tr>
                                
                                <tr>
                                    <th class="col-md-3">Hình:</th>
                                    <td class="col-md-9">{{ $slider->image }}</td>
                                </tr>
                                
                                
                                <tr>
                                    <th class="col-md-3">Ngày tạo:</th>
                                    <td class="col-md-9">{{ $slider->created_at }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-3">Người cập nhật:</th>
                                    <td class="col-md-9">{{ $slider->updated_by }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-3">Trạng thái:</th>
                                    <td class="col-md-9">{{ $slider->status == 2 ? 'Hiển thị' : 'Không hiển thị' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
