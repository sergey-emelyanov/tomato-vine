<?php

namespace App\Http\Controllers\Api;

use App\Models\Chat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Chat\StoreRequest;
use App\Http\Resources\Chat\ChatResource;
use App\Services\ChatService;

class ChatController extends Controller
{
    public function index()
    {
        return ChatResource::collection(Chat::all())->resolve();
    }

    public function show(Chat $chat)
    {
        return ChatResource::make($chat)->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $chat = Chat::create($data);
        return ChatResource::make($chat)->resolve();
    }

    public function update(StoreRequest $request, Chat $chat)
    {
        $data = $request->validated();
        $chat = ChatService::update($chat, $data);
        return ChatResource::make($chat)->resolve();
    }

    public function destroy(Chat $chat)
    {
        $chat->delete();

        return response([
            'message' => 'success'
        ]);
    }
}
