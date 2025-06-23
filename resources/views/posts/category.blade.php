@extends('layouts.app')

@section('title', $category)

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-center">{{ $category }}</h1>
    
    <div class="row g-4">
        {{-- Kiểm tra có bài viết không --}}
        @if($posts->count() > 0)
            @foreach($posts as $post)
                <div class="col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                        
                        {{-- hiển thị ảnh --}}
                        <div class="position-relative" style="height: 180px; overflow: hidden;">
                            @if(isset($post->image) && $post->image)
                                {{-- hiển thị ảnh bài viết co san --}}
                                <img src="{{ asset('storage/'.$post->image) }}" 
                                     class="card-img-top" 
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
                            <h5 class="card-title fw-semibold mb-2" style="height: 50px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                {{ $post->title }}
                            </h5>
                            
                            {{-- Mô tả ngắn --}}
                            <p class="card-text text-muted small mb-3" style="height: 70px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                {{ Str::limit(strip_tags($post->content), 100) }}
                            </p>
                            
                            {{-- xem chi tiết --}}
                            <div class="mt-auto text-end">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary">Xem chi tiết</a>
                            </div>
                        </div>
                        
                        {{-- Footer hiển thị ngày đăng --}}
                        <div class="card-footer bg-white border-top-0 text-muted small">
                            <i class="bi bi-calendar me-1"></i> {{ $post->created_at->format('d/m/Y') }}
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            {{-- hien thi thong bao khi không có bài viết --}}
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Hiện chưa có bài viết nào trong danh mục này.
                </div>
            </div>
        @endif
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
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
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