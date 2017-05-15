<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(){
        $recent_products = \App\Product::orderBy('created_at', 'asc')->take(4)->get();
        $user_count = \App\User::all()->count();
        $product_count = \App\Product::all()->count();
        $on_sale_products_count = \App\Product::where('discount', '>', '0')->count();
        $order_count = \App\Order::all()->count();
        $recent_orders = \App\Order::orderBy('id', 'asc')->take(7)->get();
        return view('admin.dashboard', ['recent_orders' => $recent_orders, 'order_count' => $order_count, 'recent_products' => $recent_products, 'user_count' => $user_count, 'on_sale_products_count' => $on_sale_products_count, 'product_count' => $product_count]);
    }

    public function showFormLogin(){
        if (Session::has('admin')) {
            return redirect('/admin/dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request){
        $username = $request->get('username');
        $password = $request->get('password');
        $admin = \App\Admin::where('username', '=', $username)->first();

        if (!is_null($admin)) {
            if (Hash::check($password, $admin->password)) {
                Session::put('admin', $admin);
                return redirect('/admin/dashboard');
            }
        }

        $errors = [
            'error' => 'Username or password is incorrect'
        ];
        return redirect('/admin/login')->with('errors', $errors);
    }

    public function logout(){
        if (!Session::has('admin')) return view('admin.login');
        Session::forget('admin');
        return redirect('/admin/login');
    }

}
