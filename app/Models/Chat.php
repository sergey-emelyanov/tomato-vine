<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public function profile()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function message()
    {
        return $this->hasMany(Chat::class);
    }
}
