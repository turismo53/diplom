@extends('auth.layouts.master')

@section('title', 'Авторизация')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div id="main">
            <div class="card-header justify-content-center align-items-center">

                <p class="text-center pl-lg-5 ml-lg-5">LOGIN</p>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}" aria-label="Login">
                    @csrf
                    @error('email')
                        <div class=" alert alert-danger"> {{$message}}</div>
                     @enderror
                    <div class="form-group row">
                        <label for="email" class="col-md-3 col-lg-4 col-form-label text-md-right">E-Mail</label>
             <div class="col-md-6">
                            <input id="email" type="email" class="form-control"
                                   name="email" value="{{old('email')}}" >

                        </div>
                    </div>
                    @error('password')
                    <div class=" alert alert-danger"> {{$message}}</div>
                    @enderror
                    <div class="form-group row">
                        <label for="password" class="col-md-3 col-lg-4 col-form-label text-md-right">Пароль</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" >
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-xl-6 offset-xl-6 col-lg-6 offset-lg-6  col-md-5 offset-md-5  col-sm-5 offset-sm-5   col-5 offset-5">
                            <button type="submit" class="btn btn-primary" id="submit" onclick="hide()">
                                Войти
                            </button>
                            <label for="submit" id="submit-label" style="display: none; color: black;"> Обработка...</label>
                            <script>
                                function hide() {
                                    $("#submit").css("display","none");
                                    $("#submit-label").css("display","block");
                                }
                            </script>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
