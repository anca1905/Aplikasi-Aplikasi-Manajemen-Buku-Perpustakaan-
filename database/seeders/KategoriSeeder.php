<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            'kategori' => 'Fiksi',
            'deskripsi' => 'Buku yang berisi cerita rekaan atau imajinatif yang tidak berdasarkan kejadian nyata.',
        ]);
        Kategori::create([
            'kategori' => 'Nonfiksi',
            'deskripsi' => 'Buku yang menyajikan informasi berdasarkan fakta dan data yang sebenarnya, meskipun dapat disajikan dalam gaya naratif.',
        ]);
        Kategori::create([
            'kategori' => 'Misteri/Detektif',
            'deskripsi' => 'Cerita tentang penyelidikan dan pemecahan kasus, seperti novel detektif.',
        ]);
        Kategori::create([
            'kategori' => 'Fiksi Ilmiah (SFF - Science Fiction and Fantasy)',
            'deskripsi' => 'Menggabungkan unsur sains, teknologi, dan imajinasi, sering kali dengan elemen fantasi seperti sihir atau dunia lain.',
        ]);
        Kategori::create([
            'kategori' => 'Roman',
            'deskripsi' => 'Cerita yang berfokus pada hubungan romantis.',
        ]);
        Kategori::create([
            'kategori' => 'Anak-anak/Remaja',
            'deskripsi' => 'Buku yang ditujukan untuk pembaca pada usia tertentu, sering kali dengan tema yang sesuai dengan perkembangan mereka.',
        ]);
        Kategori::create([
            'kategori' => 'Ilmu Pengetahuan',
            'deskripsi' => 'Membahas topik-topik ilmiah seperti fisika, kimia, biologi, astronomi, matematika, psikologi. Buku yang berisi cerita rekaan atau imajinatif yang tidak berdasarkan kejadian nyata.',
        ]);
        Kategori::create([
            'kategori' => 'Sosial dan Humaniora',
            'deskripsi' => 'Meliputi sejarah, politik, ekonomi, hukum, pendidikan, adat istiadat.',
        ]);
        Kategori::create([
            'kategori' => 'Seni dan Kerajinan',
            'deskripsi' => 'Buku tentang berbagai bentuk seni, teknik kerajinan, dan kreativitas.',
        ]);
        Kategori::create([
            'kategori' => 'Referensi',
            'deskripsi' => 'Kamus, ensiklopedia, atlas yang menyediakan informasi umum dan ringkas.',
        ]);
        Kategori::create([
            'kategori' => 'Buku Literatur/Akademik',
            'deskripsi' => 'Jurnal ilmiah, skripsi, tesis, disertasi, laporan penelitian, buku teks.',
        ]);
    }
}
