<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return Post::all();
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
