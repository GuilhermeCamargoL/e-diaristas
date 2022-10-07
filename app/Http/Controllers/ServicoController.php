<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoRequest;
use App\Models\Servico;

class ServicoController extends Controller
{
    public function index()
    {
        $servicos = Servico::paginate(5);

        return view('servicos.index')->with('servicos', $servicos);
    }

    public function create()
    {
        return view('servicos.create');
    }


    public function store(ServicoRequest $request)
    {
        $dados = $request->except('_token');

        $retornno = Servico::create($dados);

        return redirect()->route('servicos.index');
    }

    public function edit(Servico $servico)
    {
        return view('servicos.edit')->with('servico', $servico);
    }

    public function update(ServicoRequest $request, $id)
    {
        $dados = $request->except(['_token', '_method']);

        $servico = Servico::findOrFail($id);

        $servico->update($dados);

        return redirect()->route('servicos.index');
    }
}
