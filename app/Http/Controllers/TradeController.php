<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trade;

class TradeController extends Controller
{

	public function __construct(){

        $this->middleware('auth')->except(['index', 'show']);

    }


    public function index()
    {

    	$trades = Trade::all();

        return view('trades.index', compact('trades'));
    }


    public function create()
    {
    	
    	$products = \App\Product::all()->pluck('id', 'name');

        return view('trades.create', compact('products'));
    }


    public function store(Request $request)
    {

        $user_id = auth()->user()->id;
        $total = \App\Product::find(request('product_id'))->price*(int)request('amount');

        $request->merge(['user_id' => $user_id]);
        $request->merge(['total' => $total]);

        $this->validate(request(), [

            'user_id'    => 'required',
            'product_id' => 'required',
            'amount'     => 'required',
            'total'      => 'required|min:0'

        ]);


		Trade::create([
		        'user_id' => request('user_id'),
		        'product_id' => request('product_id'),
		        'amount' => request('amount'),
		        'total' => request('total')
        ]);

        session()->flash(

            'message', 'Your trade has now been created.'

        );

		return redirect('/trades');
    }


    public function show(Trade $trade)
    {
      	return view('trades.show', compact('trade'));
    }


    public function edit(Trade $trade)
    {

        return view('trades.edit', compact('trade'));
    }


    public function update(Trade $trade)
    {

		$this->validate(request(), [

			'user_id'=> 'required',
			'product_id'=> 'required',
			'amount'=> 'required',
			'total'=> 'required'

		]);

		$trade->user_id = request()->user_id;
		$trade->product_id = request()->product_id;
		$trade->amount = request()->amount;
		$trade->total = request()->total;

		$trade->save();

    	session()->flash(

            'message', 'Your trade has now been updated.'

        );
        return view('trades.show', compact('trade'));
    }


    public function destroy(Trade $trade)
    {
        $trade->delete();
        return redirect('/trades');
    }


}
