@php
    use App\Models\Menu;
    $query_1 = [['status', '=', 2], ['type', 'Main menu'], ['parent_id', 0]];
    $menu_1 = Menu::where($query_1)->get();
@endphp
<div class="nav ">
    <div class=" pss">
        <div class="row nav-1 ">
            <ul class="d-flex p-0">
                <div class='nav-mb-login'>
                    <div class='fs-1 px-3 d-flex justify-content-between py-3 ps-5 ms-3 fw-bold bg-danger text-white'>
                        <div>VVD Shoe</div>
                        <div class="close">X</div>
                    </div>
                </div>
                @foreach ($menu_1 as $item1)
                    @php
                        $query_2 = [['status', '!=', 0], ['type', 'Main menu'], ['parent_id', $item1->id]];
                        $menu_2 = Menu::where($query_2)->get();
                    @endphp
                    @if (count($menu_2) != 0)
                        <li class="ms-5 h-100 nav-item-sp">
                            <div class="dropdown-link">
                                <a class="text-white fs-4 fw-bold text-uppercase" href="">{{ $item1->name }}</a>
                                <i class="ms-2 i-drop px-md-0 px-5 fa-solid fa-caret-down text-white fs-5 "></i>
                            </div>
                            <div class="nav-item-hover1">
                                <div class="row drop_dow-item mb-4">
                                    @foreach ($menu_2 as $item2)
                                        <div class="col-md ms-5 fs-4 fw-bold">
                                            <a class="text-dark fw-bold d-block fs-4 text-uppercase block"
                                                href="">{{ $item2->name }}</a>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row drop_dow-item hiden ">
                                    @foreach ($menu_2 as $item2)
                                        @php
                                            $query_3 = [['status', '=', 2], ['type', 'Main menu'], ['parent_id', $item2->id]];
                                            $menu_3 = Menu::where($query_3)->get();
                                        @endphp
                                        @if (count($menu_3) != 0)
                                            <div class="col-md m-0">
                                                @foreach ($menu_3 as $item3)
                                                    <ul class="ps-5">
                                                        <li class="dropdown-item fs-5 text-capitalize "><a
                                                                class="fs-5 a-hover d-block" href="">{{ $item3->name }}</a>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            </div>
                                        @else
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="ms-5 nav-item-sp h-100  pointer"><a
                                class="text-white d-block h-100  fs-4 fw-bold text-uppercase"
                                href="">{{ $item1->name }}</a>
                        </li>
                    @endif
                @endforeach

                {{-- <li class="ms-5 nav-item-sp h-100  pointer"><a
                        class="text-white d-block h-100  fs-4 fw-bold text-uppercase" href="">tin tức</a>
                </li>
                <li class="ms-5 nav-item-sp h-100  pointer"><a
                        class="text-white d-block h-100  fs-4 fw-bold text-uppercase" href="">giới
                        thiệu</a></li>
                <li class="ms-5 nav-item-sp h-100  pointer"><a
                        class="text-white d-block h-100  fs-4 fw-bold text-uppercase" href="">liên hệ</a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
