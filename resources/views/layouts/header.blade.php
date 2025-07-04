<div style="background-color: var(--main-color)">
    <header class="container h-50 w-100">
        {{-- Header Top: Logo, Search, Hotline, User, Cart --}}
        <div class="header_top d-flex flex-row justify-content-around align-items-center column-gap-4 p-2">
            {{-- Logo --}}
            <div class="header_logo flex-grow h-100" style="width: 200px">
                <img src="{{ asset('img/logo.png') }}" class="w-100 h-100 object-fit-contain" alt="IQ Media Logo" />
            </div>

            {{-- Search --}}
            <div class="header_search_area h-75 flex-grow-1 d-flex flex-column justify-content-around rounded-3 border-none">
                <form class="header_search d-flex flex-nowrap flex-row align-items-center px-4 mx-4 overflow-hidden rounded-pill border-none bg-light">
                    <button type="submit" class="bg-transparent border-0 p-0">
                        <i class="bi bi-search"></i>
                    </button>
                    <input
                        type="text"
                        class="w-100 border-0 ms-2"
                        style="border-width: 0"
                        placeholder="Tìm kiếm..."
                        required
                    />
                </form>
                <div class="header_search_infor">
                    <i class="bi bi-search"></i>
                    <span>Vui lòng nhập từ khóa vào ô cần tìm</span>
                </div>
            </div>

            {{-- Hotline, User, Cart --}}
            <div class="header_buttons d-flex flex-row align-items-center justify-content-around column-gap-4">
                {{-- Hotline --}}
                <button class="header_hotline rounded-pill d-flex align-items-center">
                    <i class="bi bi-chat-left-text me-2"></i>
                    <div class="header_hotline_infor">
                        Hotline <br>
                        <span class="header_hotline_number">09333 4 8885</span>
                    </div>
                </button>

                {{-- User Dropdown --}}
                @php
                    $user = Auth::user();
                @endphp
                <div class="dropdown">
                    <button class="btn rounded-circle d-inline-flex align-items-center justify-content-center"
                            style="width:40px; height:40px; background-color:#FFD600; border:none;"
                            type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person" style="font-size:20px; color:#000;"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown" style="min-width: 250px;">
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
                            <li><hr class="dropdown-divider"></li>
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
                <a href="#" class="btn rounded-circle d-inline-flex align-items-center justify-content-center"
                   style="width:40px; height:40px; background-color:#FFD600; border:none;">
                    <i class="bi bi-basket" style="font-size:20px; color:#000;"></i>
                </a>
            </div>
        </div>

        {{-- Header Bottom: Main Menu --}}
        <div class="header_bottom d-flex">
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
                            <a href="{{ route('posts.category', 'cho-thue-man-hinh-anh-sang') }}">Cho thuê màn hinh ánh sáng</a>
                        </li>
                        <li class="header_submenu_item"><a href="{{ route('posts.category', 'cho-thue-man-hinh-led') }}">Cho thuê màn hình LED</a></li>
                        <li class="header_submenu_item"><a href="{{ route('posts.category', 'dich-vu-thuong-mai') }}">Dịch vụ thương mại</a></li>
                        <li class="header_submenu_item"><a href="{{ route('posts.category', 'thi-cong-backdrop') }}">Thi công PhotoBooth và Backdrop</a></li>
                        <li class="header_submenu_item"><a href="{{ route('posts.category', 'to-chuc-su-kien') }}">Tổ chức sự kiện</a></li>
                        <li class="header_submenu_item"><a href="{{ route('posts.category', 'quay-phim-chup-hinh') }}">Quay phim - Chụp hình sự kiện chuyên nghiệp tại IQ Media</a></li>
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
</div>