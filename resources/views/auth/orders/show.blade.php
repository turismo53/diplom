@extends('auth.layouts.master')

@section('title', 'Заказ ' . $order->id)

@section('content')
    <div class="py-4">
        <div class="container ">
            <div class="justify-content-center">

<div id="main" class="order">

                <div class="panel">
                    <h1>Заказ №{{ $order->id }}</h1>
                    <p>Заказчик: <b>{{ $order->name }}</b></p>
                    <p>Номер телефона: <b>{{ $order->phone }}</b></p>
                    <p>Улица: <b>{{ $order->user->street }}</b></p>
                    <p>Город: <b>{{ $order->user->city }}</b></p>
                    <p>Почтовый индекс: <b>{{ $order->user->mail_index }}</b></p>

                    @if($order->image==null)
                    <table class="table table-striped">

                        <thead>
                        <tr>
                            <th>Название</th>

                            <th>Цена</th>
                            <th>Кол-во</th>

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

                                <td>{{round($product->price(),2) }}{{$product->symbol()}}</td>
                                <td>{{$product->pivot->count}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2">Общая стоимость:</td>
                            <td>{{ round($order->getFullPrice(),2) }}{{$order->symbol()}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">Состояние заказа:</td>
                            <td>{{ $order->status }}.</td>
                        </tr>
                        @if($order->status=='Ожидается оплата')
                            @if(Auth::User()->is_admin==false)
                        <tr>
                            <td colspan="2">Текст оплаты:</td>
                            <td>Оплачиваю заказ номер {{$order->id}}.</td>
                        </tr>
                        <tr>
                            <td colspan="2">Счет для перевода:</td>
                            <td>R1234567890</td>
                        </tr>
                            @endif
                            @endif
                        </tbody>
                    </table>
                    <br>
                </div>




    @else
        <img height="300px" src="{{ Storage::url($order->image) }}">
        <br>
        <p>Цена:  @if($order->individual_price==null) В обработке @else {{round($order->individual_price(),2)}}{{$order->symbol()}} @endif</p>
        <p>Состояние заказа: {{ $order->status }} </p>
        @if($order->status=='Ожидается оплата')
        @if($order->individual_price!=null)
            @if(Auth::User()->is_admin==false)
                <p>Текст оплаты: Оплачиваю заказ номер {{ $order->id }}. </p>
                <p>Номер перевода: R123456789 </p>
            @endif
            @endif
        @endif

    @endif
            @admin
            <form method="POST" action="{{ route('order.update', $order) }}">
                @method('PUT')
                @csrf
                <label for="status" class="col-sm-6 col-form-label">Статус </label>
                <div class="col-sm-12">
                    <select name="status" id="status" class="form-control" >
                        <option @if($order->status=='Ждет оплаты') selected="selected" @endif value="Ждет оплаты"> Ждет Оплаты  </option>
                        <option @if($order->status=='Готов к отправке') selected="selected" @endif value="Готов к отправке"> Готов к отправке </option>
                        <option @if($order->status=='Отправлен') selected="selected" @endif value="Отправлен"> Отправлен </option>
                    </select>
                </div>
          @if($order->individual_price==null&&$order->image!=null)
                        <br>
                        <label for="individual_price" class="col-sm-12 col-form-label">Цена на портрет:</label>
                        <div class="col-sm-12">
                            <input type="number" name="individual_price" id="individual_price" class="form-control" value="{{$order->individual_price}}" min="1">
                            <div class="dropdown" >
                                <button style=" background-color: #f8f9fa!important; border: 0px; outline: none; color:black; padding: 0px" class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{App\Money::where('name',session('money','RUB'))->first()->symbol}}
                                </button>
                                <div style=" background-color: #f8f9fa!important; color:black!important;" class="dropdown-menu main-menu-lang" aria-labelledby="dropdownMenuButton">

                                    @foreach(App\Money::get() as $money)
                                        <a  style="color:black!important;"href="{{route('money',$money->name)}}"> {{$money->symbol}} </a>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    @endif<br>
                        <button class="btn btn-success col-4  ml-4">Сохранить</button>


            </form>
            @endadmin
</div>
        </div>
    </div>
    </div>
@endsection
