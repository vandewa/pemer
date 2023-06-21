<?php

namespace Database\Seeders;

use App\Models\JenisDokumen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisDokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'tipe_perjanjian_id' => '1',
                'name' => 'Antar Daerah'
            ],
            [
                'tipe_perjanjian_id' => '1',
                'name' => 'Luar Negeri'
            ],
            [
                'tipe_perjanjian_id' => '1',
                'name' => 'Pihak Ketiga'
            ],
            [
                'tipe_perjanjian_id' => '2',
                'name' => 'Antar Daerah'
            ],
            [
                'tipe_perjanjian_id' => '2',
                'name' => 'Luar Negeri'
            ],
            [
                'tipe_perjanjian_id' => '2',
                'name' => 'Pihak Ketiga'
            ],
        ];

        JenisDokumen::insert($data);
    }
}
