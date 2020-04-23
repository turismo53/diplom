
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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




<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand main-brand" href="{{route('index')}}">@lang('main.online_shop')</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li> <a @routeactive('index') href="{{route('index')}}">@lang('main.all_products')</a></li>
            <li><a @routeactive('categor*') href="{{route('categories')}}">@lang('main.categories')</a> </li>
            <li><a @routeactive('basket*') href="{{route('basket')}}">@lang('main.basket')</a></li>
            <li><a @routeactive('extra*') href="{{route('extra.order')}}">@lang('main.individual_order')</a></li>
            <li><a @routeactive('feedback*') href="{{route('feedback.index')}}">@lang('main.feedback')</a></li>
            <li  ><a @routeactive('posts*')href="{{route('posts.index')}}">@lang('main.blog')</a></li>
            <li><a href="{{route('locale','en')}}">en</a></li>
            <li><a href="{{route('locale','ru')}}">ru</a></li>
        </ul>
        @guest
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('login')}}">@lang('main.sign_in')</a></li>
                <li><a href="{{route('register')}}">@lang('main.sign_up')</a></li>
            </ul>
        @endguest

        @auth
            <ul class="nav navbar-nav navbar-right">
                @admin
                <li><a href="{{route('home')}}">@lang('main.admin')</a></li>
                @else
                    <li><a href="{{route('order.index.person')}}">Личный Кабинет</a></li>
                    @endadmin

                    <li><a href="{{route('get-logout')}}">@lang('main.logout')</a></li>
            </ul>
        @endauth

    </div>
</nav>



<div class="starter-template">
    <div class="container">
        <button id="back-to-top" onclick=""><i class="fa fa-sort-up fa-5x"></i></button>
        @if(session()->has('success'))
            <p class="alert alert-success">{{ session()->get('success') }}</p>
        @endif
        @if(session()->has('warning'))
            <p class="alert alert-warning">{{ session()->get('warning') }}</p>
        @endif
        @yield('content')
        </div>
    </div>
<script src="/js/scroll.js"></script>
</body>

</html>
