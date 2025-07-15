<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\PostController as UserPostController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\ProductController;

// View home page
Route::redirect('/','/home')->name('home');
Route::get('/home', [UserPostController::class, 'index'])->name('home');

// View contact
Route::get('/contact', function () {
    return view('pages.contact');
})->name('pages.contact');

// View about
Route::get('/about', function () {
    return view('pages.about');
})->name('pages.about');

// Auth users routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes với middleware
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('posts', PostController::class);  
    //route quan ly sản phẩm của admin
    Route::resource('products', AdminProductController::class)->names([
        'index' => 'admin.products.index',
        'create' => 'admin.products.create',
        'store' => 'admin.products.store',
        'show' => 'admin.products.show',
        'edit' => 'admin.products.edit',
        'update' => 'admin.products.update',
        'destroy' => 'admin.products.destroy',
    ]);
    Route::delete('products/{product}/images/{image}', [AdminProductController::class, 'deleteImage'])->name('admin.products.delete-image');
});

// Hiển thị chi tiết bài viết cho người dùng
Route::get('/posts/{id}', [UserPostController::class, 'show'])->name('posts.show');
Route::get('/dich-vu/{category}', [UserPostController::class, 'showCategory'])
    ->name('posts.category');
Route::get('/quang-cao/{category}', [UserPostController::class, 'showCategory'])
    ->name('posts.quangcao');

//route cho sản phẩm user (thương mại)
// Trang tất cả sản phẩm giống website mẫu
Route::get('/collections/all', [ProductController::class, 'index'])->name('products.index');

// Trang sản phẩm theo category
Route::get('/collections/{category}', [ProductController::class, 'category'])->name('products.category');

// API tìm kiếm sản phẩm (AJAX)
Route::get('/api/products/search', [ProductController::class, 'search'])->name('api.products.search');

// API sản phẩm nổi bật
Route::get('/api/products/featured', [ProductController::class, 'featured'])->name('api.products.featured');

//admin mới
Route::get('/admin', [PostController::class, 'index'])->name('admin.index');
Route::get('/admin/create', [PostController::class, 'create'])->name('admin.create');
Route::post('/admin', [PostController::class, 'store'])->name('admin.store');
Route::post('/admin/upload-image', [PostController::class, 'uploadImage'])->name('admin.uploadImage');
Route::get('/admin/{id}/edit', [PostController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{id}', [PostController::class, 'update'])->name('admin.update');
Route::delete('/admin/{id}', [PostController::class, 'destroy'])->name('admin.destroy');
Route::get('/admin/show/{id}', [PostController::class, 'show'])->name('admin.show');
Route::get('/admin/dich-vu', [PostController::class, 'dichVu'])->name('admin.dichvu');
Route::get('/admin/quang-cao', [PostController::class, 'quangCao'])->name('admin.quangcao');

// Route này phải đặt cuối để không conflict với các route khác
Route::get('/{slug}', [ProductController::class, 'show'])->name('products.show');