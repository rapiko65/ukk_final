@extends('admin-dashboard.index')
@section('title','Tambah Kamar')
@section('content')
<div class="container mt-5">
    <div class="flex justify-start mb-3">
        <a href="{{ url()->previous() }}" class="flex items-center text-gray-600 hover:text-gray-900">
            <i class="fa-solid fa-arrow-left mr-2"></i>
        </a>
    </div>
        <h2 class="mb-4 text-2xl font-bold">Tambah Kamar</h2>
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('success'))
        <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md mb-4" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{route('admin.store-room')}}" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="Tipe Kamar" class="block text-gray-700">Kamar</label>
                <input type="text" name="name" class="block w-full px-4 py-2 border-2 border-gray-300 rounded-md" id="Tipe Kamar" placeholder="Masukkan Kamar">
            </div>
            <div class="mb-3">
                <label for="Foto Kamar" class="block text-gray-700">Foto</label>
                <input type="file" name="lokasi_file" accept="image/*" class="block w-full px-4 py-2 border-2 border-gray-300 rounded-md" id="Foto Kamar">
            </div>
            <div class="mb-3">
                <label for="Tipe Kamar" class="block text-gray-700">Description</label>
                <input type="text" name="description" class="block w-full px-4 py-2 border-2 border-gray-300 rounded-md" id="Tipe Kamar" placeholder="Masukkan Deskripsi">
            </div>
            <div class="mb-3">
                <label for="Tipe Kamar" class="block text-gray-700">Price</label>
                <input type="number" name="price" class="block w-full px-4 py-2 border-2 border-gray-300 rounded-md" id="Tipe Kamar" placeholder="Masukkan Harga">
            </div>
            <div class="mb-3">
                <label for="Tipe Kamar" class="block text-gray-700">Capacity</label>
                <input type="number" name="capacity" class="block w-full px-4 py-2 border-2 border-gray-300 rounded-md" id="Tipe Kamar" placeholder="Masukkan Kapasitas">
            </div>
            <label for="role" class="block text-gray-700">Tipe Kamar</label>
        <select name="type_id" id="role" required class="block w-full px-4 py-2 border-2 border-gray-300 rounded-md">
            @foreach ($roomType as $roomTypes)
            <option value="{{$roomTypes->id}}">{{$roomTypes->type}}</option>
            @endforeach
        </select>
            {{-- <div class="mb-3">
                <label for="Tipe Kamar" class="block text-gray-700">Nama</label>
                <input type="text" name="name" class="block w-full px-4 py-2 border-2 border-gray-300 rounded-md" id="nama" value="{{$user->name}}" placeholder="Masukkan Nama Pelanggan">
            </div> --}}



            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Kirim</button>
        </form>
    </div>
 @endsection
