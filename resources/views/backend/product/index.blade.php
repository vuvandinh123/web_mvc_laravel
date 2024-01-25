@extends('layout.admin')
@section('title', 'Admin | Sản phẩm')


@section('crumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Tất cả sản phẩm</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>Tất cả sản phẩm</h6>
                        <a class="btn " href="{{ route('product.create') }}">THÊM</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="datatable" class="table align-items-center mb-0 table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sản
                                            phẩm</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Giá bán</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            giá khuyến mại</th>
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
                                    @foreach ($listProduct as $product)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>

                                                        <img src=@if (is_file('images/products/' . $product->image)) {{ asset('images/products/' . $product->image) }}
                                                        @else 
                                                            {{ $product->image }} @endif
                                                            {{-- {{ $product->image }} --}} class="avatar avatar-sm me-3"
                                                            alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm"><a
                                                                href="{{ route('product.show', ['product' => $product->id]) }}">{{ $product->name }}</a>
                                                        </h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $product->brand_name }}
                                                        </p>
                                                    </div>

                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-xs text-center"><span>
                                                        {{ number_format($product->price) }}
                                                    </span> đ
                                                </p>
                                            </td>
                                            <td class="align-middle text-center text-xs">
                                                <span>
                                                    {{ number_format($product->price_sale) }} đ</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ date('d/m/Y', strtotime($product->created_at)) }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <i style="cursor: pointer" class="p-3 fa-solid text-success setStatus fs-4 @if ($product->status == 2) fa-toggle-on
                                                    @else fa-toggle-off @endif"
                                                    data-id="{{ $product->id }}"
                                                    ></i>
                                                <a href="{{ route('product.image', ['id' => $product->id]) }}"
                                                    class=""
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    <i class="text-danger fs-5 fa-regular fa-images"></i>
                                                </a>
                                                <a href="{{ route('product.edit', ['product' => $product->id]) }}"
                                                    class="p-3 text-secondary" data-toggle="tooltip" data-original-title="Edit user">
                                                    {{-- <img src="{{ asset('images/edit.png') }}" alt=""> --}}
                                                    <i class="fs-6 fa-solid fa-pen"></i>
                                                </a>
                                                <a class="py-2 delete" style="cursor: pointer" data-id="{{ $product->id }}">
                                                    <i class="text-danger fa-solid fa-trash-can"></i>
                                                </a>


                                            </td>
                                            <td class="align-middle ">
                                                <a href="" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    {{ $product->id }}
                                                </a>
                                            </td>
                                            <td class="align-middle ">
                                                <span class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    <input type="checkbox" value="{{ $product->id }}" name="delete[]" class="deletes" id="">
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                            <ul style="list-style: none;" class="d-flex mt-3">
                                <li class="mx-2 "><b>Chức năng: </b></li>
                                <li class="mx-2  "><button class="text-danger"  style="border:none;background: none;" id="btnDelete">Thêm vô thùng rác <i class="fa-regular fa-trash-can"></i></button></li>
                                <li class="mx-2"> <a class="text-success" href="{{ route('product.create') }}">Tạo mới</a></li>

                            </ul>
                            <p class="text-center"></p>
                            
                            <a href="{{ route('product.trash') }}" class="float-end btn my-3" type="submit">Thùng rác</a>
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
        setHandleClick('product')
    </script>
@endsection
