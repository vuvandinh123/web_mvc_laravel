@extends('layout.site')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/news-item.css') }}">
@endsection
@section('content')
    <div class="container mt-5">
        <div class="breadcrumb">
            <ul class="d-flex">
                <li class="">
                    <a class="me-md-3 me-1" href="#">Trang chủ</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li class="">4 Đôi giày thể thao mới ra mắt đầu tháng 6</li>
            </ul>
        </div>
        <h1 class="text-center color-red fw-bold">Tin tức</h1>
        <section class="cart my-5 p-2">
            <h2 class="fw-bold fs-3">
                4 Đôi giày thể thao mới ra mắt đầu tháng 6
            </h2>
            <ul class="crated-at d-flex color-secondary fs-5 fw-500 p-0">
                <li class="me-4 "><i class="fa-solid fa-calendar-days me-2"></i> Thứ hai, 23/3/2023</li>
                <li class=" "><i class="fa-solid fa-user me-2"></i> Đăng bởi <span>Vũ Văn Định</span></li>
            </ul>
            <div class="row">
                <div class="col-md-9">
                    <div class="article_lq my-4 mb-5">
                        <p class="text-uppercase fw-semibold fs-4 ms-3 pt-3">bài viết liên quan</p>
                        <ul>
                            <li class="my-3"><a class="link-hover " href="#">Những đôi giày diện với quần xẻ tà siêu
                                    chất</a></li>
                            <li class="my-3"><a class="link-hover " href="#">Làm sạch giày da lộn đơn giản và hiệu
                                    quả
                                    nhất</a></li>
                            <li class="my-3"><a class="link-hover " href="#">Đi du lịch nên chọn 5 kiểu giầy này sẽ
                                    giúp
                                    bạn cá tính hơn</a></li>
                            <li class="my-3"><a class="link-hover " href="#">10 đôi giày các nàng công sở nhất định
                                    phải
                                    có</a></li>
                        </ul>
                    </div>
                    <div class="content-news color-secondary fs-4">
                        {!! $post->detail !!}
                    </div>
                    <h5 class="fs-2 fw-bold my-3 mt-5">Bình luận: </h5>
                    <div id="comment_show" class="comment mb-5 border  p-3">
                        {{-- comment --}}
                    </div>
                    <div class="add-commnet">
                        <h5 class="fs-2 fw-bold my-5">Để lại bình luận:</h5>
                        <form action="" id="comment" method="post">
                            <div class="row">
                                
                                <div class="col-12 mt-4">
                                    <input type="hidden" id="post_id" value="{{ $post->id }}">
                                    <textarea id="comment_content" class="w-100 fw-semibold rounded-2 border  p-3" name="" id="" rows="5"
                                        placeholder="Viết bình luận"></textarea>
                                </div>
                            </div>
                            <div class="button-hover my-3">
                                <button type="submit" class=" fs-4">Gửi bình luận</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <aside>
                        <h5 class="text-uppercase fs-3 my-5">danh mục tin tức</h5>
                        <div class="category-wrap-left border px-2 ">
                            <ul>

                            </ul>
                        </div>
                    </aside>
                    <div class="wrap-hot mt-5  ">
                        <h3 class="fs-3 text-uppercase my-4 link-hover">Bộ sưu tập hot</h3>
                        <div class="list-product-mini">
                            <div class="product-mini-item mb-3 border p-2 animationTop">
                                <div class="row">
                                    <div class="col-4"><img
                                            src="https://bizweb.dktcdn.net/thumb/medium/100/342/645/products/men-s-original-canvas-casual-skate-shoes.png?v=1545564063607"
                                            alt=""></div>
                                    <div class="col">
                                        <div class="product-content-mini">
                                            <h4 class="  my-2"><a class="link-hover" href="#">Giày thể thao nữ cổ
                                                    thấp
                                                    mẫu mới nhất</a></h4>
                                            <span class="color-red fw-bold fs-3">268.000đ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-mini-item my-3 border p-2 animationTop delay-01">
                                <div class="row">
                                    <div class="col-4"><img
                                            src="https://bizweb.dktcdn.net/thumb/medium/100/342/645/products/men-s-original-canvas-casual-skate-shoes.png?v=1545564063607"
                                            alt=""></div>
                                    <div class="col">
                                        <div class="product-content-mini">
                                            <h4 class="  my-2"><a class="link-hover" href="#">Giày thể thao nữ cổ
                                                    thấp
                                                    mẫu mới nhất</a></h4>
                                            <span class="color-red fw-bold fs-3">268.000đ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-mini-item my-3 border p-2 animationTop delay-02">
                                <div class="row">
                                    <div class="col-4"><img
                                            src="https://bizweb.dktcdn.net/thumb/medium/100/342/645/products/men-s-original-canvas-casual-skate-shoes.png?v=1545564063607"
                                            alt=""></div>
                                    <div class="col">
                                        <div class="product-content-mini">
                                            <h4 class="  my-2"><a class="link-hover" href="#">Giày thể thao nữ cổ
                                                    thấp
                                                    mẫu mới nhất</a></h4>
                                            <span class="color-red fw-bold fs-3">268.000đ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-mini-item my-3 border p-2 animationTop delay-03">
                                <div class="row">
                                    <div class="col-4"><img
                                            src="https://bizweb.dktcdn.net/thumb/medium/100/342/645/products/men-s-original-canvas-casual-skate-shoes.png?v=1545564063607"
                                            alt=""></div>
                                    <div class="col">
                                        <div class="product-content-mini">
                                            <h4 class="  my-2"><a class="link-hover" href="#">Giày thể thao nữ cổ
                                                    thấp
                                                    mẫu mới nhất</a></h4>
                                            <span class="color-red fw-bold fs-3">268.000đ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-mini-item border p-2 animationTop delay-04">
                                <div class="row">
                                    <div class="col-4"><img
                                            src="https://bizweb.dktcdn.net/thumb/medium/100/342/645/products/men-s-original-canvas-casual-skate-shoes.png?v=1545564063607"
                                            alt=""></div>
                                    <div class="col">
                                        <div class="product-content-mini">
                                            <h4 class="  my-2"><a class="link-hover" href="#">Giày thể thao nữ cổ
                                                    thấp
                                                    mẫu mới nhất</a></h4>
                                            <span class="color-red fw-bold fs-3">268.000đ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
@endsection