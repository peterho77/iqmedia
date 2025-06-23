@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thêm bài viết mới</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        
        <div class="mb-3">
            <label for="content" class="form-label">Nội dung:</label>
            <textarea class="form-control" id="content" name="content" rows="6" required></textarea>
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
@endsection