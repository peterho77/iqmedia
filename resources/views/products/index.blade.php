{{-- filepath: d:\Xamp\htdocs\iqmedia\resources\views\products\index.blade.php --}}
@extends('layouts.app')

@section('title', 'Tất cả sản phẩm - IQ Media')

@section('content')
<div class="container py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
            <li class="breadcrumb-item active">Tất cả sản phẩm</li>
        </ol>
    </nav>

    {{-- hien thi loc san pham --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('products.index') }}" class="btn btn-outline-primary btn-sm">Tất cả</a>
                <a href="{{ route('products.category', 'loa-bf-audio') }}" class="btn btn-outline-secondary btn-sm">Loa BF Audio</a>
                <a href="{{ route('products.category', 'karaoke-gia-dinh') }}" class="btn btn-outline-secondary btn-sm">Karaoke gia đình</a>
                <a href="{{ route('products.category', 'bo-quan-ly-nguon') }}" class="btn btn-outline-secondary btn-sm">Bộ quản lý nguồn</a>
                <a href="{{ route('products.category', 'amply-lien-mixer') }}" class="btn btn-outline-secondary btn-sm">Amply liền Mixer</a>
                <a href="{{ route('products.category', 'loa-boutum') }}" class="btn btn-outline-secondary btn-sm">Loa Boutum</a>
                <a href="{{ route('products.category', 'loa-laptop-usa') }}" class="btn btn-outline-secondary btn-sm">Loa Laptop (USA)</a>
                <a href="{{ route('products.category', 'micro-bf-audio') }}" class="btn btn-outline-secondary btn-sm">Micro BF Audio</a>
                <a href="{{ route('products.category', 'power-ampli') }}" class="btn btn-outline-secondary btn-sm">Power Ampli</a>
                <a href="{{ route('products.category', 'tron-bo-karaoke') }}" class="btn btn-outline-secondary btn-sm">Trọn bộ karaoke</a>
            </div>
        </div>
    </div>

    <h1 class="mb-4">TẤT CẢ SẢN PHẨM</h1>
    
    {{-- Filters --}}
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="d-flex align-items-center">
                <span class="me-3">Sắp xếp:</span>
                <select class="form-select form-select-sm" style="width: auto;">
                    <option>Mặc định</option>
                    <option>Giá tăng dần</option>
                    <option>Giá giảm dần</option>
                    <option>Tên A-Z</option>
                    <option>Tên Z-A</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 text-end">
            <small class="text-muted">Hiển thị {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} của {{ $products->total() ?? 0 }} sản phẩm</small>
        </div>
    </div>
    
    <div class="row g-4">
        @if ($products->count() > 0)
            @foreach ($products as $product)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="position-relative">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     class="card-img-top"
                                     alt="{{ $product->name }}"
                                     style="height: 200px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" 
                                     style="height: 200px;">
                                    <i class="bi bi-box text-muted" style="font-size: 3rem;"></i>
                                </div>
                            @endif
                            
                            {{-- Badge category --}}
                            @if($product->category)
                                <span class="badge bg-primary position-absolute top-0 start-0 m-2">
                                    {{ $product->category->name }}
                                </span>
                            @endif
                        </div>
                        
                        <div class="card-body text-center">
                            <h6 class="card-title mb-2">{{ Str::limit($product->name, 30) }}</h6>
                            <p class="text-danger fw-bold mb-2">
                                {{ number_format($product->sale_price ?: $product->price) }}đ
                            </p>
                            @if($product->sale_price)
                                <p class="text-muted text-decoration-line-through small mb-2">
                                    {{ number_format($product->price) }}đ
                                </p>
                            @endif
                            <a href="{{ route('products.show', $product->slug) }}" 
                               class="btn btn-primary btn-sm">
                                Xem chi tiết
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Hiện chưa có sản phẩm nào.
                </div>
            </div>
        @endif
    </div>
    
    @if($products->hasPages())
        <div class="mt-5 d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    @endif
</div>
@endsection