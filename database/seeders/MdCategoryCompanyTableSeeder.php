<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MdCategoryCompanyTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('md_category_company')->insert($this->generateCategories());
    }

    private function generateCategories(): array
    {
        $categories = [
            'Technology',
            'Healthcare',
            'Finance',
            'Education',
            'Hospitality'
        ];

        $categoryData = [];
        foreach ($categories as $category) {
            $categoryData[] = [
                'name' => $category,
                'image' => 'https://via.placeholder.com/150?text=' . urlencode($category),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        return $categoryData;
    }
}
