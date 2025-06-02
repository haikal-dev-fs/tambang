<?php

namespace App\Http\Controllers;

use App\Models\Tambang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TambangController extends Controller
{
    public function index()
    {
        $tambangs = Tambang::all();
        return view('tambang', [
            'title' => 'Lokasi Tambang',
            'tambangs' => $tambangs
        ]);
    }

    public function show($kode_tambang)
    {
        $tambang = Tambang::where('kode_tambang', $kode_tambang)->firstOrFail();

        return view('detail', [
            'title' => 'Detail Tambang',
            'tambang' => $tambang
        ]);
    }

    public function create()
    {
        return view('tambang_create', ['title' => 'Tambah Data Tambang']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_tambang' => 'required',
            'alamat' => 'required',
            'lat' => 'required|numeric',
            'long' => 'required|numeric',
            'images' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $image = $request->file('images');
        $extension = $image->getClientOriginalExtension();
        $namaTambang = Str::slug($validated['nama_tambang']); // supaya aman dipakai jadi nama file
        $filename = $namaTambang . '.' . $extension;
        $image->storeAs('tambang', $filename, 'public');

        Tambang::create([
            'kode_tambang' => 'TMB-' . strtoupper(Str::random(5)),
            'nama_tambang' => $validated['nama_tambang'],
            'alamat' => $validated['alamat'],
            'lat' => $validated['lat'],
            'long' => $validated['long'],
            'images' => 'tambang/' . $filename, // simpan path-nya
        ]);

        return redirect('/tambang')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($kode_tambang)
    {
        $tambang = Tambang::where('kode_tambang', $kode_tambang)->firstOrFail();
        return view('tambang.edit', [
            'title' => 'Edit Tambang',
            'tambang' => $tambang
        ]);
    }

    public function update(Request $request, $kode_tambang)
    {
        $request->validate([
            'kode_tambang' => 'required',
            'nama_tambang' => 'required',
            'alamat'       => 'required',
            'lat'          => 'required',
            'long'         => 'required',
            'images'       => 'nullable'
        ]);

        // Ambil data tambang berdasarkan kode_tambang
        $tambang = Tambang::where('kode_tambang', $kode_tambang)->firstOrFail();
        // Hapus kode_tambang dari request agar tidak ikut terupdate
        $request->request->remove('kode_tambang');
        // Update data selain kode_tambang
        $tambang->update($request->all());

        return redirect()->route('tambang')->with('success', 'Data Berhasil diperbarui');
    }

    public function destroy($kode_tambang)
    {
        Tambang::destroy($kode_tambang);
        return redirect()->route('tambang.index')->with('success', 'Data Berhasil dihapus');
    }
}
