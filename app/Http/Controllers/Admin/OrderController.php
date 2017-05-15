<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){
        $pending_orders = \App\Order::where('status', '=', 0)->orderBy('created_at', 'asc')->get();
        $shipping_orders = \App\Order::where('status', '=', 1)->orderBy('created_at', 'asc')->get();
        $cancelled_orders = \App\Order::where('status', '=', -1)->orderBy('created_at', 'asc')->get();
        $shipped_orders = \App\Order::where('status', '=', 2)->orderBy('created_at', 'asc')->get();

        return view('admin.order', ['pending_orders' => $pending_orders, 'shipping_orders' => $shipping_orders, 'cancelled_orders' => $cancelled_orders, 'shipped_orders' => $shipped_orders]);
    }

    public function showFormEdit($id){
        $order = \App\Order::findOrFail($id);
        return view('admin.edit-order', ['order' => $order]);
    }

    public function update(Request $request){

        $order = \App\Order::findOrFail($request->id);
        $order->status = $request->status;

        $order->save();

        return redirect('admin/dashboard/order.html')->with('success', 'Successfully updated!');
    }
}
