<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    @yield('css') 
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/"><i class="fa fa-lg fa-home"></i> EDV</a>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if(\Request::route()->getName() == 'index') 
                                <li class="nav-item">
                                    <a class="nav-link" href="/employee_logging" data-toggle="modal" data-target="#employee-login"><i class="fa fa-lg fa-unlock-alt"></i> Employee Login</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-lg fa-unlock-alt"></i> Admin Login</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/pos"><i class="fa fa-lg fa-cart-plus"></i> Point of Sales</a>
                            </li>
                            @if(Auth::user()->status == 'admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="/home"><i class="fa fa-lg fa-users"></i> Employees</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="/inventory"><i class="fa fa-lg fa-cubes"></i> Inventory</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/invoices"><i class="fa fa-lg fa-book"></i> Invoices</a>
                            </li>
                            @if(Auth::user()->status != 'admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="/home-employee"><i class="fa fa-lg fa-user"></i> My Logs</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="/report"><i class="fa fa-lg fa-bookmark"></i> Report</a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} 
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/settings">
                                        <i class="fa fa-lg fa-cogs"></i> Settings
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-lg fa-sign-out"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @foreach($errors->all() as $error) 
                <div class="error-message">
                    {{ $error }}
                </div>
            @endforeach
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/tables.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('js') 
</body>
</html>
