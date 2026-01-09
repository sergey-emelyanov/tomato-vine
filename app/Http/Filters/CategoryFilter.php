<?php

namespace App\Http\Filters;


use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter
{
    protected array $keys = [
        'title'
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

    private function title(Builder $builder, $value)
    {
        $builder->where('title', 'ilike', "%$value%");
    }
}
