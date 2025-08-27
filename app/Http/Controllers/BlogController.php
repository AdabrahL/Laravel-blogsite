<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Public: Show all blogs
    public function index()
    {
        $blogs = Blog::latest()->paginate(6);
    return view('blogs.index', compact('blogs'));
    }

    // Public: Show single blog
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    // Admin: Dashboard
    public function dashboard()
    {$blogs = Blog::latest()->get();
    return view('admin.dashboard', compact('blogs'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Blog::create($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'Blog created!');
    }

    public function edit(Blog $blog)
    {
        return view('admin.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $blog->update($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'Blog updated!');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Blog deleted!');
    }
}
