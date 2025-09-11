<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;


class BlogController extends Controller
{
    // Public: Show all blogs
    public function index()
    {
        // Show 15 blogs per page
        $blogs = Blog::with('category')->latest()->paginate(15);

        // ✅ Real Trending: sort by views
    $trending = Blog::with('category')
                    ->orderBy('views', 'desc')
                    ->take(5)
                    ->get();

        return view('blogs.index', compact('blogs', 'trending'));
    }

    // Public: Show single blog
    public function show(Blog $blog)
    {$blog->increment('views'); // 👈 adds 1 each time opened
        return view('blogs.show', compact('blog'));
    }

    // Admin: Dashboard
    public function dashboard()
    {
        $blogs = Blog::with('category')->latest()->get();
        return view('admin.dashboard', compact('blogs'));
    }

    // Admin: Show create form
    public function create()
    {
        $categories = Category::all();
        return view('admin.create', compact('categories'));
    }

    // Admin: Store new blog
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

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        Blog::create($data);

        return redirect()->route('admin.dashboard')->with('success', 'Blog created!');
    }

    // Admin: Show edit form
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('admin.edit', compact('blog', 'categories'));
    }

    // Admin: Update blog
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['title', 'content', 'category_id']);

        // Handle new image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Blog updated!');
    }

    // Admin: Delete blog
    public function destroy(Blog $blog)
    {
        if ($blog->image && Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Blog deleted!');
    }

    // Public: Blogs by category
    public function byCategory($id)
    {
        $category = Category::findOrFail($id);
        $blogs = $category->blogs()->latest()->paginate(50);

        return view('blogs.byCategory', compact('category', 'blogs'));
    }
}
