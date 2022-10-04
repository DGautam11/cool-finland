<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css')  }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
</head>
<body>
    <div class="max-width">
        <header>
            <div class="container header">
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="logo" class="center">
                </div>
            
            </header>
                @auth
                <div class="menu">
                    <ul class="nav justify-content-center">
                        
                        <li class="nav-item">
                            <a class="nav-link active" tabindex="2" href="#" aria-disabled="true">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Appointments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                    {{ Auth::user()->employee->emp_name }}
                </div>
                @endauth
            </div>
      
    </div>

       

       
        <main class="py-4">
            @yield('content')
        </main>
    
</body>
</html>
