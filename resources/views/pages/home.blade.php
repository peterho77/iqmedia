@extends('layouts.app')

@section('title', 'Trang chủ - IQ Media')

@section('content')
    {{-- Container chính của carousel --}}
    <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" style="margin-top: 0;">

        {{-- Các chấm tròn điều hướng --}}
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>

        {{-- Nội dung các slides --}}
        <div class="carousel-inner">
            {{-- bannner 1 uu tien hien thị đầu tiên --}}
            <div class="carousel-item active">
                <img src="{{ asset('img/banner1.jpg') }}" class="d-block w-100 banner-image" alt="Banner 1">
                <div class="carousel-caption d-none d-md-block">
                    <h2>CÔNG TY CỔ PHẦN TRUYỀN THÔNG & SỰ KIỆN IQ</h2>
                    <div class="banner-services">
                        <p>● CUNG CẤP MÀN HÌNH LED INDOOR</p>
                        <p>● CUNG CẤP MÀN HÌNH LED OUTDOOR</p>
                    </div>
                </div>
            </div>

            {{-- banner 2  --}}
            <div class="carousel-item">
                <img src="{{ asset('img/banner2.jpg') }}" class="d-block w-100 banner-image" alt="Banner 2">
                <div class="carousel-caption d-none d-md-block">
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

        {{-- Nút Previous ben trái --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        {{-- Nút Next ben phai --}}
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- // Thêm phần dịch vụ --}}
    <div class="custom-container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 post-inner clearfix">
                <div class="blog_index">
                    <div class="myblog"
                        onclick="window.location.href='/services/amana-hotel-chinh-thuc-khai-truong-tai-phan-thiet';">
                        <div class="image-blog-left a-center">
                            <a href="/services/amana-hotel-chinh-thuc-khai-truong-tai-phan-thiet">
                                <img src="//iqmedia.com.vn/uploads/images/images/6856057a0bbcf.jpg"
                                    data-src="//iqmedia.com.vn/uploads/images/images/6856057a0bbcf.jpg"
                                    class="lazyload img-responsive loaded" style="aspect-ratio: 3/2;width: 100%;"
                                    data-was-processed="true">
                            </a>
                        </div>
                        <div class="content_blog">
                            <div class="content_right">
                                <h3>
                                    <a href="/services/amana-hotel-chinh-thuc-khai-truong-tai-phan-thiet">Amana Hotel chính thức
                                        khai trương tại Phan Thiết</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 post-inner clearfix">
                <div class="blog_index">
                    <div class="myblog"
                        onclick="window.location.href='/services/amana-hotel-chinh-thuc-khai-truong-tai-phan-thiet';">
                        <div class="image-blog-left a-center">
                            <a href="/services/amana-hotel-chinh-thuc-khai-truong-tai-phan-thiet">
                                <img src="//iqmedia.com.vn/uploads/images/images/6856057a0bbcf.jpg"
                                    data-src="//iqmedia.com.vn/uploads/images/images/6856057a0bbcf.jpg"
                                    class="lazyload img-responsive loaded" style="aspect-ratio: 3/2;width: 100%;"
                                    data-was-processed="true">
                            </a>
                        </div>
                        <div class="content_blog">
                            <div class="content_right">
                                <h3>
                                    <a href="/services/amana-hotel-chinh-thuc-khai-truong-tai-phan-thiet">Amana Hotel chính thức
                                        khai trương tại Phan Thiết</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-lg-3 col-md-3 col-sm-6 col-6 post-inner clearfix">
                <div class="blog_index">
                    <div class="myblog"
                        onclick="window.location.href='/services/amana-hotel-chinh-thuc-khai-truong-tai-phan-thiet';">
                        <div class="image-blog-left a-center">
                            <a href="/services/amana-hotel-chinh-thuc-khai-truong-tai-phan-thiet">
                                <img src="//iqmedia.com.vn/uploads/images/images/6856057a0bbcf.jpg"
                                    data-src="//iqmedia.com.vn/uploads/images/images/6856057a0bbcf.jpg"
                                    class="lazyload img-responsive loaded" style="aspect-ratio: 3/2;width: 100%;"
                                    data-was-processed="true">
                            </a>
                        </div>
                        <div class="content_blog">
                            <div class="content_right">
                                <h3>
                                    <a href="/services/amana-hotel-chinh-thuc-khai-truong-tai-phan-thiet">Amana Hotel chính thức
                                        khai trương tại Phan Thiết</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-lg-3 col-md-3 col-sm-6 col-6 post-inner clearfix">
                <div class="blog_index">
                    <div class="myblog"
                        onclick="window.location.href='/services/amana-hotel-chinh-thuc-khai-truong-tai-phan-thiet';">
                        <div class="image-blog-left a-center">
                            <a href="/services/amana-hotel-chinh-thuc-khai-truong-tai-phan-thiet">
                                <img src="//iqmedia.com.vn/uploads/images/images/6856057a0bbcf.jpg"
                                    data-src="//iqmedia.com.vn/uploads/images/images/6856057a0bbcf.jpg"
                                    class="lazyload img-responsive loaded" style="aspect-ratio: 3/2;width: 100%;"
                                    data-was-processed="true">
                            </a>
                        </div>
                        <div class="content_blog">
                            <div class="content_right">
                                <h3>
                                    <a href="/services/amana-hotel-chinh-thuc-khai-truong-tai-phan-thiet">Amana Hotel chính thức
                                        khai trương tại Phan Thiết</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
