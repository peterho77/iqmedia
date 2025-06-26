@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-4">
        <h1>{{ $post->title }}</h1>
        <div>
            <a href="{{ route('admin.edit', $post->id) }}" class="btn btn-primary">Sửa</a>
            <form action="{{ route('admin.destroy', $post->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
            </form>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <strong>Thông tin bài viết</strong>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $post->id }}</p>
            <p><strong>Danh mục:</strong> {{ $post->category ?: 'Không có' }}</p>
            <p><strong>Trạng thái:</strong>
                @if($post->status == 'published')
                    <span class="badge bg-success">Đã xuất bản</span>
                @else
                    <span class="badge bg-secondary">Bản nháp</span>
                @endif
            </p>
            <p><strong>Ngày tạo:</strong> {{ $post->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Cập nhật lần cuối:</strong> {{ $post->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    @if($post->image)
        <div class="mb-4">
            <h4>Hình ảnh:</h4>
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="max-width: 100%;" class="img-thumbnail">
        </div>
    @endif

    <div class="mb-4">
        <h4>Nội dung bài viết:</h4>
        <div class="p-3 bg-light">
            {!! $post->content !!}
        </div>
    </div>

    <a href="{{ route('admin.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
</div>
@endsection