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
    /**
     * Hiển thị bài viết thuộc danh mục "Cho thuê màn hinh ánh sáng"
     */
    public function categoryLighting()
    {
        $posts = Post::where('category', 'Cho thuê màn hinh ánh sáng')
            ->where('status', 'published')
            ->latest()
            ->get();

        return view('posts.category', [
            'category' => 'Cho thuê màn hinh ánh sáng',
            'posts' => $posts
        ]);
    }
}
