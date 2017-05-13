<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index(){
        $brands = DB::table('brands')->orderBy('name', 'asc')->paginate(15);
        return view('admin.brand', ['brands' => $brands]);
    }

    public function delete($id){
        \App\Brand::find($id)->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
}
