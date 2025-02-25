<div class="flex justify-between items-center mb-8">
    <div class="flex items-center space-x-4">
        {{-- <div class="bg-gray-200 p-4 rounded-lg ">
          <div class="overflow-hidden w-16 h-16 rounded-full">
            <img alt="User avatar" class="w-full h-full object-cover" height="50" src="{{asset('assets/pp_deafult.jpg')}}" width="50"/>
          </div>

        </div> --}}
        <div>
            <h1 class="text-2xl font-bold">Hello {{ auth()->user()->role }}</h1>
            {{-- <p class="text-gray-600">Selamat datang di kasirku, Enjoy for experience</p> --}}
        </div>
    </div>
    <div class="flex items-center space-x-4">
        {{-- <button class="focus:outline-none">
            <i class="fas fa-search text-xl"></i>
        </button> --}}
        {{-- <button class="focus:outline-none relative">
            <i class="fas fa-bell text-xl"></i>
            <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full px-1">1</span>
        </button> --}}
        <div x-data="{ open: false }" class="relative">
            <!-- Button -->
            <button
              @click="open = !open"
              class="overflow-hidden w-10 h-10 rounded-full"
            >
              <img
                alt="User avatar"
                class="w-full h-full object-cover"
                height="40"
                src="{{asset('assets/pp_deafult.jpg')}}"
                width="40"
              />
            </button>

            <!-- Dropdown -->
            <div
              x-show="open"
              @click.away="open = false"
              class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50"
            >
              <ul class="py-2">
                {{-- <li>
                  <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Settings</a>
                </li> --}}
                <li>
                  <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </li>
              </ul>
            </div>
          </div>
    </div>
</div>
