<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use Illuminate\Support\Facades\Auth;


class BasketController extends Controller
{
    public function basket(){

        $orderId = session('orderId');
        if(!is_null($orderId)){
            $order = Order::findOrFail($orderId);
        }
        return view('basket',compact('order'));
    }

    public function basketPlace(){

        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect()->route('index');
        }
        else {
            $order = Order::find($orderId);
        //    dd($order);
        if(Auth::check()){
            return view('order',compact('order'));
        }
        else
        return view('orderGuest',compact('order'));
        }

    }

    public function basketConfirm( Request $request){

        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect()->route('index');
        }
        $order=Order::find($orderId);
       $success=$order->saveOrder($request->name, $request->phone);
       if( $success){
        session()->flash('success','Ваш заказ успешно добавлен в очередь');
       }else{
        session()->flash('warning','Что-то пошло не так');
       }
        return redirect()->route('index');
    }

    public function basketAdd($productId){
        $orderId = session('orderId');
        if(is_null($orderId)){
            $order= Order::create();
            session(['orderId'=>$order->id]);
        }
        else{
            $order=Order::find($orderId);
        }


        if(Auth::check()){
            $order->user_id = Auth::id();
            $order->save();
        }


        $success=$order->products()->attach($productId);
        $product=Product::find($productId);
        session()->flash('success', $product->name . ' успешно добавлен');

        return redirect()->route('basket');

    }

    public function basketRemove($productId){
        $orderId = session('orderId');
        if(is_null($orderId)){
            return view('basket',compact('order'));
        }
        $order=Order::find($orderId);
        $order->products()->detach($productId);
        $product=Product::find($productId);
        session()->flash('warning', $product->name . ' успешно удален из заказа');

        if ($order->products->count() == 0) {
            session()->flash('warning', 'Ваша корзина пуста!');
            return redirect()->route('index');
        }
        return view('basket',compact('order'));



    }
}
