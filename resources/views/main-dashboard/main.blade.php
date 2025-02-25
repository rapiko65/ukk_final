<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Smegrima | Home</title>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
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
<body class="bg-black text-white">
    <div x-data="{
        showSuccessNotification: {{ session()->has('success') ? 'true' : 'false' }},
        showErrorNotification: {{ session()->has('error') ? 'true' : 'false' }}
     }"
     x-init="() => {
        if (showSuccessNotification) {
            setTimeout(() => {
                showSuccessNotification = false;
            }, 3000);
        }
        if (showErrorNotification) {
            setTimeout(() => {
                showErrorNotification = false;
            }, 3000);
        }
     }">
    <!-- Success Notification -->
    <div x-show="showSuccessNotification"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="transform translate-x-full opacity-0"
         x-transition:enter-end="transform translate-x-0 opacity-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="transform translate-x-0 opacity-100"
         x-transition:leave-end="transform translate-x-full opacity-0"
         class="fixed  top-24 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
        <div class="flex items-center space-x-2">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    </div>

    <!-- Error Notification -->
    <div x-show="showErrorNotification"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="transform translate-x-full opacity-0"
         x-transition:enter-end="transform translate-x-0 opacity-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="transform translate-x-0 opacity-100"
         x-transition:leave-end="transform translate-x-full opacity-0"
         class="fixed top-24 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
        <div class="flex items-center space-x-2">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
        </div>
    </div>
</div>
    <!-- Hero Section -->
    @include('main-dashboard.navbar')

        <div class="relative h-full">
            <img src="{{ asset('images/asset_5.jpeg')}}" alt="Luxury Hotel Room" class="w-full h-full object-cover"/>
            <div class="absolute inset-0 bg-black bg-opacity-70"></div>
            <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-4">
                <p class="text-lg mb-2">LUXURY HOTEL IN INDONESIA</p>
                <h1 class="text-6xl font-serif mb-6">THE BEST LUXURY HOTEL<br/>IN INDONESIA</h1>
                <a href="#rooms" class="bg-amber-700 text-white px-8 py-3 rounded hover:bg-amber-800">
                    Discover More
                </a>
            </div>
        </div>
    </header>

    @yield('content')
    

    <!-- Stats Section -->
    <section class="py-20 bg-zinc-900">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <img src="{{asset('images/asset_3.jpeg')}}" alt="Luxury Room" class="w-full h-96 object-cover rounded-lg"/>
                </div>
                <div class="flex flex-col justify-center">
                    <h2 class="text-3xl font-serif mb-6">LUXURY BEST HOTEL IN CITY<br/>JEMBER, INDONESIA</h2>
                    <p class="text-gray-400 mb-8">Experience unparalleled luxury in the heart of Indonesia. Our hotel combines elegant design with world-class service to create unforgettable stays.</p>
                    <div class="flex space-x-12">
                        <div>
                            <p class="text-4xl font-serif text-amber-500 mb-2">250+</p>
                            <p class="text-gray-400">Rooms</p>
                        </div>
                        <div>
                            <p class="text-4xl font-serif text-amber-500 mb-2">49</p>
                            <p class="text-gray-400">Facility</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>


</body>
</html>
