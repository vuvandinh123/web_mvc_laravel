@extends('layout.admin')
@section('title', 'Admin | Thùng rác Liên hệ')

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
                                                        <h6 class="mb-0 text-sm"><a href="{{ route('product.show',['product'=>$product->id]) }}">{{ $product->name }}</a> </h6>
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
                                            <td class="align-middle">
                                                
                                                <form data-id="{{ $product->id }}" id="status" class="d-inline" action="{{ route('product.status',['id'=>$product->id]) }}" method="post">
                                                    @csrf
                                                @method('PUT')
                                                
                                                <button 
                                                class="badge badge-sm border {{$product->status ==2 ? 'bg-gradient-success' :'bg-danger'}}   font-weight-bold text-xs" type="submit">
                                                {{$product->status ==2 ? 'on' :'off'}} 
                                            </button>                                                   </form>
                                                <a href="{{ route('product.show', ['product' => $product->id]) }}"
                                                    class="badge badge-sm bg-gradient-success  font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Xem
                                                </a>
                                                <a href="{{ route('product.image', ['id' => $product->id]) }}"
                                                    class="badge badge-sm bg-gradient-success  font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    thêm ảnh
                                                </a>
                                                <a href="{{ route('product.edit', ['product' => $product->id]) }}"
                                                    class="badge badge-sm bg-gradient-success  font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Sửa
                                                </a>
                                                <form class="d-inline"
                                                    action="{{ route('product.destroy', ['product' => $product->id]) }}"
                                                    method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                        class="badge badge-sm border bg-gradient-success  font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        Xóa
                                                    </button>
                                                </form>


                                            </td>
                                            <td class="align-middle ">
                                                <a href="" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    {{ $product->id }}
                                                </a>
                                            </td>
                                            <td class="align-middle ">
                                                <a href="" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    <input type="checkbox" name="" id="">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    
@endsection
