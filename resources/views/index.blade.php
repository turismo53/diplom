
@extends('layouts/master')

@section('title','Главная')

@section('content')





    <div class="slider">


        @foreach($products as $product)

            @include('card', compact('product'))

        @endforeach

    </div>



@endsection

