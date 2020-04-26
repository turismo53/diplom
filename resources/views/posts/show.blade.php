@extends('layouts.master')

@section('title', $post->title)

@section('content')
    <div class="col-md-12">
        <h1 class="post-title">{{ $post->title }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <td class="text-center"> <p class="post-text">{{ $post->text }}</p> </td>


            </tr>
            <tr>
                <td class="text-center"><img class="post-image" src="{{ Storage::url($post->image) }}"></td>
            </tr>
            </tbody>
        </table>
    </div>
    <a class="btn btn-success" type="button"
       href="{{ route('posts.index', $post) }}">Назад</a>
@endsection
