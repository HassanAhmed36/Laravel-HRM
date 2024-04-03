<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{

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
    public function show(Request $request)
    {
        try {
            $job = Job::find($request->id);
            return view('partials.modals.show-job-modal', compact('job'))->render();
        } catch (\Throwable $th) {
            return response()->json('record not found!');
        }
    }

    public function edit(Request $request)
    {
        try {
            $job = Job::find($request->id);
            return view('partials.modals.job-edit-model', compact('job'))->render();
        } catch (\Throwable $th) {
            return response()->json('record not found!');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'salary' => 'required',
            'positions_available' => 'required',
        ]);
        try {
            Job::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'location' => $request->location,
                'salary' => $request->salary,
                'positions_available' => $request->positions_available,
                'is_active' => $request->has('is_active') ? true : false,
            ]);
            return back()->with('success', 'Job updated successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Job updated Failed!');
        }
    }

    public function destroy($id)
    {
        try {
            Job::find($id)->delete();
            return back()->with('success', 'Job Deleted Successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Job Deleted Failed!');
        }
    }
}
