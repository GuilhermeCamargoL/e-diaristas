<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaristaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'nome_completo' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'digits:11'],
            'nascimento' => ['required', 'date'],
            'foto_documento' => ['required', 'string', 'max:255'],
            'foto_usuario' => ['nullable', 'string', 'max:255'],
            'telefone' => ['required', 'digits:11'],
            'chave_pix' => ['required', 'string', 'max:255', 'unique:users_api,chave_pix'],
            'reputacao' => ['nullable', 'integer', 'min:1', 'max:5'],
            'cidade_ids' => ['required', 'array', 'min:1'],
            'cidade_ids.*' => ['integer', 'exists:cidades,id'],
            'servicos' => ['required', 'array', 'min:1'],
            'servicos.*.servico_id' => ['required', 'integer', 'exists:servicos,id'],
            'servicos.*.valor' => ['required', 'numeric', 'min:0.01'],
            'servicos.*.tempo_estimado_horas' => ['required', 'integer', 'min:1', 'max:12'],
        ];
    }
}
