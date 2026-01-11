<?php

namespace App\Http\Filters;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

class ProfileFilter
{
    protected array $keys = [
        'user_id',
        'name',
        'gender',
        'country',
        'birthday_from',
        'birthday_to'
    ];

    public function apply(Builder $builder, array $data): Builder
    {
        foreach($this->keys as $key){
            $methodName = Str::camel($key);
            if(isset($data[$key])){
                $this->$methodName($builder, $data[$key]);
            }
        }

        return $builder;
    }

    private function userId(Builder $builder, $value): void
    {
        $builder->where('user_id', '=', $value);
    }

    private function name(Builder $builder, $value):void
    {
        $builder->where('name', 'ilike', "%$value%");
    }

    private function gender(Builder $builder, $value):void
    {
        $builder->where('gender', '=', $value);
    }

    private function country(Builder $builder, $value):void
    {
        $builder->where('country', '=', $value);
    }

    private function birthdayFrom(Builder $builder, $value):void
    {
        $builder->whereDate('birthday', '>=', $value);
    }

    private function birthdayTo(Builder $builder, $value):void
    {
        $builder->whereDate('birthday', '<=', $value);
    }


}
