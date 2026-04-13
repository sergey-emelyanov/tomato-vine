<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
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

    public function create()
    {
        return inertia('Admin/Post/Create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['category_id'] = 1;
        $data['likes'] = 1;
        $post = Post::create($data);

        return PostResource::make($post)->resolve();
    }
}
