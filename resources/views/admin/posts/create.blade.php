    @extends('layouts.admin.app')

    @section('content') 
        <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        
        <div class="container">
            <h1>Thêm bài viết mới</h1>
            <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <!-- Main content -->
                <div class="mb-3">
                    <label for="title" class="form-label">Nội dung:</label>
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-outline card-info">
                                    <div class="card-body">
                                        <textarea id="summernote" name="content" class="form-control" rows="5" required>
                                            {{ old('content') }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="mb-3">
                    <label for="main_category" class="form-label">Danh mục chính:</label>
                    <select class="form-select" id="main_category" name="main_category" required>
                        <option value="">-- Chọn danh mục chính --</option>
                        <option value="Thương mại">Thương mại</option>
                        <option value="Quảng Cáo">Quảng Cáo</option>
                        <option value="Dịch vụ">Dịch vụ</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Danh mục con:</label>
                    <select class="form-select" id="category" name="category" required>
                        <option value="">-- Chọn danh mục con --</option>
                        <!-- Các danh mục con sẽ được load động -->
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Trạng thái:</label>
                    <select class="form-select" id="status" name="status">
                        <option value="published" selected>Đã xuất bản</option>
                        <option value="draft">Bản nháp</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Hình ảnh:</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Lưu bài viết</button>
            </form>
        </div>

        <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Danh sách các danh mục con
                var subCategories = {
                    'Thương mại': [
                        'Loa BF Audio',
                        'Karaoke gia đình',
                        'Bộ quản lý nguồn',
                        'Amply liền Mixer',
                        'Loa Boutum',
                        'Loa Latop (USA)',
                        'Micro BF Audio',
                        'Mixer BF Digital Karaoke',
                        'Power Amplir',
                        'Trọn bộ karaoke'
                    ],
                    'Quảng Cáo': [
                        'Gia Công CNC - LASER',
                        'Thi Công Quảng Cáo',
                        'In Ấn Kỹ Thuật Số',
                        'Thiết Kế Quảng Cáo'
                    ],
                    'Dịch vụ': [
                        'Cho thuê màn hinh ánh sáng',
                        'Cho thuê màn hình LED',
                        'Dịch vụ thương mại',
                        'Thi công PhotoBooth và Backdrop',
                        'Tổ chức sự kiện',
                        'Quay phim - Chụp hình sự kiện'
                    ]
                };
                
                // Phương pháp 1: Sử dụng jQuery nếu đã tải
                if (window.jQuery) {
                    console.log("jQuery đã được tải");
                    
                    // Summernote initialization
                    if ($.fn.summernote) {
                        $('#summernote').summernote();
                    } else {
                        console.error("Summernote chưa được tải");
                    }
                    
                    // Xử lý khi thay đổi danh mục chính
                    $('#main_category').change(function() {
                        var mainCategory = $(this).val();
                        var categorySelect = $('#category');
                        
                        console.log("Danh mục chính được chọn:", mainCategory);
                        
                        // Xóa tất cả options hiện tại
                        categorySelect.empty().append('<option value="">-- Chọn danh mục con --</option>');
                        
                        // Nếu đã chọn danh mục chính, thêm các danh mục con tương ứng
                        if (mainCategory && subCategories[mainCategory]) {
                            $.each(subCategories[mainCategory], function(i, subcategory) {
                                categorySelect.append($('<option>', { 
                                    value: subcategory,
                                    text: subcategory 
                                }));
                            });
                        }
                    });
                    
                    // Kích hoạt sự kiện change nếu đã có danh mục được chọn
                    if ($('#main_category').val()) {
                        $('#main_category').trigger('change');
                    }
                } 
                // Phương pháp 2: Sử dụng JavaScript thuần nếu jQuery không tồn tại
                else {             
                    // Lấy reference đến các elements select
                    const mainCategorySelect = document.getElementById('main_category');
                    const categorySelect = document.getElementById('category');
                    
                    // Xử lý khi thay đổi danh mục chính
                    mainCategorySelect.addEventListener('change', function() {
                        const selectedMainCategory = mainCategorySelect.value;
                        
                        console.log("Danh mục chính được chọn:", selectedMainCategory);
                        
                        // Xóa tất cả các options hiện tại
                        categorySelect.innerHTML = '<option value="">-- Chọn danh mục con --</option>';
                        
                        // Nếu đã chọn danh mục chính
                        if (selectedMainCategory && subCategories[selectedMainCategory]) {
                            // Thêm các options mới
                            subCategories[selectedMainCategory].forEach(function(subCat) {
                                const option = document.createElement('option');
                                option.value = subCat;
                                option.textContent = subCat;
                                categorySelect.appendChild(option);
                            });
                        }
                    });
                    
                    // Kích hoạt sự kiện change nếu đã có danh mục được chọn
                    if (mainCategorySelect.value) {
                        const event = new Event('change');
                        mainCategorySelect.dispatchEvent(event);
                    }
                }
            });
        </script>
    @endsection