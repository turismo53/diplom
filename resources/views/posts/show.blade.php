@extends('layouts.master')

@section('title', $post->title)

@section('content')
    <div class="col-md-12">
        <h1>{{ $post->title }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <td>{{ $post->text }}</td>

                <td><img src="{{ Storage::url($post->image) }}"></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
