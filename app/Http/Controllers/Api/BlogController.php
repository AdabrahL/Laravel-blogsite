<?php 
namespace App\Http\Controllers\Api;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BlogResource;

class BlogController extends Controller
{
    public function index()
    {
        return BlogResource::collection(Blog::all());
    }

    public function show(Blog $blog)
    {
        return new BlogResource($blog);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $blog = Blog::create($request->only('title', 'content'));
        return response()->json(new BlogResource($blog), 201);
    }

    public function update(Request $request, Blog $blog)
    {
        $blog->update($request->only('title', 'content'));
        return response()->json(new BlogResource($blog));
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return response()->json(null, 204);  // No content after deletion
    }
}
