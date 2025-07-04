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

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
                    <div class="overflow-x-auto py-2">
                        <div class="flex space-x-4 w-max">
                            @foreach ($tambang->gambarTambang as $image)
                                <div
                                    class="relative w-60 h-40 group border border-gray-200 rounded shadow-sm overflow-hidden transition-opacity duration-300">
                                    <img src="{{ asset('storage/' . $image->image_path) }}"
                                        class="w-full h-full object-cover">

                                    <label
                                        class="absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded cursor-pointer z-10">
                                        <input type="checkbox" name="hapus_gambar[]" value="{{ $image->id }}"
                                            class="checkbox-hapus">
                                    </label>

                                    <div
                                        class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-[.terpilih]:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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

    <script>
        document.querySelectorAll('.checkbox-hapus').forEach((checkbox) => {
            checkbox.addEventListener('change', function() {
                const container = this.closest('.group');
                if (this.checked) {
                    container.classList.add('terpilih');
                    container.classList.add('opacity-50');
                } else {
                    container.classList.remove('terpilih');
                    container.classList.remove('opacity-50');
                }
            });
        });
    </script>

</body>

</html>
