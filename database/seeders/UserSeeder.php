<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'ci' => '12345678',
            'photo' => 'a.jpg',
            'phone' => '12345678',
            'email' => 'admin@gmail.com',
            'username' => 'Admin',
            'password' => bcrypt('admin'),
        ]);

        $user->assignRole('superAdmin');
    }
}
