@extends('auth.layouts.master')

@section('title', 'Регистрация')

@section('content')
    <div class="col-md-8">
        <div class="card">

            <form method="POST" action="{{ route('register') }}" aria-label="Register">
                @csrf

                <div class="form-group row">
                    <div class="card-header col-12 text-center">Регистрация</div>
                </div>

                @error('name')
                <div class=" alert alert-danger"> {{$message}} </div>
                @enderror

                <div class="form-group row">



                    <label for="name" class="col-md-3 col-lg-3 col-form-label text-md-right">Имя</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name"
                               value="{{old('name')}}">

                    </div>
                </div>

                @error('email')
        <div class=" alert alert-danger"> {{$message}} </div>
        @enderror
                <div class="form-group row">
                    <label for="email" class="col-md-3 col-lg-3 col-form-label text-md-right">E-Mail</label>

                    <div class="col-md-6">
                        <input id="email" type="text" class="form-control"
                               name="email" value="{{old('email')}}" >

                    </div>
                </div>

                @error('phone')
                <div class=" alert alert-danger"> {{$message}} </div>
                @enderror
                <div class="form-group row">
                    <label for="phone" class="col-md-3 col-lg-3 col-form-label text-md-right">Телефон</label>

                    <div class="col-md-6">
                        <input id="phone" type="phone" class="form-control"
                               name="phone" value="{{old('phone')}}" >

                    </div>
                </div>


                @error('city')
                <div class=" alert alert-danger"> {{$message}} </div>
                @enderror
                <div class="form-group row">
                    <label for="city" class="col-md-3 col-lg-3 col-form-label text-md-right">Город</label>

                    <div class="col-md-6">
                        <input id="city" type="city" class="form-control"
                               name="city" value="{{old('city')}}" >

                    </div>
                </div>

                @error('street')
                <div class=" alert alert-danger"> {{$message}} </div>
                @enderror
                <div class="form-group row">
                    <label for="street" class="col-md-3 col-lg-3 col-form-label text-md-right">Адрес</label>

                    <div class="col-md-6">
                        <input id="street" type="street" class="form-control"
                               name="street" value="{{old('street')}}" >

                    </div>
                </div>

                @error('street')
                <div class=" alert alert-danger"> {{$message}} </div>
                @enderror
                <div class="form-group row">
                    <label for="mail_index" class="col-md-3 col-lg-3 col-form-label text-md-right">Почтовый индекс</label>

                    <div class="col-md-6">
                        <input id="mail_index" type="mail_index" class="form-control"
                               name="mail_index" value="{{old('mail_index')}}" >

                    </div>
                </div>

                @error('password')
        <div class=" alert alert-danger"> {{$message}} </div>
        @enderror
                <div class="form-group row">
                    <label for="password" class="col-md-3 col-lg-3 col-form-label text-md-right">Пароль</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control"
                               name="password" value="">

                    </div>
                </div>



                <div class="form-group row">
                    <label for="password-confirm" class="col-md-3 col-lg-3 col-form-label text-md-right">Подтвердите
                        пароль</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               >
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary" id="submit" onclick="hide()">
                            Зарегистрироваться
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
            <div class="card-body">
            </div>
        </div>
    </div>
@endsection
