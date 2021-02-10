<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class RootSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Admin::count() == 0){
            Admin::create([
                'name' => 'Bject admin',
                'username' => 'admin',
                'email' => 'admin@dev.com',
                'password' => bcrypt('1234'),
                'role_id' => '1',
                'remember_token' => Str::random(60),
            ]);
        }
        if(User::count() == 0){
            User::create([
                'name' => 'Bject user',
                'username' => 'user',
                'email' => 'user@dev.com',
                'password' => bcrypt('1234'),
                'role_id' => '0',
                'remember_token' => Str::random(60),
            ]);
        }
    }
}
