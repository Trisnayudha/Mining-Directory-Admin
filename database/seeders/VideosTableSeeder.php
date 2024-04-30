<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VideosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('videos')->insert($this->generateVideos());
    }

    private function generateVideos(): array
    {
        $videos = [];
        $categories = ['Education', 'Tutorial', 'Review', 'Promotional', 'Entertainment'];

        for ($i = 1; $i <= 10; $i++) {
            $title = "Video Title {$i}";
            $videos[] = [
                'company_id' => rand(1, 10), // Assuming company IDs 1-10 are valid
                'title' => $title,
                'slug' => Str::slug($title),
                'asset' => "https://www.youtube.com/watch?v=wgpPtO2U844", // Placeholder YouTube URL
                'views' => rand(100, 10000),
                'description' => "Description for {$title}, a {$categories[rand(0, 4)]} video.",
                'category_company' => $categories[rand(0, 4)],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        return $videos;
    }
}
