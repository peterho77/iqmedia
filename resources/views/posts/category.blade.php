@extends('layouts.app')

@section('title', $category)

@section('content')
    <div class="container py-5">

        <h1 class="mb-4">{{ $category }}</h1>
        <div class="row">
            {{-- Cột trái: Bài viết --}}
            <div class="col-md-9">

                <div class="row g-4">
                    @if ($posts->count() > 0)
                        @foreach ($posts as $post)
                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">

                                    {{-- hiển thị ảnh --}}
                                    <div class="position-relative" style="height: 180px; overflow: hidden;">
                                        @if (isset($post->image) && $post->image)
                                            {{-- hiển thị ảnh bài viết co san --}}
                                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                                                alt="{{ $post->title }}"
                                                style="object-fit: cover; height: 100%; width: 100%;">
                                        @else
                                            {{-- Hiển thị icon mặc định nếu không có ảnh --}}
                                            <div class="bg-light h-100 d-flex align-items-center justify-content-center">
                                                <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Nội dung  --}}
                                    <div class="card-body d-flex flex-column">
                                        {{-- Tiêu đề bài viết --}}
                                        <h5 class="card-title fw-semibold mb-2"
                                            style="height: 50px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                            {{ $post->title }}
                                        </h5>

                                        {{-- xem chi tiết --}}
                                        <div
                                            class="card-footer bg-white border-top-0 d-flex justify-content-between align-items-center">
                                            {{-- Ngày đăng --}}
                                            <small class="text-muted">
                                                <i class="bi bi-calendar me-1"></i>
                                                {{ $post->created_at->format('d/m/Y') }}
                                            </small>
                                            {{-- Nút Xem chi tiết --}}
                                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary">
                                                Xem chi tiết
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <div class="alert alert-info text-center">
                                Hiện chưa có bài viết nào trong danh mục này.
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Cột phải: Danh mục --}}
            <div class="col-md-3">
                <div class="bg-white shadow-sm rounded-3 p-3">
                    <h5 class="mb-3">Danh mục</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.dichvu') }}" class="d-block py-1">Cho thuê màn hinh ánh sáng</a></li>
                        <li><a href="{{ route('admin.quangcao') }}" class="d-block py-1">Cho thuê màn hình LED</a></li>
                        <li><a href="{{ route('admin.index') }}" class="d-block py-1">Dịch vụ thương mại</a></li>
                        <li><a href="{{ route('admin.dichvu') }}" class="d-block py-1">Thi công PhotoBooth và Backdrop</a>
                        </li>
                        <li><a href="{{ route('admin.quangcao') }}" class="d-block py-1">Tổ chức sự kiện</a></li>
                        <li><a href="{{ route('admin.index') }}" class="d-block py-1">Dịch vụ thương mại</a></li>
                    </ul>
                </div>

                {{-- Hiển thị bài viết mới của danh mục hiện tại --}}
                @if (isset($relatedPosts) && $relatedPosts->count())
                    <div class="bg-white shadow-sm rounded-3 p-3 mt-3">
                        <h5 class="mb-3">Bài viết liên quan</h5>
                        @foreach ($relatedPosts as $post)
                            <div class="mb-3">
                                <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none">
                                    <div
                                        style="background-color: #f8f9fa; padding: 10px; border-radius: 5px; display: flex; align-items: center;">
                                        <img src="{{ $post->image }}" alt="{{ $post->title }}"
                                            style="width: 100px; height: 80px; object-fit: cover; margin-right: 10px; border-radius: 5px;">
                                        <div>
                                            <h6 class="mb-1">{{ Str::limit($post->title, 40) }}</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>



    @push('styles')
        <style>
            /* Hiệu ứng hover cho card */
            .card {
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
            }

            /* Điều chỉnh font size */
            .card-title {
                font-size: 1rem;
                line-height: 1.4;
            }

            .card-text {
                font-size: 0.875rem;
                line-height: 1.5;
            }

            /* Tùy chỉnh nút */
            .btn-primary {
                background-color: #0d6efd;
                border-color: #0d6efd;
                padding: 0.25rem 0.75rem;
            }

            .btn-primary:hover {
                background-color: #0b5ed7;
                border-color: #0b5ed7;
            }
        </style>
    @endpush
@endsection
