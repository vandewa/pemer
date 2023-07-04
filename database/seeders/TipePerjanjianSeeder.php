<?php

namespace Database\Seeders;

use App\Models\TipePerjanjian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipePerjanjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Kesepakatan Bersama',
            ],
            [
                'name' => 'Perjanjian Kerjasama'
            ]
        ];

        TipePerjanjian::insert($data);
    }
}
