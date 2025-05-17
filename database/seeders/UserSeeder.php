<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $users = [
            [ 
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => 'admin123',
                'rol' => 'admin',
            ],
            [
                'id' => 2,
                'name' => 'PepeRegular',
                'email' => 'PepeRegular@gmail.com',
                'password' => 'PepeRegular123',
                'rol' => 'regular',
            ],
            [

                'id' => 3,
                'name' => 'MartinRegular',
                'email' => 'MartinRegular@gmail.com',
                'password' => 'MartinRegular123',
                'rol' => 'regular',
            ],

            ];

            foreach ($users as $user) {
                $user['password'] = Hash::make($user['password']);
                $user = User::create($user);
            }

    }
}
