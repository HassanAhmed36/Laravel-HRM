<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Department;
use App\Models\Designation;
use App\Models\EmployeeBankDetail;
use App\Models\EmployeeBasicInfo;
use App\Models\EmployeeLeave;
use App\Models\EmploymentDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Employees.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Emp_ID = $this->getEmployeeID();
        $designations = Designation::all();
        return view('Employees.create', compact('Emp_ID', 'designations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // dd($request->toArray());

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
                        $document->store('documents');
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function getEmployeeID()
    {
        $latestEmployee = User::latest()->first();
        if ($latestEmployee) {
            $currentNumber = (int) explode('-', $latestEmployee->Emp_Id)[1];
            $newNumber = $currentNumber + 1;
            $newEmployeeID = 'EMP-' . $newNumber;
            return $newEmployeeID;
        } else {
            return 'EMP-1';
        }
    }

}
