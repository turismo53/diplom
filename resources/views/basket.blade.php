@extends('layouts/master')

@section('title','Корзина' )

@section('content') 

                    
                    
                 
                    
                    
                            <h1>Корзина</h1>
    <p>Оформление заказа</p>
    <div class="panel">
       @foreach($order->products as $product)
   
        <a href="{{ route('product', [$product->category->code, $product->code]) }}">     {{$product->name}}</a>
        <form action="{{ route('basket-remove',[$product] )}}" method="post">
        <button type="submit">удалить</button>
        @csrf
        </form>
        <br/>
       @endforeach

       <form action="{{ route('basket-place')}}" method="get">
        <button type="submit">оформить</button>
    </div>

 

@endsection