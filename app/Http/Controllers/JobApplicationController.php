<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Job $job)
    {
        $this->authorize('apply', $job);
        return view('job_application.create',['job'=>$job]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Job $job,Request $request)
    {
        $job->jopApplications()->create([
            'user_id' => $request->user()->id,
           // 'expected_salary' => $request->input('expected_salary'),
           ...$request->validate([
            'expected_salary' => 'required|min:1|max:150000',
           ])

        ]);

        return redirect()->route('jobs.show', $job)->with('success', 'Application submitted successfully');
    }

   

   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
