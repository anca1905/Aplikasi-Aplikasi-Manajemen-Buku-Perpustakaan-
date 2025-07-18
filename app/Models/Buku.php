<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = [

        'image',
        'judul',
        'ISBN',
        'penulis',
        'tahun',
        'kategori_id',
        
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function sirkulasi(){
        return $this->hasMany(Buku::class, 'buku_id');
    }


}
