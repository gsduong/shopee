<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    protected $rules = [
        'name' => 'required|unique:products,name',
        'sku' => 'unique:products,sku',
        'image' => 'mimes:jpeg,bmp,png',
        'sale_price' => 'required|min:1',
        'regular_price' => 'required|greater_than_field:sale_price',
    ];

    public function index(){
        $categories = \App\Catalog::all()->pluck('name', 'id')->all();
        array_unshift($categories, 'All');
//        dd($categories);
        $deleted_products = \App\Product::onlyTrashed()->orderBy('deleted_at', 'asc')->get();

        $products = \App\Product::orderBy('name', 'asc')->paginate(20);

        if (Input::has('category_id') && Input::get('category_id') == 0) {
            // Look for all category
            if (Input::has('search') && Input::get('search') != '') {
                $keyword = preg_replace('/\s\s+/', ' ', trim(Input::get('search')));
                $products = \App\Product::where('name', 'like', '%'. $keyword . '%')->orWhere('sku', 'like', '%' . $keyword . '%')->orderBy('name', 'asc')->paginate(20);
            } else {
                // no search by key, but search by all category
                $products = \App\Product::orderBy('name', 'asc')->paginate(20);
            }
        } elseif (Input::has('category_id') && Input::get('category_id') != 0) {
            $id = Input::get('category_id');
            $category_id_aray = array();
            array_push($category_id_aray, $id);
            $category = \App\Catalog::findOrFail($id);

            if ($category->children) {
                // get child category
                foreach ($category->children as $children) {
                    array_push($category_id_aray, $children->id);
                }
            }

            if (Input::has('search') && Input::get('search') != '') {
                $keyword = preg_replace('/\s\s+/', ' ', trim(Input::get('search')));
                $products = \App\Product::whereIn('catalog_id', $category_id_aray)->where('name', 'like', '%'. $keyword . '%')->orWhere('sku', 'like', '%' . $keyword . '%')->orderBy('name', 'asc')->paginate(20);
            } else {
                // no search by key, but search by all category
                $products = \App\Product::whereIn('catalog_id', $category_id_aray)->orderBy('name', 'asc')->paginate(20);
            }
        }

        return view('admin.product', ['products' => $products, 'deleted_products' => $deleted_products, 'categories' => $categories]);
    }

    public function showFormCreate(){
        $colors = \App\Color::orderBy('color_name', 'asc')->get();
        $categories = \App\Catalog::orderBy('name', 'asc')->get();
        $brands = \App\Brand::orderBy('name', 'asc')->get();
        $sizes = \App\Size::all();
        return view('admin.add-product', ['colors' => $colors, 'categories' => $categories, 'brands' => $brands, 'sizes' => $sizes]);
    }

    public function showFormEdit($id){
        $product = \App\Product::findOrFail($id);
        $colors = \App\Color::orderBy('color_name', 'asc')->get();
        $categories = \App\Catalog::orderBy('name', 'asc')->get();
        $brands = \App\Brand::orderBy('name', 'asc')->get();
        $sizes = \App\Size::all();
        $sizeArray = \App\Stock::getSizeArray($id);
        $colorArray = \App\Stock::getColorArray($id);
        $stockArray = \App\Stock::getStockArray($id);

        return view('admin.edit-product', ['colors' => $colors, 'categories' => $categories, 'brands' => $brands, 'sizes' => $sizes, 'product' => $product, 'sizeArray' => $sizeArray, 'colorArray' => $colorArray, 'stockArray' => $stockArray]);
    }

    public function create(Request $request){
        $this->validate($request, $this->rules);

        $data = [
            'name' => preg_replace('/\s\s+/', ' ', trim($request->name)),
            'sku' => $request->sku,
            'sale_price' => $request->sale_price,
            'regular_price' => $request->regular_price,
            'catalog_id' => $request->catalog_id,
            'brand_id' => $request->brand_id,
            'made_in' => $request->made_in,
            'material' => $request->material,
            'product_description' => $request->product_description,
            'discount' => floor((( (float)( $request->regular_price - $request->sale_price ) / $request->regular_price) * 100))
        ];

        $product = new \App\Product($data);
        try {
            $product->save();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }


        /* Handle image upload */
        $imageName = $product->id . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(base_path() . '/public/images/', $imageName);
        $imageLink = url('/') . '/images/' . $imageName;

        $images = array();
        array_push($images, $imageLink);

        $product->image_link = $imageLink;
        $product->image_catalog = json_encode($images);
        $product->save();


        /* Handle stock */

        $size_ids = $request->sizes;
        $color_ids = $request->colors;
        $qty = $request->qty;

        $n = count($size_ids);
        for ($i = 0; $i < $n; $i++) {
            if ($qty[$i]) \App\Stock::createOrUpdate($product->id, $size_ids[$i], $color_ids[$i], $qty[$i]);
        }

        return redirect('/admin/product/edit/' . $product->id)->with('success', 'Successfully created!');
    }

    public function update(Request $request){
        $this->rules['name'] = $this->rules['name'] . ',' . $request->id;
        $this->rules['sku'] = $this->rules['sku'] . ',' . $request->id;
        $this->validate($request, $this->rules);

        $product = \App\Product::findOrFail($request->id);

        $data = [
            'name' => preg_replace('/\s\s+/', ' ', trim($request->name)),
            'sku' => $request->sku,
            'sale_price' => $request->sale_price,
            'regular_price' => $request->regular_price,
            'catalog_id' => $request->catalog_id,
            'brand_id' => $request->brand_id,
            'made_in' => $request->made_in,
            'material' => $request->material,
            'product_description' => $request->product_description,
            'discount' => floor((( (float)( $request->regular_price - $request->sale_price ) / $request->regular_price) * 100))
        ];


        try {
            $product->name = preg_replace('/\s\s+/', ' ', trim($request->name));
            $product->sku = $request->sku;
            $product->sale_price = $request->sale_price;
            $product->regular_price = $request->regular_price;
            $product->catalog_id = $request->catalog_id;
            $product->brand_id = $request->brand_id;
            $product->made_in = $request->made_in;
            $product->material = $request->material;
            $product->product_description = $request->product_description;
            $product->discount = floor((( (float)( $request->regular_price - $request->sale_price ) / $request->regular_price) * 100));
            $product->save();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        /* Handle image request */
        if ($request->file('image')){
            $imageName = $product->id . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(base_path() . '/public/images/', $imageName);
            $imageLink = url('/') . '/images/' . $imageName;

            $images = array();
            array_push($images, $imageLink);

            $product->image_link = $imageLink;
            $product->image_catalog = json_encode($images);
            $product->save();
        }

        /* Delete old records */
        \App\Stock::where('product_id', '=', $product->id)->delete();

        /* Handle stock */

        $size_ids = $request->sizes;
        $color_ids = $request->colors;
        $qty = $request->qty;

        $n = count($size_ids);
        for ($i = 0; $i < $n; $i++) {
            if ($qty[$i]) \App\Stock::createOrUpdate($product->id, $size_ids[$i], $color_ids[$i], $qty[$i]);
        }

        return redirect()->back()->with('success', 'Successfully updated!');
    }

    public function delete($id){
        \App\Product::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function restore($id){
        $product = \App\Product::onlyTrashed()->where('id', $id)->first();
        if ($product) {
            $product->restore();
        }
        return redirect()->back()->with('success', 'Successfully restored!');
    }

    public function search(){
    }
}
