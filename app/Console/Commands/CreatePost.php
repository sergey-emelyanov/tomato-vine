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
    protected $signature = 'create-post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создает тестовую запись в БД';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $profile = Profile::first();
        dd($profile->comment);
    }
}
