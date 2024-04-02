<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all();
        return view('jobs.index', compact('jobs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'salary' => 'required',
            'positions_available' => 'required',
            'is_active' => 'required',
        ]);
        try {
            Job::create([
                'title' => $request->title,
                'description' => $request->description,
                'location' => $request->location,
                'salary' => $request->salary,
                'positions_available' => $request->positions_available,
                'is_active' => $request->has('is_active') ? true : false,
            ]);
            return back()->with('success', 'Job Added successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Job Added Failed!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
