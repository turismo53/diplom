
@extends('layouts/master')

@section('title','заказ')

@section('content')

<div class="starter-template">
                            <h1>@lang('basket.order')</h1>
    <div class="container">
        <div class="row justify-content-center">
            <p>@lang('basket.total') <b>{{$order->getFullPrice()}}р.</b></p>

            @auth

            <form action="{{route('basket-confirm')}}" method="POST">
                <div>
                    <p>@lang('basket.info')</p>

                    <div class="container">
                        <div class="form-group">
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">@lang('basket.name'): </label>
                            <div class="col-lg-4">
                                <input type="text" name="name" id="name" value="{{@Auth::user()->name}}" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="phone" class="control-label col-lg-offset-3 col-lg-2">@lang('basket.phone'): </label>
                            <div class="col-lg-4">
                                <input type="text" name="phone" id="phone" value="{{@Auth::user()->phone}}" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                                                    <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">Email: </label>
                                <div class="col-lg-4">
                                    <input type="text" name="email" id="email" value="{{@Auth::user()->email}}" class="form-control">
                                </div>
                            </div>
                                            </div>
                    <br>

                    <div class="form-group">
                        <label for="city" class="control-label col-lg-offset-3 col-lg-2">Город: </label>
                        <div class="col-lg-4">
                            <input type="text" name="city" id="city" value="{{@Auth::user()->city}}" class="form-control">
                        </div>
                    </div>
                </div>
                <br>
                    @csrf
                         <input type="submit" class="btn btn-success" value="@lang('basket.checkout')">
                </div>
            </form>
@endauth






        </div>
    </div>
    </div>
    @endsection
