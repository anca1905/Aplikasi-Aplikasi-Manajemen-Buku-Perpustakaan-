<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sirkulasi extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'buku_id',
        'noHp',
        'tgl_pinjam',
        'tgl_kembali',
        
    ];
}
