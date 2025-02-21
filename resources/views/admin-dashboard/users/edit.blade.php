@extends('admin-dashboard.index')
@section('title','Edit Users')
@section('content')
<div class="container mt-5">
    <div class="flex justify-start mb-3">
        <a href="{{ url()->previous() }}" class="flex items-center text-gray-600 hover:text-gray-900">
            <i class="fa-solid fa-arrow-left mr-2"></i>
        </a>
    </div>
        <h2 class="mb-4 text-2xl font-bold">Edit Data User</h2>
        <form action="{{route('admin.update-user', $user->id)}}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="block text-gray-700">Nama</label>
                <input type="text" name="name" class="block w-full px-4 py-2 border-2 border-gray-300 rounded-md" id="nama" value="{{$user->name}}" placeholder="Masukkan Nama User">
            </div>

            <label for="role" class="block text-gray-700">Role</label>
        <select name="role" id="role" required class="block w-full px-4 py-2 border-2 border-gray-300 rounded-md">
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
            <option value="resepsionis" {{ $user->role == 'resepsionis' ? 'selected' : '' }}>Resepsionis</option>
        </select>
            {{-- <div class="mb-3">
                <label for="nama" class="block text-gray-700">Alamat</label>
                <input type="text" name="Alamat" class="block w-full px-4 py-2 border-2 border-gray-300 rounded-md" value="{{$pelanggan->Alamat}}" id="nama" placeholder="Masukkan Alamat">
            </div> --}}
            {{-- <div class="mb-3">
                    <label for="notelpon" class="block text-gray-700">Nomor Telepon</label>
                    <input type="text" id="notelpon" name="NoTelepon" class="block w-full px-4 py-2 border-2 border-gray-300 rounded-md" value="{{$pelanggan->NoTelepon}}" placeholder="Masukkan Nomor Telepon" maxlength="15" pattern="[0-9]{10,15}" required
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" />

            </div> --}}
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Kirim</button>
        </form>
    </div>
 @endsection
