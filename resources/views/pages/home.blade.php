@extends('layouts.app')

@section('title', 'Trang chủ - IQ Media')
@section('content')
    <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" style="margin-top: 0;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0"
              class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="1"
              aria-label="Slide 2"></button>  
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://iqmedia.com.vn/assets/slider_1.webp?1715932071" class="d-block w-100 banner-image" alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="https://iqmedia.com.vn/assets/slider_2.webp?1715932071" class="d-block w-100 banner-image" alt="Banner 2">
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