<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $categories = CategoryResource::collection($categories)->resolve();

        return inertia('Admin/Category/Index', compact('categories'));

    }

    public function show(Category $category)
    {
        $category = CategoryResource::make($category)->resolve();
        // dd($category);

        return inertia('Admin/Category/Show', compact('category'));
    }

    /**
     *  Метод отвечающий за отображение страницы создания категории
     *
     * @return inertia/response
     */
    public function create()
    {
        return inertia('Admin/Category/Create');
    }

    /**
     *  Метод сохраняющий категорию в БД
     *
     * @param StoreRequest $request
     * @return CategoryResource
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $category = Category::create($data);

        return CategoryResource::make($category)->resolve();
    }
}
