<?php

namespace App\Http\Controllers\Diarista;

use App\Models\UserApi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DiaristaPublicoCollection;
use App\Services\ConsultaCEP\ConsultaCEPinterface;

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
        $cep = $servicoCEP->buscar($request->cep ?? '');

        if($cep === false){
            return response()->json(['erro' => 'CEP inválido'], 400);
        }

        return new DiaristaPublicoCollection(
            UserApi::diaristasDisponivelCidade($cep->ibge),
            UserApi::diaristasDisponivelCidadeTotal($cep->ibge)
        );
    }
}
