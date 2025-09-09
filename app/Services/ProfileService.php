<?php

namespace App\Services;

use App\Models\Profile;

class ProfileService
{
    public static function update(Profile $profile, array $data)
    {
        $profile = $profile->update($data);
        return $profile->refresh();
    }
}
