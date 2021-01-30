<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Food Cost Hero</title>
    <!-- Vendors Min CSS -->
    <link rel="stylesheet" href="{{asset('css/vendors.min.css')}}" />
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" />
    <link rel="stylesheet" href="{{asset('css/dropzone.min.css')}}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
  

    <script src="{{ asset('js/admin_customer.js') }}"></script>
     <script src="{{ asset('js/dropzone.min.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"
        integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</head>

<body>
    @include('shared.sidenav')
<!-- Start Main Content Wrapper Area -->
<div class="main-content d-flex flex-column position-static">
    <!-- Top Navbar Area -->
    @include('shared.navbar')
    <!-- End Top Navbar Area -->

    @yield('content')

    <!-- Start Footer End -->
    <footer class="footer-area">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <p>
                    Copyright <i class="bx bx-copyright"></i> 2020. All rights
                    reserved
                </p>
            </div>
        </div>
    </footer>
    <!-- End Footer End -->
</div>
<!-- End Main Content Wrapper Area -->

    {{-- @yield('content') --}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js" defer></script>
    {{--  <script src="{{asset('js/custom.js')}}"></script> --}}
    <script>
        $(document).ready(function(e) {
            var url = window.location;
            // console.log(url);
            $('.nav-item a[href="' + url + '"]').parent().addClass('mm-active');
        })
    </script>
</body>

</html>