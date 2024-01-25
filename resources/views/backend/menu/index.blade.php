@extends('layout.admin')
@section('title', 'Admin | Menu')

@section('crumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Menu</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Menu</h6>
    </nav>
@endsection
@section('css')
    <style>
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            ;
        }

        ul li label {
            font-weight: 500;
            font-size: 16px;

        }
    </style>
@endsection
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>Menu</h6>
                        <a class="btn " href="{{ route('menu.create') }}">THÊM</a>
                    </div>
                    <div class="card-body px-0 pt-0 p-3 pb-2">
                        <div class="row">
                            <div style="" class=" col-md-4 ">
                                <div>
                                    <label for="" class="form-label">Tạo menu</label>
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item border text-dark p-3">
                                            <p class="font-weight-bold"> Vị trí</p>
                                            <select id="position" class="form-select" name="mainmenu" id="">
                                                <option value="Main menu">Main menu</option>
                                                <option value="Footer menu">Footer menu</option>
                                            </select>
                                        </div>
                                        <div class="accordion-item border">
                                            <h2 class="accordion-header" id="flush-headingOne">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                    aria-expanded="false" aria-controls="flush-collapseOne">
                                                    Danh mục
                                                </button>
                                            </h2>
                                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <ul class="text-dark">

                                                        @foreach ($listCategory as $item)
                                                            <li><input value="{{ $item->id }}"
                                                                    id="cate{{ $item->id }}" type="checkbox"
                                                                    class="category"> <label class="text-capitalize"
                                                                    for="cate{{ $item->id }}">{{ $item->name }}</label>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <button id="Btncate"
                                                        class="btn btn-success text-white w-100">thêm</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingTwo">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                                    aria-expanded="false" aria-controls="flush-collapseTwo">
                                                    Thương hiệu
                                                </button>
                                            </h2>
                                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                                aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <ul class="text-dark">
                                                        @foreach ($listBrand as $item)
                                                            <li><input value="{{ $item->id }}"
                                                                    id="cate{{ $item->id }}" type="checkbox"
                                                                    class="category"> <label class="text-capitalize"
                                                                    for="cate{{ $item->id }}">{{ $item->name }}</label>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <button class="btn w-100 bg-success">THEM</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingThree">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                                    aria-expanded="false" aria-controls="flush-collapseThree">
                                                    Trang
                                                </button>
                                            </h2>
                                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                                aria-labelledby="flush-headingThree"
                                                data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <ul class="text-dark">
                                                        <li><input type="checkbox" name="" id=""> menu 1
                                                        </li>
                                                        <li><input type="checkbox" name="" id=""> menu 1
                                                        </li>
                                                        <li><input type="checkbox" name="" id=""> menu 1
                                                        </li>
                                                        <li><input type="checkbox" name="" id=""> menu 1
                                                        </li>
                                                        <li><input type="checkbox" name="" id=""> menu 1
                                                        </li>
                                                        <li><input type="checkbox" name="" id=""> menu 1
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingThree">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                                    aria-expanded="false" aria-controls="flush-collapseThree">
                                                    Liên kêt tự tạo
                                                </button>
                                            </h2>
                                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                                aria-labelledby="flush-headingThree"
                                                data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="" class="col-md-8 ">
                                <div class="table-responsive p-0">
                                    <table id="datatable" class="table table-hover align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Danh
                                                    mục</th>

                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Vị trí</th>
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
                                            @foreach ($listMenu as $menu)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>

                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm text-capitalize">
                                                                    <a
                                                                        href="{{ route('menu.show', ['menu' => $menu->id]) }}">{{ $menu->name }}</a>
                                                                </h6>
                                                                <span
                                                                    class="text-secondary text-xxs ">{{ $menu->link }}</span>
                                                            </div>
                                                        </div>
                                                    </td>


                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-xs font-weight-bold">
                                                            {{ $menu->type }}
                                                        </span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <i style="cursor: pointer"
                                                            class="p-2 fa-solid text-success fs-4 @if ($menu->status == 2) fa-toggle-on
                  @else fa-toggle-off @endif"
                                                            onclick="getStatus(this,{{ $menu->id }})"></i>
                                                        <a data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal{{ $menu->id }}"
                                                            data-bs-whatever="@mdo" class="p-3 text-secondary"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            <i class="fs-6 fa-solid fa-pen"></i>
                                                        </a>
                                                        <a class="p-2" style="cursor: pointer"
                                                            onclick="deleteTrash(this,{{ $menu->id }})">
                                                            <i class="text-danger fa-solid fa-trash-can"></i>
                                                        </a>
                                                    </td>
                                                    <td class="align-middle ">
                                                        <a href="" class="text-secondary font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            {{ $menu->id }}
                                                        </a>
                                                    </td>
                                                    <td class="align-middle ">
                                                        <a href="" class="text-secondary font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            <input type="checkbox" name="" id="">
                                                        </a>
                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="exampleModal{{ $menu->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form
                                                                action="{{ route('menu.update', ['menu' => $menu->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('put')
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        Chỉnh
                                                                        sửa menu</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="mb-3">
                                                                        <label for="recipient-name"
                                                                            class="col-form-label">Tên menu:</label>
                                                                        <input value="{{ $menu->name }}" name="name"
                                                                            type="text" class="form-control"
                                                                            id="recipient-name">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="message-text"
                                                                            class="col-form-label">Liên kết</label>
                                                                        <input class="form-control" name="link"
                                                                            id="message-text"
                                                                            value="{{ $menu->link }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="message-text"
                                                                            class="col-form-label">Menu cấp</label>
                                                                        <select data-id="{{ $menu->id }}"
                                                                            class="form-select rank" id="vitri"
                                                                            name="rank">
                                                                            <option value="" selected>Chọn cấp
                                                                            </option>
                                                                            <option value="1">Cấp 1</option>
                                                                            <option value="2">Cấp 2</option>
                                                                            <option value="3">Cấp 3</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="message-text"
                                                                            class="col-form-label">Cấp cha</label>
                                                                        <select class="form-select parent_id"
                                                                            name="parent_id" id="parent_id">
                                                                            <option selected value="">Vui lòng chọn
                                                                                cấp menu</option>

                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="message-text"
                                                                            class="col-form-label">Sắp xếp</label>
                                                                        <select class="form-select sort_order"
                                                                            name="sort_order" id="sort_order">
                                                                            <option selected value="">Vui lòng chọn
                                                                                cấp menu</option>


                                                                        </select>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="message-text"
                                                                            class="col-form-label">Vị trí</label>
                                                                        <select class="form-select" name="type"
                                                                            id="">
                                                                            <option
                                                                                {{ $item->table_id == 1 ? 'selected' : '' }}
                                                                                value="Main Menu">Main Menu</option>
                                                                            <option
                                                                                {{ $item->table_id == 2 ? 'selected' : '' }}
                                                                                value="Footer Menu">Footer Menu</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Send
                                                                        message</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach


                                        </tbody>
                                    </table>
                                    <ul style="list-style: none;" class="d-flex mt-3">
                                        <li class="mx-2 "><b>Chức năng: </b></li>
                                        <li class="mx-2  "><button class="text-danger"
                                                style="border:none;background: none;" type="submit ">Thêm vô thùng rác <i
                                                    class="fa-regular fa-trash-can"></i></button></li>
                                        <li class="mx-2"> <a class="text-success"
                                                href="{{ route('menu.create') }}">Tạo
                                                mới</a></li>

                                    </ul>
                                    <p class="text-center"></p>

                                    <a href="" class="float-end btn my-3" type="submit">Thùng rác</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/admin/menu.js') }}"></script>
    <script></script>
@endsection
