<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chat()
    {
        return $this->belongsToMany(Chat::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function message()
    {
        return $this->hasMany(Message::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_profile');
    }

    public function authoredBy()
    {
        return $this->hasMany(Group::class, 'groups');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function likedPosts()
    {
        return $this->morphedByMany(Post::class, 'likable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
