<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Http\Requests\GuestOrderRequest;
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

    public function authIndividualOrder(Request $request){
        $request->validate([
            'image'=>'required'
        ]);
        $order= Order::create();
        session(['orderId'=>$order->id]);
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            $params['image'] = $request->file('image')->store('orders');
        }
        $order->saveOrder($params['image']);
        return redirect()->route('index');
    }

    public function individualOrder(GuestOrderRequest $data){
        (new MailController)->customReg($data);
        (new OrderController)->authIndividualOrder($data);
        return redirect()->route('index');
    }

    public function individualOrderForm(){
        return view('order.individual_form');
    }


}
