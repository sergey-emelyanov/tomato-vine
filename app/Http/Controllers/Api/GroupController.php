<?php

namespace App\Http\Controllers\Api;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Category\UpdateRequest;
use App\Http\Requests\Api\Group\StoreRequest;
use App\Http\Resources\Group\GroupResource;
use App\Services\GroupService;

class GroupController extends Controller
{
    public function index()
    {
        return GroupResource::collection(Group::all())->resolve();
    }

    public function show(Group $group)
    {
        return GroupResource::make($group)->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $group = Group::create($data);
        return GroupResource::make($group)->resolve();
    }

    public function update(UpdateRequest $request, Group $group)
    {
        $data = $request->validated();
        $group = GroupService::update($group, $data);
        return GroupResource::make($group)->resolve();
    }

    public function destroy(Group $group)
    {
        $group->delete();

        return response([
            'message' => 'success'
        ]);
    }
}
