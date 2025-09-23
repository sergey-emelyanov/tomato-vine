<?php

namespace App\Console\Commands;

use App\Models\Tag;
use App\Models\Chat;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Profile;
use App\Models\Category;
use App\Models\Repost;
use Illuminate\Console\Command;
use PHPUnit\Event\Code\Throwable;

class CreatePost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Для тестирования всякого';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        // $post = Post::first();
        // $post->tags()->attach([1,2,3]);
        // $post->tags()->detach([1,2,3]);
        // $post->tags()->syncWithoutDetaching([1,2,3]);
        // $post->tags()->toggle([1]);

        //теги
        // $tags = Tag::findOrFail(2)->first();
        //Добавление в pivot таблицу
        // $tags->posts()->attach([1,2,3]);
        // Удаление из pivot таблицы
        // $tags->posts()->detach([1,2,3]);
        // Добавляет новые отношения если их не было, при этом удалит те, которых не было в списке
        // $tags->posts()->sync([1,2,3]);
        //$tags->posts()->withPivot() ???

        // Поиск связанных репостов с этой категорией
        // $category = Category::first();
        // dd($category->reposts);

        // Инверсия поиск по репосту связанной с ним категории
        // $repost = Repost::first();
        // dd($repost->category);

        // Поиск всех постов юзера
        // $user=User::first();
        // dd($user->posts);

        // Инверсия поиск юзера по посту
        // $post = Post::first();
        // dd($post->user);

        //Поиск всех комментов юзера
        // $user=User::first();
        // dd($user->comments);

        // Инверсия поиск юзера по комментам
        // $comment = Comment::first();
        // dd($comment->user);

        $post = Post::first();
        $post->image->create([]);


    }
}
