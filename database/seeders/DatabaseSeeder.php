<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = [
            'name' => 'Vasya',
            'email' => 'vasya@mail.com',
            'password' => Hash::make(1234)
        ];

        // создаем юзера
        $user = User::firstOrCreate(
            ['id' => 2], // Условия поиска
            $user // Данные для создания
        );

        // создаем профиль
        $user->profile()->create();


        $this->call([
            TagSeeder::class,
            CategorySeeder::class,
            PostSeeder::class
        ]);
    }
}
