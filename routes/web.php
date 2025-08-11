<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\PostController as UserPostController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\ProductController;

// View home page
Route::get('/', [UserPostController::class, 'index'])->name('home');

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

// Hiển thị chi tiết bài viết cho người dùng
Route::get('/posts/{id}', [UserPostController::class, 'show'])->name('posts.show');

//Route cho dịch vụ và quảng cáo ở trang user
Route::get('/dich-vu', [UserPostController::class, 'dichVu'])->name('dich-vu');
Route::get('/quang-cao', [UserPostController::class, 'quangCao'])->name('quang-cao');


Route::get('/dich-vu/{category}', [UserPostController::class, 'showCategory'])
    ->name('posts.category');
Route::get('/quang-cao/{category}', [UserPostController::class, 'showCategory'])
    ->name('posts.quangcao');

//route cho sản phẩm user (thương mại)
Route::get('/collections/all', [ProductController::class, 'index'])->name('products.index');

//sản phẩm theo category
Route::get('/collections/{category}', [ProductController::class, 'category'])->name('products.category');

// API tìm kiếm sản phẩm (AJAX)
Route::get('/api/products/search', [ProductController::class, 'search'])->name('api.products.search');

//sản phẩm nổi bật
Route::get('/api/products/featured', [ProductController::class, 'featured'])->name('api.products.featured');

// Admin routes với middleware
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('posts', PostController::class);  
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
    // Admin routes
    Route::get('/', [PostController::class, 'index'])->name('admin.index');
    Route::get('/create', [PostController::class, 'create'])->name('admin.create');
    Route::post('/', [PostController::class, 'store'])->name('admin.store');
    Route::post('/upload-image', [PostController::class, 'uploadImage'])->name('admin.uploadImage');
    Route::get('/{id}/edit', [PostController::class, 'edit'])->name('admin.edit');
    Route::put('/{id}', [PostController::class, 'update'])->name('admin.update');
    Route::delete('/{id}', [PostController::class, 'destroy'])->name('admin.destroy');
    Route::get('/show/{id}', [PostController::class, 'show'])->name('admin.show');
    Route::get('/dich-vu', [PostController::class, 'dichVu'])->name('admin.dichvu');
    Route::get('/quang-cao', [PostController::class, 'quangCao'])->name('admin.quangcao');
});

Route::get('/{slug}', [ProductController::class, 'show'])->name('products.show');
