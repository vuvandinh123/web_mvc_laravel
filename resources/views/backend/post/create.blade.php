@extends('layout.admin')
@section('title', 'Admin | Thêm bài viết')

@section('content')
    <div class="container-fluid py-4">
        <div class="bg-white border-radius-2xl p-5">
            <a href="{{ route('post.index') }}" class="fs-6">Quay lại</a>
            <div class="">
                <h4 class="text-center mb-4">Thêm bài viết</h4>

            </div>
            <form action="{{ route('post.store') }}" id="create" method="post"enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">Tiêu đề bài viết <span class="text-danger">*</span></label>
                        <input name="title" id="title" type="text" class="form-control "
                            placeholder="Tên bài viết ">
                        <span class="text-danger alert" style="font-size: 12px"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="topic_id" class="form-label">Chủ đề<span class="text-danger">*</span></label>
                        <select name="topic_id" class="form-select" id="topic_id">
                            <option selected disabled value="">Chọn chủ đề</option>
                            <?= $html ?>
                        </select>
                        <span class="text-danger alert" style="font-size: 12px"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label my-2">Từ khóa tìm kiếm <span
                                class="text-danger">*</span></label>
                        <input type="text" placeholder="ví dụ: sản phẩm đến từ tương lai" class="form-control"
                            name="metakey" id="metakey">
                        <span class="text-danger alert" style="font-size: 12px"></span>
                    </div>
                    <div class="col-md-6 image-create">
                        <label for="" class="form-label my-2 me-2">Hình:</label>
                        <label class="text-danger me-2" for="image">Tải tệp lên</label>
                        <label class="text-info" for="url">sử dụng URL</label>
                        <input type="radio" name="chon" id="image" checked>
                        <input type="file" placeholder="ví dụ: 10" class="form-control" name="image" id="">
                        <input type="radio" name="chon" id="url">
                        <input type="text" class="form-control" placeholder="URL" name="urlimage">

                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label">Trạng thái <span class="text-danger">*</span></label>
                        <select name="status" class="form-select" id="status">
                            <option value="2">Hiện</option>
                            <option value="1">Ẩn</option>
                        </select>
                        <span class="text-danger alert" style="font-size: 12px"></span>
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label my-2">Mô tả tìm kiếm <span
                                class="text-danger">*</span></label>
                        <input placeholder="mô tả.." style="min-height: 40px" class="form-control" name="metades"
                            id="metades">
                        <span class="text-danger alert" style="font-size: 12px"></span>
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label my-2">Chi tiết <span class="text-danger">*</span></label>
                        <textarea
                            placeholder=""
                            style="min-height: 40px" class="form-control" name="detail" id="detail" cols="30" rows="5"></textarea>
                        <span class="text-danger alert" style="font-size: 12px"></span>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-success px-3 w-100 mt-5" type="submit">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.tiny.cloud/1/pkujmrtdapk72uundfzjrz4n8oyk7317vzss52lu4wpm94pj/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#detail',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ]
        });
        $(document).ready(function() {
            validateInput(['#title', '#topic_id', '#metakey', '#metades', '#detail'], 'Vui lòng nhập trường này');
            validationName('post', '#title');
            $('#create').submit(function(e) {
                let fieldIds = ['title', 'topic_id', 'metakey', 'metades', 'detail']
                handleSubmit(e, fieldIds, 'vui lòng nhập trường này', '#title')
            });
        });
    </script>
@endsection
