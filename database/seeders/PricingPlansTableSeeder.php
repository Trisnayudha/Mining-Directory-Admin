<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricingPlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pricing')->insert([
            [
                'name' => 'Free',
                'price' => 0.00,
                'is_most_picked' => false,
                'directory_listing' => '1 Month Trial',
                'company_profile' => '1 Month Trial',
                'e_business_card' => false,
                'office_branch_location' => 0,
                'access_to_statistic' => false,
                'premium_listing' => false,
                'search_marketing' => false,
                'content_posting' => null,
                'product_service' => 1,
                'project' => 1,
                'resource' => 1,
                'news' => 1,
                'representative_profiles' => 0,
                'profile_picture' => false,
                'name' => false,
                'position' => false,
                'contact_number' => false,
            ],
            [
                'name' => 'Silver',
                'price' => 30.00,
                'is_most_picked' => true,
                'directory_listing' => 'Limited',
                'company_profile' => 'Limited',
                'e_business_card' => true,
                'office_branch_location' => 2,
                'access_to_statistic' => true,
                'premium_listing' => true,
                'search_marketing' => true,
                'content_posting' => '/section',
                'product_service' => 4,
                'project' => 4,
                'resource' => 4,
                'news' => 4,
                'representative_profiles' => 3,
                'profile_picture' => true,
                'name' => true,
                'position' => true,
                'contact_number' => true,
            ],
            [
                'name' => 'Gold',
                'price' => 75.00,
                'is_most_picked' => false,
                'directory_listing' => 'Unlimited',
                'company_profile' => 'Unlimited',
                'e_business_card' => true,
                'office_branch_location' => 2,
                'access_to_statistic' => true,
                'premium_listing' => true,
                'search_marketing' => true,
                'content_posting' => '/section',
                'product_service' => 4,
                'project' => 4,
                'resource' => 4,
                'news' => 4,
                'representative_profiles' => 3,
                'profile_picture' => true,
                'name' => true,
                'position' => true,
                'contact_number' => true,
            ],
            [
                'name' => 'Platinum',
                'price' => 125.00,
                'is_most_picked' => false,
                'directory_listing' => 'Unlimited',
                'company_profile' => 'Unlimited',
                'e_business_card' => true,
                'office_branch_location' => 2,
                'access_to_statistic' => true,
                'premium_listing' => true,
                'search_marketing' => true,
                'content_posting' => '/section',
                'product_service' => 4,
                'project' => 4,
                'resource' => 4,
                'news' => 4,
                'representative_profiles' => 3,
                'profile_picture' => true,
                'name' => true,
                'position' => true,
                'contact_number' => true,
            ],
        ]);
    }
}
