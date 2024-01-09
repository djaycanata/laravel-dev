<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'firstname' => 'Jane',
            'lastname' => 'Doe',
            'email' => 'jane@example.com',
            'password' => bcrypt('password456'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'firstname' => 'John',
            'lastname' => 'Smith',
            'email' => 'john_smith@example.com',
            'password' => bcrypt('password456'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'firstname' => 'Anne',
            'lastname' => 'Vill',
            'email' => 'anne@example.com',
            'password' => bcrypt('password456'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
