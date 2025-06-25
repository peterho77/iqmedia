@extends('layouts.admin.app')

@section('content')

    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">



<div class="container">
    <h1>Thêm bài viết mới</h1>
    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <!-- Main content -->
        <div class="mb-3">
            <label for="title" class="form-label">Nội dung:</label>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                        <!-- /.card-header -->
                            <div class="card-body">
                                <textarea id="summernote" name="content" class="form-control" rows="5" required>
                                    {{ old('content') }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
            </section>
                <!-- /.content -->
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Danh mục:</label>
            <select class="form-select" id="category" name="category" required>
                <option value="Cho thuê màn hinh ánh sáng">Cho thuê màn hinh ánh sáng</option>
                <option value="Cho thuê màn hình LED">Cho thuê màn hình LED</option>
                <option value="Dịch vụ thương mại">Dịch vụ thương mại</option>
                <option value="Thi công PhotoBooth và Backdrop">Thi công PhotoBooth và Backdrop</option>
                <option value="Tổ chức sự kiện">Tổ chức sự kiện</option>
                <option value="Quay phim - Chụp hình sự kiện">Quay phim - Chụp hình sự kiện</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái:</label>
            <select class="form-select" id="status" name="status">
                <option value="published" selected>Đã xuất bản</option>
                <option value="draft">Bản nháp</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh:</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Lưu bài viết</button>
    </form>
</div>

    <!-- Page specific script -->
    <script>
        $(function () {
          // Summernote
          $('#summernote').summernote()
        })

    //Thêm hình vào phần nội dung
    function sendFile(file) {
    var data = new FormData();
    data.append("file", file);
    data.append("_token", '{{ csrf_token() }}');

    $.ajax({
        url: '{{ route("admin.uploadImage") }}', // tạo route này
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
        success: function (url) {
            $('#summernote').summernote('insertImage', url);
        },
        error: function (xhr) {
            alert('Lỗi upload ảnh!');
        }
    });
    }
    </script>
    <!-- Summernote -->
    <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>

@endsection
