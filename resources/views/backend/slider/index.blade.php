@extends('layout.admin')
@section('title', 'Admin | Slider')

@section('crumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Slider</li>
        </ol>
    </nav>
@endsection
@section('content')


    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>Slider</h6>
                        <a class="btn " href="{{ route('slider.create') }}">THÊM</a>
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
                                            Link</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Vị trí</th>
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
                                    @foreach ($listSlider as $slider)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('images/sliders/'.$slider->image) }}" class="avatar avatar-sm me-3"
                                                            alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm"><a
                                                                href="{{ route('slider.show', ['slider' => $slider->id]) }}">{{ $slider->name }}</a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-xs text-center"><span>{{ $slider->link }}</span> </p>
                                            </td>
                                            <td class="align-middle text-center text-xs">
                                                <span>{{ $slider->position }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ date('d/m/Y', strtotime($slider->created_at)) }}
                                                </span>
                                            </td>
                                            <td class="align-middle" style="width:180px">
                                              <i  style="cursor: pointer"
                                              data-id="{{ $slider->id }}"
                                              class="setStatus p-2 fa-solid text-success fs-4 @if ($slider->status == 2) fa-toggle-on
                  @else fa-toggle-off @endif"
                                              ></i>
                                          <a href="{{ route('slider.edit', ['slider' => $slider->id]) }}"
                                              class="p-3 text-secondary" data-toggle="tooltip"
                                              data-original-title="Edit user">
                                              <i class="fs-6 fa-solid fa-pen"></i>
                                          </a>
                                          <a class="py-2 delete" data-id="{{ $slider->id }}"
                                              style="cursor: pointer">
                                              <i class="text-danger fa-solid fa-trash-can"></i>
                                          </a>
                                            </td>
                                            <td class="align-middle ">
                                                <span class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    {{ $slider->id }}
                                                </span>
                                            </td>
                                            <td class="align-middle ">
                                                
                                                    <input type="checkbox" value="{{ $slider->id }}" class="deletes" name="" id="">
                                                
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            <ul style="list-style: none;" class="d-flex mt-3">
                                <li class="mx-2 "><b>Chức năng: </b></li>
                                <li class="mx-2  "><button class="text-danger"  style="border:none;background: none;" id="btnDelete">Thêm vô thùng rác <i class="fa-regular fa-trash-can"></i></button></li>
                                <li class="mx-2"> <a class="text-success" href="{{ route('slider.create') }}">Tạo mới</a></li>

                            </ul>
                            <p class="text-center"></p>
                            
                            <a href="{{ route('slider.trash') }}" class="float-end btn my-3" type="submit">Thùng rác</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        setHandleClick('slider')
    </script>
@endsection