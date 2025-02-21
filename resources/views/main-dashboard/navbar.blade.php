
    @if (auth()->user())
    <nav class="absolute top-0 w-full z-50 px-8 py-6 flex justify-between items-center">
        <div class="text-2xl font-serif">SMEGRIMA.</div>
        <div class="flex space-x-8 mr-16">
            <a href="{{route('home')}}" class="text-white hover:text-gray-300">Home</a>
            <a href="{{route('rooms')}}" class="text-white hover:text-gray-300">Rooms</a>
            <a href="#" class="text-white hover:text-gray-300">Facility</a>
            <a href="#" class="text-white hover:text-gray-300">Contact</a>
        </div>
    @else
    <nav class="absolute top-0 w-full z-50 px-8 py-6 flex justify-between items-center">
        <div class="text-2xl mr-20 font-serif">SMEGRIMA.</div>
        <div class="flex space-x-8">
            <a href="{{route('home')}}" class="text-white hover:text-gray-300">Home</a>
            <a href="{{route('rooms')}}" class="text-white hover:text-gray-300">Rooms</a>
            <a href="#" class="text-white hover:text-gray-300">Facility</a>
            <a href="#" class="text-white hover:text-gray-300">Contact</a>
        </div>
        @endif
        <div class="flex">
            @if (auth()->user())

            <div class="relative" x-data="{ open: false }">
                <!-- Button -->
                <button @click="open = !open" class="px-4 py-2 rounded focus:outline-none">
                    {{-- <img src="{{ auth()->user()->profile_picture ? asset('images/' . auth()->user()->profile_picture) : asset('images/default_pict.jpg') }}"
                    alt="Foto Profil"
                    class="profile-picture"
                    style="width: 30; height: 30; border-radius: 50%;"> --}}
                    <div class="bg-white py-2 px-3 rounded-full">
                    <i class="fa-solid fa-user text-amber-600"></i>
                    </div>
                </button>

                <!-- Dropdown Content -->
                <div x-show="open"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform scale-95"
                     x-transition:enter-end="opacity-100 transform scale-100"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 transform scale-100"
                     x-transition:leave-end="opacity-0 transform scale-95"
                     class="absolute z-[99] right-0 mt-2 w-48 bg-amber-800  rounded-lg shadow-lg ">
                    <a href="" class="block px-4 py-2 text-white rounded-lg hover:bg-amber-900 ">Profile Saya</a>
                    {{-- <button class="block px-4 py-2 text-gray-700 hover:bg-gray-100 w-full ">asdas</button> --}}
                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-white rounded-lg hover:bg-amber-900" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    {{-- <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Option 3</a> --}}
                </div>

            @else

            <a href="{{route('register')}}" class="border-amber-500 border  text-white px-6 py-2 mx-5 rounded hover:bg-amber-600">
                Sign in
            </a>
            <a href="{{route('login')}}" class="bg-amber-700 text-white px-6 py-2 rounded hover:bg-amber-800">
                Log in
            </a>
            @endif
        </div>
    </nav>