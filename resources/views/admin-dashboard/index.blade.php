@extends('main')
@section('title','admin-dashboard')
@section('container')
<body class="bg-gray-100 flex h-screen">

    <!-- Sidebar -->
    <div class="bg-black text-white w-20 flex flex-col justify-between items-center py-5 rounded-[1rem] m-4 mr-0" style="filter: drop-shadow(0px 0px 10px #00000085);">
      <!-- Logo -->
      <!-- Menu Items -->
      <nav x-data="{ active: '{{ Route::currentRouteName() }}' }" class="flex flex-col space-y-6 bg-black text-white w-20 py-5 items-center">
        <!-- Logo -->
        {{-- <div class="text-3xl font-bold text-center">K.</div> --}}

        <!-- Menu Items -->
        <a
          href="{{route('admin.dashboard')}}"
          @click="active = 'admin.dashboard'"
          :class="active === 'admin.dashboard' ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white'"
          class="text-xl p-3 rounded-lg"
        >
          <i class="fa-solid fa-house"></i>
        </a>

        <a
          href="{{route('admin.users')}}"
          @click="active = 'admin.users'"
          :class="active === 'admin.users' ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white'"
          class="text-xl p-3 rounded-lg"
        >
        <i class="fa-solid fa-users"></i>
        </a>

        <a
          href="{{route('admin.rooms')}}"
          @click="active = 'admin.rooms'"
          :class="active === 'admin.rooms' ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white'"
          class="text-xl p-3 rounded-lg"
        >
        <i class="fa-solid fa-bed"></i>
        </a>
        <a
          href="{{route('admin.facilities')}}"
          @click="active = 'admin.facilities'"
          :class="active === 'admin.facilities' ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white'"
          class="text-xl p-3 rounded-lg"
        >
        <i class="fa-solid fa-face-smile"></i>
        </a>
      </nav>

      <!-- Logout -->
    </div>

    <!-- Content Placeholder -->
    <div class="flex-1 p-10">
      @include('admin-dashboard.header')
      @yield('content')
    </div>

  </body>
@endsection
@push('script')

@endpush
