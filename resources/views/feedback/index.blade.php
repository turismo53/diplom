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
                       value="" rows="10"  placeholder="Введите текст отзыва"></textarea>
            </div>

        <br>
        @csrf

        <button class="btn btn-success">Сохранить</button>

    </form>

<br>
    @endcompletedOrder

@foreach($feedbacks as $feedback)




    <div class="thumbnail row">

     <div class="col-6" style=" word-wrap: break-word;">    <b> {{$feedback->user->name}}:</b> {{$feedback->text}}
     <br>
         <i class="float-left pl-4 pt-2" style="font-size: 12px">
             Дата публикации:
             {{$feedback->created_at}}
         </i>
     </div>
        <br>
    </div>


    @endforeach

@endsection
