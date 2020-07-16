
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@lang('main.online_shop'): @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <script  src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script
        src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
    <link href="/css/menus.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>

    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <script src="/js/app.js" async defe></script>


</head>
<body>


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
                    <button style="background-color: #343a40!important; border: 0px; outline: none; color:whitesmoke; padding: 0px" class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @lang('main.langs')
                    </button>
                    <div class="dropdown-menu main-menu-lang" aria-labelledby="dropdownMenuButton">
                        <a class="langs" href="{{route('locale','en')}}">en</a>
                        <br>
                        <a class="langs" href="{{route('locale','ru')}}">ru</a>
                    </div>
                </div>
            </li>

            <li>

                <div class="dropdown" >
                    <button style="background-color: #343a40!important; border: 0px; outline: none; color:whitesmoke; padding: 0px" class=" dropdown-toggle" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{App\Money::where('name',session('money','RUB'))->first()->symbol}}
                    </button>
                    <div class="dropdown-menu main-menu-lang" aria-labelledby="dropdownMenuButton">

                        @foreach(App\Money::get() as $money)
                            <a href="{{route('money',$money->name)}}"> {{$money->symbol}} </a>
                            <br>
                            @endforeach
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


<div id="app">
<socket-chat></socket-chat>
</div>

<div class="starter-template">
    <div class="container">


<div id="main">

        @if(session()->has('success'))
            <p class="alert alert-success">{{ session()->get('success') }}</p>
        @endif
        @if(session()->has('warning'))
            <p class="alert alert-warning">{{ session()->get('warning') }}</p>
        @endif
        @yield('content')
            <button id="back-to-top" onclick=""><i class="fa fa-sort-up fa-3x"></i></button>
        </div>

</div>
</div>
<script src="/js/scroll.js"></script>
<script  src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script  src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script  src="slick/slick.min.js"></script>
<script src="/js/slider.js"></script>
</body>

</html>
