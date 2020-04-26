<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Магазин: Блог</title>

    <!-- Scripts -->
    <script src="/js/app.js" defer></script>
    <script
        src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
        crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">


    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
    <link href="/css/menus.css" rel="stylesheet">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin.css" rel="stylesheet">
    <link href="/css/menus.css" rel="stylesheet">
</head>
<body>
<div id="app">



    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand main-brand" href="{{route('index')}}">@lang('main.online_shop')</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li  @routeactive('index')> <a class="hover-effect" href="{{route('index')}}">@lang('main.all_products')</a></li>
                <li  @routeactive('categor*')><a class="hover-effect" href="{{route('categories')}}">@lang('main.categories')</a> </li>
                <li  @routeactive('basket*')><a  class="hover-effect" href="{{route('basket')}}">@lang('main.basket')</a></li>
                <li  @routeactive('extra*')><a class="hover-effect" href="{{route('extra.order')}}">@lang('main.individual_order')</a></li>
                <li  @routeactive('feedback*')><a class="hover-effect" href="{{route('feedback.index')}}">@lang('main.feedback')</a></li>
                <li  @routeactive('posts*')><a class="hover-effect" href="{{route('posts.index')}}">@lang('main.blog')</a></li>
                <li>

                    <div class="dropdown" >
                        <button style="background-color: #343a40!important; border: 0px; outline: none; color:whitesmoke;" class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @lang('main.langs')
                        </button>
                        <div class="dropdown-menu main-menu-lang" aria-labelledby="dropdownMenuButton">
                            <a class="langs" href="{{route('locale','en')}}">en</a>
                            <br>
                            <a class="langs" href="{{route('locale','ru')}}">ru</a>
                        </div>
                    </div>
                </li>

            </ul>
            @guest
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="hover-effect" href="{{route('login')}}">@lang('main.sign_in')</a></li>
                    <li><a class="hover-effect" href="{{route('register')}}">@lang('main.sign_up')</a></li>
                </ul>
            @endguest

            @auth
                <ul class="nav navbar-nav navbar-right">
                    @admin
                    <li><a class="hover-effect" href="{{route('home')}}">@lang('main.admin')</a></li>
                    @else
                        <li><a class="hover-effect" href="{{route('order.index.person')}}">Личный Кабинет</a></li>
                        @endadmin

                        <li><a class="hover-effect" href="{{route('get-logout')}}">@lang('main.logout')</a></li>
                </ul>
            @endauth
            @csrf
        </div>
    </nav>
    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">

                @if(session()->has('success'))

                    <p class="alert alert-success m-auto">{{session()->get('success')}}</p>
                @elseif(session()->has('warning'))
                    <p class="alert alert-warning">{{session()->get('warning')}}</p>
                @endif


<div id="main-extra">
                <h1>@lang('basket.order')</h1>
        <div class="starter-template">
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
                        <div class="form-group row row-adapt">

                            <label for="name" class="col-md-4 col-form-label text-md-right">Имя</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"
                                       value="@isset(Auth::User()->name){{Auth::User()->name}}@endisset">

                            </div>
                        </div>

                        @error('email')
                        <div class=" alert alert-danger"> {{$message}} </div>
                        @enderror

                        <div class="form-group row row-adapt" @auth style="display: none" @endauth>
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control"
                                       name="email" value="@isset(Auth::User()->email){{Auth::User()->email}}@endisset" >

                            </div>
                        </div>

                        @error('phone')
                        <div class=" alert alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group row row-adapt">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Телефон</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control"
                                       name="phone" value="@isset(Auth::User()->phone){{Auth::User()->phone}}@endisset" >

                            </div>
                        </div>


                        @error('city')
                        <div class=" alert alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group row row-adapt">
                            <label for="city" class="col-md-4 col-form-label text-md-right">Город</label>

                            <div class="col-md-6">
                                <input id="city" type="phone" class="form-control"
                                       name="city" value="@isset(Auth::User()->city){{Auth::User()->city}}@endisset" >

                            </div>
                        </div>

                        @error('street')
                        <div class=" alert alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group row row-adapt">
                            <label for="street" class="col-md-4 col-form-label text-md-right">Улица</label>

                            <div class="col-md-6">
                                <input id="street" type="street" class="form-control"
                                       name="street" value="@isset(Auth::User()->street){{Auth::User()->street}}@endisset" >

                            </div>
                        </div>

                        @error('mail_index')
                        <div class=" alert alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group row row-adapt">
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
                        <div class="form-group row row-adapt">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Картинка: </label>
                            <div class="col-md-6">
                                <label class="btn btn-default btn-file" >
                                    <label  id="textFile"style="cursor: pointer" for="myFileUpload" >Выберите файл</label>
                                    <input style="visibility: hidden; margin:0; padding: 0" id="myFileUpload" type="file" accept=".jpg, .jpeg, .png" name="image">

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
        </div>
    </div>
</div>
</div>
<script src="/js/scroll.js"></script>
<script src="/js/loadFile.js"></script>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script src="/js/slider.js"></script>
</body>
</html>


