@extends('admin-dashboard.index')
@section('title','Fasilitas')
@section('content')
<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Daftar Fasilitas</h2>
         <a href="{{route('admin.create-facility-hotel')}}" class="bg-gray-700 text-white my-5 px-4 py-2 rounded">
            Tambah Fasilitas Hotel
        </a>
        {{--
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
        <div class="overflow-x-auto mt-5">
            <table class="w-full border-collapse border border-gray-300 text-left">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">No</th>
                        <th class="border border-gray-300 px-4 py-2">Fasilitas</th>
                        <th class="border border-gray-300 px-4 py-2">Deskripsi</th>
                        <th class="border border-gray-300 px-4 py-2">Aksi</th>
                        <th class="border border-gray-300 px-4 py-2"></th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($facilities as $facility )

                    <tr class="bg-white hover:bg-gray-100 hover:cursor-pointer">
                        <td class="border border-gray-300 px-4 py-2">{{$i++}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$facility->name}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$facility->description}}</td>
                        {{-- <td class="border border-gray-300 px-4 py-2">2</td>
                        <td class="border border-gray-300 px-4 py-2">2025-03-01</td>
                        <td class="border border-gray-300 px-4 py-2">2025-03-05</td>
                        <td class="border border-gray-300 px-4 py-2 text-green-600 font-semibold">Confirmed</td>
                        --}}
                        {{-- <td class="border border-gray-300 px-4 py-2">
                            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</button>
                        </td> --}}
                        <td class="border border-gray-300 px-4 py-2">
                            <form action="{{route('admin.delete-facility-hotel', $facility->id)}}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>

                            </form>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            {{-- <a href="" class="fixed bottom-6 right-6 bg-gray-700 font-bold text-white w-12 h-12 rounded-full shadow-lg flex items-center justify-center text-2xl hover:bg-gray-600">
                +
            </a> --}}
        </div>
    </div>

</body>
@endsection
