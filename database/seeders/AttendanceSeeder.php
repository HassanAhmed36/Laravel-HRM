<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Attendance;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all user ids
        $userIds = User::pluck('id')->toArray();

        // Set current and previous month start dates
        $currentMonth = Carbon::now()->startOfMonth();
        $previousMonth = Carbon::now()->subMonth()->startOfMonth();

        // Set check-in and check-out times
        $checkIn = '09:00';
        $checkOut = '17:00';

        // Seed attendance records for current month
        foreach ($userIds as $userId) {
            $daysInMonth = $currentMonth->daysInMonth;

            for ($day = 1; $day <= $daysInMonth; $day++) {
                Attendance::create([
                    'user_id' => $userId,
                    'check_in' => $checkIn,
                    'check_out' => $checkOut,
                    'created_at' => $currentMonth->copy()->addDays($day - 1),
                    'status' => 1,
                ]);
            }
        }
    }
}
