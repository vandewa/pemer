<?php

namespace Database\Seeders;

use App\Models\Instansi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OpdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode' => '01',
                'name' => 'Pemerintah Daerah',
                'status' => '1'
            ],
            [
                'kode' => '02',
                'name' => 'Instansi Pemerintah Pusat',
                'status' => '1'
            ],
            [
                'kode' => '03',
                'name' => 'Pihak Ketiga',
                'status' => '1'
            ],

        ];

        Instansi::insert($data);
    }
}
