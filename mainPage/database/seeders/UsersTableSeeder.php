<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@a.com',
            'password' => '$2y$10$lO2gNqbA0qaxtFOXJCT.CO.Qt8b2cnru3FCKcjzsfPW/l1g97KYC.',
        ]);
    }
}
