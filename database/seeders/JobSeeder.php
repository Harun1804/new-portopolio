<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = [
            ['name' => 'web developer'],
            ['name' => 'frontend developer'],
            ['name' => 'backend developer'],
            ['name' => 'php developer'],
            ['name' => 'laravel developer'],
            ['name' => 'freelance developer'],
        ];

        foreach ($jobs as $job) {
            Job::create($job);
        }
    }
}
