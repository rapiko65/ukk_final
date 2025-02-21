<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hotel Prima | @yield('title')</title>
        <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
        @vite(['resources/css/app.css','resources/js/app.js'])
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        @stack('css')

        <style>
    html {
        /* scroll-margin-top: 40px; */
        scroll-behavior: smooth;
        /* scrollbar-width: thin; */
    }

    body::-webkit-scrollbar {
        width: 8px;
    }

    body::-webkit-scrollbar-track {
        background: #1a1a1a;
    }

    body::-webkit-scrollbar-thumb {
        background-color: #444;
        border-radius: 10px;
        border: 2px solid #1a1a1a;
        padding: 5px;
    }

    input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
        </style>
    </head>
<body>
    @yield('container')
    @stack('script')
</body>
</html>
