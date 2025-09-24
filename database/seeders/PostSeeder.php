<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Получаем все теги для записи в базу
        $tags = Tag::all();
        $posts=Post::factory(10)->create();

        foreach($posts as $post){
            // Выбираем из коллекции рандомные теги и уже у них берем id
            $tagsId = $tags->random(fake()->numberBetween(2,5))->pluck('id')->toArray();
            // Записываем через метод sync для избежания повторов
            $post->tags()->sync($tagsId);


        }
    }
}
