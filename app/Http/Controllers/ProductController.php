<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();

        return Inertia::render('Product', [
            'products' => $products,
        ]);
    }

    /**
     * Save data into DB
     */
    public function store(Request $request){

        $data = $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
        ]);

        Product::create($data);

        return redirect('/products')->with('Data saved successful');
    }

    /**
     * Update existing DB records
     */
    public function update(Request $request)
    {
        //adding rule to the validate array
        $product = $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
        ]);

       //updating db
       Product::where('id', $request->id)->update($product);

        //redirect
        return redirect('/products')->with('success', 'updated successful');
    }

    /**
     * Delete existing record
     */
    public function destroy($id){
        $product = Product::findOrFail($id);
		$product->delete();

        return redirect('/products');
    }
}
