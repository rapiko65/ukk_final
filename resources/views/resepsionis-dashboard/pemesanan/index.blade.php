@extends('resepsionis-dashboard.index')
@section('title','Pemesanan')
@section('content')
<body class="bg-gray-100 p-6">
    <div class=" bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Pemesanan</h2>
        {{-- <a href="{{route('admin.create-room-type')}}" class="bg-gray-700 text-white my-5 px-4 py-2 rounded">
            Tambah Tipe Kamar
        </a>
        <a href="{{route('admin.create-room')}}" class="bg-gray-700 ml-5 text-white my-5 px-4 py-2 rounded">
            Tambah Kamar
        </a> --}}
        @if ($errors->any())
                <div class="bg-red-100 border mt-5  border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 animate-pulse" role="alert">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    {{-- <div class="text-sm text-gray-600 mt-2"> Pesan ini akan hilang dalam 3 detik</div> --}}
                    <script>
                        setTimeout(() => {
                            document.querySelector('.animate-pulse').remove()
                        }, 3000)
                    </script>
                </div>
                @endif

                @if (session('success'))
                <div class="bg-green-100 border-t-4 mt-5 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md mb-4 animate-pulse" role="alert">
                    {{ session('success') }}
                    {{-- <div class="text-sm text-gray-600 mt-2"> Pesan ini akan hilang dalam 3 detik</div> --}}
                    <script>
                        setTimeout(() => {
                            document.querySelector('.animate-pulse').remove()
                        }, 3000)
                    </script>
                </div>
                @endif
        <div class="overflow-x-auto  mt-5">
            <table class="w-full border-collapse border border-gray-300 text-left">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">No</th>
                        <th class="border border-gray-300 px-4 py-2">Nama</th>
                        <th class="border border-gray-300 px-4 py-2">Email</th>
                        <th class="border border-gray-300 px-4 py-2">Kamar Yang Dipesanan</th>
                        <th class="border border-gray-300 px-4 py-2">Tipe Kamar Yang Dipesan</th>
                        <th class="border border-gray-300 px-4 py-2">Tanggal Check In</th>
                        <th class="border border-gray-300 px-4 py-2">Tanggal Check Out</th>
                        <th class="border border-gray-300 px-4 py-2">Total Harga</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                        <th class="border border-gray-300 px-4 py-2">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($reservation as $reservaties)
                    <tr class="bg-white hover:bg-gray-100 hover:cursor-pointer">
                        <td class="border border-gray-300 px-4 py-2">{{$i++}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$reservaties->user->name}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$reservaties->user->email}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$reservaties->quantity}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$reservaties->typeRoom->type}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$reservaties->check_in}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$reservaties->check_out}}</td>
                        <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($reservaties->typeRoom->price * $reservaties->quantity, 0, ',', '.') }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <div x-data="{ open: false, status: '{{ $reservaties->status }}' }" class="relative w-full h-full">
                                <button @click="open = !open"
                                        class="w-full h-full px-4 py-2 rounded-lg transition-all duration-200 flex items-center justify-between"
                                        :class="{
                                            'bg-yellow-100 text-yellow-800': status === 'pending',
                                            'bg-green-100 text-green-800': status === 'confirmed',
                                            'bg-blue-100 text-blue-800': status === 'checked_in',
                                            'bg-purple-100 text-purple-800': status === 'checked_out',
                                            'bg-red-100 text-red-800': status === 'cancelled'
                                        }">
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 rounded-full mr-2 flex-shrink-0"
                                             :class="{
                                                'bg-yellow-500': status === 'pending',
                                                'bg-green-500': status === 'confirmed',
                                                'bg-blue-500': status === 'checked_in',
                                                'bg-purple-500': status === 'checked_out',
                                                'bg-red-500': status === 'cancelled'
                                             }">
                                        </div>
                                        <span class="capitalize" x-text="status"></span>
                                    </div>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </button>

                                <form action="{{ route('resepsionis.reservations.updateStatus', $reservaties->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div x-show="open"
                                         @click.away="open = false"
                                         x-transition:enter="transition ease-out duration-300"
                                         x-transition:enter-start="opacity-0 transform scale-95 -translate-y-2"
                                         x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                                         x-transition:leave="transition ease-in duration-200"
                                         x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                                         x-transition:leave-end="opacity-0 transform scale-95 -translate-y-2"
                                         class="fixed z-50 w-48 mt-2 bg-white rounded-lg shadow-xl border border-gray-200"
                                         style="margin-top: 10px;">
                                        <div class="py-1">
                                            @foreach(['pending', 'confirmed', 'checked_in', 'checked_out', 'cancelled'] as $statusOption)
                                                <button type="submit"
                                                        name="status"
                                                        value="{{ $statusOption }}"
                                                        @click="status = '{{ $statusOption }}'"
                                                        class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 capitalize transition duration-150 ease-in-out
                                                        {{ $statusOption === 'pending' ? 'hover:text-yellow-600' : '' }}
                                                        {{ $statusOption === 'confirmed' ? 'hover:text-green-600' : '' }}
                                                        {{ $statusOption === 'checked_in' ? 'hover:text-blue-600' : '' }}
                                                        {{ $statusOption === 'checked_out' ? 'hover:text-purple-600' : '' }}
                                                        {{ $statusOption === 'cancelled' ? 'hover:text-red-600' : '' }}">
                                                    {{ $statusOption }}
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <form action="{{route('resepsionis.reservations.destroy', $reservaties->id)}}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 w-full text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>

                            </form>
                        </td>

                        {{-- <td class="border border-gray-300 px-4 py-2">

                            @forelse ($reservaties->facilities as $facility)
                            <ul class="space-y-4">
                                <li class="text-lg font-semibold text-blue-700">
                                    <ul class="pl-6 text-gray-700">

                                        <li class="text-sm">- {{ $facility->name }}</li>
                                    </ul>
                                </li>
                            </ul>
                            @empty
                            <ul class="space-y-4">
                                <li class="text-lg font-semibold text-blue-700">
                                    <ul class="pl-6 text-gray-700">

                                        <li class="text-sm">- Tidak Ada Fasilitas</li>
                                    </ul>
                                </li>
                            </ul>
                            @endforelse

                        </td> --}}
                        {{-- <td class="border border-gray-300 px-4 py-2">2</td>
                        <td class="border border-gray-300 px-4 py-2">2025-03-01</td>
                        <td class="border border-gray-300 px-4 py-2">2025-03-05</td>
                        <td class="border border-gray-300 px-4 py-2 text-green-600 font-semibold">Confirmed</td>
                        --}}
                        {{-- <td class="border border-gray-300 px-4 py-2">
                            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Lihat</button>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <form action="{{route('admin.delete-room-type', $roomTypes->id)}}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>

                            </form>
                        </td>  --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <a href="" class="fixed bottom-6 right-6 bg-gray-700 font-bold text-white w-12 h-12 rounded-full shadow-lg flex items-center justify-center text-2xl hover:bg-gray-600">
                +
            </a> --}}
        </div>
    </div>
    @endsection
</body>