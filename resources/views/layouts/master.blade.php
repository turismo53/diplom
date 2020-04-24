
<!doctype html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@lang('main.online_shop'): @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script
        src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
        crossorigin="anonymous"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
    <link href="/css/menus.css" rel="stylesheet">

    <script src="/js/app.js"></script>

</head>
<body>



<div id="main">
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
            <li><a href="{{route('locale','en')}}">en</a></li>
            <li><a href="{{route('locale','ru')}}">ru</a></li>
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




<div class="starter-template">
    <div class="container">

     


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
<script src="/js/loadFile.js"></script>
</body>

</html>
