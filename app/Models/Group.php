<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
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
