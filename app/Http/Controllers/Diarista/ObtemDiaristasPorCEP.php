<?php

namespace App\Http\Controllers\Diarista;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Diarista\ObterDiaristasPorCEP;
use App\Http\Resources\DiaristaPublicoCollection;

class ObtemDiaristasPorCEP extends Controller
{

    public function __construct(
        private ObterDiaristasPorCEP $obterDiaristasPorCEP
    )
    {}

    /**
     * Busca diaristas pelo cep
     *
     * @param Request $request
     * @param ObterDiaristasPorCEP $action
     * @return DiaristaPublicoCollection
     */
    public function __invoke(Request $request): DiaristaPublicoCollection
    {
        $request->validate([
            'cep' => ['required', 'numeric']
        ]);

        [$diaristasCollection, $quantidadeDiaristas] = $this->obterDiaristasPorCEP->executar($request->cep);

        return new DiaristaPublicoCollection($diaristasCollection,$quantidadeDiaristas);
    }
}
