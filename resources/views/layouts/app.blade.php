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
                            <a class="nav-link" href="/"><i class="fa fa-lg fa-home"> EDV</i></a>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if(\Request::route()->getName() == 'index') 
                                <li class="nav-item">
                                    <a class="nav-link" href="/employee_logging" data-toggle="modal" data-target="#employee-login"><i class="fa fa-lg fa-unlock-alt"> Employee Login</i></a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-lg fa-unlock-alt"> Admin Login</i></a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/pos"><i class="fa fa-lg fa-cart-plus"> Point of Sales</i></a>
                            </li>
                            @if(Auth::user()->status == 'admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="/home"><i class="fa fa-lg fa-users"> Employees</i></a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="/inventory"><i class="fa fa-lg fa-cubes"> Inventory</i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/invoices"><i class="fa fa-lg fa-book"> Invoices</i></a>
                            </li>
                            @if(Auth::user()->status != 'admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="/home-employee"><i class="fa fa-lg fa-user"> My Logs</i></a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="/report"><i class="fa fa-lg fa-bookmark"> Report</i></a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-bars fa-lg"></i>
                                </a>

                                <div class="custom-dropdown dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/settings">
                                        <i class="fa fa-lg fa-cogs"> Settings</i>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-lg fa-sign-out">{{_('Logout') }}</i>
                                        
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
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/tables.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.js') }}"></script>
    @include('sweetalert::alert')
    @if($errors->first('success'))
        <script type="text/javascript">sweetAlert("Success", "{{$errors->first('success')}}", "success")</script>;
    @else
        @foreach($errors->all() as $error) 
            <script type="text/javascript">sweetAlert("Oops...", "{{ $error }}", "error")</script>
        @endforeach
    @endif
    @yield('js') 
</body>
</html>
