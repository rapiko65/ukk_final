@extends('main')
@section('title','Errors')
@push('css')

  <style>
    body {
            background: url('{{asset('assets/bg_error.jpg')}}') no-repeat center center fixed;
            background-size: cover;
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
        }
        * {
            font-family: "Raleway", serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
        }
  </style>
@endpush

@section('container')
 <body class="bg-gray-900 text-white flex items-center justify-center min-h-screen">
  <div class="relative text-center">
   <div class="relative z-10">
    <h1 class="text-2xl font-bold">
     ERROR BRO WHAT YOU DOING?
    </h1>
    <h2 class="text-9xl font-bold mt-4">
     403
    </h2>
    <p class="text-xl mt-4">
     Page not found
    </p>
    <p class="mt-2">
     I tried to catch some fog, but I missed it
    </p>
    <a class="mt-6 inline-block px-6 py-2 border border-gray-300 rounded text-gray-300 hover:bg-[linear-gradient(rgba(255,255,255,0.1),rgba(255,255,255,0.1))] hover:backdrop-filter hover:backdrop-blur-md transition duration-300 ease-in-out hover:delay-150 " href="/">
     Back to Home
    </a>
    <footer class="mt-12 text-gray-400">
     {{-- © 2020 Fog error. All rights reserved --}}
     {{-- <a class="text-gray-300" href="#">
      W3layouts
     </a> --}}
    </footer>
   </div>
  </div>
 </body>
@endsection
