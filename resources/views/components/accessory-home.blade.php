<h2 class="text-center mt-5 my-5 fs-1">PHỤ KIỆN BẠN CÓ THỂ THÍCH</h2>
<div class="row row-cols-3 row-cols-md-4 g-4">
    @for ($i = 0; $i < 8; $i++)
        <div class="col">
            <div class="card mb-3 border-0" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <a href="?option=product&slug= ">
                            <img width="100px" height="100px" src="{{ asset('images/products/tat.jpg') }}"
                                class=" rounded-start" alt="...">
                        </a>
                    </div>

                    <div class="col-md-8">
                        <div class="card-body">
                            <a class="link-hover" href="?option=product&slug= ">
                                <h5 class="card-title fs-4 ms-3 text-capitalize">Tất vớ cổ cao Cún nhỏ ngồi cute có
                                    viền.</h5>
                            </a>
                            <h6 class="text-danger fs-3 ms-3">23.000đ</h6>

                            <h6><del class="text-secondary fs-3 ms-3">40.000đ</del></h6>


                            <span class="sale-pk">48%</span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endfor

</div>
