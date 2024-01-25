@extends('layout.admin')
@section('title', 'Admin | Chi tiết bài viết')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <a href="{{ route('page.index') }}">Quay lại</a>
                        <h4 class="text-center">Chi tiết bài viết</h4>
                        <a class="btn " href="{{ route('page.edit',['page'=>request()->route('page')]) }}">Sửa</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th class="col-md-3 border-right">ID:</th>
                                    <td class="col-md-9">{{ $page->id }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-3 border-right">ID Danh mục:</th>
                                    <td class="col-md-9">{{ $page->topic_id }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-3 border-right">Tên bài viết:</th>
                                    <td class="col-md-9">{{ $page->title }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-3">Loại:</th>
                                    <td class="col-md-9 text-capitalize">{{ $page->type }}</td>
                                </tr>
                                
                                <tr>
                                    <th class="col-md-3">slug:</th>
                                    <td class="col-md-9">{{ $page->slug }}</td>
                                </tr>
                                
                                <tr>
                                    <th class="col-md-3">Hình:</th>
                                    <td class="col-md-9">{{ $page->image }}</td>
                                </tr>
                                
                                <tr>
                                    <th class="col-md-3">Từ khóa tìm kiếm:</th>
                                    <td class="col-md-9">{{ $page->metakey }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-3">Mô tả:</th>
                                    <td class="col-md-9">{{ $page->detail }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-3">Mô tả tìm kiếm:</th>
                                    <td style="word-break: break-all;" class="col-md-9">{{ $page->metadesc }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-3">Ngày tạo:</th>
                                    <td class="col-md-9">{{ $page->created_at }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-3">Người cập nhật:</th>
                                    <td class="col-md-9">{{ $page->updated_by }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-3">Trạng thái:</th>
                                    <td class="col-md-9">{{ $page->status == 2 ? 'Hiển thị' : 'Không hiển thị' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
