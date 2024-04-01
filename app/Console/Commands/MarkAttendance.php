<?php

namespace App\Console\Commands;

use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class MarkAttendance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mark-attendance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if attendance entry for today exists or not';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today();
        $isSunday = $today->isSunday();
        // if ($isSunday) {
        //     $this->info('Today is Sunday. No need to mark attendance.');
        //     return;
        // }
        $users = User::all();
        foreach ($users as $user) {
            $attendanceCount = Attendance::where('user_id', $user->id)
                ->whereDate('created_at', $today)
                ->count();
            if ($attendanceCount === 0) {
                 Attendance::create([
                    'user_id' => $user->id,
                    'check_in' => null,
                    'check_out' => null,
                    'status' => 0
                ]);
                $this->info("Attendance entry created");
            } else {
                $this->info("Attendance entry already exists");
            }
        }
    }
}
