<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UserApi extends Model
{
    use HasFactory;

    protected $table = 'users_api';

    /**
     * Define a relação com as cidades atendidas pelo(a) diarista
     *
     * @return BelongsToMany
     */
    public function cidadesAtendidas(): BelongsToMany
    {
        return $this->belongsToMany(Cidade::class, 'cidade_diarista');
    }

    /**
     * Escomo que filtra os(as) diaristas
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeDiarista(Builder $query): Builder
    {
        return $query->where('tipo_usuario', 2);
    }

    /**
     * Escopo que filtra diaristas por código do IBGE
     *
     * @param Builder $query
     * @param integer $codigoIbge
     * @return Builder
     */
    public function scopeDiaristaAtendeCidade(Builder $query, int $codigoIbge): Builder
    {
        return $query->diarista()->whereHas('cidadesAtendidas', function($q) use ($codigoIbge){
            $q->where('codigo_ibge', $codigoIbge);
        });
    }

    /**
     * Busca 1 diarista por código do IBGE
     *
     * @param integer $codigoIbge
     * @return Collection
     */
    static public function diaristasDisponivelCidade(int $codigoIbge): Collection
    {
        return UserApi::diaristaAtendeCidade($codigoIbge)->limit(3)->get();
    }

    /**
     * Retorna a quantidade de diaristas por código do IBGE
     *
     * @param integer $codigoIbge
     * @return int
     */
    static public function diaristasDisponivelCidadeTotal(int $codigoIbge): int
    {
        return UserApi::diaristaAtendeCidade($codigoIbge)->count();
    }
}
