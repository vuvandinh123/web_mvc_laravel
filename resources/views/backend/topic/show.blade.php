@extends('layout.admin')
@section('title', 'Admin | Chi tiết bài viết')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <a href="{{ route('topic.index') }}">Quay lại</a>
                        <h4 class="text-center">Chi tiết chủ đề</h4>
                        <a class="btn " href="{{ route('topic.edit',['topic'=>request()->route('topic')]) }}">Sửa</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th class="col-md-3 border-right">ID:</th>
                                    <td class="col-md-9">{{ $topic->id }}</td>
                                </tr>
                                
                                <tr>
                                    <th class="col-md-3 border-right">Tên chủ đề:</th>
                                    <td class="col-md-9">{{ $topic->name }}</td>
                                </tr>
                                
                                
                                <tr>
                                    <th class="col-md-3">slug:</th>
                                    <td class="col-md-9">{{ $topic->slug }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-3">Cấp cha:</th>
                                    <td class="col-md-9">{{ $topic->parent_id }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-3">Từ khóa tìm kiếm:</th>
                                    <td class="col-md-9">{{ $topic->metakey }}</td>
                                </tr>
                                
                                <tr>
                                    <th class="col-md-3">Mô tả tìm kiếm:</th>
                                    <td style="word-break: break-all;" class="col-md-9">{{ $topic->metadesc }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-3">Ngày tạo:</th>
                                    <td class="col-md-9">{{ $topic->created_at }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-3">Người cập nhật:</th>
                                    <td class="col-md-9">{{ $topic->updated_by }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-3">Trạng thái:</th>
                                    <td class="col-md-9">{{ $topic->status == 2 ? 'Hiển thị' : 'Không hiển thị' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
