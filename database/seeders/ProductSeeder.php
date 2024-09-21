<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // 

class ProductSeeder extends Seeder
{
    /**
     * Run .
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Vegetable Package', 'price' => 55, 'image' => 'vegetables.png', 'quantity' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fresh Garden Vegetable', 'price' => 30, 'image' => 'fresh-garden.png', 'quantity' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Organic Bananas', 'price' => 60, 'image' => 'bananas.png', 'quantity' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
