@extends('layouts.admin.app')

@section('title', 'Quản lý sản phẩm')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Danh sách sản phẩm</h3>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Thêm sản phẩm
                    </a>
                </div>
                
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="50">ID</th>
                                    <th width="120">Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th width="120">Danh mục</th>
                                    <th width="120">Giá</th>
                                    <th width="100">Trạng thái</th>
                                    <th width="180">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td class="text-center">
                                            @if($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}" 
                                                     alt="{{ $product->name }}" 
                                                     class="img-thumbnail" 
                                                     style="width: 60px; height: 60px; object-fit: cover;">
                                            @else
                                                <div class="bg-light d-flex align-items-center justify-content-center" 
                                                     style="width: 60px; height: 60px; border-radius: 4px;">
                                                    <i class="fas fa-image text-muted"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <div>
                                                <strong>{{ $product->name }}</strong>
                                                @if($product->is_featured)
                                                    <span class="badge badge-warning badge-sm ml-1">Nổi bật</span>
                                                @endif
                                            </div>
                                            <small class="text-muted">
                                                <i class="fas fa-barcode"></i> {{ $product->sku }}
                                            </small>
                                            @if($product->stock_quantity !== null)
                                                <br><small class="text-info">
                                                    <i class="fas fa-boxes"></i> Tồn kho: {{ $product->stock_quantity }}
                                                </small>
                                            @endif
                                        </td>
                                        <td>
                                            @if($product->category)
                                                <span class="badge badge-info">{{ $product->category->name }}</span>
                                            @else
                                                <span class="badge badge-secondary">Chưa phân loại</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($product->sale_price && $product->sale_price < $product->price)
                                                <div>
                                                    <small class="text-muted" style="text-decoration: line-through;">
                                                        {{ number_format($product->price) }}đ
                                                    </small>
                                                </div>
                                                <strong class="text-danger">{{ number_format($product->sale_price) }}đ</strong>
                                            @else
                                                <strong class="text-primary">{{ number_format($product->price) }}đ</strong>
                                            @endif
                                        </td>
                                        <td>
                                            @switch($product->status)
                                                @case('active')
                                                    <span class="badge badge-success">Hoạt động</span>
                                                    @break
                                                @case('inactive')
                                                    <span class="badge badge-danger">Tạm dừng</span>
                                                    @break
                                                @case('draft')
                                                    <span class="badge badge-secondary">Nháp</span>
                                                    @break
                                                @default
                                                    <span class="badge badge-secondary">Không xác định</span>
                                            @endswitch
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.products.show', $product) }}" 
                                                   class="btn btn-sm btn-info" title="Xem chi tiết">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.products.edit', $product) }}" 
                                                   class="btn btn-sm btn-warning" title="Chỉnh sửa">
                                                    <i class="fas fa-edit"></i> Sửa
                                                </a>
                                                <form action="{{ route('admin.products.destroy', $product) }}" 
                                                      method="POST" style="display: inline;" 
                                                      onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm {{ $product->name }}?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Xóa">
                                                        <i class="fas fa-trash"></i> Xóa
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="fas fa-box-open fa-3x mb-3"></i>
                                                <p class="mb-2">Chưa có sản phẩm nào.</p>
                                                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                                                    <i class="fas fa-plus"></i> Thêm sản phẩm đầu tiên
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <select class="form-select form-select-sm flex-grow-1" name="category_id">
    <option value="">Chọn nhóm hàng</option>
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
    @endforeach
</select> --}}
@endsection