<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'jenkel',
        'alamat',
        'foto',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
