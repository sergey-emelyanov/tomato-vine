<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $roles = Role::factory(4)->create();

        foreach($roles as $role){
            $usersId = $users->pluck('id')->toArray();
            $role->user()->sync($usersId);
        }


    }
}
