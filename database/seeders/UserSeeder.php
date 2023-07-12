<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            "email" => "admin@app.com",
            "password" => bcrypt('password'),
            "name" => "Administrator"
        ]);

        $admin->assignRole('admin');
        $user = User::create([
            "name" => "User",
            "password" => bcrypt('password'),
            "email" => "user@app.com"
        ]);

        $user->assignRole('user');
    }
}
