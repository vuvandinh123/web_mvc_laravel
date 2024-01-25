@extends('layout.admin')
@section('title', 'Admin | Đơn hàng')

@section('crumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Đơn hàng</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Đơn hàng</h6>
    </nav>
@endsection
@section('content')


    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>Đơn hàng</h6>
                        <a class="btn " href="{{ route('order.create') }}">THÊM</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="datatable" class="table align-items-center mb-0 table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            số điện thoại</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Địa chỉ</th>
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
                                    @foreach ($listOrder as $order)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                        <a href="{{ route('order.show',['order'=>$order->id]) }}">{{ $order->name }}</a>    
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-xs text-center"><span>{{ $order->phone }}</span> </p>
                                            </td>
                                            <td class="align-middle text-center text-xs">
                                                <span>{{ $order->address }}</span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ date('d/m/Y', strtotime($order->created_at)) }}
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                              <i  style="cursor: pointer"
                                              data-id="{{ $order->id }}"
                                              class="setStatus p-2 fa-solid text-success fs-4 @if ($order->status == 2) fa-toggle-on
                  @else fa-toggle-off @endif"
                                              ></i>
                                          <a href="{{ route('order.edit', ['order' => $order->id]) }}"
                                              class="p-3 text-secondary" data-toggle="tooltip"
                                              data-original-title="Edit user">
                                              <i class="fs-6 fa-solid fa-pen"></i>
                                          </a>
                                          <a class="py-2 delete" data-id="{{ $order->id }}"
                                              style="cursor: pointer">
                                              <i class="text-danger fa-solid fa-trash-can"></i>
                                          </a>
                                            </td>
                                            <td class="align-middle ">
                                                <a href="" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    {{ $order->id }}
                                                </a>
                                            </td>
                                            <td class="align-middle ">
                                                <a href="" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    <input class="deletes" type="checkbox" name="" id="">
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
    <script>
        setHandleClick('order')
    </script>
@endsection
