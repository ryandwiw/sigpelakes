<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
        {
            $userData = [
                [
                    'name' => 'admin',
                    'email' => 'admin@email.com',
                    'role' => 'admin',
                    'password' => bcrypt('admin')
                ],
                [
                    'name' => 'user',
                    'email' => 'user@email.com',
                    'role' => 'user',
                    'password' => bcrypt('user')
                ],
                [
                    'name' => 'world',
                    'email' => 'world@email.com',
                    'role' => 'admin',
                    'password' => bcrypt('world')
                ],
            ];

            foreach($userData as $key => $val){
                User::create($val);
            }
        }
}

