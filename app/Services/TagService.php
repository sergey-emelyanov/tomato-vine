<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Tag;

class TagService
{

    /**
     * Метод преобразующий теги и создающий записи в бд
     *
     * @param string $tags
     * @return array $tags
     */
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

    /**
     *  Метод находящий связанные с постом теги и возвращаюший их ввиде строки
     *
     * @param Post $post
     * @return string $tags_titles
     */
    public static function getTagsTitle(Post $post)
    {
        $tags = $post->tags;
        $tags_title = [];
        foreach($tags as $tag){
            $tags_title[] = $tag->title;
        }
        $tags_title = implode(',',  $tags_title);

        return $tags_title;


    }


}
