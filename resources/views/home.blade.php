<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="شبكة وحدة للسلامة الطرقية بالصحراء" />
        <meta name="author" content="AMZOUR Hicham" />
        <title>{{ config('app.name', 'شبكة وحدة للسلامة الطرقية بالصحراء') }}</title>
         {{-- change the image icon --}}
        <link rel="icon" type="image/x-icon" href="/public/assets/img/navbar-logo.jpg" />

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
        <div id="app">
            @dd(\Auth::check())
            <main-app />
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
