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
}
