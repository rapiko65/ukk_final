@extends('main-dashboard.main')
@section('title','Facilities')
@section('content')
<div class="text-center my-12" id="rooms">
    <h2 class="text-3xl font-serif">FACILITY<br/></h2>
    <p class="text-gray-400 mb-8">Experience unparalleled luxury in the heart of Indonesia. Our hotel combines elegant design with world-class service to create unforgettable stays.</p>
</div>
<div class="flex my-5 mb-10 space-x-4">
    <!-- Card 1 -->
    @forelse ($facility as $facilities)
        <div class="w-full h-48 border border-black rounded-lg overflow-hidden shadow-md bg-zinc-900">
            <img src="{{asset($facilities->lokasi_file ? 'storage/' . $facilities->lokasi_file : 'images/asset_1.jpeg') }}" alt="Gambar 1" class="w-full h-36 object-cover">
            <div class="p-2 text-center">
                <p class="text-sm text-white">{{$facilities->name}}</p>
            </div>
        </div>
    @empty
        <div class="w-full text-center">
            <p class="text-white">Masih belum ada Fasilitas</p>
        </div>
    @endforelse
    
    <!-- Card 2 -->
    
</div>
@endsection