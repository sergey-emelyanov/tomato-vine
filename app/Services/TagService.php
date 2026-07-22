<?php

namespace App\Services;

use App\Models\Tag;

class TagService
{
    public static function storeBatch(string $tags)
    {
        $tagsTitle = explode(',', $tags);

        $tags = [];

        foreach($tagsTitle as $title){
            $tags[] = Tag::firstOrCreate([
                'title' => $title
            ]);
        }

        return $tags;
    }

}
