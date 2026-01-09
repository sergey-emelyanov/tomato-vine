<?php

namespace App\Models;

use App\Models\Traits\HasLog;
use App\Models\Traits\Loggable;
use App\Observers\PostObserver;
use App\Http\Filters\PostFilter;
use App\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

// #[ObservedBy(PostObserver::class)]
class Post extends Model
{
    use HasFactory;
    use Loggable;
    use HasFilter;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function tags()
    // {
    //     return $this->belongsToMany(Tag::class);
    // }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function repost()
    {
        return $this->hasMany(Repost::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function user()
    {
        return $this->profile->user();
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function likes()
    {
        return $this->morphToMany(Profile::class, 'likable');
    }

    public function views()
    {
        return $this->morphMany(View::class, 'viewable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

}
