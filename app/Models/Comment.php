<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function profiles()
    {
       return $this->belongsTo(Profile::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // У одного коммента может быть много ответов
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    // У коммента может быть только один родитель (если такой есть)
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function category()
    {
        return $this->post->category();
    }
}
