<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ExperienceController extends Controller
{
    public function store(Request $request){

        $user = Auth::User()->id;
        $data = $this->validate($request, [
            'end' => 'required',
            'start' => 'required',
            'institution' => 'required',
            'salary' => 'required',
            'designation' => 'required',
        ]);

        $data['user_id'] = $user;

        Experience::create($data);

        return redirect('/history')->with('Data saved successful');
    }

    public function update(Request $request)
    {

        //adding rule to the validate array
        $experience = $this->validate($request, [
            'end' => 'required',
            'start' => 'required',
            'institution' => 'required',
            'salary' => 'required',
            'designation' => 'required',
            'id' => 'required|exists:experiences'
        ]);


       //updating db
       Experience::where('id', $request->id)->update($experience);

        //redirect
        return redirect('history')->with('success', 'UseEducation updated successful');
    }


    public function destroy($id){
        $cart = Experience::findOrFail($id);
		$cart->delete();

        return redirect('/history');
        //Log::info($id);
    }
}
