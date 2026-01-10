<?php

namespace App\Http\Filters;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;


class PostFilter
{
    protected array $keys = [
        'title',
        'category_id',
        'published_at_from',
        'published_at_to',
        'likes_from',
        'likes_to'
    ];

    public function apply(Builder $builder, array $data): Builder
    {
        foreach($this->keys as $key){
            if(isset($data[$key])){
                $methodName = Str::camel($key);
                $this->$methodName($builder, $data[$key]);
            }
        }

        return $builder;
    }

    private function title(Builder $builder, $value):void
    {
        $builder->where('title', 'ilike', "%$value%");
    }

    private function categoryId(Builder $builder, $value):void
    {
        $builder->where('category_id', $value);
    }
}
