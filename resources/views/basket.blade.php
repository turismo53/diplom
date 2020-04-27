@extends('layouts/master')

@section('title','Корзина' )

@section('content')






                            <h1>@lang('basket.basket')</h1>
    <p>@lang('basket.order')</p>
    <div class="panel">




            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Кол-во</th>
                    <th>Общая цена</th>
                    <th> </th>
                </tr>
                </thead>

                <tbody>
                @foreach($order->products as $product)
                <tr>
                    <td>
                        <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                            <img style="height: 50px" src="{{ Storage::url($product->image) }}" alt="product">  {{$product->name}}
                        </a>
                    </td>
                    <td><span class="badge">{{$product->pivot->count}}</span>
                        <div class="btn-group form-inline">


                        </div>
                    </td>
                    <td>{{$product->getTotalPrice()}}р.</td>
                    <td>
                        <form action="{{ route('basket-remove',[$product] )}}" method="POST">
                            <button type="submit" class="btn btn-danger" href="">Удалить</button>
                            @csrf
                        </form>
                    </td>
                </tr>

                @endforeach
                <tr>
                    <td colspan="3">Итоговая стоимость:</td>
                    <td>{{$order->getFullPrice()}}р.</td>
                </tr>

                </tbody>
            </table>











       <form action="{{ route('basket-place')}}" method="get">
        <button type="submit">@lang('basket.checkout')</button>
       </form>

    </div>



@endsection
