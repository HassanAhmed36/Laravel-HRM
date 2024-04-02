<?php

namespace App\Http\Controllers;

use App\Models\Allowance;
use App\Models\Attendance;
use App\Models\Deduction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class PayslipController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('Payslip.index', compact('users'));
    }

    public function downloadPaySlip(Request $request)
    {
        if ($request->month === Carbon::now()->format('Y-m')) {
            return back()->with('Error!', 'Payslip for the current month will be generated after the month ends.');
        }
        $user = User::find($request->user_id);
        if (!$user) {
            return back()->with('Error!', 'User not found.');
        }
        $basicSalarywithoutDetaction = $user->basic_info->Basic_Salary;
        $basicSalary = $user->basic_info->Basic_Salary;

        $unpaidDetaction = Deduction::find(1);
        $halfDetaction = Deduction::find(3);

        $allowance = Allowance::where('month', Carbon::parse($request->month)->format('Y-m'))
            ->where('user_id', $user->id)
            ->first();
        $monthlyAllowance = $allowance ? $allowance->amount : 0;

        $attendances = Attendance::where('user_id', $user->id)
            ->whereYear('created_at', Carbon::parse($request->month)->year)
            ->whereMonth('created_at', Carbon::parse($request->month)->month)
            ->get();
        $unpaid_Leave_Count = 0;
        $halfDay_Count = 0;
        $halfdayDetactAmmount = 0;
        $oneDaySalary = $basicSalary / 30;
        foreach ($attendances as $attendance) {
            switch ($attendance->status) {
                case 'UnPaid':
                    $unpaid_Leave_Count += 1;
                    $basicSalary -= ($oneDaySalary / $unpaidDetaction->detact_amount * 100);
                    break;
                case 'Halfday':
                    $halfDay_Count += 1;
                    $basicSalary -= ($oneDaySalary / $halfDetaction->detact_amount * 100);
                    break;
            }
        }
        $salaryMinusLeave = $basicSalary;
        $DetactedAmount = $basicSalarywithoutDetaction - $basicSalary;
        $salarywithBonus = $basicSalary + $monthlyAllowance;
        $leaveDetact = $oneDaySalary  * $unpaid_Leave_Count;
        $percentage = $halfDetaction->detact_amount  / 100;
        $halfdaydetaction = 0;
        if ($halfDay_Count != 0) {
            $halfdaydetaction = ($oneDaySalary * $percentage) / $halfDay_Count;
        }
        $currentMonth = date('M, Y', strtotime($request->month));
        $html = view('pdf.payslip', compact('user', 'basicSalarywithoutDetaction', 'salarywithBonus', 'monthlyAllowance', 'unpaid_Leave_Count', 'salaryMinusLeave', 'currentMonth', 'DetactedAmount', 'halfDay_Count', 'halfdayDetactAmmount', 'leaveDetact', 'halfdaydetaction'))->render();
        $pdf = new Dompdf();
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream('payslip.pdf');
    }
}
