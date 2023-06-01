<?php

namespace App\Actions\Diarista;

use App\Models\UserApi;
use App\Services\ConsultaCEP\ConsultaCEPinterface;
use Illuminate\Validation\ValidationException;

class ObterDiaristasPorCEP
{

    public function __construct(private ConsultaCEPinterface $servicoCEP)
    {

    }

    /**
     * Busca diaristas a partir de um CEP
     *
     * @param string $cep
     * @return array
     */
    public function executar(string $cep): array
    {
        $dados = $this->servicoCEP->buscar($cep);

        if($dados === false){
            throw ValidationException::withMessages(['cep' => 'Cep inválido']);
        }

        return [
            UserApi::diaristasDisponivelCidade($dados->ibge),
            UserApi::diaristasDisponivelCidadeTotal($dados->ibge)
        ];
    }
}
