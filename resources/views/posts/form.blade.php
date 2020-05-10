@extends('layouts.master')

@isset($product)
    @section('title', 'Редактировать Пост ' ,$post->title)
@else
    @section('title', 'Создать пост')
@endisset

@section('content')

        @isset($post)
            <h1>Редактировать пост <b>{{ $post->title }}</b></h1>
        @else
            <h1>Добавить пост</h1>
        @endisset
        <form method="POST" enctype="multipart/form-data"
              @isset($post)
              action="{{ route('posts.update', $post) }}"
              @else
              action="{{ route('posts.store') }}"
            @endisset
        >
            <div class="form-post">
                @isset($post)
                    @method('PUT')
                @endisset
                @csrf

                @error('title')
                <div class=" alert alert-danger"> {{$message}} </div>
                @enderror
            <div class="input-group row">
                    <label for="title" class="col-sm-3 col-form-label">Заголовок: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" id="title"
                               value="@isset($post){{ $post->title }}@endisset">
                    </div>
                </div>

                <br>
                @error('description')
                <div class=" alert alert-danger"> {{$message}} </div>
                @enderror
                <div class="input-group row">
                    <label for="description" class="col-sm-3 col-form-label">Краткое описание: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="description" id="description"
                               value="@isset($post){{ $post->description }}@endisset">
                    </div>
                </div>
                <br>


                <br>
                <div class="input-group row">
                    <label for="image" class="col-sm-3 col-form-label">Картинка: </label>
                    <div class="col-sm-0">
                        <label class="btn btn-default btn-file text-center">
                            <label id="textFile" for="myFileUpload" >Открыть</label>
                            <input style="visibility: hidden; margin:0; padding: 0" id="myFileUpload" type="file" accept=".jpg, .jpeg, .png" name="image">
                            <script >
                                function changeName() {
                                    const imgFile = document.getElementById('myFileUpload').files[0];
                                    $("#textFile").text(imgFile.name);
                                };
                            </script>
                        </label>
                    </div>
                </div>
                <br>
                @error('text')
                <div class=" alert alert-danger"> {{$message}} </div>
                @enderror
                <div class="input-group row">
                    <label for="text" class="col-sm-3 col-form-label">Текст поста: </label>
                        <textarea type="text" class="form-control" name="text" id="text"
                                rows="5" cols="1"  value="">@isset($post){{ $post->text }}@endisset</textarea>
                </div>
                    <br>
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>

@endsection
