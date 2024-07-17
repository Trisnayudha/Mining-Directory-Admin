<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FAQProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faq_profile')->insert([
            [
                'title' => 'How to update profile?',
                'description' => 'To update your profile, go to...',
                'category' => 'Profile',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'How to change profile picture?',
                'description' => 'You can change your profile picture by...',
                'category' => 'Profile',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'How to delete account?',
                'description' => 'To delete your account, you need to...',
                'category' => 'Account',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
