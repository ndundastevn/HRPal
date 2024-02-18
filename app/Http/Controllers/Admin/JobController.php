<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::with('applications')->get();
        //dd($jobs);
        return Inertia::render('Admin/Job', [
            'jobs' => $jobs,
        ]);
    }

    /**
     * Show applications related to a job
     */
    public function show($id)
    {
        $allapp = [];
        $applications = Application::where('job_id', $id)->get();
        //dd($applications->user->name);
        foreach($applications as $application){
            $newApp = [
                'id' => $application->id,
                'job_id'=> $application->job_id,
                'job_name' => $application->job->name,
                'user_id' => $application->user_id,
                'user_name' => $application->user->name,
                'cover_letter' => $application->cover_letter
            ];
            array_push($allapp, $newApp);
        }
        //dd($allapp);
        return Inertia::render('Admin/Applications', [
            'applications' => $allapp,
        ]);
    }

    /**
     * Save data into DB
     */
    public function store(Request $request){

        $data = $this->validate($request, [
            'position' => 'required',
            'reference' => 'required',
            'name' => 'required',
            'deadline' => 'required',
            'vacancy' => 'required',
        ]);

        Job::create($data);

        //return redirect('/jobs')->with('Data saved successful');
    }

    /**
     * Update existing DB records
     */
    public function update(Request $request)
    {
        //adding rule to the validate array
        $job = $this->validate($request, [
            'position' => 'required',
            'reference' => 'required',
            'name' => 'required',
            'deadline' => 'required',
            'vacancy' => 'required',
        ]);

       //updating db
       Job::where('id', $request->id)->update($job);

        //redirect
        //return redirect('/jobs')->with('success', 'updated successful');
    }

    /**
     * Delete existing record
     */
    public function destroy($id){
        $job = Job::findOrFail($id);
		$job->delete();

        //return redirect('/jobs');
    }
}
