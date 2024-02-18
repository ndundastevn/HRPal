<?php

namespace App\Http\Controllers;

use App\Models\Contactinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactinfoController extends Controller
{

    //save data
    public function store(Request $request){

        $user = Auth::User()->id;

        $request->validate([
            'address' => 'required',
            'town' => 'required',
            'phone1' => 'required',
            'phone2' => 'required',
            'residence' => 'required',
        ]);

        Contactinfo::updateOrCreate(['user_id' => $user],
        [
            'address' => $request->address,
            'town' => $request->town,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'residence' => $request->residence,
        ]);

		//redirect
		return redirect('/contact');
	}

    public function kinstore(Request $request){

        $user = Auth::User()->id;

        $request->validate([
            'kin_name' => 'required',
            'kin_gender' => 'required',
            'kin_phone' => 'required',
            'kin_residence' => 'required',
            'kin_relationship' => 'required',
        ]);

        Contactinfo::updateOrCreate(['user_id' => $user],
        [
            'kin_name' => $request->kin_name,
            'kin_gender' => $request->kin_gender,
            'kin_phone' => $request->kin_phone,
            'kin_residence' => $request->kin_residence,
            'kin_relationship' => $request->kin_relationship,
        ]);

		//redirect
		return redirect('/kin');
	}
}
