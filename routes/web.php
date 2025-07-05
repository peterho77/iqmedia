<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\PostController as UserPostController;
use PHPUnit\Framework\Attributes\PostCondition;

// View home page
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

// Dashboard admin route
// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// });

// Quản lý bài viết admin (chỉ cần middleware 'auth' nếu muốn bảo vệ)
//Route::middleware(['auth'])->prefix('admin')->group(function () {
//    Route::resource('posts', PostController::class);
//});
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('posts', PostController::class);
});

// Hiển thị chi tiết bài viết cho người dùng
Route::get('/posts/{id}', [UserPostController::class, 'show'])->name('posts.show');

// Hiển thị bài viết theo danh mục cho người dùng
// Route::get('/dich-vu/cho-thue-man-hinh-anh-sang', [UserPostController::class, 'categoryLighting'])
//     ->name('posts.category.lighting');
Route::get('/dich-vu/{category}', [UserPostController::class, 'showCategory'])
    ->name('posts.category');


//admin mới
Route::get('/admin', [PostController::class, 'index'])->name('admin.index');
Route::get('/admin/create', [PostController::class, 'create'])->name('admin.create');
Route::post('/admin', [PostController::class, 'store'])->name('admin.store');
Route::post('/admin/upload-image', [PostController::class, 'uploadImage'])->name('admin.uploadImage');//Thêm hình vào phần nội dung
Route::get('/admin/{id}/edit', [PostController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{id}', [PostController::class, 'update'])->name('admin.update');
Route::delete('/admin/{id}', [PostController::class, 'destroy'])->name('admin.destroy');
Route::get('/admin/show/{id}', [PostController::class, 'show'])->name('admin.show');