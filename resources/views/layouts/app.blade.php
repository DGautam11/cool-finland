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
<body onload=display_ct5()>
    <div class="max-width">
        <header>
            <div class="container header">
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="logo" class="center">
                </div>
            
           
                @auth
                <div class="menu">
                    <ul class="nav justify-content-center">
                        
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-primary shadow-sm {{ Request::is('dashboard') ? 'active' : '' }}" tabindex="2" href="{{ route('dashboard') }}" aria-disabled="true">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-primary shadow-sm {{ Request::is('appointments') ? 'active' : ''}}" href="{{ route('appointments') }}">Appointments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-primary shadow-sm {{ Request::is('customers') ? 'active' : ''}}" href="{{ route('customers') }}">Customers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-primary shadow-sm" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                   
                </div>
                @endauth
            </div>

        </header>
      

       

       
        <main class="py-4">
            @auth
            <div class="container mb-3">
            <span id='ct5'></span>
            <span id ='emp-name'>| Welcome :{{ Auth::user()->employee->emp_name }} </span>
            </div>
            @endauth
            @yield('content')
        </main>

        @auth
        <footer class="footer">
            <div class="container footer-boxes">
              <div class="left-box">
                <p>Cool-Finland Oy</p>
                <p>Y-tunnus: 1944299-2</p>
              </div>
        
              <div class="center-box">
                <p>Kiimassuontie 127,</p>
                <p>30420 FORSSA</p>
              </div>
        
              <div class="right-box">
                <p>0440 242 700</p>
                <p>info@lhjgroup.fi</p>
              </div>
            </div>
          </footer>
        @endauth

        <script>

            function display_ct5() {
            var x = new Date()
            var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
            
            var x1=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear(); 
            x1 = x1 + " - " +  x.getHours( )+ ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
            document.getElementById('ct5').innerHTML = x1;
            display_c5();
             }
             function display_c5(){
            var refresh=1000; // Refresh rate in milli seconds
            mytime=setTimeout('display_ct5()',refresh)
            }
            display_c5()
            </script>
    
</body>
</html>
