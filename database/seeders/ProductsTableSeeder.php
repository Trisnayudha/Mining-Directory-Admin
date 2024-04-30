<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert($this->generateProducts());
    }

    private function generateProducts(): array
    {
        $products = [];

        for ($i = 1; $i <= 10; $i++) {
            $title = "Product {$i}";
            $products[] = [
                'company_id' => rand(1, 10),  // Randomly assigning company IDs
                'title' => $title,
                'slug' => Str::slug($title),
                'description' => "Description for {$title}",
                'file' => "http://example.com/files/{$i}.pdf",
                'views' => rand(100, 1000),
                'download' => rand(10, 100),
                'category_product' => rand(1, 3),  // Assuming you have 3 categories
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        return $products;
    }
}
