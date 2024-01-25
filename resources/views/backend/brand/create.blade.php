@extends('layout.admin')
@section('title', 'Admin | Thêm thương hiệu')

@section('css')
    <link rel="stylesheet" href="{{ asset('froala_editor/css/froala_editor.min.css') }}">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }

        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="bg-white border-radius-2xl p-5">
            <a href="{{ route('brand.index') }}" class="fs-6">Quay lại</a>
            <div class="">
                <h4 class="text-center mb-4">Thêm Thương hiệu</h4>

            </div>
            <form action="{{ route('brand.store') }}" id="create" method="post"enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">Tên Thương hiệu <span class="text-danger">*</span></label>
                        <input name="name" id="name" type="text" class="form-control"
                            placeholder="Tên Thương hiệu ">
                        <span class="text-danger alert" style="font-size: 12px"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="sort_order" class="form-label">Vị Trí <span class="text-danger">*</span></label>
                        <select name="sort_order" class="form-select" id="sort_order">
                            <option selected disabled value="">Chọn Vị Trí</option>
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

                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label my-2">Mô tả tìm kiếm <span
                                class="text-danger">*</span></label>
                        <textarea style="min-height: 100px;" class="form-control" name="metades" id="metades" cols="30"
                            rows="15"></textarea>
                        <span class="text-danger alert" style="font-size: 12px"></span>
                    </div>
                    <div id="edit"></div>
                    <div class="col-md-12">
                        <button class="btn btn-success px-3 w-100 mt-5" type="submit">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('froala_editor/js/froala_editor.min.js') }}"></script>
    <script type="text/javascript" src='https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js'></script>
    <script src="https://cdn.tiny.cloud/1/pkujmrtdapk72uundfzjrz4n8oyk7317vzss52lu4wpm94pj/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#metades',
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
            validateInput(['#name', '#sort_order', '#metakey', '#metades'], 'Vui lòng nhập trường này');
            $('#create').submit(function(e) {
                let fieldIds = ['name', 'sort_order', 'metakey', 'metades']
                handleSubmit(e, fieldIds, 'vui lòng nhập trường này')
            });
        });
    </script>
@endsection
