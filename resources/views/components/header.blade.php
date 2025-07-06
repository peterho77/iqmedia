<header>
    <header>
        {{-- Header Top: Logo, Search, Hotline, User, Cart --}}
        <div class="primary-header">
            <div class="custom-container">
                <div class="nav-wrapper">
                    {{-- Logo --}}
                    <a class="header_logo">
                        <img src="{{ asset('img/logo.png') }}" class="logo" alt="IQ Media Logo" />
                    </a>

                    {{-- Search --}}
                    <div class="header_search">
                        <form class="header_search-bar">
                            <input type="text" class="" style="" placeholder="Tìm kiếm..." required />
                            <button type="submit" class="button">
                                <i class="bi bi-search | icon"></i>
                            </button>
                            <div class="header_search-suggest">
                                <i class="bi bi-search | icon | me-300" data-type="inverted"></i>
                                <span>Vui lòng nhập từ khóa vào ô cần tìm</span>
                            </div>
                        </form>
                    </div>

                    {{-- Hotline, User, Cart --}}
                    <div class="header_buttons">
                        {{-- Hotline --}}
                        <button class="header_hotline">
                            <div class="header_hotline-icon">
                                <i class="bi bi-chat-left-text | icon | me-200"></i>
                            </div>
                            <div class="header_hotline-infor">
                                <span class="text-left">Hotline</span>
                                <a class="header_hotline-number">09333 4 8885</a>
                            </div>
                        </button>

                        {{-- User Dropdown --}}
                        @php
                            $user = Auth::user();
                        @endphp
                        <div class="dropdown">
                            <a class="header_user | button" type="button" id="userDropdown" data-shape="circle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person | icon" data-width="large"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown"
                                style="min-width: 250px;">
                                @if(Auth::check())
                                    {{-- Đã đăng nhập: Hiển thị thông tin user --}}
                                    <li class="px-3 py-2 text-center">
                                        <div class="fw-bold">
                                            {{ $user->first_name ?? '' }} {{ $user->last_name ?? '' }}
                                        </div>
                                        <div class="text-muted small">
                                            {{ $user->email }}
                                        </div>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi bi-gear me-2"></i>
                                            Account Settings
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button class="dropdown-item text-danger" type="submit">
                                                <i class="bi bi-box-arrow-right me-2"></i>
                                                Log out
                                            </button>
                                        </form>
                                    </li>
                                @else
                                    {{-- Chưa đăng nhập: Hiển thị nút đăng nhập --}}
                                    <li>
                                        <a class="dropdown-item" href="{{ route('login') }}">
                                            <i class="bi bi-box-arrow-in-right me-2"></i>
                                            Đăng nhập
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>

                        {{-- Cart --}}
                        <a href="#" class="button" data-shape="circle">
                            <i class="bi bi-basket | icon" data-width="large"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Header Bottom: Main Menu --}}
        <div class="secondary-header">
            <ul class="header_menu w-100 d-flex align-items-center justify-content-around">
                <li class="header_menu_item"><a href="/">Trang chủ</a></li>
                <li class="header_menu_item"><a href="{{ route('pages.about') }}">Giới thiệu</a></li>
                <li class="header_menu_item submenu">
                    <a href="">
                        Dịch vụ
                        <i class="header_menu_icon bi bi-chevron-down"></i>
                    </a>
                    <ul class="header_submenu">
                        <li class="header_submenu_item">
                            <a href="{{ route('posts.category', 'cho-thue-man-hinh-anh-sang') }}">Cho thuê màn hinh ánh
                                sáng</a>
                        </li>
                        <li class="header_submenu_item"><a
                                href="{{ route('posts.category', 'cho-thue-man-hinh-led') }}">Cho thuê màn hình LED</a>
                        </li>
                        <li class="header_submenu_item"><a
                                href="{{ route('posts.category', 'dich-vu-thuong-mai') }}">Dịch vụ thương mại</a></li>
                        <li class="header_submenu_item"><a href="{{ route('posts.category', 'thi-cong-backdrop') }}">Thi
                                công PhotoBooth và Backdrop</a></li>
                        <li class="header_submenu_item"><a href="{{ route('posts.category', 'to-chuc-su-kien') }}">Tổ
                                chức sự kiện</a></li>
                        <li class="header_submenu_item"><a
                                href="{{ route('posts.category', 'quay-phim-chup-hinh') }}">Quay phim - Chụp hình sự
                                kiện chuyên nghiệp tại IQ Media</a></li>
                    </ul>
                </li>
                <li class="header_menu_item submenu">
                    <a href="#">
                        Quảng cáo
                        <i class="header_menu_icon bi bi-chevron-down"></i>
                    </a>
                </li>
                <li class="header_menu_item submenu">
                    <a href="#">
                        Thương mại
                        <i class="header_menu_icon bi bi-chevron-down"></i>
                    </a>
                </li>
                <li class="header_menu_item"><a href="/tin-tuc">Tin tức</a></li>
                <li class="header_menu_item"><a href="#">Chia sẻ kinh nghiệm</a></li>
                <li class="header_menu_item"><a href="{{ route('pages.contact') }}">Liên hệ</a></li>
            </ul>
        </div>
    </header>
</header>