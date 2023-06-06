<?php

namespace App\Http\Controllers\Endereco;

use Illuminate\Http\Request;
use App\Http\Requests\CepRequest;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use App\Services\ConsultaCEP\ConsultaCEPinterface;

class BuscaCepApiExterna extends Controller
{
    public function __construct(
        private ConsultaCEPinterface $consultaCep
    ){}

    /**
     * Retorna os dados de endereço a partir do CEP
     *
     * @param CepRequest $request
     * @return array
     */
    public function __invoke(CepRequest $request): array
    {
        $dadosEndereco = $this->consultaCep->buscar($request->cep);

        if($dadosEndereco === false){
            throw ValidationException::withMessages(['cep' => 'Cep não encontrado']);
        }

        return (array) $dadosEndereco;
    }
}
