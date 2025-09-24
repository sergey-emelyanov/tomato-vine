<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function profiles()
    {
        return $this->morphedByMany(Profile::class, 'taggable');
    }
}
