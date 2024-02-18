<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Contactinfo;
use App\Models\Education;
use App\Models\Employment;
use App\Models\Experience;
use App\Models\Job;
use App\Models\Kin;
use App\Models\Personalinfo;
use App\Models\Referee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class ApplicationController extends Controller
{
    //
    public function home()
    {
        $user = Auth::User()->id;
        $personal = Personalinfo::where('user_id', $user)->exists();
        $contact = Contactinfo::where('user_id', $user)->exists();
        $education = Education::where('user_id', $user)->exists();
        $employment = Employment::where('user_id', $user)->exists();
        $experience = Experience::where('user_id', $user)->exists();
        $kin = Kin::where('user_id', $user)->exists();
        $referee = Referee::where('user_id', $user)->exists();
        $jobs = Job::get();

        $results = ([
            [
                'name' => 'personal',
                'value' => $personal
            ],
            [
                'name' => 'contact',
                'value' => $contact
            ],
            [
                'name' => 'education',
                'value' => $education
            ],
            [
                'name' => 'employment',
                'value' => $employment
            ],
            [
                'name' => 'experience',
                'value' => $experience
            ],
            [
                'name' => 'kin',
                'value' => $kin
            ],
            [
                'name' => 'referee',
                'value' => $referee
            ],
        ]);

        $complet = 0;

        foreach($results as $key=>$result)
        {
            if($result['value'])
            {
                $complet += 1;
            }
        }

        $percentage = round(($complet/7)*100);
        $status = false;

        if($percentage != 100)
        {
            $status = true;
        }

        return Inertia::render('Portal/Apply', [
            'results' => $results,
            'percentage' => $percentage,
            'status' => $status,
            'jobs' => $jobs
        ]);
    }

    public function store(Request $request)
    {
        $application = $this->validate($request, [
            'job_id' => 'required',
            'cover_letter' => 'required'
        ]);
        $application['user_id'] = Auth::User()->id;

        $exits = Application::where('job_id', $request->job_id)->where('user_id', Auth::User()->id)->exists();

        //dd($exits);
        if(!$exits){
            Application::create($application);
        }

		return redirect('/dashboard');

        //dd($request);
    }

}
