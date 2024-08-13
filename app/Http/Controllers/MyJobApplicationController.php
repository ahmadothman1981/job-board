<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // dd(auth()->user()->jobApplications()->with('job')->latest()->get());
       return view('my-job-applications.index',['applications'=>auth()->user()->jobApplications()->with('job','job.employer')->latest()->get()]);
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
