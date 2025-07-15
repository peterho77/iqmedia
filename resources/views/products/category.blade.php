@extends('layouts.app')

@section('title', $category->name . ' - Sản phẩm')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">{{ $category->name }}</h1>
        
        <div class="row">
            {{-- Cột trái: Sản phẩm --}}
            <div class="col-md-9">
                <div class="row g-4">
                    @if ($products->count() > 0)
                        @foreach ($products as $product)
                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                                    {{-- Hiển thị ảnh sản phẩm --}}
                                    <div class="position-relative" style="height: 200px; overflow: hidden;">
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" 
                                                 class="card-img-top"
                                                 alt="{{ $product->name }}"
                                                 style="object-fit: cover; height: 100%; width: 100%;">
                                        @else
                                            <div class="bg-light h-100 d-flex align-items-center justify-content-center">
                                                <i class="bi bi-box text-muted" style="font-size: 3rem;"></i>
                                            </div>
                                        @endif
                                        
                                        {{-- Badge nếu là sản phẩm nổi bật --}}
                                        @if($product->is_featured)
                                            <span class="badge bg-warning position-absolute top-0 start-0 m-2">
                                                Nổi bật
                                            </span>
                                        @endif
                                    </div>

                                    {{-- Nội dung --}}
                                    <div class="card-body d-flex flex-column">
                                        {{-- Tên sản phẩm --}}
                                        <h5 class="card-title fw-semibold mb-2"
                                            style="height: 50px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                            {{ $product->name }}
                                        </h5>

                                        {{-- Mô tả ngắn --}}
                                        @if($product->short_description)
                                            <p class="card-text text-muted small mb-3"
                                               style="height: 40px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                                {{ $product->short_description }}
                                            </p>
                                        @endif

                                        {{-- Giá --}}
                                        <div class="mt-auto">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>
                                                    @if($product->sale_price)
                                                        <span class="text-decoration-line-through text-muted small">
                                                            {{ number_format($product->price) }}đ
                                                        </span>
                                                        <br>
                                                        <span class="text-danger fw-bold">
                                                            {{ number_format($product->sale_price) }}đ
                                                        </span>
                                                    @else
                                                        <span class="text-primary fw-bold">
                                                            {{ number_format($product->price) }}đ
                                                        </span>
                                                    @endif
                                                </div>
                                                
                                                {{-- Nút Xem chi tiết --}}
                                                <a href="{{ route('products.show', $product->slug) }}" 
                                                   class="btn btn-sm btn-primary">
                                                    Xem chi tiết
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-info text-center">
                            <i class="bi bi-info-circle me-2"></i>
                            Hiện chưa có sản phẩm nào trong danh mục này.
                        </div>
                    @endif
                </div>

                {{-- Pagination --}}
                @if($products->hasPages())
                    <div class="mt-5 d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>

            {{-- Cột phải: Danh mục --}}
            <div class="col-md-3">
                <div class="bg-white shadow-sm rounded-3 p-3">
                    <h5 class="mb-3"><i class="bi bi-grid me-2"></i>Danh mục sản phẩm</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('products.category', 'loa-bf-audio') }}" class="d-block py-2 text-decoration-none">Loa BF Audio</a></li>
                        <li><a href="{{ route('products.category', 'karaoke-gia-dinh') }}" class="d-block py-2 text-decoration-none">Karaoke gia đình</a></li>
                        <li><a href="{{ route('products.category', 'bo-quan-ly-nguon') }}" class="d-block py-2 text-decoration-none">Bộ quản lý nguồn</a></li>
                        <li><a href="{{ route('products.category', 'amply-lien-mixer') }}" class="d-block py-2 text-decoration-none">Amply liền Mixer</a></li>
                        <li><a href="{{ route('products.category', 'loa-boutum') }}" class="d-block py-2 text-decoration-none">Loa Boutum</a></li>
                        <li><a href="{{ route('products.category', 'loa-laptop-usa') }}" class="d-block py-2 text-decoration-none">Loa Laptop (USA)</a></li>
                        <li><a href="{{ route('products.category', 'micro-bf-audio') }}" class="d-block py-2 text-decoration-none">Micro BF Audio</a></li>
                        <li><a href="{{ route('products.category', 'power-ampli') }}" class="d-block py-2 text-decoration-none">Power Ampli</a></li>
                        <li><a href="{{ route('products.category', 'tron-bo-karaoke') }}" class="d-block py-2 text-decoration-none">Trọn bộ karaoke</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .card {
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15) !important;
            }
        </style>
    @endpush
@endsection