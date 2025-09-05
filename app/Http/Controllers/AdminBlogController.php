<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{
    // ✅ Show Dashboard
    public function dashboard()
    {
        $blogs = Blog::latest()->paginate(10);
        $blogsCount = Blog::count();
        $publishedCount = Blog::where('status', 'published')->count();

        return view('admin.dashboard', compact('blogs', 'blogsCount', 'publishedCount'));
    }

    // ✅ Show Create Page
    public function create()
    {
        return view('admin.create');
    }

    // ✅ Store Blog
    public function store(Request $request)
{
    $request->validate([
        'title'       => 'required|string|max:255',
        'content'     => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'status'      => 'required|in:published,draft',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->only(['title', 'content', 'status', 'category_id']);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('blogs', 'public');
    }

    \App\Models\Blog::create($data);

    return redirect()->route('admin.dashboard')->with('success', 'Blog created!');
}


    // ✅ Show Edit Page
    public function edit(Blog $blog)
    {
        return view('admin.edit', compact('blog'));
    }

    // ✅ Update Blog
   public function update(Request $request, Blog $blog)
{
    $validated = $request->validate([
        'title'       => 'required|string|max:255',
        'content'     => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        'status'      => 'nullable|string|in:published,draft',
    ]);

    $data = $request->only('title', 'content', 'status', 'category_id');
    $data['status'] = $data['status'] ?? 'published';

    // ✅ Handle Image Update
    if ($request->hasFile('image')) {
        if ($blog->image && Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }
        $data['image'] = $request->file('image')->store('blogs', 'public');
    }

    $blog->update($data);

    return redirect()->route('admin.dashboard')->with('success', 'Blog updated successfully!');
}


    // ✅ Delete Blog
    public function destroy(Blog $blog)
    {
        if ($blog->image && Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Blog deleted successfully!');
    }
}
