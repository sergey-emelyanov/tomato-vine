<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Repost extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}
