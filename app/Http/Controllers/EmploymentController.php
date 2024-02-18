<?php

namespace App\Http\Controllers;

use App\Models\Employment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmploymentController extends Controller
{
    //save data
    public function store(Request $request){

        $user = Auth::User()->id;

        if($request->not_employed){
            Employment::updateOrCreate(['user_id' => $user],
            [
                'user_id' => $user,
                'not_employed' => $request->not_employed,
                'employer' => '',
                'position' => '',
                'doa' => null,
                'salary' => null,
            ]);
        }else{
            $request->validate([
                'employer' => 'required',
                'position' => 'required',
                'doa' => 'date',
                'salary' => 'numeric',
            ]);

            Employment::updateOrCreate(['user_id' => $user],
            [
                'user_id' => $user,
                'not_employed' => $request->not_employed,
                'employer' => $request->employer,
                'position' => $request->position,
                'doa' => $request->doa,
                'salary' => $request->salary,
            ]);
        }



		//redirect
		//return redirect('/contact');
	}
}
