<?php

namespace App\Http\Controllers;

use App\Models\LeaveQuota;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = LeaveRequest::with('user')->OrderByDesc('id')->where('user_id', Auth::user()->id)->get();
        return view('leave-request.index', compact('requests'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'leave_type' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'required'
        ]);
        try {
            $leaveQuota = LeaveQuota::find(Auth::user()->id);
            if ($request->leave_type != 'unpaid_leave' && $leaveQuota->{$request->leave_type} >= 0) {
                return back()->with('error', 'You do not have sufficient leave quota for this request');
            }
            LeaveRequest::create([
                'title' => $request->title,
                'description' => $request->description,
                'leave_type' => $request->leave_type,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'user_id' => Auth::user()->id,
            ]);
            return back()->with('success', 'leave request successfully submited!');
        } catch (\Throwable $th) {
            return back()->with('error', 'leave request submited Failed!');
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        try {
            $request = LeaveRequest::find($request->id);
            return view('partials.modals.edit-leave-request-modal', compact('request'))->render();
        } catch (\Exception $e) {
            return response()->json('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'leave_type' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'required'
        ]);
        try {
            $leaveQuota = LeaveQuota::find(Auth::user()->id);
            if ($request->leave_type != 'unpaid_leave' && $leaveQuota->{$request->leave_type} >= 0) {
                return back()->with('error', 'You do not have sufficient leave quota for this request');
            }
            LeaveRequest::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'leave_type' => $request->leave_type,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'user_id' => Auth::user()->id,
            ]);
            return back()->with('success', 'leave request successfully Updated!');
        } catch (\Throwable $th) {
            return back()->with('error', 'leave request submited Updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            LeaveRequest::find($id)->delete();
            return back()->with('success', 'leave request successfully deleted!');
        } catch (\Throwable $th) {
            return back()->with('error', 'leave request deleted Failed!');
        }
    }
}
