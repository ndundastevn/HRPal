<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();

        return Inertia::render('Post', [
            'posts' => $posts,
        ]);
    }

    /**
     * Save data into DB
     */
    public function store(Request $request){

        $data = $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        Post::create($data);

        return redirect('/posts')->with('Data saved successful');
    }

    /**
     * Update existing DB records
     */
    public function update(Request $request)
    {
        //adding rule to the validate array
        $post = $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

       //updating db
       Post::where('id', $request->id)->update($post);

        //redirect
        return redirect('/posts')->with('success', 'updated successful');
    }

    /**
     * Delete existing record
     */
    public function destroy($id){
        $post = Post::findOrFail($id);
		$post->delete();

        return redirect('/posts');
    }
}
