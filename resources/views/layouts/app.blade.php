<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sanar</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cb98da7190.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container">
                @auth
                @php
                    $isEmployee = Auth::user()->role == App\Enums\UserRole::EMPLOYEE->name;
                    $isAdmin = $isEmployee && Auth::user()->employee->role == App\Enums\EmployeeRole::ADMIN->name;
                    $isAreaBoss = $isEmployee && Auth::user()->employee->role == App\Enums\EmployeeRole::AREA_BOSS->name;
                    $isAdministrative = $isEmployee && Auth::user()->employee->role == App\Enums\EmployeeRole::ADMINISTRATIVE->name;
                    $isAffiliate = Auth::user()->role == App\Enums\UserRole::AFFILIATE->name;
                    $userId=Auth::user()->id;
                @endphp
                     <ul class="navbar-nav mr-auto">
                        @if($isEmployee || $isAffiliate)
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('dashboard')}}">Inicio<span class="sr-only"></span></a>
                            </li>
                        @endif
                        @if($isAdmin || $isAffiliate || $isEmployee)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('minor_affiliates.index')}}">Menores</a>
                            </li>
                        @endif
                        @if($isEmployee)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('adult_affiliates.index')}}">Afiliados</a>
                            </li>
                        @endif
                        @if ($isEmployee)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('benefitsToEvaluate')}}">Prestaciones</a>
                            </li>
                        @endif
                        @if ($isEmployee)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('reimbursementsToEvaluate')}}">Reintegros</a>
                            </li>
                        @endif
                        @if($isAdmin)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('employees.index')}}">Empleados</a>
                            </li>
                        @endif
                        @if($isAdmin)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('plans.index')}}">Planes</a>
                            </li>
                        @endif
                        @if($isAffiliate)
                             <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Solicitudes
                                </a>
                                <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                    <li><a class="dropdown-item" href="{{route('reimbursements.index')}}">Reintegros</a></li>
                                    <li><a class="dropdown-item" href="{{route('benefits.index')}}">Prestaciones</a></li>
                                </ul>
                            </li>
                        @endif
                        @if($isAdmin)
                            <li class="nav-item">
                                <a class="nav-link" 
                                    @if($isEmployee)
                                            href="{{route('myUserEmployee',$userId)}}"
                                        @else
                                            href="#"
                                    @endif
                                    
                                >Mi usuario</a>
                            </li>
                        @endif
                        @if($isAffiliate)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Mi usuario
                                </a>
                                <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                    <li><a class="dropdown-item" href="{{route('myUserAffiliate',$userId)}}" >Mis datos</a></li>
                                    <li><a class="dropdown-item" href="{{route('request_payment_coupon')}}">Pago</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                    
                @endauth
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

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