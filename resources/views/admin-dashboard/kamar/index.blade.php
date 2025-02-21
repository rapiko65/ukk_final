@extends('admin-dashboard.index')
@section('title','Type Kamar')
@section('content')
<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Daftar Kamar</h2>

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
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 text-left">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Nama Tamu</th>
                        <th class="border border-gray-300 px-4 py-2">Tipe Kamar</th>
                        <th class="border border-gray-300 px-4 py-2">Jumlah</th>
                        <th class="border border-gray-300 px-4 py-2">Check-in</th>
                        <th class="border border-gray-300 px-4 py-2">Check-out</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                        <th class="border border-gray-300 px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2">1</td>
                        <td class="border border-gray-300 px-4 py-2">John Doe</td>
                        <td class="border border-gray-300 px-4 py-2">Deluxe</td>
                        <td class="border border-gray-300 px-4 py-2">2</td>
                        <td class="border border-gray-300 px-4 py-2">2025-03-01</td>
                        <td class="border border-gray-300 px-4 py-2">2025-03-05</td>
                        <td class="border border-gray-300 px-4 py-2 text-green-600 font-semibold">Confirmed</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Detail</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection
