@extends('layouts/master')

@section('title','Блог')

@section('content')


        @admin
        <a class="btn btn-success col-2 float-left" type="button" href="{{ route('posts.create') }}">Создать новый пост</a>
        @endadmin

        <br>
        @foreach($posts as $post)
            <div class="post">
            <p>{{$post->title}}</p>
            <br>
            <p>{{$post->description}}</p>
            <br>
            @admin
            <div class="btn-group" role="group">
                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    <a class="btn btn-success" type="button"
                       href="{{ route('posts.show', $post) }}">Открыть</a>
                    <a class="btn btn-warning" type="button"
                       href="{{ route('posts.edit', $post) }}">Редактировать</a>
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger" type="submit" value="Удалить"></form>
            </div>
            @endadmin
            </div>
        @endforeach



<br>

@endsection
