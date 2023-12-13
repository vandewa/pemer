<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ComCodeSeeder::class);
        $this->call(OpdSeeder::class);
        $this->call(TipePerjanjianSeeder::class);
        $this->call(JenisDokumenSeeder::class);
        $this->call(ProfileOpdSeeder::class);
        $this->call(KategoriSeeder::class);
    }
}
