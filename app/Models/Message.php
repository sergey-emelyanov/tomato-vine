<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
}
