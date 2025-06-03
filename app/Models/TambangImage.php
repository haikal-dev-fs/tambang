<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class TambangImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'tambang_id',
        'image_path'
    ];

    // Relasi ke model Tambang
    public function tambang()
    {
        return $this->belongsTo(Tambang::class);
    }
}
