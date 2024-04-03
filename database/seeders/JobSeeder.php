<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Job::create([
            'title' => 'web developer',
            'description' => 'Seeking a motivated individual to join our dynamic team as a Software Engineer. The ideal candidate will have strong problem-solving skills, a passion for technology, and the ability to work collaboratively in a fast-paced environment. Responsibilities include designing, developing, and maintaining high-quality software solutions to meet business requirements. Join us and make an impact in the world of software development!',
            'location' => 'New York, NY 10001, USA',
            'salary' => '500000',
            'positions_available' => 1,
            'is_active' => true,
        ]);
    }
}
