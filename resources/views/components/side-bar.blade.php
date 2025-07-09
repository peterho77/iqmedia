<nav id="sidebar">
    <ul>
        <li>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    <path fill-rule="evenodd"
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                </svg>
            </span>
            <button class="toggle-sidebar-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                    <path fill-rule="evenodd"
                        d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                </svg>
            </button>
        </li>
        <li>
            <a href="">
                <span>Trang chủ</span>
            </a>
        </li>
        <li>
            <a href="">
                <span>Giới thiệu</span>
            </a>
        </li>
        <li>
            <button class="dropdown-btn">
                <span>Dịch vụ</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                </svg>
            </button>
            <ul class="sub-menu">
                <div>
                    <li><a href=""><span>Cho thuê âm thanh ánh sáng</span></a></li>
                    <li><a href=""><span>Cho thuê màn hình LED</span></a></li>
                    <li><a href=""><span>Dịch vụ thương mại</span></a></li>
                    <li><a href=""><span>Thi công PhotoBooth và Backdrop</span></a></li>
                    <li><a href=""><span>Tổ chức sự kiện</span></a></li>
                    <li><a href=""><span>Quay phim - Chụp hình sự kiện chuyên nghiệp</span></a></li>
                </div>  
            </ul>
        </li>
        <li>
            <a href="">
                <span>Quảng cáo</span>
            </a>
        </li>
        <li>
            <a href="">
                <span>Thương mại</span>
            </a>
        </li>
        <li>
            <a href="">
                <span>Tin tức</span>
            </a>
        </li>
        <li>
            <a href="">
                <span>Chia sẻ kinh nghiệm</span>
            </a>
        </li>
        <li>
            <a href="">
                <span>Liên hệ</span>
            </a>
        </li>
    </ul>
</nav>

@push('scripts')
    @vite(['resources/js/side-bar.js'])
@endpush