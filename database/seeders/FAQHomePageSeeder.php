<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FAQHomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faq_home_page')->insert([
            [
                'title' => 'What is this website?',
                'description' => 'This website is a platform for...',
                'category' => 'General',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'How to use the features?',
                'description' => 'You can use the features by...',
                'category' => 'Usage',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Who can join?',
                'description' => 'Anyone can join by...',
                'category' => 'Membership',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
