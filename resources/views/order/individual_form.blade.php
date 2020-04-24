@extends('layouts/master')

@section('title','заказ')

@section('content')

    <div class="starter-template">
        <h1>@lang('basket.order')</h1>
        <div class="container">
            <div class="row justify-content-center">



                    <form action="@if(!Auth::check())

                    {{route('extra.order.confirm')}}
                        @else
                               {{route('extra.authOrder.confirm')}}
                        @endif
                        " method="POST" enctype="multipart/form-data">
                        @error('name')
                        <div class=" alert alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group row">

                            <label for="name" class="col-md-4 col-form-label text-md-right">Имя</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"
                                       value="@isset(Auth::User()->name){{Auth::User()->name}}@endisset">

                            </div>
                        </div>

                        @error('email')
                        <div class=" alert alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group row" @auth style="display: none" @endauth>
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control"
                                       name="email" value="@isset(Auth::User()->email){{Auth::User()->email}}@endisset" >

                            </div>
                        </div>

                        @error('phone')
                        <div class=" alert alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Телефон</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control"
                                       name="phone" value="@isset(Auth::User()->phone){{Auth::User()->phone}}@endisset" >

                            </div>
                        </div>


                        @error('city')
                        <div class=" alert alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">Город</label>

                            <div class="col-md-6">
                                <input id="city" type="phone" class="form-control"
                                       name="city" value="@isset(Auth::User()->city){{Auth::User()->city}}@endisset" >

                            </div>
                        </div>

                        @error('street')
                        <div class=" alert alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group row">
                            <label for="street" class="col-md-4 col-form-label text-md-right">Улица</label>

                            <div class="col-md-6">
                                <input id="street" type="street" class="form-control"
                                       name="street" value="@isset(Auth::User()->street){{Auth::User()->street}}@endisset" >

                            </div>
                        </div>

                        @error('mail_index')
                        <div class=" alert alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group row">
                            <label for="mail_index" class="col-md-4 col-form-label text-md-right">Почтовый индекс</label>

                            <div class="col-md-6">
                                <input id="mail_index" type="mail_index" class="form-control"
                                       name="mail_index" value="@isset(Auth::User()->mail_index){{Auth::User()->mail_index}}@endisset" >

                            </div>
                        </div>
                        <br>
                        @error('image')
                        <div class=" alert alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Картинка: </label>
                            <div class="col-md-6">
                                <label class="btn btn-default btn-file">
                                    <label  id="textFile"style="cursor: pointer" for="myFileUpload">Выберите файл</label>
                                    <input style="visibility: hidden; margin:0; padding: 0" id="myFileUpload" type="file" accept=".jpg, .jpeg, .png" name="file">

                                </label>
                            </div>
                        </div>
                        @csrf
                        <input type="submit" class="btn btn-success" value="@lang('basket.checkout')">
                        </div>
            </form>
        </div>
    </div>
    </div>
@endsection
