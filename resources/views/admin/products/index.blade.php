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
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Danh mục</th>
                                    <th>Giá</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            <strong>{{ $product->name }}</strong><br>
                                            <small class="text-muted">{{ $product->sku }}</small>
                                        </td>
                                        <td>
                                            <span class="badge badge-info">{{ $product->category->name ?? 'N/A' }}</span>
                                        </td>
                                        <td>
                                            <strong class="text-primary">{{ number_format($product->price) }}đ</strong>
                                        </td>
                                        <td>
                                            @if($product->status === 'active')
                                                <span class="badge badge-success">Hoạt động</span>
                                            @else
                                                <span class="badge badge-danger">Tạm dừng</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.products.edit', $product) }}" 
                                               class="btn btn-sm btn-warning">Sửa</a>
                                            <form action="{{ route('admin.products.destroy', $product) }}" 
                                                  method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" 
                                                onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <p class="mb-0">Chưa có sản phẩm nào.</p>
                                            <a href="{{ route('admin.products.create') }}" class="btn btn-primary mt-2">
                                                Thêm sản phẩm đầu tiên
                                            </a>
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