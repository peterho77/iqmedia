@extends('layouts.app')

@section('content')
<div class="container py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="/dich-vu">Dịch vụ</a></li>
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