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
                <li>

                    <div class="dropdown" >
                        <button style="background-color: #343a40!important; border: 0px; outline: none; color:whitesmoke; padding: 0px" class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <div class="form-group row row-adapt align-items-center">

                            <label for="name" class="col-md-4 col-form-label text-md-right">Имя и фамилия</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"
                                       value=" {{old('name',isset(Auth::User()->name)? Auth::User()->name :null)}}">

                            </div>
                        </div>

                        @error('email')
                        <div class=" alert alert-danger"> {{$message}} </div>
                        @enderror

                        <div class="form-group row row-adapt align-items-center" @auth style="display: none" @endauth>
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control"
                                       name="email" value="{{old('email',isset(Auth::User()->email)? Auth::User()->email :null)}}" >

                            </div>
                        </div>

                        @error('phone')
                        <div class=" alert alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group row row-adapt align-items-center">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Телефон</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control"
                                       name="phone" value="{{old('phone',isset(Auth::User()->phone)? Auth::User()->phone :null)}}" >

                            </div>
                        </div>


                        @error('city')
                        <div class=" alert alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group row row-adapt align-items-center">
                            <label for="city" class="col-md-4 col-form-label text-md-right">Город</label>

                            <div class="col-md-6">
                                <input id="city" type="phone" class="form-control"
                                       name="city" value="{{old('city',isset(Auth::User()->city)? Auth::User()->city :null)}}" >

                            </div>
                        </div>

                        @error('street')
                        <div class=" alert alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group row row-adapt align-items-center">
                            <label for="street" class="col-md-4 col-form-label text-md-right">Адрес</label>

                            <div class="col-md-6">
                                <input id="street" type="street" class="form-control"
                                       name="street" value="{{old('street',isset(Auth::User()->street)? Auth::User()->street :null)}}" >

                            </div>
                        </div>

                        @error('mail_index')
                        <div class=" alert alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group row row-adapt align-items-center">
                            <label for="mail_index" class="col-md-4 col-form-label text-md-right">Почтовый индекс</label>

                            <div class="col-md-6">
                                <input id="mail_index" type="mail_index" class="form-control"
                                       name="mail_index" value="{{old('mail_index',isset(Auth::User()->mail_index)? Auth::User()->mail_index :null)}}" >

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
                                    <label  id="textFile"style="cursor: pointer" for="myFileUpload"  >Выберите файл</label>
                                    <input style="display: none; margin:0; padding: 0" id="myFileUpload" type="file" accept=".jpg, .jpeg, .png" name="image" onchange='changeName();'>
                                    <script >
                                        function changeName() {
                                            console.log("sex");
                                            const imgFile = document.getElementById('myFileUpload').files[0];
                                            $("#textFile").text(imgFile.name);
                                        };
                                    </script>
                                </label>
                            </div>
                        </div>
                        @csrf
                        <input type="submit" class="btn btn-success" id="submit" value="@lang('basket.checkout')" onclick="hide();">
                        <label for="submit" id="submit-label" style="display: none;"> Обработка...</label>
                        <script>
                            function hide() {
                                $("#submit").css("display","none");
                                $("#submit-label").css("display","block");
                            }
                        </script>

            </form>
        </div>
        </div>
    </div>
        </div>
    </div>
</div>
</div>
<script  src="/js/scroll.js"></script>



</body>
</html>


