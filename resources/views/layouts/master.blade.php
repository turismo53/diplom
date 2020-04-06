
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Интернет Магазин: @yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('index')}}">Интернет Магазин</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{route('index')}}">Все товары</a></li>
                <li ><a href="{{route('categories')}}">Категории</a>
                </li>
                <li ><a href="{{route('basket')}}">В корзину</a></li>
                <li><a href="{{route('index')}}">Сбросить проект в начальное состояние</a></li>
                <li><a href="http://internet-shop.tmweb.ru/locale/en">en</a></li>
            </ul>
            @guest
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('login')}}">Войти</a></li>
                <li><a href="{{route('register')}}">Регистрация</a></li>
            </ul>
            @endguest

            @auth
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('home')}}">Админка</a></li>
                <li><a href="{{route('get-logout')}}">Выйти</a></li>
            </ul>
                @endauth


        </div>
    </div>
</nav>
<div class="starter-template">
    <div class="container">
        @if(session()->has('success'))
            <p class="alert alert-success">{{ session()->get('success') }}</p>
        @endif
        @if(session()->has('warning'))
            <p class="alert alert-warning">{{ session()->get('warning') }}</p>
        @endif
        @yield('content')
        </div>
    </div>
</body>
</html>
