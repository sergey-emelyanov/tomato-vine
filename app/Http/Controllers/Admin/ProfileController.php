<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\StoreRequest;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    /**
     *  Метод отвечающий за отдачу всех профилей в системе
     *
     *  [GET] /admin/profiles/
     *
     * @return inertia/response
     */
    public function index()
    {
        $profiles = Profile::all();
        $profiles = ProfileResource::collection($profiles)->resolve();

        return inertia('Admin/Profile/Index', compact('profiles'));
    }

    /**
     *  Метод отдающий информацию о конкретном профиле
     *
     * [GET] /admin/profile/{profile}/
     *
     * @param Profile $profile
     * @return inertia/response
     */
    public function show(Profile $profile)
    {
        $profile = ProfileResource::make($profile)->resolve();

        return inertia('Admin/Profile/Show', compact('profile'));
    }


    /**
     *  Метод отображающий страницу создания профиля
     *
     * [GET] /admin/profiles/profile/create/
     * @return inertia/response
     *
     */
    public function create()
    {
        return inertia('Admin/Profile/Create');
    }

    /**
     * Метод отвечающий за запись данныз с фронта
     *
     * [POST] /admin/profiles/profile/
     * @param StoreRequest
     *
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = 2;
        $data['gender'] = $data['gender'] == 'Мужской' ? 'male' : 'female';

        $profile = Profile::create($data);

        return ProfileResource::make($profile)->resolve();

    }
}
