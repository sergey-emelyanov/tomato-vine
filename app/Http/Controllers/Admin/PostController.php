<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Post\PostResource;
use App\Models\Category;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\FileIterator\Facade;

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
        $images = explode('|', $post['image_path']);
        $urls = [];
        foreach($images as $image){
            $url = Storage::disk('public')->url($image);
            $urls[] = $url;
        }

        return inertia('Admin/Post/Show', compact('post', 'urls'));
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
        $categories = CategoryResource::collection(Category::all())->resolve();
        return inertia('Admin/Post/Create', compact('categories'));
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
        $images = [];
        foreach($data['post']['files'] as $file){
            $image_path = Storage::disk('public')->put('/images', $file);
            $images[] = $image_path;
        }
        unset($data['post']['files']);
        $data['image_path'] = implode('|', $images);

        $post = PostService::store($data);


        return PostResource::make($post)->resolve();
    }

    /**
     * Метод отвечающий за отрисовку формы редактирования
     *
     * [GET] /admin/posts/{post}/edit/
     *
     * @param Post $post
     *
     */
    public function edit(Post $post)
    {
        $post = PostResource::make($post)->resolve();
        $categories = CategoryResource::collection(Category::all())->resolve();
        $images = explode('|', $post['image_path']);
        $urls = [];
        foreach($images as $image){
            $url = Storage::disk('public')->url($image);
            $urls[] = $url;
        }

        return inertia('Admin/Post/Edit', compact('post', 'urls', 'categories'));
    }
}
