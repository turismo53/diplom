@extends('layouts/master')

@section('title','Главная')

@section('content')

    @completedOrder


    <form method="POST" enctype="multipart/form-data"  action="{{ route('feedback.store') }}">
        @error('text')
        <div class=" alert alert-danger"> {{$message}} </div>
        @enderror

            <label for="text">Текст отзыва: </label>
            <div class="">
                <textarea type="text" class="form-control w-100" name="text" id="text"
                       value="" rows="10" maxlength="149" placeholder="max 149symbols"></textarea>
            </div>

        <br>
        @csrf

        <button class="btn btn-success">Сохранить</button>

    </form>

<br>
    @endcompletedOrder

@foreach($feedbacks as $feedback)

    <div class="thumbnail">
    <br>
    <p>{{$feedback->user->name}}:{{$feedback->text}}</p>
    <br>
    </div>
    @endforeach

@endsection
