<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CatalogController extends Controller
{
    protected $rules = [
        'name' => 'required|unique:catalogs,name,'
    ];

    public function index($id){
        $catalog = \App\Catalog::findOrFail($id);
        return view('admin.catalog', ['catalog' => $catalog]);
    }

    public function delete($id){
        \App\Catalog::findOrFail($id)->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }

    public function create(Request $request){
        $name = preg_replace('/\s\s+/', ' ', trim($request->name_to_add));
        $parent_id = $request->parent_id;

        $category = \App\Catalog::where('name', '=', $name)->first();
        if ($category) {
            return redirect()->back()->with('error', "Category already existed!");
        }

        $category = new \App\Catalog(['name' => $name, 'parent_id' => $parent_id]);
        $category->save();

        return redirect()->back()->with('success', "Category successfully created!");
    }

    public function update(Request $request){
        $id = $request->id;
        $name = preg_replace('/\s\s+/', ' ', trim($request->name));

        $this->rules['name'] = $this->rules['name'] . $id;

        $validator = Validator::make(Input::all(), $this->rules);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Name already used!');
        }

        $brand = \App\Catalog::findOrFail($id);
        $brand->name = $name;
        $brand->save();

        return redirect()->back()->with('success', 'Record updated successfully!');
    }
}
