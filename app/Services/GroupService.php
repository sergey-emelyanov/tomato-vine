<?php

namespace App\Services;

use App\Models\Group;
use App\Http\Requests\Api\Group\UpdateRequest;

class GroupService
{
    public static function update(Group $group, array $data)
    {
        $group->update($data);
        return $group->refresh();
    }
}
