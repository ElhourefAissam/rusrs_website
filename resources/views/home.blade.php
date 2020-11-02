<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="شبكة وحدة للسلامة الطرقية بالصحراء" />
        <meta name="author" content="AMZOUR Hicham" />
        <title>{{ config('app.name', 'شبكة وحدة للسلامة الطرقية بالصحراء') }}</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        {{-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> --}}
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
        {{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" /> --}}
        <!-- Core theme CSS (includes Bootstrap)-->
        {{-- <link href="{{ asset('css/styles.css')}}" rel="stylesheet" /> --}}
        <link href="{{ asset('css/slider.css')}}" rel="stylesheet" />
        <style>
            /* html{
                direction:rtl;
                font-family:"Droid Arabic Kufi", "Droid Sans", sans-serif;
                font-size:14px;
            } */
        </style>
    </head>
    <body id="page-top">

         {{-- our main layout --}}
         {{-- <?php @Auth::loginUsingId(1); ?> --}}
         {{-- <?php @Auth::logout(); ?> --}}

        <div id="app">
            {{-- @if(Auth::check())
                <navbar-element :isadmin="false" />
            @else
                <navbar-element :isadmin="true" />
            @endif --}}
            <admin-app />
            {{-- <main-page/> --}}
        </div>


        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/slider.js')}}"></script>

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="{{ asset('assets/mail/jqBootstrapValidation.js') }} "></script>
        <script src="{{ asset('assets/mail/contact_me.js') }}"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>

</html>
