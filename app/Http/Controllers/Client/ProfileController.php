<?php

namespace App\Http\Controllers\Client;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Profile\ProfileResource;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        $profiles = ProfileResource::collection($profiles)->resolve();
        return inertia("Client/Profile/Index", compact('profiles'));
    }
}
