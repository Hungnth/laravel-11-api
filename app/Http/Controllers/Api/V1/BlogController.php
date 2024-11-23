<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\BlogStoreRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Blog::all();
        return response()->json($posts, 200);
    }

    public function store(BlogStoreRequest $request)
    {
        $post = new Blog();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->author_id = $request->author_id;
        $post->save();

        return response()->json($post, 201);
    }

    public function update(BlogStoreRequest $request, $id)
    {
        $post = Blog::findOrfail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->author_id = $request->author_id;
        $post->save();

        return response()->json(['message' => "Blog updated successfully"], 200);
    }
}
