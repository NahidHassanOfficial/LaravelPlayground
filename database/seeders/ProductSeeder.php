<?php
namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [];
        for ($i = 1; $i <= 10000; $i++) {
            $product = [
                'name'     => implode(' ', fake()->words),
                'color'    => fake()->colorName,
                'category' => fake()->word(),
                'price'    => rand(100, 9999),
            ];
            $products[] = $product;
        }

        Product::insert($products);
    }
}
