<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'user',
            'email' => 'user@user.com',
            'first_name' => 'user',
            'last_name' => 'users',
            'phone' => '123456789',
            'user_status' => 0,
            'password' => 'password'
        ]);
        User::create([
            'username' => 'user1',
            'email' => 'user1@user.com',
            'first_name' => 'user1',
            'last_name' => 'users1',
            'phone' => '123456789',
            'user_status' => 0,
            'password' => 'password'
        ]);
        User::create([
            'username' => 'user2',
            'email' => 'user2@user.com',
            'first_name' => 'user2',
            'last_name' => 'users2',
            'phone' => '123456789',
            'user_status' => 0,
            'password' => 'password'
        ]);
    }
}
