<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Servico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'valor_minimo', 'quantidade_horas', 'porcentagem', 'valor_quarto', 'horas_quarto', 'valor_sala', 'horas_sala', 'valor_banheiro', 'horas_banheiro', 'valor_cozinha', 'horas_cozinha', 'valor_quintal', 'horas_quintal', 'valor_outros', 'horas_outros', 'icone', 'posicao', 'created_at', 'updated_at'
    ];

    /**
     * Diaristas que executam este servico.
     *
     * @return BelongsToMany
     */
    public function diaristas(): BelongsToMany
    {
        return $this->belongsToMany(UserApi::class, 'diarista_servico')
            ->withPivot(['valor', 'tempo_estimado_horas'])
            ->withTimestamps();
    }

}
