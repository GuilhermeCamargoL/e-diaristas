<?php

namespace App\Services\ConsultaCEP;

interface ConsultaCEPinterface
{
    public function buscar(string $cep): false|EnderecoResponse;
}
