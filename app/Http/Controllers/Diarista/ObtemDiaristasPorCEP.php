<?php

namespace App\Http\Controllers\Diarista;

use App\Http\Requests\CepRequest;
use App\Http\Controllers\Controller;
use App\Actions\Diarista\ObterDiaristasPorCEP;
use App\Http\Resources\DiaristaPublicoCollection;

class ObtemDiaristasPorCEP extends Controller
{

    public function __construct(
        private ObterDiaristasPorCEP $obterDiaristasPorCEP
    ){}

    /**
     * Busca diaristas pelo cep
     *
     * @param CepRequest $request
     * @return DiaristaPublicoCollection
     */
    public function __invoke(CepRequest $request): DiaristaPublicoCollection
    {
        [$diaristasCollection, $quantidadeDiaristas] = $this->obterDiaristasPorCEP->executar($request->cep);

        return new DiaristaPublicoCollection($diaristasCollection,$quantidadeDiaristas);
    }
}
