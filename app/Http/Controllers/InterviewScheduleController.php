<?php

namespace App\Http\Controllers;

use App\Models\InterviewSchedule;
use Illuminate\Http\Request;

class InterviewScheduleController extends Controller
{

    public function index()
    {
        $scheduleInterviews = InterviewSchedule::with('candidate')->get();
        return view('interview-schedule.index', compact('scheduleInterviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InterviewSchedule $interviewSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InterviewSchedule $interviewSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InterviewSchedule $interviewSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InterviewSchedule $interviewSchedule)
    {
        //
    }
}
