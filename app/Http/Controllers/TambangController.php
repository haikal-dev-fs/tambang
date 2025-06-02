<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tambang;
use Illuminate\Support\Facades\DB;

class TambangController extends Controller
{
    public function index() {
        $tambangs = Tambang::all();
        return view('tambang', [
            'title' => 'Lokasi Tambang',
            'tambangs' => $tambangs
        ]);
    }

    public function show($kode_tambang) {
        $tambang = Tambang::where('kode_tambang', $kode_tambang)->firstOrFail();

        return view('detail', [
            'title' => 'Detail Tambang',
            'tambang' => $tambang
        ]);
    }
}
