<?php

namespace App\Http\Filters;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

class CommentFilter
{
    protected array $keys = [
        'body',
        'profile_id',
        'likes_from',
        'likes_to'
    ];

    public function apply(Builder $builder, array $data)
    {
        foreach($this->keys as $key){
            $methodName = Str::camel($key);
            if(isset($data[$key])){
                $this->$methodName($builder, $data[$key]);
            }

        }

        return $builder;
    }

    private function body(Builder $builder, $value):void
    {
        $builder->where('body', 'ilike', "%$value%");
    }

    private function profileId(Builder $builder, $value):void
    {
        $builder->where('profile_id', '=', $value);
    }

    private function likesFrom(Builder $builder, $value):void
    {
        $builder->where('likes', '>=', $value);
    }

    private function likesTo(Builder $builder, $value):void
    {
        $builder->where('likes', '<=', $value);
    }
}
