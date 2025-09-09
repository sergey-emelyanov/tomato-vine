<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
}
