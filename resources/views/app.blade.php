<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{asset('icon/favicon.ico')}}" type="image/x-icon">
        <link rel="apple-touch-icon" sizes="57x57" href="{{asset('icon/apple-icon-57x57.png')}}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{asset('icon/apple-icon-60x60.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('icon/apple-icon-72x72.png')}}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('icon/apple-icon-76x76.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('icon/apple-icon-114x114.png')}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{asset('icon/apple-icon-120x120.png')}}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{asset('icon/apple-icon-144x144.png')}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{asset('icon/apple-icon-152x152.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('icon/apple-icon-180x180.png')}}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('icon/android-icon-192x192.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('icon/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{asset('icon/favicon-96x96.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('icon/favicon-16x16.png')}}">
        <link rel="manifest" href="{{asset('icon/manifest.json')}}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{asset('icon/ms-icon-144x144.png')}}">
        <meta name="theme-color" content="#3273dc">
        @stack('meta')

        <title>SNVT - PNP JATIM</title>
        <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,600">
        <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="{{asset('vendor/bulma-0.6.2/css/bulma.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('css/my-style.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('vendor/datatables-1.10.7/css/jquery.dataTables.min.css')}}">
    </head>
    <body>
    <div class="columns">
        <div class="column">
        @yield('content')
        </div>
    </div>
    </body>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
            if ($navbarBurgers.length > 0) {
                $navbarBurgers.forEach(function ($el) {
                    $el.addEventListener('click', function () {
                        // Get the target from the "data-target" attribute
                        var target = $el.dataset.target;
                        var $target = document.getElementById(target);

                        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                        $el.classList.toggle('is-active');
                        $target.classList.toggle('is-active');
                    });
                });
            }
        });
    </script>
    <script type="text/javascript" src="{{asset('vendor/jquery-2.2.0/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/sweetalert2-7.16.0/sweetalert2.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/datatables-1.10.7/js/jquery.dataTables.min.js')}}"></script>
    @if(Session::has('error-msg'))
    <script>
        $(window).load(function(){
            swal('Error!', '{{Session::get('error-msg')}}', 'error')
        });
    </script>
    @endif
    @if(Session::has('success-msg'))
    <script>
        $(window).load(function(){
            swal('Success!', '{{Session::get('success-msg')}}', 'success')
        });
    </script>
    @endif
    @stack('scripts')
</html>
