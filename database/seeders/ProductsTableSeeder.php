<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('products')->insert([
            'productName' => 'Laptop',
            'price' => 999.99,
            'stocks'=> '10',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'productName' => 'Smartphone',
            'price' => 499.99,
            'stocks'=> '10',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
