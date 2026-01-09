<?php

namespace App\Models\Traits;

use App\Http\Filters\PostFilter;
use Illuminate\Contracts\Database\Eloquent\Builder;

trait HasFilter
{
    public function scopeFilter(Builder $builder, array $data)
    {
        $ModelName = class_basename($this);
        //App\Http\Filters;
        $className = "App\Http\Filters\\" . $ModelName . "Filter";
        return  (new $className())->apply($builder, $data);
    }
}
