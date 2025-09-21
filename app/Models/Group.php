<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;

    public function author()
    {
        return $this->belongsTo(Profile::class, 'profile');
    }

    public function members()
    {
        return $this->belongsToMany(Profile::class, 'group_profile');
    }

    public function themes()
    {
        return $this->hasMany(Theme::class, 'themes');
    }
}
