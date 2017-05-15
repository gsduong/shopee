<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Order;

use DB;

class OrderController extends Controller
{
    
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function doCheckOut(Request $request)
	{
		$order = new Order;
		$order->status = 0;
		if($request->user_id!=0)
		{
			$order->user_id = $request->user_id;
		}
		$order->order_code = $request->phone.time();
		$order->buyer_name = $request->name;
		$order->buyer_email = $request->mail;
		$order->buyer_phone = $request->phone;
		$order->buyer_address = $request->address;
		$order->buyer_message = $request->message;
		$order->amount = $request->amount;
		$order->payment_response_info = '';
		$order->security = '';
		$order->save();

		$product=json_decode($request->products);
		foreach($product as $p)
		{
			DB::table('order_product')->insert(
			    array('order_id' => $order->id, 'product_id' => $p->product_id, 'size_id' => $p->size, 'color_id' => $p->color, 'qty' => $p->quantity, 'total' => $p->quantity*$p->price)
			);
		}
		return response()->json(['result' => 'success']);
	}
}
