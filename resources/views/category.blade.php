@extends('layouts/master')

@section('title','Категория ' .$category->name )

@section('content')
    <div class="starter-template">




 <h2>{{$category->name}}</h2>
        <div id="main">
    <div class="slider">
    @foreach($category -> products as $product)

@include('card', compact('product'))

@endforeach
            </div>
    </div>

@endsection
