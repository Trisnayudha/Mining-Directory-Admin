<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{
    public function run()
    {
        DB::table('company')->insert($this->generateCompanies());
    }

    private function generateCompanies(): array
    {
        $companies = [];
        $packages = ['platinum', 'gold', 'silver'];

        for ($i = 1; $i <= 10; $i++) {
            $companyName = "Company {$i}";
            $companies[] = [
                'package' => $packages[array_rand($packages)],
                'company_name' => $companyName,
                'description' => "Description of {$companyName}",
                'location' => "Location {$i}",
                'video' => "https://www.youtube.com/watch?v=Np1vp318qYw",
                'image' => "https://via.placeholder.com/500",
                'banner_image' => "https://via.placeholder.com/200",
                'category_company' => "Category {$i}",
                'slug' => Str::slug($companyName),
                'email_company' => "contact@company{$i}.com",
                'phone_company' => '123-456-7890',
                'website' => "http://company{$i}.com",
                'facebook' => "http://facebook.com/company{$i}",
                'instagram' => "http://instagram.com/company{$i}",
                'linkedin' => "http://linkedin.com/company{$i}",
                'value_1' => "Value 1 of {$companyName}",
                'value_2' => "Value 2 of {$companyName}",
                'value_3' => "Value 3 of {$companyName}",
                'verify_company' => $i % 2 == 0, // Random boolean value
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        return $companies;
    }
}
