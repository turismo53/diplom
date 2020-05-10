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
       $success=$order->saveOrder($request['name'],$request['phone'],$request['city'],$request['image']);
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

        //dd($order);
        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }


        $product=Product::find($productId);
        session()->flash('success',  $product->name. __('flash.add_product') );

        return redirect()->route('basket');

    }

    public function basketRemove($productId){
        $orderId = session('orderId');
        if(is_null($orderId)){
            return view('basket',compact('order'));
        }
        $order=Order::find($orderId);

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotRow->count < 2) {
                $order->products()->detach($productId);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }
        $product=Product::find($productId);

        session()->flash('warning', $product->name . __('flash.delete_product'));






        if ($order->products->count() == 0) {
            session()->flash('warning', __('flash.empty_basket'));
            return redirect()->route('index');
        }
        return redirect()->route('basket');

    }
}
