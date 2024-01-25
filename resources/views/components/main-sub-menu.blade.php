@php
    use App\Models\Menu;
@endphp
@if (count($menuRank2) > 0)
    <li class="ms-5 h-100 nav-item-sp">
        <div class="dropdown-link">
            <a class="text-white fs-4 fw-bold text-uppercase" href="{{ $menuRank1->link }}">sản phẩm</a>
            <i class="ms-2 i-drop px-md-0 px-5 fa-solid fa-caret-down text-white fs-5 "></i>
        </div>
        <div class="nav-item-hover1">

            <div class="row drop_dow-item mb-4">
                @foreach ($menuRank2 as $menu2)
                    <div class="col-md-2 ms-5 fs-4 fw-bold">
                        <a class="text-dark fw-bold d-block fs-4 text-uppercase block"
                            href="{{ $menu2->link }}">{{ $menu2->name }}</a>
                    </div>
                @endforeach
            </div>
            <div class="row drop_dow-item hiden ">
                @foreach ($menuRank2 as $menu2)
                    @php
                        $query_3 = [['status', '=', 2], ['type', 'Main menu'], ['parent_id', $menu2->id]];
                        $menu_3 = Menu::where($query_3)->get();
                    @endphp
                    <div class="col-md-2 m-0">
                        @foreach ($menu_3 as $item3)
                            <ul class=" m-0 p-0">
                                <li class="text-center dropdown-item fs-5 text-capitalize "><a class="fs-5 a-hover d-block"
                                        href="{{ $item3->link }}">{{ $item3->name }}</a>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                @endforeach

            </div>
        </div>
    </li>
@else
    <li class="ms-5 nav-item-sp h-100  pointer"><a class="text-white d-block h-100  fs-4 fw-bold text-uppercase"
            href="{{ $menuRank1->link }}">{{ $menuRank1->name }}</a>
    </li>
@endif
