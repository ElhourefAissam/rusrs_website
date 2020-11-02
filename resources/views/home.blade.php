<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="شبكة وحدة للسلامة الطرقية بالصحراء" />
        <meta name="author" content="AMZOUR Hicham" />
        <title>{{ config('app.name', 'شبكة وحدة للسلامة الطرقية بالصحراء') }}</title>
        <link rel="icon" type="image/x-icon" href="/public/assets/img/favicon.ico" />

        <link href="https://fonts.googleapis.com/css2?family=Harmattan&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
        <style>
            html{
                font-family: 'Harmattan', 'Montserrat' !important;
            }
            .v-application{
                font-family: 'Harmattan', 'Montserrat' !important;
            }
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
            <front-page />
            {{-- <admin-app/> --}}
        </div>


        <script src="{{ asset('js/app.js') }}"></script>

    </body>

</html>
