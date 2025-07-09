@extends('layouts.app')

@section('title', $post->title . ' - IQ Media')

@section('content')
<div class="container py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="/dich-vu">Dịch vụ</a></li>
            <li class="breadcrumb-item"><a href="/quang-cao">Quảng cáo</a></li>
            @if($post->category)
                <li class="breadcrumb-item active">{{ $post->category }}</li>
            @endif
        </ol>
    </nav>

    <div class="post-content mb-5">
        <h1 class="mb-4">{{ $post->title }}</h1>
        <div class="post-meta text-muted mb-4">
            <span>Đăng ngày: {{ $post->created_at->format('d/m/Y') }}</span>
        </div>

        @if(isset($post->image) && $post->image)
            <div class="post-image mb-4">
                <img src="{{ asset('storage/'.$post->image) }}" class="img-fluid" alt="{{ $post->title }}">
            </div>
        @endif

        <div class="post-body">
            {!! $post->content !!}
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
.post-content {
    background: white;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.post-content h1 {
    color: #0066cc;
    font-weight: bold;
    border-bottom: 2px solid #0066cc;
    padding-bottom: 10px;
}

.post-body {
    line-height: 1.8;
    font-size: 16px;
}

.post-body img {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 20px auto;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.post-body p {
    margin-bottom: 15px;
    text-align: justify;
}

.post-body h2, .post-body h3, .post-body h4 {
    color: #0066cc;
    margin-top: 30px;
    margin-bottom: 15px;
}

.post-image img {
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}
</style>
@endsection