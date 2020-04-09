@extends('auth.layouts.master')

@isset($product)
    @section('title', 'Редактировать статус' )
@else
    @section('title', 'Создать товар')
@endisset

@section('content')
    <div class="col-md-12">

            <h1>Редактировать статус</h1>

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
    </div>
@endsection
