<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Tutorial Kerja Sama Daerah'
            ],
            [
                'name' => 'Contoh Surat Penawaran / Pengajuan, KAK / Studi Kelayakan'
            ],
            [
                'name' => 'Peraturan Kerja Sama Daerah'
            ],

        ];

        Kategori::insert($data);
    }
}
