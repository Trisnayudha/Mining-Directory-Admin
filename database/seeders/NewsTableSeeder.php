<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('news')->insert($this->generateNews());
    }

    private function generateNews(): array
    {
        $newsData = [];

        for ($i = 1; $i <= 10; $i++) {
            $title = "News Title {$i}";
            $newsData[] = [
                'company_id' => rand(1, 10),  // Assuming you have company IDs ranging from 1 to 10
                'views' => rand(100, 1000),
                'date_news' => now()->subDays(rand(0, 30)), // Random dates within the last 30 days
                'title' => $title,
                'slug' => Str::slug($title),
                'sub_title' => "Sub-Title for {$title}",
                'description' => "Description for {$title} with detailed information.",
                'image' => "https://picsum.photos/800/600?random={$i}",  // Random image for each entry
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        return $newsData;
    }
}
