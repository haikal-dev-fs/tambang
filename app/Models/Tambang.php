<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tambang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'kode_tambang',
        'nama_tambang',
        'alamat',
        'lat',
        'long',
        'images'
    ];

    // Relasi ke model TambangImage
    public function gambarTambang()
    {
        return $this->hasMany(TambangImage::class, 'tambang_id', 'id'); 
    }
}
