<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use SoftDeletes;

    public function profile()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function message()
    {
        return $this->hasMany(Chat::class);
    }
}
