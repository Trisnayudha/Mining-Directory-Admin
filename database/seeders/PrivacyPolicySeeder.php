<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivacyPolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('md_privacy')->insert([
            [
                'content' => '
                    <h1>Privacy Policy</h1>
                    <p>Welcome to PT Media Mitrya Karya Indonesia. We value your privacy and strive to protect your personal information.</p>
                    <h2>Information Collection</h2>
                    <p>We collect information to provide better services to our users. This includes:</p>
                    <ul>
                        <li>Information you provide us directly.</li>
                        <li>Information we get from your use of our services.</li>
                    </ul>
                    <h2>Use of Information</h2>
                    <p>We use the information we collect to:</p>
                    <ul>
                        <li>Provide, maintain, and improve our services.</li>
                        <li>Develop new services.</li>
                        <li>Protect PT Media Mitrya Karya Indonesia and our users.</li>
                    </ul>
                    <h2>Information Sharing</h2>
                    <p>We do not share personal information with companies, organizations, and individuals outside of PT Media Mitrya Karya Indonesia unless one of the following circumstances applies:</p>
                    <ul>
                        <li>With your consent.</li>
                        <li>For legal reasons.</li>
                    </ul>
                    <h2>Contact Us</h2>
                    <p>If you have any questions about this Privacy Policy, please contact us at info@mediamitrya.co.id.</p>
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
