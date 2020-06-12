<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Http\Requests\GuestOrderRequest;
use App\Http\Requests\IndividualOrderRequest;
use App\Individual_order;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index(){
        $user = Auth::user();
        $orders = Order::where('done',1)->where('user_id',$user->id)->paginate(5);
        $orders_i = Individual_order::where('user_id',$user->id)->paginate(5);
        return view('auth.orders.index',compact('orders'));

    }

    public function indexInd(){
        $user = Auth::user();
        $orders_i = Individual_order::where('user_id',$user->id)->paginate(5);
        return view('auth.orders.indexInd',compact('orders_i'));

    }


    public function show(Order $order){

        return view('auth.orders.show',compact('order'));

    }

    public function showInd(Individual_order $order_i){

        return view('auth.orders.show_i',compact('order_i'));

    }

    public function authIndividualOrder(Request $request){

        $order= Individual_order::create();
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            $params['image'] = $request->file('image')->store('orders');
        }
        $order->saveOrder($params['image']);
        session()->flash('success','Ваш заказ успешно добавлен в очередь');
        return redirect()->route('index');
    }

    public function individualOrder(GuestOrderRequest $data){
        $data->validate([
            'image' => 'required'
        ]);
        (new MailController)->customReg($data);
        (new OrderController)->authIndividualOrder($data);
        return redirect()->route('index');
    }

    public function individualOrderForm(){
        return view('order.individual_form');
    }


}
