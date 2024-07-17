<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TermConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('md_term')->insert([
            [
                'content' => '
                    <h1>Terms and Conditions</h1>
                    <p>Welcome to PT Media Mitrya Karya Indonesia. By accessing our website, you agree to be bound by the following terms and conditions:</p>
                    <h2>Use of Website</h2>
                    <p>You agree to use our website only for lawful purposes and in a way that does not infringe the rights of, restrict, or inhibit anyone else\'s use and enjoyment of the website.</p>
                    <h2>Intellectual Property</h2>
                    <p>All content on this website, including text, graphics, logos, and images, is the property of PT Media Mitrya Karya Indonesia.</p>
                    <h2>Limitation of Liability</h2>
                    <p>PT Media Mitrya Karya Indonesia is not liable for any damages that may occur from the use of this website.</p>
                    <h2>Changes to Terms</h2>
                    <p>We may revise these terms and conditions at any time without notice. By using this website, you agree to be bound by the current version of these terms and conditions.</p>
                    <h2>Contact Us</h2>
                    <p>If you have any questions about these Terms and Conditions, please contact us at info@mediamitrya.co.id.</p>
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
