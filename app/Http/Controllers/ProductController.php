<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;

use App\Brand;

use App\Catalog;

use App\Stock;

use App\Color;

use App\Size;

use App\Order;

use DB;

class ProductController extends Controller
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

	public function homeDisplay()
	{
		$products = Product::paginate(6);
		$cate1s = Product::where('catalog_id', '=' , 1)->paginate(4);
		$cate2s = Product::where('catalog_id', '=' , 2)->paginate(4);
		$cate3s = Product::where('catalog_id', '=' , 3)->paginate(4);
		$cate4s = Product::where('catalog_id', '=' , 4)->paginate(4);
		$cate5s = Product::where('catalog_id', '=' , 5)->paginate(4);

		return view('users.index', compact('products', 'cate1s', 'cate2s', 'cate3s', 'cate4s', 'cate5s'));
	}

	public function shopDisplay(Request $request)
	{
		$catalogs = Catalog::get();
		$brands = Brand::get();
		$products = DB::table('products');

		if ($request->has('q')) {
			$keyword= $request->input('q');
			$products->where('name', 'like', '%' .$keyword. '%');
		}
		if ($request->has('b')) {
			$brand= $request->input('b');
			$products->where('brand_id', '=', $brand);
		}
		if ($request->has('c')) {
			$catalog= $request->input('c');
			$products->where('catalog_id', '=', $catalog);
		}
		$results = $products->paginate(12);
		return view('users.shop', compact('results', 'brands', 'catalogs'));
	}

	public function productDisplay(Request $request)
	{
		$catalogs = Catalog::get();
		$brands = Brand::get();
		$slug= $request->input('p');
		$results = Product::where('slug', '=', $slug)->first();
		$pbrand = Brand::find($results->brand_id);
		$results->brand_id = $pbrand->name;

		$colors =  DB::table('stocks')
            ->select('color_id')
            ->groupBy('color_id')
            ->get();

        foreach($colors as $c)
        {
        	$color = Color::find($c->color_id);
        	$c->name = $color->color_name;
        	$c->code = $color->hexa_code;
        }

    	$sizes =  DB::table('stocks')
            ->select('size_id')
            ->groupBy('size_id')
            ->get();

        foreach($sizes as $s)
        {
        	$size = Size::find($s->size_id);
        	$s->size = $size->size;
        }

		return view('users.product', compact('results', 'brands', 'catalogs', 'colors', 'sizes'));
	}

	public function productCheck(Request $request)
	{
		$stock = DB::table('stocks')->where('product_id', '=', $request->id);
		if ($request->color!=0) {
			$stock->where('color_id', '=', $request->color);
		}
		if ($request->size!=0) {
			$stock->where('size_id', '=', $request->size);
		}
		$stock = $stock->get();
		$total = 0;
		try
		{
			foreach($stock as $s)
			{
				$total = $total + $s->stock;
			}
		}
		catch(Exception $e)
		{
			$total = 0;
		}

		return $total;
	}

	public function getCart(Request $request)
	{
		$data = json_decode($request->data);
		foreach($data as $d){
			$product = Product::find((int)$d->product_id);
			$d->product_id = $product;
		}
		return $data;
	}

	public function doCheckOut(Request $request)
	{
		$order = new Order;
		$order->status = true;
		$order->user_id = $request->user_id;
		$order->buyer_name = $request->buyer_name;
		$order->buyer_email = $request->buyer_email;
		$order->buyer_phone = $request->buyer_phone;
		$order->buyer_address = $request->buyer_address;
		$order->buyer_message = $request->buyer_message;
		$order->amount = $request->buyer_amount;
		$order->payment_response_info = '';
		$order->security = '';
		$order->save();

		return redirect()->back();
		return $request;
	}
}