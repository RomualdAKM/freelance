<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FRE2E COMPANY</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

       <link rel="stylesheet" href="{{ asset('/dist/css/app.css')}}" />
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        
    </head>
    <body  style="background-color: rgb(3, 163, 3); z-index: 1000;">
        <div id="app" style="background-color: rgb(4, 141, 4);">
            {{-- <script src="{{ mix('js/appp.js') }}"></script> --}}
        </div>
        <script src="{{ asset('/dist/js/app.js')}}"></script>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
