<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['public/css/app.css', 'public/js/app.js'])
    </head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container">
             
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                        <!-- NAVBAR -->
                        <header>
                            <nav class="navbar navbar-expand-lg">
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#">Inicio<span class="sr-only"></span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/adult_affiliate/create)}}">Afiliados</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Empleados</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="contact">Planes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="contact">Mi usuario</a>
                                    </li>
                                </ul>
                        </header>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-0">

            <div class="pt-0 pb-3">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="d-flex justify-content-center bg-white overflow-visible shadow-sm sm:rounded-lg">
                        <div class="container p-6 bg-white border-b border-gray-200 row justify-content-center pb-1">
                            @yield('filters')
                        </div>
                    </div>
                </div>
            </div>

            @yield('content')
        </main>
    </div>
</body>
</html>