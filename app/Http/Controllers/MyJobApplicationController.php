<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // dd(auth()->user()->jobApplications()->with('job')->latest()->get());
       return view(
        'my-job-applications.index',
        [
            'applications' => auth()->user()->jobApplications()
                ->with([
                    'job'=>fn($query)=>$query->withCount('jobApplications')->withAvg('jobApplications','expected_salary'),
                    'job.employer'])
                ->latest()->get()
        ]
    );    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $MyJobApplication)
    {
        
        $MyJobApplication->delete();
        return redirect()->back()->with('success', 'Application deleted successfully');
    }
}
