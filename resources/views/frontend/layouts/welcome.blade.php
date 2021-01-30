<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="csrf-token" content="{{csrf_token()}}" />
        <!-- Vendors Min CSS -->
        <link rel="stylesheet" href="{{asset('css/vendors.min.css')}}" />
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}" />
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{asset('css/responsive.css')}}" />

        <!-- Fonts -->
        <!-- Font awesome -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Styles -->
    </head>
    <body class="antialiased">
        <div class="preLoader">
            <div class="spinner-border" role="status">
              <span class="sr-only">Loading...</span>
            </div>
        </div>

        <header>
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand sidemenu-header" href="#"><img src="{{asset('img/cook-3.png')}}" width="150" alt="image" class="logo"></a>
                </nav>
            </div>
        </header>

        @yield('content')

        <!-- Vendors Min JS -->

        <!-- div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif            
        </div> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <script src="{{asset('js/vendors.min.js')}}"></script>
        <script src="{{asset('js/custom.js')}}"></script>
    </body>
</html>
