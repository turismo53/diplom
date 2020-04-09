<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index(){
        $user = Auth::user();
        $orders = Order::where('done',1)->where('user_id',$user->id)->get();
        return view('auth.orders.index',compact('orders'));

    }

    public function show(Order $order){

        return view('auth.orders.show',compact('order'));

    }


}
