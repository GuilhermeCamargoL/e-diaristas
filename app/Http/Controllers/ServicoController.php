<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoRequest;
use App\Models\Servico;

class ServicoController extends Controller
{
    /**
     * Lista todos os Serviços
     *
     * @return void
     */
    public function index()
    {
        $servicos = Servico::paginate(5);

        return view('servicos.index')->with('servicos', $servicos);
    }

    /**
     * Formulário de criação do serviço
     *
     * @return void
     */
    public function create()
    {
        return view('servicos.create');
    }

    /**
     * Cria um novo registro no banco de dados
     *
     * @param ServicoRequest $request
     * @return void
     */
    public function store(ServicoRequest $request)
    {
        $dados = $request->except('_token');

        $retornno = Servico::create($dados);

        return redirect()->route('servicos.index')->with('mensagem', 'Serviço cadastrado com sucesso!');
    }

    /**
     * Mostra o formulário preenchido
     *
     * @param Servico $servico
     * @return void
     */
    public function edit(Servico $servico)
    {
        return view('servicos.edit')->with('servico', $servico);
    }

    /**
     * Atualiza um registro no banco de dados
     *
     * @param ServicoRequest $request
     * @param [type] $id
     * @return void
     */
    public function update(ServicoRequest $request, $id)
    {
        $dados = $request->except(['_token', '_method']);

        $servico = Servico::findOrFail($id);

        $servico->update($dados);

        return redirect()->route('servicos.index')->with('mensagem', 'Serviço atualizado com sucesso!');
    }
}
