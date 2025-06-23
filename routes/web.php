<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\PostController as UserPostController;

// View home page
Route::get('/', function () {
    return view('pages.home');
})->name('home');

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
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

// Quản lý bài viết admin (chỉ cần middleware 'auth' nếu muốn bảo vệ)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('posts', PostController::class);
});

// Hiển thị chi tiết bài viết cho người dùng
Route::get('/posts/{id}', [UserPostController::class, 'show'])->name('posts.show');

// Hiển thị bài viết theo danh mục cho người dùng
Route::get('/dich-vu/cho-thue-man-hinh-anh-sang', [UserPostController::class, 'categoryLighting'])
    ->name('posts.category.lighting');
