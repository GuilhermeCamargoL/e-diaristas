<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiaristaServicoSeeder extends Seeder
{
    public function run()
    {
        $now = now();

        $diaristas = DB::table('users_api')->pluck('id', 'cpf');
        $servicos = DB::table('servicos')->pluck('id', 'nome');

        $vinculos = [
            ['cpf' => '12345678901', 'servico' => 'Limpeza residencial', 'valor' => 125.00, 'tempo' => 2],
            ['cpf' => '12345678901', 'servico' => 'Faxina completa', 'valor' => 190.00, 'tempo' => 3],
            ['cpf' => '12345678901', 'servico' => 'Limpeza de banheiro', 'valor' => 95.00, 'tempo' => 2],

            ['cpf' => '23456789012', 'servico' => 'Limpeza residencial', 'valor' => 130.00, 'tempo' => 2],
            ['cpf' => '23456789012', 'servico' => 'Lavagem de quintal', 'valor' => 110.00, 'tempo' => 2],

            ['cpf' => '34567890123', 'servico' => 'Faxina completa', 'valor' => 185.00, 'tempo' => 3],
            ['cpf' => '34567890123', 'servico' => 'Limpeza pós-obra', 'valor' => 245.00, 'tempo' => 4],
            ['cpf' => '34567890123', 'servico' => 'Limpeza residencial', 'valor' => 120.00, 'tempo' => 2],

            ['cpf' => '45678901234', 'servico' => 'Limpeza residencial', 'valor' => 128.00, 'tempo' => 2],
            ['cpf' => '45678901234', 'servico' => 'Limpeza de banheiro', 'valor' => 92.00, 'tempo' => 2],

            ['cpf' => '56789012345', 'servico' => 'Lavagem de quintal', 'valor' => 105.00, 'tempo' => 2],
            ['cpf' => '56789012345', 'servico' => 'Limpeza residencial', 'valor' => 135.00, 'tempo' => 2],
        ];

        foreach ($vinculos as $vinculo) {
            if (! isset($diaristas[$vinculo['cpf']], $servicos[$vinculo['servico']])) {
                continue;
            }

            DB::table('diarista_servico')->updateOrInsert(
                [
                    'user_api_id' => $diaristas[$vinculo['cpf']],
                    'servico_id' => $servicos[$vinculo['servico']],
                ],
                [
                    'valor' => $vinculo['valor'],
                    'tempo_estimado_horas' => $vinculo['tempo'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }
}
