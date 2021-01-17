<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(User::count() == 0){
            User::create([
                'name' => 'Bject admin',
                'username' => 'admin',
                'email' => 'admin@dev.com',
                'password' => bcrypt('password123'),
                'role_id' => '1',
                'remember_token' => Str::random(60),
            ]);
        }
    }
}
