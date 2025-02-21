@extends('admin-dashboard.index')
@section('title','Tambah Fasilitas Kamar')
@section('content')
<div class="container mt-5">
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
    <div class="flex justify-start mb-3">
        <a href="{{ url()->previous() }}" class="flex items-center text-gray-600 hover:text-gray-900">
            <i class="fa-solid fa-arrow-left mr-2"></i>
        </a>
    </div>
        <h2 class="mb-4 text-2xl font-bold">Tambah Fasilitas Kamar</h2>
        <form action="{{route('admin.store-facility')}}" method="POST" class="space-y-4">
            @csrf
            <div class="mb-3">
                <label for="Tipe Kamar" class="block text-gray-700">Fasilitas</label>
                <input type="text" name="name" class="block w-full px-4 py-2 border-2 border-gray-300 rounded-md" id="Tipe Kamar" placeholder="Masukkan Fasilitas">
            </div>
            <div class="mb-3">
                <label for="Tipe Kamar" class="block text-gray-700">Deskripsi</label>
                <input type="text" name="description" class="block w-full px-4 py-2 border-2 border-gray-300 rounded-md" id="Tipe Kamar" placeholder="Masukkan Fasilitas">
            </div>
            <div class="mb-3">
                <label class="block">Tipe Kamar yang Mendukung Fasilitas Ini</label>
            @foreach($roomTypes as $type)
                <div>
                    <input type="checkbox" name="type_rooms[]" value="{{ $type->id }}">
                    <label>{{ $type->type }}</label>
                </div>
            @endforeach
            </div>
            
            {{-- <div class="mb-3">
                <label for="Tipe Kamar" class="block text-gray-700">Nama</label>
                <input type="text" name="name" class="block w-full px-4 py-2 border-2 border-gray-300 rounded-md" id="nama" value="{{$user->name}}" placeholder="Masukkan Nama Pelanggan">
            </div> --}}



            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Kirim</button>
        </form>
    </div>
 @endsection
