@extends('layouts/master')

@section('title','Все категории' )

@section('content')

    <div class="starter-template">

    @foreach($categories as $category)

    <div class="panel">
            <a href="{{route('category', $category->code) }}">

              <h3>  <img class="category-image" src="{{ Storage::url($category->image) }}">
                  <br>
                  {{$category->name}}
              </h3>
            </a>

        </div>
    @endforeach

    </div>

@endsection
