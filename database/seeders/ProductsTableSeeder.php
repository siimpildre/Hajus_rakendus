<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['name' => 'Korvpall Molten', 
            'description' => 'BG2000', 
            'price' => 39.99, 
            'image' => 'path/to/bg2000.jpg'],
            ['name' => 'Korvpall Molten', 
            'description' => 'BG3000', 
            'price' => 49.99, 
            'image' => 'path/to/bg3000.jpg'],
            ['name' => 'Korvpall Molten', 
            'description' => 'BG3800', 
            'price' => 59.99, 
            'image' => 'path/to/bg3800.jpg'],
            ['name' => 'Korvpall Molten', 
            'description' => 'BG4000', 
            'price' => 69.99, 
            'image' => 'path/to/bg4000.jpg'],
            ['name' => 'Korvpall Molten', 
            'description' => 'BG4500', 
            'price' => 89.99, 
            'image' => 'path/to/bg4500.jpg'],
            ['name' => 'Korvpall Molten', 
            'description' => 'BG5000', 
            'price' => 129.99, 
            'image' => 'path/to/bg5000.jpg'],
            ['name' => 'Korvpall Nike', 
            'description' => 'Elite', 
            'price' => 69.99, 
            'image' => 'path/to/nike_elite.jpg'],
            ['name' => 'Korvpall Spalding', 
            'description' => 'Street', 
            'price' => 59.99, 
            'image' => 'path/to/splading_street.jpg'],
            ['name' => 'Korvpall Wilson', 
            'description' => 'WILSON', 
            'price' => 76.99, 
            'image' => 'path/to/Wilson.jpg'],
        ]);
    }
}
