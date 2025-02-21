@extends('main-dashboard.main')
@section('title','Rooms')
@section('content')
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
            <div class="bg-zinc-900 rounded-lg overflow-hidden">
                <img src="{{asset('images/asset_1.jpeg')}}" alt="Deluxe Family Room" class="w-full h-64 object-cover"/>
                <div class="p-6">
                    <h3 class="text-xl font-serif mb-2">Deluxe Family Room</h3>
                    <p class="text-gray-400 mb-4">$350 Per Night</p>
                    <div class="flex items-center mb-4">
                        <div class="flex text-amber-500">
                            ★★★★★
                        </div>
                        <span class="text-sm text-gray-400 ml-2">(5.0)</span>
                    </div>
                    <button class="w-full bg-amber-700 text-white py-2 rounded hover:bg-amber-800">
                        Book Now
                    </button>
                </div>
            </div>

            <!-- Room Card 2 -->
            <div class="bg-zinc-900 rounded-lg overflow-hidden">
                <img src="{{asset('images/asset_1.jpeg')}}" alt="Double Suite Room" class="w-full h-64 object-cover"/>
                <div class="p-6">
                    <h3 class="text-xl font-serif mb-2">Double Suite Room</h3>
                    <p class="text-gray-400 mb-4">$450 Per Night</p>
                    <div class="flex items-center mb-4">
                        <div class="flex text-amber-500">
                            ★★★★★
                        </div>
                        <span class="text-sm text-gray-400 ml-2">(5.0)</span>
                    </div>
                    <button class="w-full bg-amber-700 text-white py-2 rounded hover:bg-amber-800">
                        Book Now
                    </button>
                </div>
            </div>

            <!-- Room Card 3 -->
            <div class="bg-zinc-900 rounded-lg overflow-hidden">
                <img src="{{asset('images/asset_1.jpeg')}}" alt="Superior Bed Room" class="w-full h-64 object-cover"/>
                <div class="p-6">
                    <h3 class="text-xl font-serif mb-2">Superior Bed Room</h3>
                    <p class="text-gray-400 mb-4">$550 Per Night</p>
                    <div class="flex items-center mb-4">
                        <div class="flex text-amber-500">
                            ★★★★★
                        </div>
                        <span class="text-sm text-gray-400 ml-2">(5.0)</span>
                    </div>
                    <button class="w-full bg-amber-700 text-white py-2 rounded hover:bg-amber-800">
                        Book Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection