@extends('layouts/master')

@section('title', 'Товар' )

@section('content')

    <h1> {{ $tovar->name}}</h1>
    <h2>{{$tovar->category->name}}</h2>
    <p>Цена: <b>{{$tovar->price}}p.</b></p>
    <img class="adaptive-product-image" src="{{ Storage::url($tovar->image) }}" style="max-width: 600px">
    <br>
    <br>
     <form action="{{ route('basket-add',$tovar->id) }}" method="POST">
         <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>

           @csrf
     </form>  <br>

@endsection
