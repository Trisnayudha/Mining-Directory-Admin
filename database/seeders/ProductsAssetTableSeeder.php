<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsAssetTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products_asset')->insert($this->generateProductsAssets());
    }

    private function generateProductsAssets(): array
    {
        $productsAssets = [];
        $numberOfProducts = DB::table('products')->count(); // Get the total number of products

        for ($i = 1; $i <= $numberOfProducts; $i++) {
            // Assuming each product will have one image and one video
            $productsAssets[] = [
                'product_id' => $i,
                'asset' => "https://via.placeholder.com/500", // Image asset
                'asset_type' => 'png',
                'created_at' => now(),
                'updated_at' => now()
            ];
            $productsAssets[] = [
                'product_id' => $i,
                'asset' => "https://www.youtube.com/watch?v=Np1vp318qYw", // Video asset
                'asset_type' => 'mp4',
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        return $productsAssets;
    }
}
