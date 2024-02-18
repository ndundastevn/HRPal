<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EducationController extends Controller
{
    private $validations;

    public function __construct()
    {
       $this->validations = [
            'y_ended' => 'required',
            'institution' => 'required',
            'level' => 'required',
            'certificate' => 'required',
            'highest' => 'required'
       ];
    }

    //save data
    public function store(Request $request){

        $user = Auth::User()->id;

        $education = $this->validate($request, $this->validations);
        $education['user_id'] = $user;

        Education::create($education);

        return redirect()->route('education')->with('message', 'Data saved Successfully');
	}

    public function update(Request $request)
    {

        //adding rule to the validate array
        $rules = $this->validations;
        $rules['id'] = 'required|exists:education';

        //validation
        $education = $this->validate($request, $this->validations);

        //updating db
       Education::where('id', $request->id)->update($education);

        //redirect
        return redirect('education')->with('success', 'UseEducation updated successful');
    }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Post  $post
    * @return \Illuminate\Http\Response
    */
    public function destroy(Education $education)
    {
        $education->delete();
        sleep(1);

        return redirect()->route('education')->with('message', 'Post Delete Successfully');
    }
}
