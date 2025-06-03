<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Tambang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Edit Data Tambang</h2>

        <form action="{{ route('tambang.update', $tambang->kode_tambang) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700">Kode Tambang</label>
                <input type="text" name="kode_tambang" value="{{ $tambang->kode_tambang }}" readonly
                    class="w-full mt-1 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Tambang</label>
                <input type="text" name="nama_tambang" value="{{ $tambang->nama_tambang }}"
                    class="w-full mt-1 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Alamat</label>
                <input type="text" name="alamat" value="{{ $tambang->alamat }}"
                    class="w-full mt-1 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Latitude</label>
                <input type="text" name="lat" value="{{ $tambang->lat }}"
                    class="w-full mt-1 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Longitude</label>
                <input type="text" name="long" value="{{ $tambang->long }}"
                    class="w-full mt-1 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Saat Ini:</label>
                @if ($tambang->gambarTambang && $tambang->gambarTambang->count() > 0)
                    <div class="flex space-x-4 mb-4">
                        @foreach ($tambang->gambarTambang as $image)
                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                class="w-20 h-16 object-cover rounded shadow-sm border border-gray-200">
                        @endforeach
                    </div>
                @else
                    <span class="text-gray-400 italic">Tidak ada gambar</span>
                @endif

            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Upload Gambar Baru (boleh lebih dari 1):</label>
                <input type="file" name="images[]" multiple class="w-full mt-1" accept="image/*">
            </div>

            <div class="flex justify-between mt-6">
                <a href="{{ route('tambang.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Kembali</a>
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</body>

</html>
