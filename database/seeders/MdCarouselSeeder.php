<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MdCarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'image' => 'https://dummyimage.com/1000x350/eb26eb/ffffff',
                'slug' => 'explore-mining-gear-1',
            ],
            [
                'image' => 'https://dummyimage.com/1000x350/452045/ffffff',
                'slug' => 'explore-mining-gear-2',
            ],
            [
                'image' => 'https://dummyimage.com/1000x350/147dd9/ffffff',
                'slug' => 'explore-mining-gear-3',
            ],
            [
                'image' => 'https://dummyimage.com/1000x350/25f5eb/ffffff',
                'slug' => 'explore-mining-gear-4',
            ],
            [
                'image' => 'https://dummyimage.com/1000x350/f5c827/ffffff',
                'slug' => 'explore-mining-gear-5',
            ],
        ];

        foreach ($data as $item) {
            DB::table('md_carousel')->insert([
                'image' => $item['image'],
                'link' => 'https://example.com/explore-' . $item['slug'],
            ]);
        }
        // Data untuk tabel md_statistic
        $statisticData = [
            'data_1' => 300,
            'data_2' => 10000,
            'data_3' => 1500
        ];


        DB::table('md_statistic')->insert([
            'data_1' => $statisticData['data_1'],
            'data_2' => $statisticData['data_2'],
            'data_3' => $statisticData['data_3'],
        ]);
    }
}
