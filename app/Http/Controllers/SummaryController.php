<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SummaryController extends Controller
{
    //
    public function index()
    {
        $id = Auth::User()->id;
        $user = User::find($id);

        $profile = User::find($id)->personalinfo;
        if(empty($profile)){
            $profile = "No Data found";
        };
        $contact = User::find($id)->contactinfo;
        if(empty($contact)){
            $contact = "No Data found";
        };
        $educations = User::find($id)->educations;
        if(empty($educations)){
            $educations = "No Data found";
        };
        $works = User::find($id)->employment;
        if(empty($works)){
            $works = "No Data found";
        };
        $experiences = User::find($id)->experiences;
        if(empty($experiences)){
            $experiences = "No Data found";
        };
        $kin = User::find($id)->kin;
        if(empty($kin)){
            $kin = "No Data found";
        };
        $referees = User::find($id)->referees;
        if(empty($referees)){
            $referees = "No Data found";
        };

        return Inertia::render('Portal/Summary', [
            'user' => $user,
            'profile' => $profile,
            'educations' => $educations,
            'contact' => $contact,
            'works' => $works,
            'experiences' => $experiences,
            'kin' => $kin,
            'referees' => $referees,
        ]);
    }
}
