<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public static function update(Category $category, array $data)
    {
        $category->update($data);
        return $category->refresh();
    }
}
