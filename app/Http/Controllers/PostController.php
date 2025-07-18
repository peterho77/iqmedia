<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::get();
        return view('pages.home', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::where('status', 'published')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    public function showCategory($category)
    {
        // Bản đồ slug -> tên danh mục
        $categories = [
            'cho-thue-man-hinh-anh-sang' => 'Cho thuê màn hinh ánh sáng',
            'cho-thue-man-hinh-led' => 'Cho thuê màn hình LED',
            'dich-vu-thuong-mai' => 'Dịch vụ thương mại',
            'thi-cong-backdrop' => 'Thi công PhotoBooth và Backdrop',
            'to-chuc-su-kien' => 'Tổ chức sự kiện',
            'quay-phim-chup-hinh' => 'Quay phim - Chụp hình sự kiện chuyên nghiệp tại IQ Media',
        ];

        // Kiểm tra tồn tại
        if (!array_key_exists($category, $categories)) {
            abort(404);
        }

        $categoryName = $categories[$category];

        $posts = Post::where('category', $categoryName)
            ->where('status', 'published')
            ->latest()
            ->get();

        return view('posts.category', [
            'category' => $categoryName,
            'posts' => $posts
        ]);
    }
}