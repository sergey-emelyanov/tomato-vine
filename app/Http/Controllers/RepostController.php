<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\Repost\StoreRequest;
use App\Http\Requests\Api\Repost\UpdateRequest;
use App\Models\Repost;
use Illuminate\Http\Request;
use App\Http\Resources\Repost\RepostResource;
use App\Services\RepostService;

class RepostController extends Controller
{
    public function index()
    {
        return RepostResource::collection(Repost::all())->resolve();
    }

    public function show(Repost $repost)
    {
        return RepostResource::make($repost)->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $repost = Repost::create($data);
        return RepostResource::make($repost)->resolve();
    }

    public function update(UpdateRequest $request, Repost $repost)
    {
        $data = $request->validated();
        $repost = RepostService::update($repost, $data);
        return RepostResource::make($repost)->resolve();
    }

    public function destroy(Repost $repost)
    {
        $repost->delete();
        return response([
            'message' => 'success'
        ]);
    }
}
