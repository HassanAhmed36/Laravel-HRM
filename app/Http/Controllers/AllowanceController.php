<?php

namespace App\Http\Controllers;

use App\Models\Allowance;
use App\Models\User;
use Illuminate\Http\Request;

class AllowanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allowances =  Allowance::with('user')->get();
        $users = User::all();
        return view('Allowance.index', compact('allowances', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'month' => 'required',
        ]);
        try {
            if ($request->has('all_employee')) {
                $users = User::all();
                foreach ($users as $user) {
                    Allowance::create([
                        'month' => $request->month,
                        'name' => $request->name,
                        'amount' => $request->amount,
                        'user_id' => $user->id
                    ]);
                }
            } else {
                Allowance::create([
                    'month' => $request->month,
                    'name' => $request->name,
                    'amount' => $request->amount,
                    'user_id' => $request->user_id
                ]);
            }
            return back()->with('success', 'Allowance Add Successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->with('error', 'Allowance Add failed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
          Allowance::find($id)->delete();
          return back()->with('success' , 'Allowance deleted successfully!');
        } catch (\Exception $e) {
           return back()->with('error' , 'Allowance deleted Failed!');
        }
    }
}
