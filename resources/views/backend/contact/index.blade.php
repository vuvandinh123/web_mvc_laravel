@extends('layout.admin')
@section('title', 'Admin | Liên hệ')

@section('crumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Liên hệ</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Liên hệ</h6>
    </nav>
@endsection
@section('content')


    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>Liên hệ</h6>
                        <a class="btn " href="{{ route('contact.create') }}">THÊM</a>
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
                                            Email</th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tiêu đề</th>
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
                                    @foreach ($listContact as $contact)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $contact->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-xs text-center"><span>{{ $contact->email }}</span> </p>
                                            </td>

                                            <td class="align-middle text-center text-xs">
                                                <span>{{ $contact->title }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ date('d/m/Y', strtotime($contact->created_at)) }}
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <i style="cursor: pointer" data-id="{{ $contact->id }}"
                                                    class="setStatus p-2 fa-solid text-success fs-4 @if ($contact->status == 2) fa-toggle-on
                        @else fa-toggle-off @endif"></i>
                                                <a href="{{ route('contact.edit', ['contact' => $contact->id]) }}"
                                                    class="p-3 text-secondary" data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    <i class="fs-6 fa-solid fa-pen"></i>
                                                </a>
                                                <a class="py-2 delete" data-id="{{ $contact->id }}"
                                                    style="cursor: pointer">
                                                    <i class="text-danger fa-solid fa-trash-can"></i>
                                                </a>

                                            </td>
                                            <td class="align-middle ">
                                                <a href="" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    {{ $contact->id }}
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
                            <ul style="list-style: none;" class="d-flex mt-3">
                              <li class="mx-2 "><b>Chức năng: </b></li>
                              <li class="mx-2  "><button class="text-danger"  style="border:none;background: none;" type="submit ">Thêm vô thùng rác <i class="fa-regular fa-trash-can"></i></button></li>
                              <li class="mx-2"> <a class="text-success" href="{{ route('contact.create') }}">Tạo mới</a></li>

                          </ul>
                          <p class="text-center"></p>
                          
                          <a href="{{ route('contact.trash') }}" class="float-end btn my-3" type="submit">Thùng rác</a>
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
        setHandleClick('contact')
    </script>
@endsection