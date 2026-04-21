<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadeSeeder extends Seeder
{
    public function run()
    {
        $now = now();

        DB::table('cidades')->updateOrInsert(
            ['codigo_ibge' => 3550308],
            ['cidade' => 'São Paulo', 'estado' => 'SP', 'created_at' => $now, 'updated_at' => $now]
        );

        DB::table('cidades')->updateOrInsert(
            ['codigo_ibge' => 3304557],
            ['cidade' => 'Rio de Janeiro', 'estado' => 'RJ', 'created_at' => $now, 'updated_at' => $now]
        );

        DB::table('cidades')->updateOrInsert(
            ['codigo_ibge' => 3106200],
            ['cidade' => 'Belo Horizonte', 'estado' => 'MG', 'created_at' => $now, 'updated_at' => $now]
        );
    }
}
