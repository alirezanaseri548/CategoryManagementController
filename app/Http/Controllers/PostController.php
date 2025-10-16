<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // گرفتن همه پست‌ها همراه با دسته‌بندی مربوطه
        $posts = Post::with('category')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        // نیاز داریم لیست همه‌ی کتگوری‌ها رو هم بفرستیم
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        Post::create($request->only('title', 'content', 'category_id'));

        return redirect()->route('posts.index')->with('success', 'پست با موفقیت ایجاد شد');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post->update($request->only('title', 'content', 'category_id'));

        return redirect()->route('posts.index')->with('success', 'پست بروزرسانی شد');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'پست حذف شد');
    }
}
