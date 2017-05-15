<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    public function shop()
    {
        return view('users.shop');
    }

    public function product()
    {
        return view('users.product');
    }

    public function userlogin()
    {
        return view('users.login');
    }

    public function cart()
    {
        return view('users.cart');
    }

    public function checkout()
    {
        return view('users.checkout');
    }

    public function blog()
    {
        return view('users.blog');
    }

    public function single()
    {
        return view('users.single');
    }
    public function thank()
    {
        return view('users.thank');
    }
    public function contact()
    {
        return view('users.contact');
    }
}
