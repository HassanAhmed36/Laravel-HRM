<?php

namespace App\Services;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceService
{
    public function CheckIn()
    {
        try {
            $user = Auth::user();
            $today = Carbon::today();

            $attendance = Attendance::where('user_id', $user->id)
                ->whereDate('created_at', $today)
                ->first();

            if ($attendance) {
                $attendance->update([
                    'check_in' => now(),
                    'status' => 1
                ]);
            } else {
                Attendance::create([
                    'user_id' => $user->id,
                    'check_in' => now(),
                    'check_out' => null,
                    'status' => 1
                ]);
            }
            return back()->with('success', 'Attendance marked successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to mark attendance!');
        }
    }
    public function CheckOut()
    {
        try {
            $attendance = Attendance::where('user_id', Auth::user()->id)->latest();
            $attendance->update([
                'check_out' => now()
            ]);
            return back()->with('success', 'Attendance mark successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Attendance not  mark !');
        }
    }
    public function getAttendanceData(Request $request)
    {
        $attendance = Attendance::find($request->id);
        return view('partials.modals.attendance-modal', compact('attendance'))->render();
    }
    public function markAttendance(Request $request)
    {
        $attendance = Attendance::where('user_id', $request->user_id)
            ->where('created_at', $request->created_at)
            ->first();

        $status = $request->mark_full_day ? 1 : 4;
        if ($attendance) {
            $attendance->update([
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'status' => $status
            ]);
        } else {
            Attendance::create([
                'user_id' => $request->user_id,
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'status' => $status
            ]);
        }
        return back()->with('success', 'Attendance marked Successfully');
    }

}
