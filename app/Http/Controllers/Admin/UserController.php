<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    private $validations;

    public function __construct()
    {
       $this->validations = [
            'name' => 'required',
            'email' => 'required',
            'passord' => 'required',

       ];
    }
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();
        dd($users);

        return Inertia::render('Admin/User', [
            'users' => $users,
        ]);
    }

    /**
     * save new user in DB
     */
    public function store(Request $request){


        $data = $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);
        $data['password'] = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';


        User::create($data);

        //return redirect('/history')->with('Data saved successful');
	}

    /**
     * update existing database record
     */
    public function update(Request $request)
    {

        //adding rule to the validate array
        $user = $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'id' => 'required'
        ]);


       //updating db
       User::where('id', $request->id)->update($user);

        //redirect
        return redirect('admin/user')->with('success', 'updated successful');
    }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Post  $post
    * @return \Illuminate\Http\Response
    */
    public function destroy($id){
        $cart = User::findOrFail($id);
		$cart->delete();

        return redirect('/admin/user');

    }
}
