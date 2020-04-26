@extends('auth.layouts.master')

@section('title', 'Категории')

@section('content')
    <div id="main" class="categories-admin">
    <div class="col-md-12">
        <h1>Категории</h1>
        <table class="table">
            <tbody>
            <tr>
                <th  class="adaptive-admin-menu">
                    #
                </th>
                <th>
                    Код
                </th>
                <th>
                    Название
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td class="adaptive-admin-menu" >{{ $category->id }}</td>
                    <td>{{ $category->code }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                <a class="btn btn-success" type="button" href="{{ route('categories.show', $category) }}">Открыть</a>
                                <a class="btn btn-warning" type="button" href="{{ route('categories.edit', $category) }}">Изменить</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-success" type="button"
           href="{{ route('categories.create') }}">Добавить категорию</a>

    </div>
    <br>
    </div>
@endsection
