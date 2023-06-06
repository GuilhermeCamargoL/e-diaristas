<?php

namespace App\Http\Controllers\Servico;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServicoCollection;
use App\Models\Servico;
use Illuminate\Http\Request;

class ObtemServicos extends Controller
{
    /**
     * Retorna a lista de servicos
     *
     * @return ServicoCollection
     */
    public function __invoke(): ServicoCollection
    {
        return new ServicoCollection(
            Servico::get()
        );
    }
}
