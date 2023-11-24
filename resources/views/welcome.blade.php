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
    <body  style="background-color: rgb(245, 246, 245);">
        <div id="app" >

            <script src="{{ asset('/dist/js/app.js')}}"></script>
            {{-- <script src="{{ mix('js/appp.js') }}"></script> --}}
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
