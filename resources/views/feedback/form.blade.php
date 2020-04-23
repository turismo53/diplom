@extends('auth.layouts.master')

@isset($product)
    @section('title', 'Редактировать товар ' . $product->name)
@else
    @section('title', 'Создать товар')
@endisset

@section('content')
    <div class="col-md-12">

            <h1>Добавить Отзыв</h1>

        <form method="POST" enctype="multipart/form-data"  action="{{ route('feedback.store') }}">
            @error('text')
        <div class=" alert alert-danger"> {{$message}} </div>
        @enderror
                <div class="input-group row">
                    <label for="text" class="col-sm-2 col-form-label">Текст отзыва: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="text" id="text"
                               value="">
                    </div>
                </div>
                <br>
@csrf

                <button class="btn btn-success">Сохранить</button>

        </form>
    </div>
@endsection
