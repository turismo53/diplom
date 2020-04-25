@extends('layouts/master')

@section('title','Все категории' )

@section('content')

    <div class="starter-template">

    @foreach($categories as $category)

    <div class="panel">
            <a href="{{route('category', $category->code) }}">
                <img class="category-image" src="{{ Storage::url($category->image) }}">{{$category->name}}

            </a>

        </div>
    @endforeach

    </div>

@endsection
