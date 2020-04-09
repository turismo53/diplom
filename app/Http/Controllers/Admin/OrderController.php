<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Order;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
public function index(){
    $user = Auth::user();
  //  dd([$user->name,$user->email,$user->password]);
    $orders = Order::where('done',1)->get();
    return view('auth.orders.index',compact('orders'));

}

    public function show(Order $order){

        return view('auth.orders.show',compact('order'));

    }

    public function edit(Order $order)
    {
        return view('auth.orders.form', compact('order'));
    }


    public function update(Request $request, Order $order)
    {
        $params = $request->status;
        $order->saveStatus($params);
        return view('auth.orders.show',compact('order'));
    }

}
