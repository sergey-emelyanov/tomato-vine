<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\Post\IndexRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(IndexRequest $request){

        $data = $request->validated();
        $posts = Post::query();

        if(isset($data['title'])){
            $value = $data['title'];
            $posts->where('title', 'ilike', "%$value%");
        }

        if(isset($data['category_id'])){
            $posts->where('category_id', $data['category_id']);
        }

        if(isset($data['published_at_from'])){
            $posts->where('published_at', '>=', $data['published_at_from']);
        }

        if(isset($data['published_at_to'])){
            $posts->where('published_at', '<=', $data['published_at_to']);
        }

        if(isset($data['likes_from'])){
            $posts->where('likes', '>=', $data['likes_from']);
        }

        if(isset($data['likes_to'])){
            $posts->where('likes', '<=', $data['likes_to']);
        }


        $posts = $posts->get();
        return $posts;
    }

    public function show(Post $post){
        return PostResource::make($post)->resolve();
    }

    public function store(){
        $post = Post::create([
            'title' => 'My new title with binding'
        ]);

        return PostResource::make($post)->resolve();
    }

    public function update(Post $post)
    {

        $post->update([
            'title' => 'bla bla bla mla mla mla'
        ]);

        return PostResource::make($post)->resolve();
    }

    public function destroy(Post $post){
        $post->delete();
        return 'Post was deleted';
    }
}
