<?php

namespace Database\Seeders;

use App\Models\ProfileOpd;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileOpdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfileOpd::create([
            'judul' => 'Website Fasilitasi dan Pengelolaan Pengetahuan Kerja Sama Daerah Wonosobo',
            'isi' => 'Media digital tunggal untuk mengelola fasilitasi dan pengelolaan pengetahuan kerja sama daerah di Pemerintah daerah wonosobo.',
            'gambar' => 'asiksobo/img/kerjasama.png',
        ]);
    }
}
