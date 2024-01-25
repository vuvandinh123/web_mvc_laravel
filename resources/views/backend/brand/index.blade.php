@extends('layout.admin')
@section('title', 'Admin | Thương hiệu')
@section('crumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Thương hiệu</li>
        </ol>
    </nav>
@endsection
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>Thương hiệu</h6>
                        <a class="btn" href="{{ route('brand.create') }}">THÊM</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="datatable" class="table table-hover align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Thương hiệu</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            slug</th>
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
                                    @foreach ($listBrand as $brand)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src=@if (is_file('images/brands/' . $brand->image)) {{ asset('images/brands/' . $brand->image) }}
                          @else
                              {{ $brand->image }} @endif
                                                            class="avatar avatar-sm me-3" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm text-capitalize">
                                                          <a href="{{ route('brand.show',['brand'=>$brand->id]) }}">{{ $brand->name }}</a>
                                                          </h6>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="align-middle text-center text-xs">
                                                <span>{{ $brand->slug }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ date('d/m/Y', strtotime($brand->created_at)) }}
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <i  style="cursor: pointer"
                                                    data-id="{{ $brand->id }}"
                                                    class="setStatus p-2 fa-solid text-success fs-4 @if ($brand->status == 2) fa-toggle-on
                        @else fa-toggle-off @endif"
                                                    ></i>
                                                <a href="{{ route('brand.edit', ['brand' => $brand->id]) }}"
                                                    class="p-3 text-secondary" data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    <i class="fs-6 fa-solid fa-pen"></i>
                                                </a>
                                                <a class="py-2 delete" data-id="{{ $brand->id }}"
                                                    style="cursor: pointer">
                                                    <i class="text-danger fa-solid fa-trash-can"></i>
                                                </a>

                                            </td>
                                            <td class="align-middle ">
                                                <a href="" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    {{ $brand->id }}
                                                </a>
                                            </td>
                                            <td class="align-middle ">
                                                <a href="" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    <input type="checkbox" value="{{ $brand->id }}" name="" class="deletes" id="">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <ul style="list-style: none;" class="d-flex mt-3">
                                <li class="mx-2 "><b>Chức năng: </b></li>
                                <li class="mx-2  "><button class="text-danger"  style="border:none;background: none;" id="btnDelete">Thêm vô thùng rác <i class="fa-regular fa-trash-can"></i></button></li>
                                <li class="mx-2"> <a class="text-success" href="{{ route('brand.create') }}">Tạo mới</a></li>

                            </ul>
                            <p class="text-center"></p>
                            
                            <a href="{{ route('brand.trash') }}" class="float-end btn my-3" type="submit">Thùng rác</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/index.js') }}"></script>
    <script>
        setHandleClick('brand')
    </script>
@endsection