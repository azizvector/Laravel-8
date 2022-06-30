<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'isi',
        'kategori_id',
        'mahasiswa_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
