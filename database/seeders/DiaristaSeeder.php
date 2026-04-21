<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiaristaSeeder extends Seeder
{
    public function run()
    {
        $now = now();

        $diaristas = [
            [
                'nome_completo' => 'Ana Silva',
                'cpf' => '12345678901',
                'nascimento' => '1990-03-12',
                'foto_documento' => 'documentos/ana-silva.jpg',
                'foto_usuario' => 'usuarios/ana-silva.jpg',
                'telefone' => '11999998888',
                'tipo_usuario' => 2,
                'chave_pix' => 'ana.silva@pix',
                'reputacao' => 5,
            ],
            [
                'nome_completo' => 'Bruno Costa',
                'cpf' => '23456789012',
                'nascimento' => '1985-07-20',
                'foto_documento' => 'documentos/bruno-costa.jpg',
                'foto_usuario' => 'usuarios/bruno-costa.jpg',
                'telefone' => '21988887777',
                'tipo_usuario' => 2,
                'chave_pix' => 'bruno.costa@pix',
                'reputacao' => 4,
            ],
            [
                'nome_completo' => 'Carla Mendes',
                'cpf' => '34567890123',
                'nascimento' => '1993-11-05',
                'foto_documento' => 'documentos/carla-mendes.jpg',
                'foto_usuario' => 'usuarios/carla-mendes.jpg',
                'telefone' => '31977776666',
                'tipo_usuario' => 2,
                'chave_pix' => 'carla.mendes@pix',
                'reputacao' => 5,
            ],
            [
                'nome_completo' => 'Daniel Rodrigues',
                'cpf' => '45678901234',
                'nascimento' => '1988-01-30',
                'foto_documento' => 'documentos/daniel-rodrigues.jpg',
                'foto_usuario' => 'usuarios/daniel-rodrigues.jpg',
                'telefone' => '11966665555',
                'tipo_usuario' => 2,
                'chave_pix' => 'daniel.rodrigues@pix',
                'reputacao' => 4,
            ],
            [
                'nome_completo' => 'Elisa Nunes',
                'cpf' => '56789012345',
                'nascimento' => '1996-09-18',
                'foto_documento' => 'documentos/elisa-nunes.jpg',
                'foto_usuario' => 'usuarios/elisa-nunes.jpg',
                'telefone' => '21955554444',
                'tipo_usuario' => 2,
                'chave_pix' => 'elisa.nunes@pix',
                'reputacao' => 3,
            ],
        ];

        $userIds = [];

        foreach ($diaristas as $diarista) {
            DB::table('users_api')->updateOrInsert(
                ['cpf' => $diarista['cpf']],
                array_merge($diarista, ['created_at' => $now, 'updated_at' => $now])
            );

            $userIds[] = DB::table('users_api')->where('cpf', $diarista['cpf'])->value('id');
        }

        $cidades = DB::table('cidades')->pluck('id', 'codigo_ibge');

        $associacoes = [
            ['user_api_id' => $userIds[0], 'cidade_id' => $cidades[3550308]],
            ['user_api_id' => $userIds[0], 'cidade_id' => $cidades[3304557]],
            ['user_api_id' => $userIds[1], 'cidade_id' => $cidades[3304557]],
            ['user_api_id' => $userIds[1], 'cidade_id' => $cidades[3106200]],
            ['user_api_id' => $userIds[2], 'cidade_id' => $cidades[3550308]],
            ['user_api_id' => $userIds[3], 'cidade_id' => $cidades[3550308]],
            ['user_api_id' => $userIds[4], 'cidade_id' => $cidades[3106200]],
        ];

        foreach ($associacoes as $associacao) {
            DB::table('cidade_diarista')->updateOrInsert(
                ['user_api_id' => $associacao['user_api_id'], 'cidade_id' => $associacao['cidade_id']],
                ['created_at' => $now, 'updated_at' => $now]
            );
        }
    }
}
