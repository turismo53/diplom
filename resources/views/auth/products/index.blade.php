@extends('auth.layouts.master')

@section('title', 'Товары')

@section('content')

    <div class="col-md-12">
        <div id="main" >
        <h1>Товары</h1>
        <table class="table">
            <tbody>
            <tr>
                <th class="adaptive-admin-menu">
                    #
                </th>
                <th class="adaptive-admin-menu">
                    Код
                </th>
                <th>
                    Название
                </th>
                <th class="adaptive-admin-menu">
                    Категория
                </th>
                <th>
                    Цена
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td class="adaptive-admin-menu">{{ $product->id}}</td>
                    <td class="adaptive-admin-menu">{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    <td class="adaptive-admin-menu">{{ $product->category->name }}</td>
                    <td>{{round($product->price(),2)}}{{$product->symbol()}}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                <a class="btn btn-success" type="button"
                                   href="{{ route('products.show', $product) }}">Открыть</a>
                                <a class="btn btn-warning" type="button"
                                   href="{{ route('products.edit', $product) }}">Изменить</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>
        {{$products->links()}}
        <a class="btn btn-success" type="button" href="{{ route('products.create') }}">Добавить товар</a>
    </div>
    </div>
@endsection
