<?php

namespace App\Http\Controllers\Api;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Profile\StoreRequest;
use App\Http\Requests\Api\Profile\UpdateRequest;
use App\Http\Resources\Profile\ProfileResource;
use App\Services\ProfileService;

class ProfileController extends Controller
{
    public function index()
    {
        return ProfileResource::collection(Profile::all())->resolve();
    }

    public function show(Profile $profile)
    {
        return ProfileResource::make($profile);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $profile = Profile::create($data);
        return ProfileResource::make($profile)->resolve();

    }

    public function update(UpdateRequest $request, Profile $profile)
    {
        $data = $request->validated();
        $profile = ProfileService::update($profile, $data);
        return ProfileResource::make($profile);
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();

        return response([
            'message' => 'success'
        ]);
    }
}
