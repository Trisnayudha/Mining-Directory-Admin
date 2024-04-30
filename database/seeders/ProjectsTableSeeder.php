<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('projects')->insert($this->generateProjects());
    }

    private function generateProjects(): array
    {
        $projects = [];

        for ($i = 1; $i <= 10; $i++) {
            $title = "Project {$i}";
            $projects[] = [
                'company_id' => rand(1, 10),  // Assuming company IDs 1-10 are valid
                'title' => $title,
                'slug' => Str::slug($title),
                'image' => "https://picsum.photos/200/300?random={$i}", // Random image URL from Lorem Picsum
                'description' => "Description for {$title}",
                'views' => rand(0, 1000),
                'download' => rand(0, 500),
                'file' => "http://example.com/downloads/{$i}.pdf", // Placeholder file URL
                'category_project' => "Category " . rand(1, 5), // Random category
                'location' => "Location {$i}",
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        return $projects;
    }
}
