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

input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
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
    {{-- <div class="bg-zinc-900 py-4">
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
    </div> --}}

    <!-- Rooms Section -->
    <section class="py-20 bg-black" id="rooms">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-serif mb-4">SMEGRIMA'S ROOMS & SUITES</h2>
                <p class="text-gray-400">Experience luxury and comfort in our carefully designed rooms and suites</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Room Card 1 -->
                @foreach ($roomType->take(3) as $typeRooms)
                <div class="bg-zinc-900 rounded-lg overflow-hidden">
                    <img src="{{asset($typeRooms->rooms->first()?->lokasi_file ? 'storage/' . $typeRooms->rooms->first()->lokasi_file : 'images/asset_1.jpeg') }}" alt="Deluxe Family Room" class="w-full h-64 object-cover"/>
                    <div class="p-6">
                        <h3 class="text-xl font-serif mb-2">{{$typeRooms->type}}</h3>
                        <div class="bg-amber-700 text-white text-xs px-2 py-1 rounded inline-block mb-2">Recommended</div>
                        <p>Fasilitas Kamar</p>
                        @forelse ($typeRooms->facilities as $facility)
                            <ul class="mb-2">
                                <li class="text-lg font-semibold text-blue-700">
                                    <ul class=" text-gray-400">
                                        <li class="text-sm">- {{ $facility->name }}</li>
                                    </ul>
                                </li>
                            </ul>
                        @empty
                            <ul class="mb-2">
                                <li class="text-lg font-semibold text-blue-700">
                                    <ul class=" text-gray-400">
                                        <li class="text-sm">- Tidak Ada Fasilitas</li>
                                    </ul>
                                </li>
                            </ul>
                        @endforelse
                        <p class="text-gray-400 mb-4">Rp {{ $typeRooms->price ?? 'Price not available' }} Per Night</p>

                        @if($typeRooms->rooms->count() > 0)
                            <div x-data="{ isOpen: false }" class="relative">
                                <!-- Modal Trigger Button -->
                                <div x-data="{ showLoginAlert: false }">
                                    @auth
                                        <button @click="isOpen = true" class="w-full bg-amber-700 text-white py-2 rounded hover:bg-amber-800">
                                            Book Now
                                        </button>
                                    @else
                                        <button @click="showLoginAlert = true" class="w-full bg-amber-700 text-white py-2 rounded hover:bg-amber-800">
                                            Book Now
                                        </button>
                                        <!-- Login Alert Modal -->
                                        <div x-show="showLoginAlert" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
                                            <div class="bg-zinc-900 p-6 rounded-lg max-w-sm w-full mx-4">
                                                <h3 class="text-xl mb-4">Please Login</h3>
                                                <p class="text-gray-400 mb-4">You need to login first before booking a room.</p>
                                                <div class="flex justify-end space-x-3">
                                                    <button @click="showLoginAlert = false" class="px-4 py-2 text-gray-400 hover:text-white">
                                                        Cancel
                                                    </button>
                                                    <a href="{{ route('login') }}" class="bg-amber-700 text-white px-4 py-2 rounded hover:bg-amber-800">
                                                        Login
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endauth
                                </div>

                                <!-- Modal Content -->
                                <div x-show="isOpen" class="fixed inset-0 bg-black bg-opacity-50 z-40 flex items-center justify-center">
                                <!-- Modal Content -->
                                <div class="bg-zinc-900 p-8 rounded-lg w-full max-w-md relative" @click.away="isOpen = false">
                                    <!-- Close Button -->
                                    <button @click="isOpen = false" class="absolute top-4 right-4 text-gray-400 hover:text-white">
                                        <i class="fas fa-times"></i>
                                    </button>

                                    <!-- Form -->
                                    <form action="{{ route('reservations.store') }}" method="POST" class="space-y-6">
                                        @csrf
                                        <h2 class="text-2xl font-serif mb-6">Book Your Stay</h2>

                                        <!-- Hidden input untuk mengirim type_id -->
                                        <input type="hidden" name="type_id" value="{{ $typeRooms->id }}">

                                        @if($typeRooms->quantity > 0)
                                            <!-- Input Check-In -->
                                            <div>
                                                <label class="block text-gray-400 mb-2">Check-In Date</label>
                                                <input type="date" name="check_in" class="w-full bg-zinc-800 rounded px-4 py-2" required>
                                            </div>

                                            <!-- Input Check-Out -->
                                            <div>
                                                <label class="block text-gray-400 mb-2">Check-Out Date</label>
                                                <input type="date" name="check_out" class="w-full bg-zinc-800 rounded px-4 py-2" required>
                                            </div>

                                            <!-- Input Jumlah Kamar -->
                                            <div x-data="{
                                                quantity: 1,
                                                maxRooms: {{ $typeRooms->quantity }},
                                                showAlert: false,
                                                }"
                                                x-init="$watch('quantity', value => updateRoomInputs())">
                                                <label class="block text-gray-400 mb-2">Jumlah Kamar</label>
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    x-model="quantity"
                                                    min="1"
                                                    :max="maxRooms"
                                                    @input="
                                                        if (quantity > maxRooms) {
                                                            showAlert = true;
                                                            setTimeout(() => showAlert = false, 3000);
                                                        }
                                                    "
                                                    class="w-full bg-zinc-800 rounded px-4 py-2"
                                                    required
                                                >
                                                <div id="room-inputs">
                                                    <!-- Room IDs akan dimasukkan secara dinamis -->
                                                </div>
                                                <div
                                                    x-show="showAlert"
                                                    x-transition:enter="transition ease-out duration-300"
                                                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                                                    x-transition:enter-end="opacity-100 transform translate-y-0"
                                                    x-transition:leave="transition ease-in duration-300"
                                                    x-transition:leave-start="opacity-100 transform translate-y-0"
                                                    x-transition:leave-end="opacity-0 transform -translate-y-2"
                                                    class="text-red-500 text-sm mt-2"
                                                >
                                                    Maksimal kamar tersedia adalah {{ $typeRooms->quantity }}
                                                </div>
                                            </div>

                                            <!-- Tombol Submit -->
                                            <button type="submit" class="w-full bg-amber-700 text-white py-2 rounded hover:bg-amber-800">
                                                Submit Booking
                                            </button>
                                        @else
                                            <div class="text-red-500 bg-red-100/10 p-4 rounded text-center">
                                                Maaf, tidak ada kamar yang tersedia untuk tipe ini
                                            </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                                <!-- [Rest of your modal code remains the same] -->
                            </div>
                        @else
                            <div class="text-red-500 bg-red-100/10 p-4 rounded text-center">
                                Semua Kamar Telah Ada Yang Memesan
                            </div>
                        @endif
                    </div>
                </div>
                @endforeach

            </div>
        </section>

        <!-- Modal Form -->

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
                            <p class="text-4xl font-serif text-amber-500 mb-2">{{$roomType->count()}}</p>
                            <p class="text-gray-400">Rooms</p>
                        </div>
                        {{-- <div>
                            <p class="text-4xl font-serif text-amber-500 mb-2">{{$roomType->facilities->count()}}</p>
                            <p class="text-gray-400">Facility</p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>


</body>
</html>
