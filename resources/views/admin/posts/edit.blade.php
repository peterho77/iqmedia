@extends('layouts.admin.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/simplemde/simplemde.min.css') }}">

<div class="container">
    <h1>Sửa bài viết</h1>
    {{-- Form cập nhật bài viết --}}
    <form action="{{ route('admin.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Nội dung:</label>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                        <!-- /.card-header -->
                            <div class="card-body">
                                <textarea id="summernote" name="content" class="form-control" rows="5" required>
                                    {{ old('content', $post->content ?? '') }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
            </section>
                <!-- /.content -->
        </div>
        {{-- hien thi danh mục hiện tại --}}
        <div class="mb-3">
            <label for="main_category" class="form-label">Danh mục chính:</label>
            <select class="form-select" id="main_category" name="main_category" required>
                <option value="">-- Chọn danh mục chính --</option>
                <option value="Thương mại" {{ strpos($post->category, 'Loa BF Audio') !== false || strpos($post->category, 'Karaoke gia đình') !== false || strpos($post->category, 'Bộ quản lý nguồn') !== false || strpos($post->category, 'Amply liền Mixer') !== false || strpos($post->category, 'Loa Boutum') !== false || strpos($post->category, 'Loa Latop (USA)') !== false || strpos($post->category, 'Micro BF Audio') !== false || strpos($post->category, 'Mixer BF Digital Karaoke') !== false || strpos($post->category, 'Power Amplir') !== false || strpos($post->category, 'Trọn bộ karaoke') !== false ? 'selected' : '' }}>Thương mại</option>
                <option value="Quảng Cáo" {{ strpos($post->category, 'Gia Công CNC - LASER') !== false || strpos($post->category, 'Thi Công Quảng Cáo') !== false || strpos($post->category, 'In Ấn Kỹ Thuật Số') !== false || strpos($post->category, 'Thiết Kế Quảng Cáo') !== false ? 'selected' : '' }}>Quảng Cáo</option>
                <option value="Dịch vụ" {{ strpos($post->category, 'Cho thuê màn hinh ánh sáng') !== false || strpos($post->category, 'Cho thuê màn hình LED') !== false || strpos($post->category, 'Dịch vụ thương mại') !== false || strpos($post->category, 'Thi công PhotoBooth và Backdrop') !== false || strpos($post->category, 'Tổ chức sự kiện') !== false || strpos($post->category, 'Quay phim - Chụp hình sự kiện') !== false ? 'selected' : '' }}>Dịch vụ</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Danh mục con:</label>
            <select class="form-select" id="category" name="category" required>
                <option value="">-- Chọn danh mục con --</option>
                <!-- Sẽ được load động dựa trên danh mục chính -->
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái:</label>
            <select class="form-select" id="status" name="status">
                <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Đã xuất bản</option>
                <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Bản nháp</option>
            </select>
        </div>
        {{-- hien thi ảnh hiện tại và upload ảnh mới --}}
        <div class="mb-3">
            @if($post->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="max-width: 200px;">
                </div>
            @endif
            <label for="image" class="form-label">Thay đổi hình ảnh:</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật bài viết</button>
    </form>
</div>
    <!-- Page specific script -->
    <script>
        $(function () {
          // Summernote
          $('#summernote').summernote();
        });

    function sendFile(file) {
    var data = new FormData();
    data.append("file", file);
    data.append("_token", '{{ csrf_token() }}');

    $.ajax({
        url: '{{ route("admin.uploadImage") }}', // tạo route này
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
        success: function (url) {
            $('#summernote').summernote('insertImage', url);
        },
        error: function (xhr) {
            alert('Lỗi upload ảnh!');
        }
    });
    }
    </script>
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