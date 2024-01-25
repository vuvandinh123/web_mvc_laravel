
@extends('layout.admin')
@section('title','menu')
@section('content')


<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0 d-flex justify-content-between">
            <h6>Chi tiết đơn hàng</h6>
            <a class="btn " href="{{ route('menu.create') }}">THÊM</a>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table id="datatable" class="table align-items-center mb-0 table-hover">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sản phẩm</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Giá</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">slug</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày tạo</th>
                    <th class="text-secondary opacity-7"></th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">id</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">#</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($listMenu as $menu )
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="{{ $menu->image }}" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $menu->name }}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <h4 class="mb-0 text-sm text-center"><span>{{ $menu->price }}</span> đ</h4>
                    </td>
                    <td class="align-middle text-center text-xs">
                      <span>vu-van-dinh</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">
                        {{ date("d/m/Y", strtotime( $menu->created_at)) }}
                        </span>
                    </td>
                    <td class="align-middle">
                      <a href="{{ route('menu.show',['menu'=>$menu->id]) }}" class="badge badge-sm bg-gradient-success  font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Xem
                      </a>
                      <a href="{{ route('menu.edit',['menu'=>$menu->id]) }}" class="badge badge-sm bg-gradient-success  font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Sửa
                      </a>
                      <form class="d-inline" action="{{ route('menu.destroy',['menu'=>1]) }}" method="post">
                        @method('DELETE')
                        <button type="submit" class="badge badge-sm border bg-gradient-success  font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Xóa
                        </button>
                      </form>
                      
                      
                    </td>
                    <td class="align-middle ">
                      <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        {{ $menu->id }}
                      </a>
                    </td>
                    <td class="align-middle ">
                      <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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
<script>
  setHandleClick('orderdetail')
</script>
@endsection