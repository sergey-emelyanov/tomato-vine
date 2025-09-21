<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Theme extends Model
{
    use SoftDeletes;
    public function group()
    {
        return $this->belongsTo(Group::class, 'groups');
    }
}
