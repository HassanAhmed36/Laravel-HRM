<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Job;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidates = Candidate::orderByDesc('id')->get();
        $jobs = Job::select(['id', 'title'])->get();
        return view('candidate.index', compact('candidates', 'jobs'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "email" => "required",
            "phone" => "required",
            "status" => "required|integer",
            "job_id" => "required|integer",
            "address" => "nullable",
            "resume_path" => "nullable|file",
        ]);

        try {
            if ($request->has('resume_path')) {
                $path = $request->file('resume_path')->store('candidate_resume');
            }
            Candidate::create([
                "name" => $request->name,
                "email" => $request->email,
                "phone" => $request->phone,
                "status" => $request->status,
                "job_id" => $request->job_id,
                "address" => $request->address,
                "resume_path" => $path,
            ]);
            return back()->with('success', 'Candidate Added Successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->with('error', 'Candidate Added Failed!');
        }
    }

    public function show(Candidate $candidate)
    {
    }

    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}
