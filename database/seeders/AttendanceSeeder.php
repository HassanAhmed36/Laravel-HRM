<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::pluck('id');
        $currentMonth = Carbon::now()->startOfMonth();
        $previousMonth = Carbon::now()->subMonth()->startOfMonth();
        foreach ($users as $user) {
           
            for ($day = 1; $day <= $currentMonth->daysInMonth; $day++) {
                Attendance::create([
                    'user_id' => $user,
                    'created_at' => $currentMonth->copy()->addDays($day - 1), 
                    'status' => 1,
                ]);
            }

            for ($day = 1; $day <= $previousMonth->daysInMonth; $day++) {
                Attendance::create([
                    'user_id' => $user,
                    'created_at' => $previousMonth->copy()->addDays($day - 1), date
                    'status' => 0, 
                ]);
            }
        }

        return 'Attendance migration completed successfully!';
    }
}
