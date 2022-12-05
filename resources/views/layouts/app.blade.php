<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link href="/css/profile.css" rel="stylesheet" type="text/css">
    <link href="/css/chat.css" rel="stylesheet" type="text/css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/1.js'])
</head>
<body>
    <div id="app">
        <header class="container-fluid">
            <div class="container-fluid, left">
                <img class="icon" src="{{asset('img/icon.png')}}">
                <a class="title" href="{{ route('maincontent') }}">Body Mania</a>
            </div>
            <div class="hamburger-menu, left">
                <input id="menu__toggle" type="checkbox" />
                <label class="menu__btn" for="menu__toggle">
                    <span></span>
                </label>

                <ul class="menu__box">
                    <li><a class="menu__item" href="№">Связь с трениром</a></li>
                    <li><a class="menu__item" href="#">Услуги</a></li>
                    <li><a class="menu__item" href="#">О нас</a></li>
                    <li><a class="menu__item" href="#">Команда</a></li>
                    <li><a class="menu__item" href="#">Контакты</a></li>
                </ul>
            </div>
            <div class="container-fluid, right">
                <div><a class="tell" href="tel:+74997777777 ">+7(499)777-77-77</a><br> <a class="tell" href="tel:+74997777777">+7(499)777-77-77</a></div>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item list-unstyled">
                                    <a class="nav-link"  href="{{ route('login') }}">{{ __('Войти') }}
                                        <img class="enter" src="img/enter.png">
                                    </a>
                                </li>
                            @endif

                        @else
                            <li class="list-unstyled">
                                <a  href="{{route('personalaria')}}" class="text-decoration-none text-white fs-5">
                                    {{ Auth::user()->name }}
                                </a>
                                <div>
                                    <a class="text-decoration-none text-white" id="ent" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}  <img class="enter" src="{{asset('img/enter.png')}}">
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                </div>
        </header>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
