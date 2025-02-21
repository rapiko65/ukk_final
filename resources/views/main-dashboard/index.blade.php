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

    </style>
</head>
<body class="bg-black text-white">
    <!-- Hero Section -->
    @include('main-dashboard.navbar')
    <header class="relative h-screen">
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

    <!-- Booking Bar -->
    <div class="bg-zinc-900 py-4">
        <div class="container mx-auto flex justify-between items-center px-4" x-data="{ checkIn: '', checkOut: '', guests: 1 }">
            <div class="flex space-x-8">
                <div>
                    <label class="block text-sm text-gray-400">Check In</label>
                    <input type="date" x-model="checkIn" class="bg-transparent border-b border-gray-700 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm text-gray-400">Check Out</label>
                    <input type="date" x-model="checkOut" class="bg-transparent border-b border-gray-700 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm text-gray-400">Guests</label>
                    <select x-model="guests" class="bg-transparent border-b border-gray-700 focus:outline-none">
                        <option value="1" class="text-black">1 Guest</option>
                        <option value="2" class="text-black">2 Guests</option>
                        <option value="3" class="text-black">3 Guests</option>
                        <option value="4" class="text-black">4 Guests</option>
                    </select>
                </div>
            </div>
            <button class="bg-amber-700 text-white px-6 py-2 rounded hover:bg-amber-800">
                Check Availability
            </button>
        </div>
    </div>

    <!-- Rooms Section -->
    <section class="py-20 bg-black" id="rooms">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-serif mb-4">SMEGRIMA'S ROOMS & SUITES</h2>
                <p class="text-gray-400">Experience luxury and comfort in our carefully designed rooms and suites</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Room Card 1 -->
                @foreach ($roomType as $typeRooms)
                    
                <div class="bg-zinc-900 rounded-lg overflow-hidden">
                    <img src="{{asset('images/asset_1.jpeg')}}" alt="Deluxe Family Room" class="w-full h-64 object-cover"/>
                    <div class="p-6">
                        <h3 class="text-xl font-serif mb-2">{{$typeRooms->type}}</h3>
                        <p class="text-gray-400 mb-4">${{$typeRooms->rooms[0]->price}} Per Night</p>
                        {{-- <div class="flex items-center mb-4">
                            <div class="flex text-amber-500">
                                ★★★★
                            </div>
                            <span class="text-sm text-gray-400 ml-2">(5.0)</span>
                        </div> --}}
                        <button class="w-full bg-amber-700 text-white py-2 rounded hover:bg-amber-800">
                            Book Now
                        </button>
                    </div>
                </div>
                
                @endforeach
                
            </div>
        </section>
        
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
