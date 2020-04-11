@extends('auth.layouts.master')

@section('title', 'Заказ ' . $order->id)

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                <div class="panel">
                    <h1>Заказ №{{ $order->id }}</h1>
                    <p>Заказчик: <b>{{ $order->name }}</b></p>
                    <p>Номер теелфона: <b>{{ $order->phone }}</b></p>
                    <p>Улица: <b>{{ $order->adres }}</b></p>
                    @if($order->image==null)
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
                                    <a href="{{ route('product',[$product->category->code, $product->code] ) }}">
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


    @else
        <img height="300px"
             src="{{ Storage::url($order->image) }}">
        <br>
        <p>Цена:  @if($order->individual_price==null) В обработке @else {{$order->individual_price}} @endif</p>



        @endif

    @admin
    <form method="POST" action="{{ route('order.update', $order) }}">
        @method('PUT')
        @csrf
        <div class="input-group row">
            <label for="status" class="col-sm-2 col-form-label">Статус </label>
            <div class="col-sm-6">
                <select name="status" id="status" class="form-control" >
                    <option @if($order->status=='Ждет оплаты') selected="selected" @endif value="Ждет оплаты"> Ждет Оплаты  </option>
                    <option @if($order->status=='Готов к отправке') selected="selected" @endif value="Готов к отправке"> Готов к отправке </option>
                    <option @if($order->status=='Отправлен') selected="selected" @endif value="Отправлен"> Отправлен </option>
                </select>
            </div>
            <button class="btn btn-success">Сохранить</button>

            <br>
        @if($order->individual_price==null&&$order->image!=null)
            <br>
        <label for="individual_price" class="col-sm-2 col-form-label">Установить цену на портрет </label>
        <div class="col-sm-6">
            <input type="number" name="individual_price" id="individual_price" class="form-control" value="{{$order->individual_price}}">

        </div>
        <button class="btn btn-success">Сохранить</button>
        @endif
        </div>

    </form>
    @endadmin
@endsection
