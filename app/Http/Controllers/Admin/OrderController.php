<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Individual_order;
use App\Money;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Order;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
public function index(){

    $orders = Order::where('done',1)->paginate(5);
    return view('auth.orders.index',compact('orders'));
}


    public function indexInd(){

        $orders_i = Individual_order::paginate(5);
        return view('auth.orders.indexInd',compact('orders_i'));

    }

    public function show(Order $order){

        return view('auth.orders.show',compact('order'));

    }

    public function showind(Individual_order $order_i){

        return view('auth.orders.show_i',compact('order_i'));

    }

    public function edit(Order $order)
    {
        return view('auth.orders.form', compact('order'));
    }


    public function update(Request $request, Order $order)
    {
        $order->saveNewInfo($request->status, $request->individual_price);
        return redirect()->route('orders.show',$order);
    }

    public function update_i(Request $request,  $order)
    {
        $order_i = Individual_order::where('id',$order)->first();
        $order_i->saveNewInfo($request->status, $request->individual_price);
        return redirect()->route('orders.show_i',$order_i);
    }

}
