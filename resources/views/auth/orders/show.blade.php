@extends('auth.layouts.master')

@section('title', 'Заказ ' . $order->id)

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                <div class="panel">
                    <h1>Заказ №{{ $order->id }}</h1>
                    <p>Заказчик: <b>{{ $order->name }}</b></p>
                    <p>Номер теелфона: <b>{{ $order->phomne }}</b></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Название</th>

                            <th>Цена</th>

                        </thead>
                        <tbody>
                        @foreach ($order->products as $product)
                            <tr>
                                <td>
                                    <a href="{{ route('product', $product) }}">
                                        <img height="56px"
                                             src="{{ Storage::url($product->image) }}">
                                        {{ $product->name }}
                                    </a>
                                </td>

                                <td>{{ $product->price }} руб.</td>

                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="1">Общая стоимость:</td>
                            <td>{{ $order->getFullPrice() }} руб.</td>
                        </tr>
                        <tr>
                            <td colspan="1">Состояние заказа</td>
                            <td>{{ $order->status }}.</td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>

    @admin
    <form method="POST" enctype="multipart/form-data"  action="{{ route('order.update', $order) }}">
        @method('PUT')
        @csrf
        <div class="input-group row">
            <label for="category_id" class="col-sm-2 col-form-label">Статус </label>
            <div class="col-sm-6">
                <select name="status" id="category_id" class="form-control">
                    <option value="Ждет оплаты"> Ждет Оплаты  </option>
                    <option value="Готов к отправке"> Готов к отправке </option>
                    <option value="Отправлен"> Отправлен </option>
                </select>
            </div>
        </div>
        <button class="btn btn-success">Сохранить</button>
    </form>
    @endadmin
@endsection
