<ul class="d-flex p-0">
    <div class='nav-mb-login'>
        <div class='fs-1 px-3 d-flex justify-content-between py-3 ps-5 ms-3 fw-bold bg-danger text-white'>
            <div>VVD Shoe</div>
            <div class="close">X</div>
        </div>
    </div>
    @foreach ($menus as $menu)
        <x-main-sub-menu :menu="$menu"/>
    @endforeach
    
</ul>
