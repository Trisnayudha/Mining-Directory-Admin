<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MdSubCategoryCompanyTableSeeder extends Seeder
{
    public function run()
    {
        // Pastikan tabel md_category_company sudah diisi sebelumnya.
        DB::table('md_sub_category_company')->insert($this->generateSubCategories());
    }

    private function generateSubCategories(): array
    {
        // Contoh subkategori untuk setiap kategori
        $subCategories = [
            'Technology' => ['Software', 'Hardware'],
            'Healthcare' => ['Pharmaceuticals', 'Medical Devices'],
            'Finance' => ['Banking', 'Insurance'],
            'Education' => ['Colleges', 'Training Institutes'],
            'Hospitality' => ['Hotels', 'Restaurants']
        ];

        $subCategoryData = [];
        // Mengambil semua kategori yang sudah ada
        $categories = DB::table('md_category_company')->get();

        // Iterasi melalui setiap kategori untuk menambahkan subkategori
        foreach ($categories as $category) {
            // Cek jika kategori terdefinisi di array subkategori
            if (array_key_exists($category->name, $subCategories)) {
                foreach ($subCategories[$category->name] as $subCategory) {
                    $subCategoryData[] = [
                        'category_id' => $category->id, // Menggunakan id dari kategori sebagai foreign key
                        'name' => $subCategory,
                        'image' => 'https://via.placeholder.com/150?text=' . urlencode($subCategory), // Menambahkan placeholder image
                        'created_at' => now(),
                        'updated_at' => now()
                    ];
                }
            }
        }

        return $subCategoryData;
    }
}
