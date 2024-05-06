<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductsAssetTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(VideosTableSeeder::class);
        $this->call(MdCategoryCompanyTableSeeder::class);
    }
}
