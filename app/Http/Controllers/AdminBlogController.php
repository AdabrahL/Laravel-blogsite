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
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'status'  => 'nullable|string|in:published,draft',
        ]);

        $data = $request->only('title', 'content', 'status');
        $data['status'] = $data['status'] ?? 'published'; // default to published

        // ✅ Handle Image Upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        Blog::create($data);

        return redirect()->route('admin.dashboard')->with('success', 'Blog created successfully!');
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
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'status'  => 'nullable|string|in:published,draft',
        ]);

        $data = $request->only('title', 'content', 'status');
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
