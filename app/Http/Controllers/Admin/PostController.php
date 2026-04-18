<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Resources\Post\PostResource;

class PostController extends Controller
{
    /**
     *  Метод отвечающий за показ всех постов
     *
     *  [GET] /admin/posts
     *
     *  @return inertia/response
     */
    public function index()
    {
        $posts = Post::all();
        $posts = PostResource::collection($posts)->resolve();

        return inertia('Admin/Post/Index', compact('posts'));
    }

    /**
     *  Метод отвечающий за показ поста
     *
     *  [GET] /admin/posts/{post}/
     *
     *  @param Post $post
     *  @return inertia/response
     */
    public function show(Post $post)
    {
        $post = PostResource::make($post)->resolve();
        return inertia('Admin/Post/Show', compact('post'));
    }


    /**
     *  Отображает форму создания поста
     *
     *  [GET] /admin/posts/create/
     *
     *  @return inertia/response
     */
    public function create()
    {
        return inertia('Admin/Post/Create');
    }


    /**
     * Метод отвечающий за создания поста и запись в бд
     *
     *  [POST] /admin/posts/post/
     *
     * @param StoreRequest $request
     * @return PostResource
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['category_id'] = 1;
        $data['likes'] = 1;
        $post = Post::create($data);

        return PostResource::make($post)->resolve();
    }
}
