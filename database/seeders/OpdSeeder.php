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
                'name' => 'INSTANSI / LEMBAGA',
                'status' => '1'
            ],
            [
                'kode' => '02',
                'name' => 'SWASTA',
                'status' => '1'
            ],

        ];

        Instansi::insert($data);
    }
}
