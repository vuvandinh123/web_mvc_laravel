@extends('layout.admin')
@section('title', 'Admin | Thùng rác bài viết')

@section('crumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Thùng rác bài viết</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <a href="{{ route('post.index') }}" class="fs-6">Quay lại</a>
                        <h6 class="fs-4 text-capitalize text-danger">Thùng rác bài viết</h6>
                        <div></div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="datatable" class="table align-items-center mb-0 table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tiêu
                                            đề bài viết</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Loại</th>

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
                                    @foreach ($listPost as $post)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src=@if (is_file('images/posts/' . $post->image)) {{ asset('images/posts/' . $post->image) }}
                                                        @else 
                                                            {{ $post->image }} @endif
                                                            {{-- {{ $post->image }} --}} class="avatar avatar-sm me-3"
                                                            alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm"><a
                                                                href="{{ route('post.show', ['post' => $post->id]) }}">
                                                                {{ $post->title }}</a></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-sm text-center">{{ $post->type }} </p>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ date('d/m/Y', strtotime($post->created_at)) }}
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <span style="cursor: pointer" data-id="{{ $post->id }}"
                                                    class="badge badge-sm restore bg-gradient-success  font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Khôi phục
                                                </span>
                                                <a data-id="{{ $post->id }}"
                                                    class="badge badge-sm destroy bg-gradient-danger  font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    xóa
                                                </a>
                                            </td>
                                            <td class="align-middle ">
                                                <a class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    {{ $post->id }}
                                                </a>
                                            </td>
                                            <td class="align-middle ">
                                                <a class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    <input class="destroys" type="checkbox" value="{{ $post->id }}"
                                                        name="" id="">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            <ul style="list-style: none;" class="d-flex mt-3">
                                <li class="mx-2 "><b>Chức năng: </b></li>
                                <li class="mx-2  "><button class="text-danger"  style="border:none;background: none;" id="btnDestroy">Xóa nhiều mục <i class="fa-regular fa-trash-can"></i></button></li>
                                <li class="mx-2"> <a class="text-success" href="{{ route('product.create') }}">Tạo mới</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        setHandleClick('post')
    </script>
@endsection
