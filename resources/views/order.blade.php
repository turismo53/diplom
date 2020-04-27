
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


                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-3">@lang('basket.name'): </label>
                            <div class="col-lg-7">
                                <input type="text" name="name" id="name" value="{{@Auth::user()->name}}" class="form-control">
                            </div>
                        </div>

                        <br>
                        <div class="form-group row">
                            <label for="phone" class="control-label col-lg-3">@lang('basket.phone'): </label>
                            <div class="col-lg-7">
                                <input type="text" name="phone" id="phone" value="{{@Auth::user()->phone}}" class="form-control">
                            </div>
                        </div>

                        <br>
                    <div class="form-group row">
                                <label for="name" class="control-label  col-lg-3">Email: </label>
                                <div class="col-lg-7">
                                    <input type="text" name="email" id="email" value="{{@Auth::user()->email}}" class="form-control">
                                </div>
                            </div>
                                            </div>
                    <br>

                    <div class="form-group row">
                        <label for="city" class="control-label  col-lg-3">@lang('basket.city'): </label>
                        <div class="col-lg-7">
                            <input type="text" name="city" id="city" value="{{@Auth::user()->city}}" class="form-control">
                        </div>
                    </div>

                <br>

                <div class="form-group row">
                    <label for="city" class="control-label  col-lg-3">@lang('basket.street'): </label>
                    <div class="col-lg-7">
                        <input type="text" name="city" id="city" value="{{@Auth::user()->street}}" class="form-control">
                    </div>
                </div>

                <br>

                <div class="form-group row">
                    <label for="city" class="control-label  col-lg-3">@lang('basket.mail_index'): </label>
                    <div class="col-lg-7">
                        <input type="text" name="city" id="city" value="{{@Auth::user()->mail_index}}" class="form-control">
                    </div>
                </div>

                <br>
                    @csrf

                <button type="submit" class="btn btn-primary submit"  onclick="hide()">
                    @lang('basket.checkout')
                </button>
                <label for="submit" class="submit-label" style="display: none; color: black;"> Обработка...</label>
                <script>
                    function hide() {
                        $(".submit").css("display","none");
                        $(".submit-label").css("display","block");
                    }
                </script>
            </form>
@endauth






        </div>
    </div>
    </div>
    @endsection
