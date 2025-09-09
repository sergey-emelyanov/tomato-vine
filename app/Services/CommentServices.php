<?php

namespace App\Services;

use App\Models\Comment;

class CommentServices
{
    public static function update(Comment $comment, array $data)
    {
        $comment->update($data);
        return $comment->refresh();
    }
}
