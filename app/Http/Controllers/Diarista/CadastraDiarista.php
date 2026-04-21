<?php

namespace App\Http\Controllers\Diarista;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiaristaStoreRequest;
use App\Models\UserApi;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CadastraDiarista extends Controller
{
    /**
     * Cadastra diarista via API e vincula cidades/servicos.
     */
    public function __invoke(DiaristaStoreRequest $request): JsonResponse
    {
        $dados = $request->validated();

        $diarista = DB::transaction(function () use ($dados) {
            $diarista = UserApi::create([
                'nome_completo' => $dados['nome_completo'],
                'cpf' => $dados['cpf'],
                'nascimento' => $dados['nascimento'],
                'foto_documento' => $dados['foto_documento'],
                'foto_usuario' => $dados['foto_usuario'] ?? null,
                'telefone' => $dados['telefone'],
                'tipo_usuario' => 2,
                'chave_pix' => $dados['chave_pix'],
                'reputacao' => $dados['reputacao'] ?? 3,
            ]);

            $diarista->cidadesAtendidas()->sync($dados['cidade_ids']);

            $servicosComPivot = [];
            foreach ($dados['servicos'] as $servico) {
                $servicosComPivot[$servico['servico_id']] = [
                    'valor' => $servico['valor'],
                    'tempo_estimado_horas' => $servico['tempo_estimado_horas'],
                ];
            }

            $diarista->servicos()->sync($servicosComPivot);

            return $diarista->load(['cidadesAtendidas:id,cidade,estado', 'servicos:id,nome']);
        });

        return resposta_padrao(
            'Diarista cadastrada com sucesso',
            'success',
            201,
            [
                'data' => [
                    'id' => $diarista->id,
                    'nome_completo' => $diarista->nome_completo,
                    'reputacao' => $diarista->reputacao,
                    'cidades' => $diarista->cidadesAtendidas,
                    'servicos' => $diarista->servicos,
                ],
            ]
        );
    }
}
