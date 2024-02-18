<?php

namespace App\Http\Controllers;

use App\Models\Personalinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalinfoController extends Controller
{
    //save data
    public function store(Request $request){

        $user = Auth::User()->id;

        if($request->disability){
            $disability = "required";
        }else{
            $disability = '';
        };

        if($request->nationality){
            $kenyan = "required";
        }else{
            $kenyan = "";
        }
        if(!$request->nationality){
            $non_kenyan = "required";
        }else{
            $non_kenyan = "";
        }


        //validation
        $request->validate([
            'title' => 'required',
            'f_name' => 'required',
            's_name' => 'required',
            'sername' => 'required',
            'gender' => 'required',
            'civil_status' => 'required',
            'yob' => 'required',
            'nationality' => '',
            'country' => $non_kenyan,
            'nationality2' => $non_kenyan,
            'county' => $kenyan,
            'ethinicity' => $kenyan,
            'disability' => '',
            'd_nature' => $disability,
            'd_registration' => $disability,
        ]);

        Personalinfo::updateOrCreate(['user_id' => $user],
        [
            'title' => $request->title,
            'f_name' => $request->f_name,
            's_name' =>  $request->s_name,
            'sername' => $request->sername,
            'gender' => $request->gender,
            'civil_status' => $request->civil_status,
            'yob' => $request->yob,
            'nationality' => $request->nationality,
            'country' => $request->country,
            'nationality2' => $request->nationality2,
            'county' => $request->county,
            'ethinicity' => $request->ethinicity,
            'disability' => $request->disability,
            'd_nature' => $request->d_nature,
            'd_registration' => $request->d_registration,
        ]);

		//redirect
		return redirect('/personal');
	}
}
