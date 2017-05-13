<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function showFormLogin(){
        if (Session::has('admin')) {
            return view('admin.dashboard');
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
                if (view()->exists('admin.dashboard')) return view('admin.dashboard', ['admin' => $admin]);
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
        return view('admin.login');
    }

}
