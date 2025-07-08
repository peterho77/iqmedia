@extends('layouts.app')

@section('title', 'Trang chủ - IQ Media')

@section('content')
    {{-- Carousel Banner --}}
    <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" style="margin-top: 0;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0"
                    class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/banner1.jpg') }}" class="d-block w-100 banner-image" alt="Banner 1">
                <div class="carousel-caption d-none d-md-block text-start">
                    <h2>CÔNG TY CỔ PHẦN TRUYỀN THÔNG & SỰ KIỆN IQ</h2>
                    <div class="banner-services">
                        <p>● CUNG CẤP MÀN HÌNH LED INDOOR</p>
                        <p>● CUNG CẤP MÀN HÌNH LED OUTDOOR</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/banner2.jpg') }}" class="d-block w-100 banner-image" alt="Banner 2">
                <div class="carousel-caption d-none d-md-block text-start">
                    <h2>CÔNG TY CỔ PHẦN TRUYỀN THÔNG & SỰ KIỆN IQ</h2>
                    <div class="banner-services">
                        <p>● TỔ CHỨC LỄ KHÁNH THÀNH</p>
                        <p>● TỔ CHỨC LỄ KHAI TRƯƠNG</p>
                        <p>● TỔ CHỨC LỄ KỶ NIỆM</p>
                        <p>● TỔ CHỨC LỄ KHỞI CÔNG</p>
                    </div>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- Section DỊCH VỤ --}}
    <section class="my-5">
      <div class="container custom-container">
        <div class="border rounded p-4 bg-white shadow-sm">
          {{-- Tiêu đề --}}
          <h2 class="fw-bold mb-4 pb-2 border-bottom border-3 border-warning">DỊCH VỤ</h2>

          {{-- Grid các card dịch vụ --}}
          <div class="row g-4">
            @foreach($posts as $post)
              <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm">
                  {{-- Ảnh --}}
                  <a href="{{ route('posts.show', $post->id) }}">
                    <img src="{{ Storage::url($post->image) }}"
                         class="card-img-top"
                         alt="{{ $post->title }}"
                         style="aspect-ratio:3/2; object-fit:cover;">
                  </a>

                  {{-- Body --}}
                  <div class="card-body d-flex flex-column">
                    <h5 class="card-title">
                      <a href="{{ route('posts.show', $post->id) }}" class="text-dark">
                        {{ $post->title }}
                      </a>
                    </h5>
                    <p class="card-text text-truncate">
                      {!! Str::limit(strip_tags($post->description), 80) !!}
                    </p>                 
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
@endsection
