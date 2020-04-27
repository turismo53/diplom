@extends('layouts/master')

@section('title','Категория ' .$category->name )

@section('content')





 <h2>{{$category->name}}</h2>

    <div class="slider">
    @foreach($category -> products as $product)

        @include('card', compact('product'))

        @endforeach
    </div>


@endsection
