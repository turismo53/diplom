@extends('layouts/master')

@section('title','Корзина' )

@section('content')






                            <h1>@lang('basket.basket')</h1>
    <p>@lang('basket.order')</p>
    <div class="panel">
       @foreach($order->products as $product)

        <a href="{{ route('product', [$product->category->code, $product->code]) }}">{{$product->name}}</a>  {{$product->pivot->count}} {{$product->getTotalPrice()}}

        <form action="{{ route('basket-remove',[$product] )}}" method="post">
        <button type="submit">@lang('basket.delete')</button>
        @csrf
        </form>
        <br/>
       @endforeach

       <form action="{{ route('basket-place')}}" method="get">
        <button type="submit">@lang('basket.checkout')</button>
       </form>
    </div>



@endsection
