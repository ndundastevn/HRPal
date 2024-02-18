<?php

namespace App\Http\Controllers;

use App\Models\Kin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KinController extends Controller
{
    //save data
    public function store(Request $request){

        $user = Auth::User()->id;

        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'residence' => 'required',
            'relationship' => 'required',
            'phone' => 'required',
        ]);

        Kin::updateOrCreate(['user_id' => $user],
        [
            'user_id' => $user,
            'name' => $request->name,
            'gender' => $request->gender,
            'residence' => $request->residence,
            'relationship' => $request->relationship,
            'phone' => $request->phone,
        ]);
    }

}
