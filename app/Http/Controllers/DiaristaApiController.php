<?php

namespace App\Http\Controllers;

use App\Models\UserApi;
use Illuminate\Contracts\View\View;

class DiaristaApiController extends Controller
{
    /**
     * Exibe no admin a lista de diaristas cadastradas via integracao externa.
     */
    public function index(): View
    {
        $diaristas = UserApi::diarista()
            ->with(['servicos:id,nome', 'cidadesAtendidas:id,cidade,estado'])
            ->orderByDesc('reputacao')
            ->paginate(10);

        return view('diaristas_api.index', [
            'diaristas' => $diaristas,
        ]);
    }
}
