<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SosmedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sosmeds = [
            [
                'name' => 'facebook',
                'icon' => 'bi bi-facebook'
            ],
            [
                'name' => 'instagram',
                'icon' => 'bi bi-instagram'
            ],
            [
                'name' => 'twitter',
                'icon' => 'bi bi-twitter'
            ],
            [
                'name' => 'github',
                'icon' => 'bi bi-github'
            ],
            [
                'name' => 'linkedin',
                'icon' => 'bi bi-linkedin'
            ],
        ];

        foreach ($sosmeds as $sosmed) {
            SocialMedia::create($sosmed);
        }
    }
}
