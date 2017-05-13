<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    protected $rules = [
        'name' => 'required|unique:brands,name,'
    ];

    public function index(){
        $brands = DB::table('brands')->orderBy('name', 'asc')->paginate(10);
        return view('admin.brand', ['brands' => $brands]);
    }

    public function delete($id){
        \App\Brand::find($id)->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }

    public function update(Request $request){
        $id = $request->id;
        $name = $request->name;

        $this->rules['name'] = $this->rules['name'] . $id;

        $validator = Validator::make(Input::all(), $this->rules);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Name already used!');
        }

        $brand = \App\Brand::findOrFail($id);
        $brand->name = $name;
        $brand->save();

        return redirect()->back()->with('success', 'Record updated successfully!');
    }

    public function create(Request $request){
        $name_to_add = $request->name_to_add;

        if (\App\Brand::where('name', '=', $name_to_add)->exists()) {
            return redirect()->back()->with('error', 'Name already used!');
        }

        $brand = new \App\Brand(['name' => $name_to_add]);
        $brand->save();
        return redirect()->back()->with('success', 'New brand created successfully!');
    }
}
