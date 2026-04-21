<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('123123'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        $this->call([
            CidadeSeeder::class,
            DiaristaSeeder::class,
            ServicoSeeder::class,
            DiaristaServicoSeeder::class,
        ]);
    }
}
