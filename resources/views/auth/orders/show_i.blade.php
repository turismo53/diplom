@extends('auth.layouts.master')

@section('title', 'Заказ ' . $order_i->id)

@section('content')

    <div class="py-4">
        <div class="container ">
            <div class="justify-content-center">

<div id="main" class="order">

                <div class="panel">
                    <h1>Заказ №{{ $order_i->id }}</h1>
                    <p>Заказчик: <b>{{ $order_i->user->name }}</b></p>
                    <p>Номер телефона: <b>{{ $order_i->user->phone }}</b></p>
                    <p>Улица: <b>{{ $order_i->user->street }}</b></p>
                    <p>Город: <b>{{ $order_i->user->city }}</b></p>
                    <p>Почтовый индекс: <b>{{ $order_i->user->mail_index }}</b></p>


        <img height="300px" src="{{ Storage::url($order_i->image) }}">
        <br>
        <p>Цена:  @if($order_i->individual_price==null) В обработке @else {{round($order_i->individual_price(),2)}}{{$order_i->symbol()}} @endif</p>
        <p>Состояние заказа: {{ $order_i->status }} </p>
        @if($order_i->status=='Ждет оплаты')
        @if($order_i->individual_price!=null)
            @if(Auth::User()->is_admin==false)
                <p>Текст оплаты: Оплачиваю заказ номер {{ $order_i->id }}. </p>
                <p>Номер перевода: R123456789 </p>
            @endif
            @endif
        @endif

            @admin
            <form method="POST" action="{{ route('order.update_i', $order_i) }}">
                @method('PUT')
                @csrf
                <label for="status" class="col-sm-6 col-form-label">Статус </label>
                <div class="col-sm-12">
                    <select name="status" id="status" class="form-control" >
                        <option @if($order_i->status=='Ждет оплаты') selected="selected" @endif value="Ждет оплаты"> Ждет Оплаты  </option>
                        <option @if($order_i->status=='Готов к отправке') selected="selected" @endif value="Готов к отправке"> Готов к отправке </option>
                        <option @if($order_i->status=='Отправлен') selected="selected" @endif value="Отправлен"> Отправлен </option>
                    </select>
                </div>
          @if($order_i->individual_price==null&&$order_i->image!=null)
                        <br>
                        <label for="individual_price" class="col-sm-12 col-form-label">Цена на портрет:</label>
                        <div class="col-sm-12">
                            <input type="number" name="individual_price" id="individual_price" class="form-control" value="{{$order_i->individual_price}}" min="1">
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
