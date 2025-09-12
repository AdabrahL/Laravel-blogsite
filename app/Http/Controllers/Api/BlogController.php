<?php 
namespace App\Http\Controllers\Api;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BlogResource;
use OpenApi\Annotations as OA;

class BlogController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/blogs",
     *     summary="Get all blogs",
     *     tags={"Blogs"},
     *     @OA\Response(
     *         response=200,
     *         description="List of blogs"
     *     )
     * )
     */
    public function index()
    {
        return response()->json(Blog::all());
    }

    /**
     * @OA\Get(
     *     path="/api/v1/blogs/{id}",
     *     summary="Get a single blog",
     *     tags={"Blogs"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Blog details"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Blog not found"
     *     )
     * )
     */
    public function show(Blog $blog)
    {
        return new BlogResource($blog);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/blogs",
     *     summary="Create a new blog",
     *     tags={"Blogs"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title","content","category_id"},
     *             @OA\Property(property="title", type="string", example="My First Blog"),
     *             @OA\Property(property="content", type="string", example="This is the blog content"),
     *             @OA\Property(property="category_id", type="integer", example=1),
     *             @OA\Property(property="image", type="string", format="binary")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Blog created successfully"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation error"
     *     )
     * )
     */
    public function store(Request $request)
    { 
        $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['title', 'content', 'category_id','status']);
       
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }
       
        $blog = Blog::create($data);

        return response()->json(new BlogResource($blog), 201);
    }

    /**
     * @OA\Put(
     *     path="/api/v1/blogs/{id}",
     *     summary="Update a blog",
     *     tags={"Blogs"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="title", type="string", example="Updated Blog"),
     *             @OA\Property(property="content", type="string", example="Updated blog content"),
     *             @OA\Property(property="image", type="string", format="binary")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Blog updated successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Blog not found"
     *     )
     * )
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->update($request->only('title', 'content'));

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
            $blog->update(['image' => $data['image']]);
        }

        return response()->json(new BlogResource($blog));
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/blogs/{id}",
     *     summary="Delete a blog",
     *     tags={"Blogs"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Blog deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Blog not found"
     *     )
     * )
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return response()->json(["message"=>"Post deleted successfully"], 200);
    }
}
