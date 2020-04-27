@extends('auth.layouts.master')

@isset($category)
    @section('title', 'Редактировать категорию ' . $category->name)
@else
    @section('title', 'Создать категорию')
@endisset

@section('content')
    <div class="col-md-12">
        <div id="main">
        @isset($category)
            <h1>Редактировать Категорию <b>{{ $category->name }}</b></h1>
        @else
            <h1>Добавить Категорию</h1>
        @endisset


        @error('code')
        <div class=" alert alert-danger"> {{$message}} </div>
        @enderror

        <form method="POST" enctype="multipart/form-data"
              @isset($category)
              action="{{ route('categories.update', $category) }}"
              @else
              action="{{ route('categories.store') }}"
            @endisset
        >
            <div>
                @isset($category)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Код: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="code" id="code"
                               value="{{old('code', isset($category) ? $category->code : null )}}">
                    </div>
                </div>
                <br>
                @error('name')
        <div class=" alert alert-danger"> {{$message}} </div>
        @enderror
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" id="name"
                               value="{{old('name',isset($category)? $category->name :null)}}">
                    </div>
                </div>
                <br>

                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file" >
                            <label  id="textFile"style="cursor: pointer" for="myFileUpload" >Открыть</label>
                            <input style="visibility: hidden; margin:0; padding: 0" id="myFileUpload" type="file" accept=".jpg, .jpeg, .png" name="image">
                            <script >
                                function changeName() {
                                    console.log("sex");
                                    const imgFile = document.getElementById('myFileUpload').files[0];
                                    $("#textFile").text(imgFile.name);
                                };
                            </script>
                        </label>

                    </div>
                </div>
                    <br>
                    <button type="submit" class="btn btn-primary submit"  onclick="hide()">
                    Сохранить
                    </button>
                    <label for="submit" class="submit-label" style="display: none; color: black;"> Обработка...</label>
                    <script>
                        function hide() {
                            $(".submit").css("display","none");
                            $(".submit-label").css("display","block");
                        }
                    </script>
            </div>
        </form>
    </div>
    </div>
@endsection
