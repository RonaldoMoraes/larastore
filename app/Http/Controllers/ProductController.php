<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{

	public function __construct(){

        $this->middleware('auth')->except(['index', 'show']);

    }


    public function index()
    {

    	$products = Product::all();

        return view('products.index', compact('products'));
    }


    public function create()
    {
        return view('products.create');
    }


    public function store()
    {
        $this->validate(request(), [

			'name'=> 'required',
			'price'=> 'required|min:1'

		]);

		Product::create([
		        'name' => request('name'),
		        'price' => request('price')
        ]);

        session()->flash(

            'message', 'Your product has now been created.'

        );

		return redirect('/products');
    }


    public function show(Product $product)
    {
      	return view('products.show', compact('product'));
    }


    public function edit(Product $product)
    {

        return view('products.edit', compact('product'));
    }


    public function update(Product $product)
    {

		$this->validate(request(), [

			'name'=> 'required',
			'price'=> 'required|min:1'

		]);

		$product->name = request()->name;
		$product->price = request()->price;

		$product->save();

    	session()->flash(

            'message', 'Your product has now been updated.'

        );
        return view('products.show', compact('product'));
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }
}
