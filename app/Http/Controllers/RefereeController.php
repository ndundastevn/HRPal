<?php

namespace App\Http\Controllers;

use App\Models\Referee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RefereeController extends Controller
{

    public function store(Request $request){

        $user = Auth::User()->id;
        $data = $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'company' => 'required',
            'occupation' => 'required',
        ]);

        $data['user_id'] = $user;

        Referee::create($data);

        return redirect('/referee')->with('Data saved successful');
    }

    public function update(Request $request)
    {

        //adding rule to the validate array
        $Referee = $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'company' => 'required',
            'occupation' => 'required',
        ]);


       //updating db
       Referee::where('id', $request->id)->update($Referee);

        //redirect
        return redirect('referee')->with('success', 'Data updated successful');
    }


    public function destroy($id){
        $cart = Referee::findOrFail($id);
		$cart->delete();

        return redirect('/referee');
        //Log::info($id);
    }
}
