<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicoSeeder extends Seeder
{
    public function run()
    {
        $now = now();

        $servicos = [
            [
                'nome' => 'Limpeza residencial',
                'valor_minimo' => 120.00,
                'quantidade_horas' => 2,
                'porcentagem' => 15,
                'valor_quarto' => 40.00,
                'horas_quarto' => 1,
                'valor_sala' => 55.00,
                'horas_sala' => 1,
                'valor_banheiro' => 30.00,
                'horas_banheiro' => 1,
                'valor_cozinha' => 45.00,
                'horas_cozinha' => 1,
                'valor_quintal' => 60.00,
                'horas_quintal' => 1,
                'valor_outros' => 50.00,
                'horas_outros' => 1,
                'icone' => 'twf-cleaning-1',
                'posicao' => 1,
            ],
            [
                'nome' => 'Faxina completa',
                'valor_minimo' => 180.00,
                'quantidade_horas' => 3,
                'porcentagem' => 18,
                'valor_quarto' => 55.00,
                'horas_quarto' => 1,
                'valor_sala' => 75.00,
                'horas_sala' => 1,
                'valor_banheiro' => 40.00,
                'horas_banheiro' => 1,
                'valor_cozinha' => 60.00,
                'horas_cozinha' => 1,
                'valor_quintal' => 80.00,
                'horas_quintal' => 1,
                'valor_outros' => 70.00,
                'horas_outros' => 1,
                'icone' => 'twf-cleaning-2',
                'posicao' => 2,
            ],
            [
                'nome' => 'Limpeza pós-obra',
                'valor_minimo' => 240.00,
                'quantidade_horas' => 4,
                'porcentagem' => 20,
                'valor_quarto' => 65.00,
                'horas_quarto' => 1,
                'valor_sala' => 85.00,
                'horas_sala' => 1,
                'valor_banheiro' => 45.00,
                'horas_banheiro' => 1,
                'valor_cozinha' => 70.00,
                'horas_cozinha' => 1,
                'valor_quintal' => 95.00,
                'horas_quintal' => 1,
                'valor_outros' => 85.00,
                'horas_outros' => 1,
                'icone' => 'twf-cleaning-3',
                'posicao' => 3,
            ],
            [
                'nome' => 'Lavagem de quintal',
                'valor_minimo' => 100.00,
                'quantidade_horas' => 2,
                'porcentagem' => 12,
                'valor_quarto' => 0.00,
                'horas_quarto' => 0,
                'valor_sala' => 0.00,
                'horas_sala' => 0,
                'valor_banheiro' => 0.00,
                'horas_banheiro' => 0,
                'valor_cozinha' => 0.00,
                'horas_cozinha' => 0,
                'valor_quintal' => 100.00,
                'horas_quintal' => 2,
                'valor_outros' => 0.00,
                'horas_outros' => 0,
                'icone' => 'twf-cleaning-3',
                'posicao' => 4,
            ],
            [
                'nome' => 'Limpeza de banheiro',
                'valor_minimo' => 90.00,
                'quantidade_horas' => 2,
                'porcentagem' => 13,
                'valor_quarto' => 0.00,
                'horas_quarto' => 0,
                'valor_sala' => 0.00,
                'horas_sala' => 0,
                'valor_banheiro' => 90.00,
                'horas_banheiro' => 2,
                'valor_cozinha' => 0.00,
                'horas_cozinha' => 0,
                'valor_quintal' => 0.00,
                'horas_quintal' => 0,
                'valor_outros' => 0.00,
                'horas_outros' => 0,
                'icone' => 'twf-cleaning-1',
                'posicao' => 5,
            ],
        ];

        foreach ($servicos as $servico) {
            DB::table('servicos')->updateOrInsert(
                ['nome' => $servico['nome']],
                array_merge($servico, ['created_at' => $now, 'updated_at' => $now])
            );
        }
    }
}
