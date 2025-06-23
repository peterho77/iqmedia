@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h1>Sửa bài viết</h1>

    {{-- Form cập nhật bài viết --}}
    <form action="{{ route('admin.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Nội dung:</label>
            <textarea class="form-control" id="content" name="content" rows="6" required>{{ $post->content }}</textarea>
        </div>
        {{-- hien thi danh mục hiện tại --}}
        <div class="mb-3">
            <label for="category" class="form-label">Danh mục:</label>
            <select class="form-select" id="category" name="category" required>
                <option value="Cho thuê màn hinh ánh sáng" {{ $post->category == 'Cho thuê màn hinh ánh sáng' ? 'selected' : '' }}>Cho thuê màn hinh ánh sáng</option>
                <option value="Cho thuê màn hình LED" {{ $post->category == 'Cho thuê màn hình LED' ? 'selected' : '' }}>Cho thuê màn hình LED</option>
                <option value="Dịch vụ thương mại" {{ $post->category == 'Dịch vụ thương mại' ? 'selected' : '' }}>Dịch vụ thương mại</option>
                <option value="Thi công PhotoBooth và Backdrop" {{ $post->category == 'Thi công PhotoBooth và Backdrop' ? 'selected' : '' }}>Thi công PhotoBooth và Backdrop</option>
                <option value="Tổ chức sự kiện" {{ $post->category == 'Tổ chức sự kiện' ? 'selected' : '' }}>Tổ chức sự kiện</option>
                <option value="Quay phim - Chụp hình sự kiện" {{ $post->category == 'Quay phim - Chụp hình sự kiện' ? 'selected' : '' }}>Quay phim - Chụp hình sự kiện</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái:</label>
            <select class="form-select" id="status" name="status">
                <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Đã xuất bản</option>
                <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Bản nháp</option>
            </select>
        </div>
        {{-- hien thi ảnh hiện tại và upload ảnh mới --}}
        <div class="mb-3">
            @if($post->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="max-width: 200px;">
                </div>
            @endif
            <label for="image" class="form-label">Thay đổi hình ảnh:</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật bài viết</button>
    </form>
</div>
@endsection