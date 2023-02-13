<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    
    public function run()
    {
        \App\Models\User::create([
            'email' => 'user1@gmail.com',
            'name' => 'John Doe',
            'password'=> bcrypt("user123")
        ]);
        \App\Models\User::create([
            'email' => 'admin@gmail.com',
            'name' => 'admin',
            'password'=> bcrypt("admin123")
        ]);
        \App\Models\User::create([
            'email' => 'user2@gmail.com',
            'name' => 'Mike Doe',
            'password'=> bcrypt("user123")
        ]);
        \App\Models\User::create([
            'email' => 'user3@gmail.com',
            'name' => 'Pamela Doe',
            'password'=> bcrypt("user123")
        ]);    
    }
}
