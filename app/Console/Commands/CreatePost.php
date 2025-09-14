<?php

namespace App\Console\Commands;

use App\Models\Chat;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Profile;
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
        $post = Post::first();
        // $post->tags()->attach([1,2,3]);
        // $post->tags()->detach([1,2,3]);
        // $post->tags()->syncWithoutDetaching([1,2,3]);
        $post->tags()->toggle([1]);
    }
}
