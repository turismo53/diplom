@extends('layouts/master')

@section('title','Категория ' .$category->name )

@section('content') 
    <div class="starter-template">


  

 <h2>{{$category->name}}</h2>
    <p>
        В этом разделе вы найдёте самые популярные мобильные телефонамы по отличным ценам!
    </p>
    <div class="row">
    @foreach($category -> products as $product)

@include('card', compact('product'))

@endforeach
            </div>
    </div>

@endsection