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
                'name' => 'DPMPTSP',
                'antrian' => '1'
            ],
            [
                'kode' => '02',
                'name' => 'DISKOMINFO',
                'antrian' => '1'
            ],
            [
                'kode' => '03',
                'name' => 'DPUPR',
                'antrian' => '1'
            ],
            [
                'kode' => '04',
                'name' => 'BPPKAD',
                'antrian' => '1'
            ],
            [
                'kode' => '05',
                'name' => 'DLH',
                'antrian' => '1'
            ],
            [
                'kode' => '06',
                'name' => 'BAPPEDA',
                'antrian' => '1'
            ],
            [
                'kode' => '07',
                'name' => 'PARIWISATA',
                'antrian' => '1'
            ],
            [
                'kode' => '08',
                'name' => 'KESBANGPOL',
                'antrian' => '1'
            ],
            [
                'kode' => '09',
                'name' => 'ARPUSDA',
                'antrian' => '1'
            ],
            [
                'kode' => '10',
                'name' => 'BPBD',
                'antrian' => '1'
            ],
            [
                'kode' => '11',
                'name' => 'INSPEKTORAT',
                'antrian' => '1'
            ],
            [
                'kode' => '12',
                'name' => 'DISPERINDAGKOP',
                'antrian' => '1'
            ],
            [
                'kode' => '13',
                'name' => 'DINKES',
                'antrian' => '1'
            ],
            [
                'kode' => '14',
                'name' => 'DPPKBPPPA',
                'antrian' => '1'
            ],
            [
                'kode' => '15',
                'name' => 'RSUD SETJONEGORO',
                'antrian' => '1'
            ],
            [
                'kode' => '16',
                'name' => 'SATPOL PP',
                'antrian' => '1'
            ],
            [
                'kode' => '17',
                'name' => 'DISPERKIMHUB',
                'antrian' => '1'
            ],
            [
                'kode' => '18',
                'name' => 'BKD',
                'antrian' => '1'
            ],
            [
                'kode' => '19',
                'name' => 'SEKRETARIAT DEWAN',
                'antrian' => '1'
            ],
            [
                'kode' => '20',
                'name' => 'DISDUKCAPIL',
                'antrian' => '1'
            ],
            [
                'kode' => '21',
                'name' => 'SEKRETARIAT DAERAH',
                'antrian' => '1'
            ],
            [
                'kode' => '22',
                'name' => 'DIKPORA',
                'antrian' => '1'
            ],
            [
                'kode' => '23',
                'name' => 'PERTANIAN',
                'antrian' => '1'
            ],
            [
                'kode' => '24',
                'name' => 'DINAS SOSIAL',
                'antrian' => '1'
            ],
            [
                'kode' => '25',
                'name' => 'DISNAKERINTRANS',
                'antrian' => '1'
            ],
            [
                'kode' => '26',
                'name' => 'BLK',
                'antrian' => '1'
            ],
        ];

        Instansi::insert($data);
    }
}
