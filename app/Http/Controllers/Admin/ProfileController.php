<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
