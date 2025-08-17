@extends('layouts.app')

@section('title', 'Trang chủ - IQ Media')

@section('content')
    {{-- Banner Carousel --}}
    <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" style="margin-top: 0;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0"
                class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="1"
                aria-label="Slide 2"></button>  
        </div>
        
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://iqmedia.com.vn/assets/slider_1.webp?1715932071" 
                     class="d-block w-100 banner-image" 
                     alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="https://iqmedia.com.vn/assets/slider_2.webp?1715932071" 
                     class="d-block w-100 banner-image" 
                     alt="Banner 2">
            </div>
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- DỊCH VỤ --}}
    <section class="my-4">
        <div class="container custom-container">
            <div class="border rounded p-3 bg-white shadow-sm"> 
                {{-- Tiêu đề --}}
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="fw-bold mb-2 pb-1 border-bottom border-3 border-warning">
                        DỊCH VỤ
                    </h2>
                </div>
                {{-- Grid các card dịch vụ --}}
                <div class="row g-3">
                    @forelse($dichVuPosts as $post)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="card h-100 shadow-sm service-card">
                                {{-- Ảnh --}}
                                <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none"> 
                                    <img src="{{ Storage::url($post->image) }}"
                                         class="card-img-top"
                                         alt="{{ $post->title }}"
                                         style="aspect-ratio: 3/2; object-fit: cover;">
                                </a>

                                {{-- Body --}}
                                <div class="card-body d-flex flex-column p-2">
                                    <h6 class="card-title mb-1">
                                        <a href="{{ route('posts.show', $post->id) }}" 
                                           class="text-dark text-decoration-none">
                                            {{ Str::limit($post->title, 60) }}
                                        </a>
                                    </h6>

                                    @if($post->description)
                                        <p class="card-text text-muted small text-truncate mb-0">
                                            {!! Str::limit(strip_tags($post->description), 80) !!}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="col-12">
                            <div class="text-center py-3">
                                <i class="bi bi-inbox display-4 text-muted"></i>
                                <h5 class="text-muted mt-2">Chưa có dịch vụ nào</h5>
                                <p class="text-muted mb-0">Vui lòng quay lại sau</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    {{-- Section QUẢNG CÁO --}}
    <section class="my-4">
        <div class="container custom-container">
            <div class="border rounded p-3 bg-white shadow-sm"> 
                {{-- Tiêu đề --}}
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="fw-bold mb-2 pb-1 border-bottom border-3 border-primary">
                        QUẢNG CÁO
                    </h2>
                </div>

                {{-- Grid các card quảng cáo --}}
                <div class="row g-3">
                    @forelse($quangCaoPosts as $post)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="card h-100 shadow-sm service-card">
                                {{-- Ảnh --}}
                                <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none"> 
                                    <img src="{{ Storage::url($post->image) }}"
                                         class="card-img-top"
                                         alt="{{ $post->title }}"
                                         style="aspect-ratio: 3/2; object-fit: cover;">
                                </a>

                                {{-- Body --}}
                                <div class="card-body d-flex flex-column p-2">
                                    <h6 class="card-title mb-1">
                                        <a href="{{ route('posts.show', $post->id) }}" 
                                           class="text-dark text-decoration-none">
                                            {{ Str::limit($post->title, 60) }}
                                        </a>
                                    </h6>

                                    @if($post->description)
                                        <p class="card-text text-muted small text-truncate mb-0">
                                            {!! Str::limit(strip_tags($post->description), 80) !!}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="col-12">
                            <div class="text-center py-3">
                                <i class="bi bi-inbox display-4 text-muted"></i>
                                <h5 class="text-muted mt-2">Chưa có quảng cáo nào</h5>
                                <p class="text-muted mb-0">Vui lòng quay lại sau</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    {{-- Section sản phẩm --}}
    <section class="my-4">
        <div class="container custom-container">
            <div class="border rounded p-3 bg-white shadow-sm"> 
                {{-- Tiêu đề --}}
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="fw-bold mb-2 pb-1 border-bottom border-3 border-primary">
                        QUẢNG CÁO
                    </h2>
                </div>

                {{-- Grid các card quảng cáo --}}
                <div class="row g-3">
                    @forelse($quangCaoPosts as $post)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="card h-100 shadow-sm service-card">
                                {{-- Ảnh --}}
                                <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none"> 
                                    <img src="{{ Storage::url($post->image) }}"
                                         class="card-img-top"
                                         alt="{{ $post->title }}"
                                         style="aspect-ratio: 3/2; object-fit: cover;">
                                </a>

                                {{-- Body --}}
                                <div class="card-body d-flex flex-column p-2">
                                    <h6 class="card-title mb-1">
                                        <a href="{{ route('posts.show', $post->id) }}" 
                                           class="text-dark text-decoration-none">
                                            {{ Str::limit($post->title, 60) }}
                                        </a>
                                    </h6>

                                    @if($post->description)
                                        <p class="card-text text-muted small text-truncate mb-0">
                                            {!! Str::limit(strip_tags($post->description), 80) !!}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="col-12">
                            <div class="text-center py-3">
                                <i class="bi bi-inbox display-4 text-muted"></i>
                                <h5 class="text-muted mt-2">Chưa có quảng cáo nào</h5>
                                <p class="text-muted mb-0">Vui lòng quay lại sau</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection