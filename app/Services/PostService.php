<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public static function update(Post $post, array $data)
    {
        $post->update($data);
        // refresh возвращает новый объект в переменную
        return $post->refresh();
    }

    public static function store(array $data)
    {
        $tags = TagService::storeBatch($data['tags']);
        $post = Post::create($data['post']);
        $post->tags()->attach(array_column($tags, 'id'));
        return $post;
    }
}
