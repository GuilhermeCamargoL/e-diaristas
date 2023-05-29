<?php

namespace App\Http\Controllers\Diarista;

use App\Models\UserApi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DiaristaPublicoCollection;
use App\Services\ConsultaCEP\ConsultaCEPinterface;
use Illuminate\Validation\ValidationException;

class ObtemDiaristasPorCEP extends Controller
{
    /**
     * Busca diaristas pelo cep
     *
     * @param Request $request
     * @param ConsultaCEPinterface $servicoCEP
     * @param DiaristaPublicoCollection
     */
    public function __invoke(Request $request, ConsultaCEPinterface $servicoCEP): DiaristaPublicoCollection
    {
        $request->validate([
            'cep' => ['required', 'numeric']
        ]);

        $dados = $servicoCEP->buscar($request->cep);

        if($dados === false){
            throw ValidationException::withMessages(['cep' => 'Cep inválido']);
        }

        return new DiaristaPublicoCollection(
            UserApi::diaristasDisponivelCidade($dados->ibge),
            UserApi::diaristasDisponivelCidadeTotal($dados->ibge)
        );
    }
}
