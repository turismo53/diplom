<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Админка: @yield('title')</title>

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



        <nav class="navbar navbar-expand-lg navbar-light bg-light admin">
            <a class="navbar-brand" href="{{route('index')}}">Вернуться на сайт</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 admin">
                    @admin
                    <li><a class="admin" href="{{ route('categories.index') }}">Категории</a></li>
                    <li><a class="admin"href="{{ route('products.index') }}">Товары</a>  </li>
                    <li><a  class="admin"href="{{ route('home') }}">Заказы</a></li>
                    @else
                        <li><a class="admin"href="{{route('order.index.person')}}">Мои заказы</a></li>
                    @endadmin
                </ul>

                @auth
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" v-pre>
                                @admin
                                Администратор
                                @else

                                    {{Auth::User()->name}}


                                @endadmin

                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item admin" href="{{ route('logout')}}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>

                                <form id="logout-form" action="{{ route('logout')}}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>


                @endauth

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

                @yield('content')
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
