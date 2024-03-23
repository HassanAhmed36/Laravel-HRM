<?php

namespace App\Services;

use App\Models\Document;
use App\Models\EmployeeBankDetail;
use App\Models\EmployeeBasicInfo;
use App\Models\EmployeeLeave;
use App\Models\EmploymentDetails;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeService
{
    public function createUser($request)
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'Emp_Id' => $this->getEmployeeID(),
                'is_active' => $request->filled('is_active'),
                'designation_id' => $request->designation_id,
            ]);

            if ($user) {
                $path = null;
                if ($request->hasFile('profile_image')) {
                    $path = $request->file('profile_image')->store('profile_images');
                }
                $employeeInfo = EmployeeBasicInfo::create([
                    'date_of_birth' => $request->date_of_birth,
                    'cnic' => $request->cnic,
                    'phone_number' => $request->phone_number,
                    'address' => $request->address,
                    'personal_email' => $request->personal_email,
                    'profile_image' => $path,
                    'user_id' => $user->id,
                ]);

                $employeeDetail = EmploymentDetails::create([
                    'salary' => $request->salary,
                    'job_type' => $request->job_type,
                    'shift_start_time' => $request->shift_start_timing,
                    'shift_end_time' => $request->shift_end_timing,
                    'joining_date' => $request->joining_date,
                    'user_id' => $user->id,
                ]);

                $bankDetail = EmployeeBankDetail::create([
                    'account_holder_name' => $request->account_holder_name,
                    'account_number' => $request->account_number,
                    'IBAN' => $request->IBAN,
                    'user_id' => $user->id,
                ]);
                $employeeLeave = EmployeeLeave::create([
                    'sick_leave' => $request->sick_leave,
                    'casual_leave' => $request->casual_leave,
                    'annual_leave' => $request->annual_leave,
                    'user_id' => $user->id,
                ]);

                if ($request->hasFile('documents')) {
                    foreach ($request->file('documents') as $document) {
                        $filePath = $document->store('documents');
                        $document =  Document::create([
                            'user_id' => $user->id,
                            'file_path' => $filePath,
                            'name' => $document->getClientOriginalName()
                        ]);
                        dd($document);
                    }
                }
                DB::commit();
                return redirect()->route('employee.index')->with('success', 'Employee added successfully');
            } else {
                DB::rollBack();
                return back()->with('error', 'User registration failed!');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return back()->with('error', 'An error occurred while processing the request.');
        }
    }
    public function getEmployeeID()
    {
        $latestEmployee = User::withTrashed()->latest()->first();
        $currentNumber = $latestEmployee ? $latestEmployee->id + 1 : 1;
        return 'EMP-' . $currentNumber;
    }
    public function delete_document($id)
    {
        try {
            $document = Document::find($id);
            $document->delete();
            return back()->with('success', 'Document deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Document deletion failed!');
        }
    }
}
