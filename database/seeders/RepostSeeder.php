<?php

namespace Database\Seeders;

use App\Models\Repost;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RepostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Repost::factory(5)->create();
    }
}
