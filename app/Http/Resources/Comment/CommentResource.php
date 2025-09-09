<?php

namespace App\Http\Resources\Comment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'author'=>$this->author,
            'body'=>$this->body,
            'post'=>$this->post,
            'parent'=>$this->parent,
            'likes'=>$this->likes
        ];
    }
}
