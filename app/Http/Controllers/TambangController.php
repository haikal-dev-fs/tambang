<?php

namespace App\Http\Controllers;

use App\Models\Tambang;
use Illuminate\Support\Str;
use App\Models\TambangImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Container\Attributes\Storage;

class TambangController extends Controller
{
    public function index()
    {
        $tambangs = Tambang::with('gambarTambang')->get(); // ini penting agar data relasi ikut di-load

        foreach ($tambangs as $tambang) {

            $images = TambangImage::where('tambang_id', $tambang->id)->get();

            if ($images->isNotEmpty()) {

                $imagesExists = $images->map(function ($image) {
                    return asset('storage/' . $image->image_path);
                })->toArray();

                $tambang->image_path = $imagesExists; // jika ada gambar, set ke array dari URL gambar
            } else {
                $tambang->image_path = null; // jika tidak ada gambar, set ke null
            }
        }


        return view('tambang', [
            'title' => 'Lokasi Tambang',
            'tambangs' => $tambangs
        ]);
    }

    public function show($kode_tambang)
    {
        $tambang = Tambang::where('kode_tambang', $kode_tambang)->firstOrFail();

        $images = TambangImage::where('tambang_id', $tambang->id)->get();
        if ($images->isNotEmpty()) {
            $tambang->image_path = $images->map(function ($image) {
                return asset('storage/' . $image->image_path);
            })->toArray();
        } else {
            $tambang->image_path = null; // jika tidak ada gambar, set ke null
        }


        return view('tambang.detail', [
            'title' => 'Detail Tambang',
            'tambang' => $tambang
        ]);
    }

    public function create()
    {
        return view('tambang.tambang_create', ['title' => 'Tambah Data Tambang']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_tambang' => 'required',
            'alamat' => 'required',
            'lat' => 'required|numeric',
            'long' => 'required|numeric',
            'images.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan data utama tambang
        $tambang = Tambang::create([
            'kode_tambang' => 'TMB-' . strtoupper(Str::random(5)),
            'nama_tambang' => $validated['nama_tambang'],
            'alamat' => $validated['alamat'],
            'lat' => $validated['lat'],
            'long' => $validated['long'],
            'images' => null // jika tidak digunakan, boleh dihapus dari tabel
        ]);

        // Proses multiple image upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
                $image->storeAs('tambang', $filename, 'public');

                TambangImage::create([
                    'tambang_id' => $tambang->id,
                    'image_path' => 'tambang/' . $filename,
                ]);
            }
        }

        return redirect('/tambang')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($kode_tambang)
    {
        $tambang = Tambang::with('gambarTambang')->where('kode_tambang', $kode_tambang)->firstOrFail();

        return view('tambang.edit', [
            'title' => 'Edit Tambang',
            'tambang' => $tambang
        ]);
    }

    public function update(Request $request, $kode_tambang)
    {
        $request->validate([
            'nama_tambang' => 'required',
            'alamat'       => 'required',
            'lat'          => 'required',
            'long'         => 'required',
            'images.*'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Ambil data tambang berdasarkan kode_tambang
        $tambang = Tambang::where('kode_tambang', $kode_tambang)->firstOrFail();

        // Update data dasar
        $tambang->update($request->only('nama_tambang', 'alamat', 'lat', 'long'));

        // Upload dan simpan gambar baru jika ada
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('images', 'public'); // simpan di storage/app/public/images

                TambangImage::create([
                    'tambang_id' => $tambang->id, // pastikan ini pk tambang
                    'image_path' => $path,
                ]);
            }
        }


        return redirect()->route('tambang.index')->with('success', 'Data Berhasil diperbarui');
    }

    public function destroy($kode_tambang)
    {
        Tambang::destroy($kode_tambang);
        return redirect()->route('tambang.index')->with('success', 'Data Berhasil dihapus');
    }
}
