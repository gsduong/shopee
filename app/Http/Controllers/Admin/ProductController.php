<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{
    protected $rules = [
        'name' => 'required|unique:products,name',
        'sku' => 'required|unique:products,sku',
        'image' => 'required|mimes:jpeg,bmp,png',
        'sale_price' => 'required|min:1',
        'regular_price' => 'required|greater_than_field:sale_price',
    ];

    public function index(){
        $products = \App\Product::orderBy('name', 'asc')->paginate(20);

        $deleted_products = \App\Product::onlyTrashed()->orderBy('deleted_at', 'asc')->get();
        return view('admin.product', ['products' => $products, 'deleted_products' => $deleted_products]);
    }

    public function showFormCreate(){
        $colors = \App\Color::orderBy('color_name', 'asc')->get();
        $categories = \App\Catalog::orderBy('name', 'asc')->get();
        $brands = \App\Brand::orderBy('name', 'asc')->get();
        $sizes = \App\Size::all();
        return view('admin.add-product', ['colors' => $colors, 'categories' => $categories, 'brands' => $brands, 'sizes' => $sizes]);
    }

    public function showFormEdit($id){
        return view('admin.edit-product');
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

        return redirect('/admin/dashboard/product.html');
    }

    public function update(Request $request){

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
}
