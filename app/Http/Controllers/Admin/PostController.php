<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $posts = PostResource::collection($posts)->resolve();

        return inertia('Admin/Post/Index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post = PostResource::make($post)->resolve();
        return inertia('Admin/Post/Show', compact('post'));
    }
}
