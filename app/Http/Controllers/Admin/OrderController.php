<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Order;

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

}
