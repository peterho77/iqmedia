@extends('layouts.admin.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Danh sách bài viết</h1>
            {{-- <a href="{{ route('admin.create') }}" class="btn btn-success">Thêm bài viết mới</a> --}}
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 40%;">Tiêu đề</th>
                            <th scope="col" style="width: 20%;">Danh mục</th>
                            <th scope="col" style="width: 10%;">Trạng thái</th>
                            <th scope="col" style="width: 10%;">Ngày tạo</th>
                            <th scope="col" style="width: 20%;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category ?: 'Không có' }}</td>
                                <td>
                                    @if ($post->status == 'published')
                                        <span class="badge bg-success">Đã xuất bản</span>
                                    @else
                                        <span class="badge bg-secondary">Bản nháp</span>
                                    @endif
                                </td>
                                <td>{{ $post->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.show', $post->id) }}" class="btn btn-sm btn-info">Xem</a>
                                    <a href="{{ route('admin.edit', $post->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                                    <form action="{{ route('admin.destroy', $post->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
