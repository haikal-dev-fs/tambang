<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="max-w-xl mx-auto mt-6 bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Tambah Data Tambang</h2>

        <form action="{{ route('tambang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="nama_tambang" class="block font-medium">Nama Tambang</label>
                <input type="text" name="nama_tambang" class="w-full border px-3 py-2 rounded"
                    value="{{ old('nama_tambang') }}">
                @error('nama_tambang')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="alamat" class="block font-medium">Alamat</label>
                <input type="text" name="alamat" class="w-full border px-3 py-2 rounded"
                    value="{{ old('alamat') }}">
                @error('alamat')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="lat" class="block font-medium">Latitude</label>
                <input type="text" name="lat" class="w-full border px-3 py-2 rounded"
                    value="{{ old('lat') }}">
                @error('lat')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="long" class="block font-medium">Longitude</label>
                <input type="text" name="long" class="w-full border px-3 py-2 rounded"
                    value="{{ old('long') }}">
                @error('long')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="images" class="block font-medium">Foto Tambang</label>
                <input type="file" name="images" class="w-full">
                @error('images')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between">
                <a href="/tambang"
                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 text-sm">Kembali</a>

                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 text-sm">Simpan</button>
            </div>


        </form>
    </div>
</x-layout>
