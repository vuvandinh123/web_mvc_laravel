@extends('layout.admin')
@section('title', 'Admin | Thùng rác bài viết')

@section('crumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Thùng rác chỦ đề bài viết</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <a href="{{ route('topic.index') }}" class="fs-6">Quay lại</a>
                        <h5 class="text-danger">Thùng rác chủ đề bài viết</h5>
                        <a class="btn " href="{{ route('topic.index') }}">X</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="datatable" class="table align-items-center mb-0 table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên
                                            chủ đề</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Cấp cha</th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Ngày tạo</th>
                                        <th class="text-secondary opacity-7"></th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            id</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            #</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listTopic as $topic)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $topic->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0 text-sm text-center">{{ $topic->parent_id }}</p>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">
                                                {{ date('d/m/Y', strtotime($topic->created_at)) }}
                                            </span>
                                        </td>
                                        <td class="align-middle">
                                            <span style="cursor: pointer" data-id="{{ $topic->id }}"
                                                class="badge restore badge-sm bg-gradient-success  font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                Khôi phục
                                            </span>
                                            <a data-id="{{ $topic->id }}"
                                                class="badge destroy badge-sm bg-gradient-danger  font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                xóa
                                            </a>
                                        </td>
                                        <td class="align-middle ">
                                            <a href="" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                {{ $topic->id }}
                                            </a>
                                        </td>
                                        <td class="align-middle ">
                                            <a href="" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                <input type="checkbox" class="destroys" name="" value="{{ $topic->id }}" id="">
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            <ul style="list-style: none;" class="d-flex mt-3">
                                <li class="mx-2 "><b>Chức năng: </b></li>
                                <li class="mx-2  "><button id="btnDestroy" class="text-danger"
                                        style="border:none;background: none;">Xóa nhiều <i
                                            class="fa-regular fa-trash-can"></i></button></li>
                                <li class="mx-2"> <a class="text-success" href="{{ route('topic.create') }}">Tạo mới</a>
                                </li>

                            </ul>
                            <p class="text-center"></p>

                            <a href="{{ route('topic.trash') }}" class="float-end btn my-3" type="submit">Thùng rác</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    setHandleClick('topic')
</script>
@endsection
